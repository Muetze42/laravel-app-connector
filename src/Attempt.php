<?php

namespace NormanHuth\LaravelAppConnector;

class Attempt
{
    /**
     * Get the ID, token and uri for a connection attempt.
     *
     * @return \Illuminate\Database\Eloquent\Model|\NormanHuth\LaravelAppConnector\Models\ConnectionAttempt
     */
    public static function getAttempt(): mixed
    {
        /* @var \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt $model */
        $model = config('app-connector.models.connection-attempt');

        return app($model)->create();
    }
}
