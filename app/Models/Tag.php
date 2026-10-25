<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Relasi many-to-many ke Game.
     */
    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_tag', 'tag_id', 'game_id');
    }
}
