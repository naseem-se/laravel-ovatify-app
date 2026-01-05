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

        Route::prefix('marketplace')->name('marketplace.')->group(function () {

            Route::get('/', fn() => view('consumer.marketplace.index'))
                ->name('index');
            Route::get('/images', fn() => view('consumer.marketplace.images'))
                ->name('images');
        });


        // Profile
        Route::get('/profile', fn() => view('consumer.profile'))
            ->name('profile.index');
    });


Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
