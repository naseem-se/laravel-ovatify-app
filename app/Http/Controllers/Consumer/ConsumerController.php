<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketplaceTransactionResource;
use App\Http\Resources\MediaResource;
use App\Models\SongGeneration;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\MarketplacePurchase;
use Illuminate\Support\Facades\Storage;
use App\Models\MarketplaceLicense;
use App\Models\MarketplaceInvestment;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    public function dashboard(Request $request)
    {
        $featuredDrops = SongGeneration::query()
            ->with('user', 'marketplaceAssets')
            ->where('status', 'uploaded')
            ->where('file_type', 'audio')
            ->withCount([
                'marketplaceAssets as assets_count' => function ($query) {
                    $query->where('is_active', true);
                }
            ])
            ->withCount([
                'transactions as transactions_count' => function ($query) {
                    $query->where('status', 'completed');
                }
            ])
            ->orderByDesc('created_at')
            ->orderByDesc('transactions_count')
            ->limit(5)
            ->get();

        $fourteenDaysAgo = now()->subDays(14);

        $trendingSongs = SongGeneration::query()
            ->with('user', 'marketplaceAssets')
            ->where('status', 'uploaded')
            ->where('file_type', 'audio')
            ->withCount([
                'transactions as transactions_count' => function ($query) use ($fourteenDaysAgo) {
                    $query->where('status', 'completed')
                        ->where('marketplace_transactions.created_at', '>=', $fourteenDaysAgo);
                }
            ])
            ->withSum([
                'transactions as total_revenue' => function ($query) use ($fourteenDaysAgo) {
                    $query->where('status', 'completed')
                        ->where('marketplace_transactions.created_at', '>=', $fourteenDaysAgo);
                }
            ], 'amount')
            ->orderByDesc('transactions_count')
            ->orderByDesc('total_revenue')
            ->limit(5)
            ->get();

        // All Tracks from SongGeneration
        $allTracks = SongGeneration::query()
            ->with('user', 'marketplaceAssets')
            ->where('status', 'uploaded')
            ->where('file_type', 'audio')
            ->paginate(1);

        return response()->json([
            'success' => true,
            'featured_drops' => MediaResource::collection($featuredDrops),
            'trending_assets' => MediaResource::collection($trendingSongs),
            'all_tracks' => MediaResource::collection($allTracks),
        ]);
    }

    public function trackDetails(int $id): JsonResponse
    {
        try {
            $asset = SongGeneration::query()
                ->with('user', 'marketplaceAssets')
                ->where('status', 'uploaded')
                ->findOrFail($id);


            return response()->json([
                'success' => true,
                'track' => MediaResource::collection([$asset]),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Track not found. Invalid ID provided.',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 404);
        }
    }

    public function myPurchases(Request $request): JsonResponse
    {
        $user = $request->user();

        $purchases = $user->buyerTransactions()
            ->where('status', 'completed')
            ->with([
                'asset' => function ($query) {
                    $query->with([
                        'user:id,username,email,profile_image',
                        'songGeneration' => function ($q) {
                            $q->with('user:id,username,email,profile_image');
                        }
                    ]);
                },
                'seller:id,username,email,profile_image'
            ])
            ->orderByDesc('created_at')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => MarketplaceTransactionResource::collection($purchases),
            'pagination' => [
                'total' => $purchases->total(),
                'per_page' => $purchases->perPage(),
                'current_page' => $purchases->currentPage(),
                'last_page' => $purchases->lastPage(),
            ],
        ]);
    }

    public function myPurchaseDetails(Request $request, int $id): JsonResponse
    {
        $user = $request->user();

        try {
            $purchase = $user->buyerTransactions()
                ->where('status', 'completed')
                ->where('id', $id)
                ->with([
                    'asset' => function ($query) {
                        $query->with([
                            'user:id,username,email,profile_image',
                            'songGeneration' => function ($q) {
                                $q->with('user:id,username,email,profile_image');
                            }
                        ]);
                    },
                    'seller:id,username,email,profile_image'
                ])
                ->firstOrFail();

            // Get related purchase/license/investment based on transaction type
            $relatedRecord = null;

            if ($purchase->transaction_type === 'purchase') {
                $relatedRecord = MarketplacePurchase::where('transaction_id', $purchase->id)
                    ->select('id', 'user_id', 'marketplace_asset_id', 'purchase_price', 'payment_status', 'access_token', 'created_at')
                    ->first();
            } elseif ($purchase->transaction_type === 'license') {
                $relatedRecord = MarketplaceLicense::where('transaction_id', $purchase->id)
                    ->select('id', 'user_id', 'marketplace_asset_id', 'license_key', 'license_type', 'licensed_until', 'license_price', 'created_at')
                    ->first();
            } elseif ($purchase->transaction_type === 'investment') {
                $relatedRecord = MarketplaceInvestment::where('transaction_id', $purchase->id)
                    ->select('id', 'user_id', 'marketplace_asset_id', 'blocks_purchased', 'investment_amount', 'total_earned', 'created_at')
                    ->first();
            }

            // Add related record to transaction object
            $purchase->related_record = $relatedRecord;

            return response()->json([
                'success' => true,
                'data' => MarketplaceTransactionResource::collection([$purchase]),
                'related_record' => $relatedRecord,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found. Invalid ID provided.',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 404);
        }

    }

    public function downloadPurchasedAsset(Request $request, int $purchaseId)
    {
        try {

            DB::beginTransaction();
            
            $user = $request->user();

            // Get purchase and validate ownership
            $purchase = MarketplacePurchase::where('user_id', $user->id)
                ->with('asset', 'asset.songGeneration')
                ->findOrFail($purchaseId);

            // Check if purchase is valid and can be downloaded
            if (!$purchase->canDownload()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This purchase has expired or is not available for download',
                ], 403);
            }

            // Get asset file from song generation
            $songGeneration = $purchase->asset->songGeneration;

            if (!$songGeneration || !$songGeneration->file) {
                return response()->json([
                    'success' => false,
                    'message' => 'Asset file not found',
                ], 404);
            }

            $filePath = $songGeneration->file;

            // Check if file exists in public storage
            if (!Storage::disk('public')->exists($filePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File not available',
                    'path' => $filePath,
                    'debug_path' => storage_path('app/public/' . $filePath),
                ], 404);
            }
            
            // Record download
            $purchase->recordDownload();

            DB::commit();

            // Return file download from public disk
            return response()->json([
                'success' => true,
                'download_url' => url(Storage::disk('public')->url($filePath)),
            ]
            );

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Purchase not found or access denied',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Download failed',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }


}
