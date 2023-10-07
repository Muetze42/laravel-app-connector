<?php

// @formatter:off

namespace NormanHuth\LaravelAppConnector\Models{
    /**
     * NormanHuth\LaravelAppConnector\Models\ConnectionAttempt
     *
     * @property string $id
     * @property string|null $client
     * @property string|null $platform
     * @property string $uri
     * @property mixed $token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt query()
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt whereClient($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt wherePlatform($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt whereToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ConnectionAttempt whereUri($value)
     */
    class ConnectionAttempt extends \Eloquent {}
}
