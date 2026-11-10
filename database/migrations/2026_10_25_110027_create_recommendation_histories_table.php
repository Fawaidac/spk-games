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
        Schema::create('recommendation_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('session_code', 50)->unique();
            $table->string('user_name', 150)->nullable();
            $table->string('user_email', 150)->nullable();
            $table->json('selected_genres')->nullable();
            $table->json('reference_games')->nullable();
            $table->json('recommended_games');
            $table->decimal('avg_similarity', 4, 3)->default(0);
            $table->string('algorithm', 100)->default('Content-Based Filtering (Cosine Similarity)');
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendation_histories');
    }
};
