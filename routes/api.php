<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| This is where the API routes for your application are registered.
|
*/

Route::middleware(config('stream-games-42.middleware'))
    ->prefix(config('stream-games-42.path'))
    ->name('stream-games-42.')
    ->group(function () {
        Route::get('/', function () {
            return 'It work’s!';
        })->name('check');
    });
