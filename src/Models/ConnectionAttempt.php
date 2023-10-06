<?php

namespace NormanHuth\LaravelAppConnector\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ConnectionAttempt extends Model
{
    use HasUuids;

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    public const UPDATED_AT = null;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['*'];

    /**
     * The attributes that should be D.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'token' => 'encrypted',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'client',
        'platform',
    ];

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['id', 'token'];
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    public static function booted(): void
    {
        static::creating(function (self $attempt) {
            $attempt->client = request()->header('machineId');
            $attempt->platform = request()->header('plattform');
            $attempt->uri = str(Str::random())->lower();
        });
    }
}
