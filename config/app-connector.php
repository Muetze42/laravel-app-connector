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
    | Model
    |--------------------------------------------------------------------------
    |
    | The ConnectionAttempt Model.
    |
    */

    'model' => \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt::class,

    /*
    |--------------------------------------------------------------------------
    | Header Data
    |--------------------------------------------------------------------------
    |
    | Determine here in which header keys the client and
    | the platform are included.
    |
    */

    'header' => [
        'client' => 'machineId',
        'plattform' => 'plattform',
    ]
];
