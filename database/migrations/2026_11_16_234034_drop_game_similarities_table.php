<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('game_similarities');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('game_similarities', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->foreignId('similar_game_id')->constrained('games')->cascadeOnDelete();
            $table->float('score');
            $table->primary(['game_id', 'similar_game_id']);
            $table->index(['game_id', 'score']);
        });
    }
};
