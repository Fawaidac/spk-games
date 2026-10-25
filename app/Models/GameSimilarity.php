<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameSimilarity extends Model
{
    use HasFactory;

    /**
     * Nama tabel terkait.
     *
     * @var string
     */
    protected $table = 'game_similarities';

    /**
     * Tabel tidak menggunakan kolom created_at dan updated_at.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Primary key bukan auto-incrementing integer tunggal.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'game_id',
        'similar_game_id',
        'score',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'game_id' => 'integer',
            'similar_game_id' => 'integer',
            'score' => 'float',
        ];
    }

    /**
     * Game acuan utama.
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    /**
     * Game yang mirip / serupa hasil komputasi cosine similarity.
     */
    public function similarGame(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'similar_game_id');
    }
}
