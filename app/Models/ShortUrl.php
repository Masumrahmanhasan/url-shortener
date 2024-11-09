<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $url
 * @property string $short_url
 * @property int $click
 * @property Carbon $created_at
 */
class ShortUrl extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'url', 'short_url', 'click'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full URL with a base URL prefix.
     *
     * @return Attribute
     */
    protected function shortUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => config('app.url') . '/' . $value, // Prepend base URL
            set: fn ($value) => rtrim($value, '/') // Optionally sanitize input URL
        );
    }
}
