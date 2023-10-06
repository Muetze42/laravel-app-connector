<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Stream Games 42 API will be accessible from.
    |
    */

    'path' => 'api/stream-games',

    /*
    |--------------------------------------------------------------------------
    | Connect Attempt Duration Limit
    |--------------------------------------------------------------------------
    |
    | The duration in minutes how long a connection attempt may take.
    |
    */

    'connection-attempt-duration' => 5,

    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Stream Games 42 API route.
    |
    */

    'middleware' => [
        'api',
        'auth:sanctum',
    ],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | These models will be used in the packet controllers.
    |
    */

    'models' => [
        'authenticatable' => \App\Models\User::class,
        'connection-attempt' => \NormanHuth\StreamGames42\Models\ConnectionAttempt::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Register Routes
    |--------------------------------------------------------------------------
    |
    | Determine the auth and action routings to be registered.
    |
    */

    'routes' => true,

    /*
    |--------------------------------------------------------------------------
    | Inline Authorization
    |--------------------------------------------------------------------------
    |
    | Let the package controllers check if the resource belongs to the
    | authenticated user during the update and delete action.
    |
    */

    'inline-authorization' => true
];
