<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Connect Attempt Duration Limit
    |--------------------------------------------------------------------------
    |
    | The duration in minutes how long a connection attempt may take.
    | Set to null to disable this check.
    |
    */

    'connection-attempt-duration' => 60 * 2,

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
