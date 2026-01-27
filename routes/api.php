<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Consumer\ConsumerController;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Creator\CreatorController;

Route::prefix('auth')->group(function() {
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);

    Route::post('send-verification-code', [VerificationController::class, 'send']);
    Route::post('verify-code', [VerificationController::class, 'verify']);

    Route::post('forgot-password', [PasswordController::class, 'forgot']);
    Route::post('verify-reset-code', [VerificationController::class, 'verify']);
    Route::post('create-password', [PasswordController::class, 'createPassword']);
});

Route::middleware(['auth:sanctum', 'creator'])->group(function() {
    
   Route::prefix('creator')->group(function() {
        Route::post('generate/song/usingai', [CreatorController::class, 'generateSongUsingAI']);
        Route::post('get/song/generation/status/{id}', [CreatorController::class, 'getGenerationStatus']);
        Route::post('upload/song', [CreatorController::class, 'uploadSong']);
        Route::post('upload/song/forsale', [CreatorController::class, 'uploadMediaForSale']);
        Route::post('upload/song/forinvestment', [CreatorController::class, 'uploadMediaForInvestment']);
        Route::post('upload/song/forlicense', [CreatorController::class, 'uploadMediaForLicense']);

        Route::post('upload/video', [CreatorController::class, 'uploadVideo']);
        Route::post('upload/video/forsale', [CreatorController::class, 'uploadMediaForSale']);
        Route::post('upload/video/forinvestment', [CreatorController::class, 'uploadMediaForInvestment']);
        Route::post('upload/video/forlicense', [CreatorController::class, 'uploadMediaForLicense']);
        
        Route::post('upload/illustration', [CreatorController::class, 'uploadIllustration']);
        Route::post('upload/illustration/forsale', [CreatorController::class, 'uploadMediaForSale']);
        Route::post('upload/illustration/forinvestment', [CreatorController::class, 'uploadMediaForInvestment']);
        Route::post('upload/illustration/forlicense', [CreatorController::class, 'uploadMediaForLicense']);

        Route::post('my/tracks', [CreatorController::class, 'myTracks']);
        Route::post('my/track/details/{id}', [CreatorController::class, 'myTrackDetails']);


   });
   
});

Route::middleware(['auth:sanctum', 'consumer'])->group(function() {
    Route::prefix('consumer')->group(function() {
        Route::get('dashboard', [ConsumerController::class, 'dashboard']);
    });
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function(Request $request) {
        return response()->json(['success'=>true,'user'=>new UserResource($request->user())]);
    });
    Route::post('auth/logout', [AuthController::class, 'logout']);
});
