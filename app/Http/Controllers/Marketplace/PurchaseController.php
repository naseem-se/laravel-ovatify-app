<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\MarketplaceAsset;
use App\Models\MarketplacePurchase;
use App\Models\MarketplaceLicense;
use App\Models\MarketplaceInvestment;
use App\Services\PurchaseService;
use App\Exceptions\PurchaseException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Resources\MarketplaceAssetsResource;
use App\Http\Resources\MediaResource;
use App\Models\SongGeneration;

class PurchaseController extends Controller
{
    protected $purchaseService;

    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    /**
     * Purchase asset (direct sale)
     */
    public function purchaseAsset(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'asset_id' => 'required|exists:marketplace_assets,id',
                'payment_method' => 'required|in:card,paypal,wallet',
                'payment_token' => 'required_if:payment_method,card',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()->all(),
                ], 422);
            }
            $purchase = $this->purchaseService->processPurchase(
                userId: Auth::id(),
                assetId: $request->asset_id,
                paymentData: $request->only(['payment_method', 'payment_token'])
            );

            return response()->json([
                'success' => true,
                'message' => 'Asset purchased successfully',
                'purchase' => [
                    'id' => $purchase->id,
                    'asset_id' => $purchase->marketplace_asset_id,
                    'purchase_price' => $purchase->purchase_price,
                    'payment_status' => $purchase->payment_status,
                    'access_token' => $purchase->access_token,
                ],
            ], 201);
        } catch (PurchaseException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    /**
     * License asset
     */
    public function licenseAsset(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'asset_id' => 'required|exists:marketplace_assets,id',
                'months' => 'required|integer|min:1|max:600',
                'payment_method' => 'required|in:card,paypal,wallet',
                'payment_token' => 'required_if:payment_method,card',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()->all(),
                ], 422);
            }

            $license = $this->purchaseService->processLicense(
                userId: Auth::id(),
                assetId: $request->asset_id,
                months: $request->months,
                paymentData: $request->only(['payment_method', 'payment_token'])
            );

            return response()->json([
                'success' => true,
                'message' => 'License acquired successfully',
                'license' => [
                    'id' => $license->id,
                    'asset_id' => $license->marketplace_asset_id,
                    'license_key' => $license->license_key,
                    'licensed_from' => $license->licensed_from,
                    'licensed_until' => $license->licensed_until,
                    'license_price' => $license->license_price,
                ],
            ], 201);
        } catch (PurchaseException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    /**
     * Invest in asset
     */
    public function investAsset(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'asset_id' => 'required|exists:marketplace_assets,id',
                'blocks' => 'nullable|integer|min:1|default:5',
                'payment_method' => 'required|in:card,paypal,wallet',
                'payment_token' => 'required_if:payment_method,card',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()->all(),
                ], 422);
            }

            $investment = $this->purchaseService->processInvestment(
                userId: Auth::id(),
                assetId: $request->asset_id,
                blocksToInvest: $request->blocks,
                paymentData: $request->only(['payment_method', 'payment_token'])
            );

            return response()->json([
                'success' => true,
                'message' => 'Investment successful',
                'investment' => [
                    'id' => $investment->id,
                    'asset_id' => $investment->marketplace_asset_id,
                    'blocks_purchased' => $investment->blocks_purchased,
                    'investment_amount' => $investment->investment_amount,
                    'ownership_percentage' => $investment->ownership_percentage,
                    'expected_roi' => $investment->expected_roi,
                    'certificate_of_ownership' => $investment->generateCertificate(),
                ],
            ], 201);
        } catch (PurchaseException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    /**
     * Renew license
     */
    public function renewLicense(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'license_id' => 'required|exists:marketplace_licenses,id',
                'months' => 'required|integer|min:1|max:60',
                'payment_method' => 'required|in:card,paypal,wallet',
                'payment_token' => 'required_if:payment_method,card',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()->all(),
                ], 422);
            }

            $license = $this->purchaseService->renewLicense(
                licenseId: $request->license_id,
                months: $request->months,
                paymentData: $request->only(['payment_method', 'payment_token'])
            );

            return response()->json([
                'success' => true,
                'message' => 'License renewed successfully',
                'license' => [
                    'id' => $license->id,
                    'licensed_until' => $license->licensed_until,
                    'days_remaining' => $license->getDaysRemaining(),
                ],
            ], 200);
        } catch (PurchaseException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred',
            ], 500);
        }
    }

    /**
     * Get user's purchases
     */
    public function getPurchases(): JsonResponse
    {
        $purchases = MarketplacePurchase::where('user_id', Auth::id())
            ->with('asset:id,title,asset_type')
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'purchases' => $purchases,
        ]);
    }

    /**
     * Get user's licenses
     */
    public function getLicenses(): JsonResponse
    {
        $licenses = MarketplaceLicense::where('user_id', Auth::id())
            ->with('asset:id,title,asset_type')
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'licenses' => $licenses,
        ]);
    }

    /**
     * Get user's investments
     */
    public function getInvestments(): JsonResponse
    {
        $investments = MarketplaceInvestment::where('user_id', Auth::id())
            ->with('asset:id,title,total_valuation')
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'investments' => $investments->map(function ($investment) {
                return [
                    'id' => $investment->id,
                    'asset' => $investment->asset,
                    'blocks_purchased' => $investment->blocks_purchased,
                    'investment_amount' => $investment->investment_amount,
                    'ownership_percentage' => $investment->ownership_percentage,
                    'current_roi' => $investment->getCurrentROI(),
                    'total_earned' => $investment->total_earned,
                    'pending_earnings' => $investment->getPendingEarnings(),
                    'status' => $investment->getInvestmentStatus(),
                ];
            }),
        ]);
    }

    /**
     * Get purchase details
     */
    public function getPurchaseDetails(int $purchaseId): JsonResponse
    {
        try {
            $purchase = MarketplacePurchase::where('user_id', Auth::id())
                ->with(['asset', 'transaction'])
                ->findOrFail($purchaseId);

            return response()->json([
                'success' => true,
                'purchase' => [
                    'id' => $purchase->id,
                    'asset' => $purchase->asset,
                    'purchase_price' => $purchase->purchase_price,
                    'can_download' => $purchase->canDownload(),
                    'download_count' => $purchase->download_count,
                    'expires_at' => $purchase->expires_at,
                    'purchased_at' => $purchase->created_at,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Purchase not found',
            ], 404);
        }
    }

    /**
     * Verify access token
     */
    public function verifyAccessToken(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'purchase_id' => 'required|integer',
            'token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()->all(),
            ], 422);
        }

        $purchase = MarketplacePurchase::find($request->purchase_id);

        if (!$purchase || $purchase->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid purchase',
            ], 404);
        }

        if (!$purchase->canDownload()) {
            return response()->json([
                'success' => false,
                'message' => 'Purchase has expired or is not accessible',
            ], 403);
        }

        if (!$purchase->verifyAccessToken($request->token)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid access token',
            ], 401);
        }

        $purchase->recordDownload();

        return response()->json([
            'success' => true,
            'message' => 'Access verified',
        ]);
    }

    public function listTracks(Request $request): JsonResponse
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
    public function assetDetails(int $id): JsonResponse
    {
        try {
            $asset = MarketplaceAsset::query()
                ->with('user', 'songGeneration')
                ->where('is_active', true)
                ->findOrFail($id);


            return response()->json([
                'success' => true,
                'track' => MarketplaceAssetsResource::collection([$asset]),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Asset not found. Invalid ID provided.',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 404);
        }
    }





}