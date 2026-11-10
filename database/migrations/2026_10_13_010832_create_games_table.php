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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('steam_app_id')->nullable()->unique();
            $table->string('title')->index();
            $table->text('description');
            $table->date('release_date')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->string('developers', 500)->nullable();
            $table->string('publishers', 500)->nullable();
            $table->string('image_url', 500)->nullable();
            $table->decimal('rating', 3, 1)->default(0);       
            $table->unsignedInteger('total_reviews')->default(0);
            $table->string('platform', 255)->default('PC'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
