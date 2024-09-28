<?php

namespace App\Models;

use Carbon\Carbon;
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
}
