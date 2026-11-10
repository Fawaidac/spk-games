<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecommendationHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_code',
        'user_name',
        'user_email',
        'selected_genres',
        'reference_games',
        'recommended_games',
        'avg_similarity',
        'algorithm',
        'ip_address',
    ];

    protected $casts = [
        'selected_genres'   => 'array',
        'reference_games'   => 'array',
        'recommended_games' => 'array',
        'avg_similarity'    => 'float',
    ];

    /**
     * Relasi ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
