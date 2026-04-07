<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('auth.register');
})->name('home');

// auth routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [App\Http\Controllers\Web\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Web\AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [App\Http\Controllers\Web\AuthController::class, 'register']);
Route::get('/verification', function () {
    return view('auth.verification');
})->name('verification');
Route::post('/verification', [App\Http\Controllers\Web\AuthController::class, 'verify']);
Route::post('/forgot-password/init', [App\Http\Controllers\Web\AuthController::class, 'initForgotPassword'])->name('forgot.password.init');

Route::get('/forgot/password', [App\Http\Controllers\Web\AuthController::class, 'showForgotPasswordOptions'])->name('forgot.password');
Route::post('/forgot/password/send', [App\Http\Controllers\Web\AuthController::class, 'sendResetCode'])->name('forgot.password.send');

Route::get('/forgot/verification', [App\Http\Controllers\Web\AuthController::class, 'showForgotVerification'])->name('forgot.verification');
Route::post('/forgot/verification', [App\Http\Controllers\Web\AuthController::class, 'verifyResetCode'])->name('forgot.verification.post');

Route::get('/reset/password', [App\Http\Controllers\Web\AuthController::class, 'showResetPassword'])->name('reset.password');
Route::post('/reset/password', [App\Http\Controllers\Web\AuthController::class, 'updatePassword'])->name('reset.password.post');


// ******************************************

// consumer routes
Route::prefix('consumer')
    ->name('consumer.')
    ->middleware('auth')
    ->group(function () {

        // Consumer Dashboard
        Route::get('/dashboard', fn() => view('consumer.dashboard'))
            ->name('dashboard.index');

        // Creator Routes
        Route::prefix('creator')->name('creator.')->group(function () {
            Route::get('/dashboard', fn() => view('creator.dashboard'))
                ->name('dashboard');

            Route::prefix('my')->name('my.')->group(function () {
                Route::get('/tracks', fn() => view('creator.my-tracks.index'))
                    ->name('tracks');
            });

            Route::prefix('studio')->name('studio.')->group(function () {
                Route::get('/upload/select', fn() => view('creator.studio.upload.select-type'))
                    ->name('upload.select-type');
                Route::get('/upload/dropzone', fn() => view('creator.studio.upload.dropzone'))
                    ->name('upload.dropzone');
            });
        });

        Route::get('/track/details', fn() => view('consumer.track-details'))
            ->name('dashboard.track.details');

        Route::get('/artist/agreement', fn() => view('consumer.artist-agreements'))
            ->name('dashboard.artist.agreement');


        // Invest Track
        Route::get('/invest/track', fn() => view('consumer.invest-track'))
            ->name('dashboard.invest.track');


        // My Tracks
        Route::prefix('my')->name('my.')->group(function () {

            Route::get('/tracks', fn() => view('consumer.my-tracks.index'))
                ->name('tracks');

            Route::get('/track/details', fn() => view('consumer.my-tracks.track-details'))
                ->name('tracks.details');

            Route::get('/track/agreements', fn() => view('consumer.my-tracks.artist-agreements'))
                ->name('tracks.agreements');

            Route::get('/track/distribute', fn() => view('consumer.my-tracks.distribute'))
                ->name('tracks.distribute');
        });


        // Investments
        Route::prefix('investments')->name('investments.')->group(function () {

            Route::get('/', fn() => view('consumer.investments.index'))
                ->name('index');

            Route::get('/track/details', fn() => view('consumer.investments.track-details'))
                ->name('track.details');

            Route::get('/artist/agreements', fn() => view('consumer.investments.artist-agreements'))
                ->name('artist.agreements');
        });

        // Marketplace
        Route::prefix('marketplace')->name('marketplace.')->group(function () {

            Route::get('/', fn() => view('consumer.marketplace.index'))
                ->name('index');
            Route::get('/images', fn() => view('consumer.marketplace.images'))
                ->name('images');
            Route::get('/image/details', fn() => view('consumer.marketplace.image-details'))
                ->name('image.details');
            Route::get('/track/details', fn() => view('consumer.marketplace.track-details'))
                ->name('track.details');

            Route::get('/checkout', fn() => view('consumer.marketplace.checkout'))
                ->name('checkout');

            Route::get('/order/success', fn() => view('consumer.marketplace.order-success'))
                ->name('order.success');
        });

        // Rights Management
        Route::prefix('rights')->name('rights.')->group(function () {
            Route::get('/', fn() => view('consumer.rights.index'))
                ->name('index');
        });

        // AI Tools
        Route::prefix('ai-tools')->name('ai-tools.')->group(function () {
            Route::get('/vocal-enhancer', fn() => view('consumer.ai-tools.vocal-enhancer'))
                ->name('vocal-enhancer');
            Route::get('/melody-generator', fn() => view('consumer.ai-tools.melody-generator'))
                ->name('melody-generator');
            Route::get('/hook-generator', fn() => view('consumer.ai-tools.hook-generator'))
                ->name('hook-generator');
            Route::get('/lyric-generator', fn() => view('consumer.ai-tools.lyric-generator'))
                ->name('lyric-generator');
            Route::get('/mood-analyzer', fn() => view('consumer.ai-tools.mood-analyzer'))
                ->name('mood-analyzer');
            Route::get('/genre-matcher', fn() => view('consumer.ai-tools.genre-matcher'))
                ->name('genre-matcher');
            Route::get('/mastering-tool', fn() => view('consumer.ai-tools.mastering-tool'))
                ->name('mastering-tool');
            Route::get('/track-distribution', fn() => view('consumer.ai-tools.track-distribution'))
                ->name('track-distribution');
        });

        // Studio
        Route::prefix('studio')->name('studio.')->group(function () {
            Route::get('/record', fn() => view('consumer.studio.record-audio'))
                ->name('record');
            Route::get('/upload', fn() => view('consumer.studio.upload-screen'))
                ->name('upload');
            Route::get('/create-session', fn() => view('consumer.studio.create-session'))
                ->name('create-session');
            Route::get('/tempo', fn() => view('consumer.studio.select-tempo'))
                ->name('tempo');
            Route::get('/create-with-ai', fn() => view('consumer.studio.create-with-ai'))
                ->name('create-with-ai');

            // Mixing Tools (Moved here for consistency)
            Route::get('/mixing-assistant', fn() => view('consumer.ai-tools.mixing-assistant'))
                ->name('mixing-assistant');
            Route::get('/track-mixing', fn() => view('consumer.ai-tools.track-mixing'))
                ->name('track-mixing');

            // Ideation
            Route::get('/customize', fn() => view('consumer.studio.customize'))
                ->name('customize');

            Route::get('/idea/text', fn() => view('consumer.studio.text-idea'))
                ->name('idea.text');
            Route::get('/idea/file', fn() => view('consumer.studio.file-idea'))
                ->name('idea.file');

            Route::get('/review/video', fn() => view('consumer.studio.review-video'))
                ->name('review.video');
            Route::get('/timeline-mixing', fn() => view('consumer.studio.timeline-mixing'))
                ->name('timeline-mixing');
            Route::get('/mixed-summary', fn() => view('consumer.studio.mixed-summary'))
                ->name('mixed-summary');
            Route::get('/files-uploaded', fn() => view('consumer.studio.files-uploaded-success'))
                ->name('files-uploaded-success');
        });

        // Investment Flow (New)
        Route::get('/wallet/select', fn() => view('consumer.wallet-selection'))
            ->name('wallet.select');
        Route::get('/invest/product', fn() => view('consumer.investments.invest-product'))
            ->name('investments.invest-product');
        // Audio Investment
        Route::get('/invest/agreement', fn() => view('consumer.investments.standard-agreement'))
            ->name('investments.agreement');
        Route::get('/invest/checkout', fn() => view('consumer.investments.invest-checkout'))
            ->name('investments.checkout');

        // Licensing Flow (New)
        Route::get('/marketplace/license', fn() => view('consumer.marketplace.license-track'))
            ->name('marketplace.license');
        Route::get('/marketplace/select-license', fn() => view('consumer.marketplace.select-license'))
            ->name('marketplace.select-license');
        Route::get('/marketplace/buy', fn() => view('consumer.marketplace.buy-product'))
            ->name('marketplace.buy-product');

        // Grid Views (New)
        Route::get('/marketplace/trending', fn() => view('consumer.marketplace.view-trending'))
            ->name('marketplace.view.trending');
        Route::get('/marketplace/recommendations', fn() => view('consumer.marketplace.view-recommendations'))
            ->name('marketplace.view.recommendations');

        // Forms
        Route::prefix('forms')->name('forms.')->group(function () {
            Route::get('/set-for-sale', fn() => view('consumer.forms.set-for-sale'))
                ->name('set-for-sale');
            Route::get('/investment-settings', fn() => view('consumer.forms.investment-settings'))
                ->name('investment-settings');
            Route::get('/licensing-settings', fn() => view('consumer.forms.licensing-settings'))
                ->name('licensing-settings');
            Route::get('/list-on-marketplace', fn() => view('consumer.forms.list-on-marketplace'))
                ->name('list-on-marketplace');

            Route::get('/success/investment', fn() => view('consumer.forms.success-investment'))
                ->name('success.investment');
            Route::get('/success/sale', fn() => view('consumer.forms.success-sale'))
                ->name('success.sale');
            Route::get('/success/license', fn() => view('consumer.forms.success-license'))
                ->name('success.license');
            Route::get('/success/track-ready', fn() => view('consumer.forms.success-track-ready'))
                ->name('success.track-ready');
        });

        Route::get('/agreements/preview', fn() => view('consumer.agreements.preview'))
            ->name('agreements.preview');
        Route::get('/distribution/review-license', fn() => view('consumer.distribution.review-license'))
            ->name('distribution.review-license');

        // Profile
        Route::get('/profile', fn() => view('consumer.profile'))
            ->name('profile.index');
        Route::get('/profile/edit', fn() => view('consumer.profile.customization'))
            ->name('profile.customization');

        // Wallet
        Route::get('/wallet/connect', fn() => view('consumer.wallet-connect'))
            ->name('wallet.connect');

        // Agreements & Licensing
        Route::get('/agreements/edit', fn() => view('consumer.agreements.edit'))
            ->name('agreements.edit');
        Route::get('/distribution/license-selection', fn() => view('consumer.distribution.license-selection'))
            ->name('distribution.license-selection');
    });


Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

