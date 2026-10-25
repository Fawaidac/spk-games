<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'is_main',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_main' => 'boolean',
        ];
    }

    /**
     * Scope untuk mengambil hanya genre utama (yang tampil di preferensi/chip).
     */
    public function scopeMain($query)
    {
        return $query->where('is_main', true);
    }

    /**
     * Relasi many-to-many ke Game.
     */
    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_genre', 'genre_id', 'game_id');
    }

    /**
     * Relasi many-to-many ke User yang memilih genre ini sebagai preferensi.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_genres', 'genre_id', 'user_id');
    }
}
