<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketplaceTransactionResource;
use App\Http\Resources\MediaResource;
use App\Models\SongGeneration;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\MarketplacePurchase;
use App\Models\MarketplaceTransaction;
use Illuminate\Support\Facades\Storage;
use App\Models\MarketplaceLicense;
use App\Models\MarketplaceInvestment;
use Illuminate\Support\Facades\DB;


class ConsumerController extends Controller
{
    public function dashboard(Request $request)
    {
        try {
            // Featured drops
            $featuredDrops = SongGeneration::query()
                ->with('user:id,username,email,profile_image', 'marketplaceAssets')
                ->where('status', 'uploaded')
                ->where('file_type', 'audio')
                ->withCount([
                    'marketplaceAssets as assets_count' => function ($query) {
                        $query->where('is_active', true);
                    }
                ])
                ->orderByDesc('created_at')
                ->limit(5)
                ->get()
                ->filter(function ($song) {
                    return $song->assets_count > 0;
                })
                ->values();

            $fourteenDaysAgo = now()->subDays(14);

            // Trending songs (last 14 days)
            $assetForInvestment = SongGeneration::query()
                ->with([
                    'user:id,username,email,profile_image',
                    'marketplaceAssets' => function ($q) {
                        $q->where('is_active', true)
                            ->where('sale_type', 'investment')
                            ->limit(1); // only one asset per song
                    }
                ])
                ->where('status', 'uploaded')
                ->where('file_type', 'audio')
                ->whereHas('marketplaceAssets', function ($q) {
                    $q->where('is_active', true)
                        ->where('sale_type', 'investment');
                })
                ->latest('created_at')
                ->limit(10)
                ->get();

            // All tracks
            $allTracks = SongGeneration::query()
                ->with('user:id,username,email,profile_image', 'marketplaceAssets')
                ->where('status', 'uploaded')
                ->where('file_type', 'audio')
                ->orderByDesc('created_at')
                ->get();

            return response()->json([
                'success' => true,
                'featured_drops' => MediaResource::collection($featuredDrops),
                'investment_assets' => MediaResource::collection($assetForInvestment),
                'all_tracks' => MediaResource::collection($allTracks),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching dashboard data.',
                'error' => config('app.debug') ? $e->getMessage() : null,

            ]);
        }
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

    public function trackAgreement(int $id): JsonResponse
    {
        try {
            $asset = SongGeneration::query()
                ->where('status', 'uploaded')
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'agreement' => $asset->agreements,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Track not found. Invalid ID provided.',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 404);
        }
    }

    public function searchTracks(Request $request): JsonResponse
    {
        $query = $request->input('query');

        if (!$query) {
            return response()->json([
                'success' => false,
                'message' => 'query field is required.',
            ], 400);
        }

        $tracks = SongGeneration::query()
            ->with('user:id,username,email,profile_image', 'marketplaceAssets')
            ->where('status', 'uploaded')
            ->where('file_type', 'audio')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('overview', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->orWhere('agreements', 'like', "%{$query}%")
                    ->orWhereHas('user', function ($q2) use ($query) {
                        $q2->where('username', 'like', "%{$query}%");
                    });
            })
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'results' => MediaResource::collection($tracks),
        ]);
    }

    public function myPurchases(Request $request): JsonResponse
    {
        $user = $request->user();

        $purchases = $user->buyerTransactions()
            ->where('status', 'completed')
            ->where('transaction_type', '!=', 'investment')
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
            ->get();

        if ($purchases->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No purchases found',
                'data' => []
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => MarketplaceTransactionResource::collection($purchases),
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
            return response()->json(
                [
                    'success' => true,
                    'download_url' => Storage::url($filePath),
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

    public function becomeCreator(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->role === 'creator') {
            return response()->json([
                'success' => false,
                'message' => 'You are already a creator.',
            ], 400);
        }

        $user->role = 'creator';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Your account has been updated to creator.',
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $user->role,
                'profile_image' => $user->profile_image ? url(Storage::url($user->profile_image)) : null,
            ],
        ]);
    }


}
