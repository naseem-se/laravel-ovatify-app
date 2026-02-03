<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Marketplace\PurchaseController;
use App\Http\Controllers\Consumer\ConsumerController;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Creator\CreatorController;
use App\Http\Controllers\SellerBankAccountController;
use App\Http\Controllers\Stripe\WebhookController;
use App\Http\Controllers\Marketplace\InvestmentController;

Route::prefix('auth')->group(function () {
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);

    Route::post('send-verification-code', [VerificationController::class, 'send']);
    Route::post('verify-code', [VerificationController::class, 'verify']);

    Route::post('forgot-password', [PasswordController::class, 'forgot']);
    Route::post('verify-reset-code', [VerificationController::class, 'verify']);
    Route::post('create-password', [PasswordController::class, 'createPassword']);
});

// creator routes

Route::middleware(['auth:sanctum', 'creator'])->group(function () {

    Route::prefix('creator')->group(function () {
        Route::get('dashboard', [CreatorController::class, 'dashboard']);
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


// consumer routes

Route::middleware(['auth:sanctum', 'consumer'])->group(function () {
    Route::prefix('consumer')->group(function () {
        Route::get('dashboard', [ConsumerController::class, 'dashboard']);
        Route::get('view/track/details/{id}', [ConsumerController::class, 'trackDetails']);

        Route::get('my/purchases', [ConsumerController::class, 'myPurchases']);
        Route::get('my/purchase/details/{id}', [ConsumerController::class, 'myPurchaseDetails']);
        Route::post('download/purchased/asset/{id}', [ConsumerController::class, 'downloadPurchasedAsset']);
    });
});


// common routes for authenticated users

Route::middleware('auth:sanctum')->group(function () {


    Route::prefix('marketplace')->group(function () {

        Route::get('list/tracks', [PurchaseController::class, 'listTracks']);
        Route::get('track/details/{id}', [PurchaseController::class, 'trackDetails']);
        Route::get('asset/details/{id}', [PurchaseController::class, 'assetDetails']);
        // Purchase endpoints
        Route::post('/purchases/asset', [PurchaseController::class, 'purchaseAsset'])->name('purchase.asset');

        Route::post('/purchases/license', [PurchaseController::class, 'licenseAsset'])->name('purchase.license');

        Route::post('/purchases/investment', [PurchaseController::class, 'investAsset'])->name('purchase.investment');

        Route::post('/licenses/{license_id}/renew', [PurchaseController::class, 'renewLicense'])->name('license.renew');

        // Retrieval endpoints
        Route::get('/purchases', [PurchaseController::class, 'getPurchases'])->name('purchases.list');

        Route::get('/purchases/{purchase_id}', [PurchaseController::class, 'getPurchaseDetails'])->name('purchase.details');

        Route::get('/licenses', [PurchaseController::class, 'getLicenses'])->name('licenses.list');

        Route::get('/investments', [PurchaseController::class, 'getInvestments'])->name('investments.list');

        // Verification endpoint
        Route::post('/purchases/verify-access', [PurchaseController::class, 'verifyAccessToken'])->name('purchase.verify-access');
    });

    Route::get('/user', function (Request $request) {
        return response()->json(['success' => true, 'user' => new UserResource($request->user())]);
    });

    Route::get('/get/user/investments', [InvestmentController::class, 'getAllInvestments']);
    Route::get('/get/user/investments/{investmentId}', [InvestmentController::class, 'getInvestmentDetails']);
    Route::get('/get/user/investments/summary', [InvestmentController::class, 'getInvestmentSummary']);
    Route::get('/get/user/investments/{investmentId}/history', [InvestmentController::class, 'getEarningHistory']);

    Route::post('/stripe/onboarding', [SellerBankAccountController::class, 'startOnboarding']);

    Route::get('/stripe/onboard/status', [SellerBankAccountController::class, 'getStatus']);

    Route::post('webhook/stripe', [WebhookController::class, 'handleStripeWebhook']);

    Route::post('auth/logout', [AuthController::class, 'logout']);
});


Route::get('/stripe/onboarding/refresh', [SellerBankAccountController::class, 'refreshOnboarding']);
Route::get('/stripe/onboarding/complete', [SellerBankAccountController::class, 'completeOnboarding']);
