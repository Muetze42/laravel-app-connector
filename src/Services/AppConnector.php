<?php

namespace NormanHuth\StreamGames42\Services;

class AppConnector
{
    /**
     * Get the ID, token and uri for a connection attempt.
     *
     * @return \Illuminate\Database\Eloquent\Model|\NormanHuth\StreamGames42\Models\ConnectionAttempt
     */
    public static function getAttempt(): mixed
    {
        /* @var \NormanHuth\StreamGames42\Models\ConnectionAttempt $model */
        $model = config('stream-games-42.models.connection-attempt');

        return app($model)->create();
    }
}
