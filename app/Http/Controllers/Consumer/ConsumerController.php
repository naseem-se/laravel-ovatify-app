<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketplaceAssetsResource;
use App\Http\Resources\MediaResource;
use App\Models\MarketplaceAsset;
use App\Models\SongGeneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

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


}
