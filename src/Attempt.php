<?php

namespace NormanHuth\LaravelAppConnector;

use Illuminate\Http\Request;

class Attempt
{
    /**
     * Get the ID, token and uri for a connection attempt.
     *
     * @return \Illuminate\Database\Eloquent\Model|\NormanHuth\LaravelAppConnector\Models\ConnectionAttempt
     */
    public static function create(): mixed
    {
        /* @var \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt $model */
        $model = config('app-connector.model');

        return app($model)->create();
    }

    /**
     * Verifying that a connection attempt is valid.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $id
     * @param string                   $token
     * @param string                   $uri
     *
     * @return bool
     */
    public static function validate(Request $request, string $id, string $token, string $uri): bool
    {
        /* @var \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt $model */
        $model = config('app-connector.model');
        $attempt = app($model)
            ->where('id', $id)
            ->where('uri', $uri)
            ->where('client', $request->header(config('app-connector.header.client')))
            ->where('platform', $request->header(config('app-connector.header.plattform')))
            ->first();

        return !is_null($attempt) && $attempt->token === $token;
    }
}
