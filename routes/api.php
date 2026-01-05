<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\PasswordController;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

Route::prefix('auth')->group(function() {
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);

    Route::post('send-verification-code', [VerificationController::class, 'send']);
    Route::post('verify-code', [VerificationController::class, 'verify']);

    Route::post('forgot-password', [PasswordController::class, 'forgot']);
    Route::post('verify-reset-code', [PasswordController::class, 'verifyReset']);
    Route::post('create-password', [PasswordController::class, 'createPassword']);
});

Route::middleware('auth:sanctum')->group(function() {
    
    Route::get('/user', function(Request $request) {
        return response()->json(['success'=>true,'user'=>new UserResource($request->user())]);
    });

    Route::post('auth/logout', [AuthController::class, 'logout']);
});
