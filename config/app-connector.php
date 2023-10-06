<?php

return [

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
    | Models
    |--------------------------------------------------------------------------
    |
    | These models will be used in the packet controllers.
    |
    */

    'models' => [
        'authenticatable' => \App\Models\User::class,
        'connection-attempt' => \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt::class,
    ],
];
