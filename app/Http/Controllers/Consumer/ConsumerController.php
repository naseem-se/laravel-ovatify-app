<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketplaceAssetsResource;
use App\Http\Resources\MediaResource;
use App\Models\MarketplaceAsset;
use App\Models\SongGeneration;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function dashboard(Request $request)
    {
        $feature_drops = MarketplaceAsset::with('songGeneration', 'user')
            ->where('asset_type', 'audio')
            ->where('sale_type', 'license')
            ->get();

        $investment_drops = MarketplaceAsset::with('songGeneration', 'user')
            ->where('asset_type', 'audio')
            ->where('sale_type', 'investment')
            ->get();

        return response()->json([
            'success' => true,
            'feature_drops' => MarketplaceAssetsResource::collection($feature_drops),
            'investment_drops' => MarketplaceAssetsResource::collection($investment_drops),
        ]);
    }
}
