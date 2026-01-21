<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\PasswordController;
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
        Route::post('generate/song', [CreatorController::class, 'generateSong']);
        Route::post('upload/video', [CreatorController::class, 'uploadVideo']);
        Route::post('upload/illustration', [CreatorController::class, 'uploadIllustration']);

   });
   
});



Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function(Request $request) {
        return response()->json(['success'=>true,'user'=>new UserResource($request->user())]);
    });
    Route::post('auth/logout', [AuthController::class, 'logout']);
});
