<?php

namespace App\Console\Commands;

use App\Services\ContentBasedRecommender;
use Illuminate\Console\Command;

class BuildRecsysMatrix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recsys:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membangun ulang matriks representasi vektor Content-Based Filtering (TF-IDF + One-Hot Genre + Min-Max Rating)';

    /**
     * Execute the console command.
     */
    public function handle(ContentBasedRecommender $recommender): int
    {
        $this->info('⚡ Memulai pembangunan matriks Content-Based Recommender...');

        $result = $recommender->buildMatrix();

        if (($result['status'] ?? '') === 'empty') {
            $this->warn('⚠️ ' . ($result['message'] ?? 'Tidak ada data game.'));
            return self::FAILURE;
        }

        $this->table(
            ['Metrik', 'Nilai'],
            [
                ['Total Game Terindeks', number_format($result['total_games'])],
                ['Kategori Genre', $result['total_genres']],
                ['Vocabulary TF-IDF (Top)', $result['vocab_size']],
                ['Total Dimensi Fitur Vektor', $result['total_dimensions']],
                ['Rentang Rating Asli', "{$result['min_rating']} s/d {$result['max_rating']}"],
                ['Waktu Pembangunan', "{$result['build_time_ms']} ms"],
                ['Lokasi File Cache', $result['cache_path']],
                ['Ukuran File Cache', "{$result['cache_size_kb']} KB"],
            ]
        );

        $this->info('✅ Matriks vektor Content-Based Filtering berhasil dibangun dan disimpan ke cache!');

        return self::SUCCESS;
    }
}

