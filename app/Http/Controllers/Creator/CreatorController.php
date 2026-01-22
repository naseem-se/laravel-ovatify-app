<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\MarketplaceAsset;
use App\Models\SongGeneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreatorController extends Controller
{
    public function generateSong(Request $request)
    {

    }
    public function uploadVideo(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'video' => 'required|file|mimes:mp4,mov,avi',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validated->errors()->all()
            ], 422);
        }

        try {
            DB::beginTransaction();

            if (!$request->hasFile('video')) {
                return response()->json([
                    'success' => false,
                    'message' => 'No video file provided.'
                ], 400);
            }

            $file = $request->file('video');
            $filename = time() . '_' . $file->getClientOriginalName();

            // User specific folder: creator/{user_id}
            $userFolder = 'creator/' . $request->user()->id;
            $videoPath = $userFolder . '/video/' . $filename;

            // First insert DB record
            $song = SongGeneration::create([
                'user_id' => $request->user()->id,
                'title' => 'Uploaded Video ' . time(),
                'file' => $videoPath,
                'file_type' => 'video',
                'status' => 'uploaded',
            ]);

            // If DB insert successful, then store file
            if (!$song) {
                return response()->json([
                    'success' => false,
                    'message' => 'Database insertion failed'
                ], 500);
            }

            $stored = $file->storeAs($userFolder, $filename, 'public');

            if (!$stored) {
                return response()->json([
                    'success' => false,
                    'message' => 'File upload failed'
                ], 500);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Video uploaded successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Video upload failed.',
                'error' => $e->getMessage()
            ], 500);
        }


    }

    public function uploadIllustration(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'illustration' => 'required|file|mimes:jpg,jpeg,png,webp,ai,psd',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validated->errors()->all()
            ], 422);
        }

        try {
            DB::beginTransaction();

            if (!$request->hasFile('illustration')) {
                return response()->json([
                    'success' => false,
                    'message' => 'No illustration file provided.'
                ], 400);
            }

            $file = $request->file('illustration');
            $filename = time() . '_' . $file->getClientOriginalName();

            // User specific folder: creator/{user_id}
            $userFolder = 'creator/' . $request->user()->id;
            $videoPath = $userFolder . '/illustration/' . $filename;

            // First insert DB record
            $song = SongGeneration::create([
                'user_id' => $request->user()->id,
                'title' => 'Uploaded Illustration ' . time(),
                'file' => $videoPath,
                'file_type' => 'illustration',
                'status' => 'uploaded',
            ]);

            // If DB insert successful, then store file
            if (!$song) {
                return response()->json([
                    'success' => false,
                    'message' => 'Database insertion failed'
                ], 500);
            }

            $stored = $file->storeAs($userFolder, $filename, 'public');

            if (!$stored) {
                return response()->json([
                    'success' => false,
                    'message' => 'File upload failed'
                ], 500);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Illustration uploaded successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Illustration upload failed.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    public function uploadMediaForSale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_id' => 'required|exists:song_generations,id',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png,webp',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|array',
            'tags.*' => 'string|max:255',
            'asset_type' => 'required|in:video,audio,illustration',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $user = $request->user();

            // Ensure media belongs to user
            $media = SongGeneration::where('id', $request->media_id)
                ->where('user_id', $user->id)
                ->firstOrFail();

            // Base marketplace asset data
            $assetData = [
                'user_id' => $user->id,
                'song_generation_id' => $media->id,
                'asset_type' => $request->asset_type,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'sale_type' => 'sale',
                'tags' => $request->filled('tags') ? $request->tags : null,
            ];

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $thumbFile = $request->file('thumbnail');
                $thumbName = 'thumb_' . now()->timestamp . '.' . $thumbFile->extension();

                $thumbFolder = "creator/sale/{$user->id}/thumbnails";
                $thumbPath = $thumbFile->storeAs($thumbFolder, $thumbName, 'public');

                if (!$thumbPath) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Thumbnail upload failed'
                    ], 500);
                }

                $assetData['thumbnail'] = $thumbPath;
            }

            // Create marketplace asset
            $marketplaceAsset = MarketplaceAsset::create($assetData);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Asset listed for sale successfully.',
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Media not found.'
            ], 404);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to list asset for sale.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function uploadMediaForInvestment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_id' => 'required|exists:song_generations,id',
            'total_valuation' => 'required|numeric|min:0',
            'ownership_block' => 'required|integer|min:1',
            'price_per_block' => 'required|numeric|min:0',
            'available_blocks' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'asset_type' => 'required|in:video,audio,illustration',
            'total_investment' => 'required|numeric|min:0',
            'max_earning' => 'required|numeric|min:0',
            'investment_roi' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $user = $request->user();

            // Ensure media belongs to user
            $media = SongGeneration::where('id', $request->media_id)
                ->where('user_id', $user->id)
                ->firstOrFail();

            // Base marketplace asset data
            $assetData = [
                'user_id' => $user->id,
                'song_generation_id' => $media->id,
                'asset_type' => $request->asset_type,
                'title' => $request->title,
                'description' => $request->description,
                'total_investment' => $request->total_investment,
                'max_earning' => $request->max_earning,
                'investment_roi' => $request->investment_roi,
                'sale_type' => 'investment',
                'total_valuation' => $request->total_valuation,
                'ownership_block' => $request->ownership_block,
                'price_per_block' => $request->price_per_block,
                'available_blocks' => $request->available_blocks,
            ];

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $thumbFile = $request->file('thumbnail');
                $thumbName = 'thumb_' . now()->timestamp . '.' . $thumbFile->extension();

                $thumbFolder = "creator/investment/{$user->id}/thumbnails";
                $thumbPath = $thumbFile->storeAs($thumbFolder, $thumbName, 'public');

                if (!$thumbPath) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Thumbnail upload failed'
                    ], 500);
                }

                $assetData['thumbnail'] = $thumbPath;
            }

            // Create marketplace asset
            MarketplaceAsset::create($assetData);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Asset listed for investment successfully.'
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Media not found.'
            ], 404);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to list asset for investment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function uploadMediaForLicense(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_id' => 'required|exists:song_generations,id',
            'license_type' => 'required|string|max:255',
            'price_per_license' => 'required|numeric|min:0',
            'license_duration' => 'required|integer|min:1',
            'thumbnail' => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'asset_type' => 'required|in:video,audio,illustration',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $user = $request->user();

            // Ensure media belongs to user
            $media = SongGeneration::where('id', $request->media_id)
                ->where('user_id', $user->id)
                ->firstOrFail();

            // Base marketplace asset data
            $assetData = [
                'user_id' => $user->id,
                'song_generation_id' => $media->id,
                'asset_type' => $request->asset_type,
                'title' => $request->title,
                'description' => $request->description,
                'sale_type' => 'license',
                'license_type' => $request->license_type,
                'price_per_license' => $request->price_per_license,
                'license_duration' => $request->license_duration,
            ];

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $thumbFile = $request->file('thumbnail');
                $thumbName = 'thumb_' . now()->timestamp . '.' . $thumbFile->extension();

                $thumbFolder = "creator/license/{$user->id}/thumbnails";
                $thumbPath = $thumbFile->storeAs($thumbFolder, $thumbName, 'public');

                if (!$thumbPath) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Thumbnail upload failed'
                    ], 500);
                }

                $assetData['thumbnail'] = $thumbPath;
            }

            // Create marketplace asset
            MarketplaceAsset::create($assetData);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Asset listed for licensing successfully.'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Media not found.'
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to list asset for license.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


}
