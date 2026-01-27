<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

// auth routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/verification', function () {
    return view('auth.verification');
})->name('verification');
Route::get('/forgot/password', function () {
    return view('auth.forgot-password');
})->name('forgot.password');
Route::get('/forgot/verification', function () {
    return view('auth.forgot-verification');
})->name('forgot.verification');
Route::get('/reset/password', function () {
    return view('auth.create-password');
})->name('reset.password');


// ******************************************

// consumer routes
Route::prefix('consumer')
    ->name('consumer.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', fn() => view('consumer.home'))
            ->name('dashboard.index');

        Route::get('/creator/dashboard', fn() => view('consumer.creator-home'))
            ->name('creator.dashboard');

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
        });

        // Rights Management
        Route::prefix('rights')->name('rights.')->group(function () {
            Route::get('/', fn() => view('consumer.rights.index'))
                ->name('index');
        });

        // AI Tools
        Route::prefix('ai-tools')->name('ai-tools.')->group(function () {
            Route::get('/mixing-assistant', fn() => view('consumer.ai-tools.mixing-assistant'))
                ->name('mixing-assistant');
            Route::get('/melody-generator', fn() => view('consumer.ai-tools.melody-generator'))
                ->name('melody-generator');
            Route::get('/hook-generator', fn() => view('consumer.ai-tools.hook-generator'))
                ->name('hook-generator');
            Route::get('/mood-analyzer', fn() => view('consumer.ai-tools.mood-analyzer'))
                ->name('mood-analyzer');
            Route::get('/genre-matcher', fn() => view('consumer.ai-tools.genre-matcher'))
                ->name('genre-matcher');
            Route::get('/mastering-tool', fn() => view('consumer.ai-tools.mastering-tool'))
                ->name('mastering-tool');
            Route::get('/track-mixing', fn() => view('consumer.ai-tools.track-mixing'))
                ->name('track-mixing');
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
        });

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
        });

        // Profile
        Route::get('/profile', fn() => view('consumer.profile'))
            ->name('profile.index');

        // Wallet
        Route::get('/wallet/connect', fn() => view('consumer.wallet-connect'))
            ->name('wallet.connect');
    });


Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

