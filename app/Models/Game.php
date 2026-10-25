<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'steam_app_id',
        'title',
        'description',
        'release_date',
        'price',
        'developers',
        'publishers',
        'categories',
        'image_url',
        'rating',
        'total_reviews',
        'platform',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'steam_app_id' => 'integer',
            'release_date' => 'date',
            'price' => 'decimal:2',
            'rating' => 'float',
            'total_reviews' => 'integer',
        ];
    }

    /**
     * Relasi many-to-many ke Genre.
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'game_genre', 'game_id', 'genre_id');
    }

    /**
     * Relasi many-to-many ke Tag.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'game_tag', 'game_id', 'tag_id');
    }

    /**
     * Relasi ke user yang memfavoritkan game ini.
     */
    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_favorites', 'game_id', 'user_id')
            ->withTimestamps();
    }

    /**
     * Relasi record cosine similarity / kemiripan untuk game ini.
     */
    public function similarities(): HasMany
    {
        return $this->hasMany(GameSimilarity::class, 'game_id');
    }

    /**
     * Relasi game rekomendasi berdasarkan kemiripan tertinggi (Cosine Similarity).
     */
    public function similarGames(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_similarities', 'game_id', 'similar_game_id')
            ->withPivot('score')
            ->orderByPivot('score', 'desc');
    }

    /**
     * Game yang mereferensikan game ini sebagai game yang mirip.
     */
    public function referencedBySimilar(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_similarities', 'similar_game_id', 'game_id')
            ->withPivot('score');
    }
}
