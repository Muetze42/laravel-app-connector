<?php

namespace NormanHuth\LaravelAppConnector;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use NormanHuth\LaravelAppConnector\Models\ConnectionAttempt;

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
     * Build a query for a ConnectionAttempt.
     *
     * @param \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt|\Illuminate\Database\Eloquent\Builder $attempt
     * @param \Illuminate\Http\Request                                                                       $request
     * @param string                                                                                         $id
     * @param string                                                                                         $uri
     *
     * @return \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt|null
     */
    protected static function query(
        ConnectionAttempt|Builder $attempt,
        Request $request,
        string $id,
        string $uri
    ): ConnectionAttempt|null {
        $attempt = $attempt
            ->whereId($id)
            ->whereUri($uri)
            ->when(
                $clientKey = config('app-connector.header.client'),
                function (ConnectionAttempt|Builder $query) use ($clientKey, $request) {
                    $query->whereClient($request->header($clientKey));
                }
            )
            ->when(
                $platformKey = config('app-connector.header.plattform'),
                function (ConnectionAttempt|Builder $query) use ($platformKey, $request) {
                    $query->wherePlatform($request->header($platformKey));
                }
            );

        if ($duration = config('app-connector.connection-attempt-duration')) {
            $attempt->where('created_at', '>=', now()->subMinutes($duration));
        }

        return $attempt->first();
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
        $attempt = static::query(app($model), $request, $id, $uri);

        return !is_null($attempt) && $attempt->token === $token;
    }

    /**
     * Get ConnectionAttempt Eloquent Object if connection attempt is valid.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $id
     * @param string                   $token
     * @param string                   $uri
     *
     * @return \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt|null
     */
    public static function get(Request $request, string $id, string $token, string $uri): ConnectionAttempt|null
    {
        /* @var \NormanHuth\LaravelAppConnector\Models\ConnectionAttempt $model */
        $model = config('app-connector.model');
        $attempt = static::query(app($model), $request, $id, $uri);

        return !is_null($attempt) && $attempt->token === $token ?
            static::query(app($model), $request, $id, $uri) : null;
    }
}
