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

    'models' => [],

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
