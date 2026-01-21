<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
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
                'data' => $song
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
                'data' => $song
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


}
