<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\RecommendationHistory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecommendationHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecommendationHistory::truncate();

        $users = User::all();
        $sampleGames = Game::take(40)->get();

        if ($sampleGames->isEmpty()) {
            return;
        }

        $sessionTemplates = [
            [
                'genres' => ['Action', 'RPG', 'Open World'],
                'ref'    => ['Counter-Strike 2', 'Grand Theft Auto V Legacy'],
                'sub'    => -2, // jam lalu
            ],
            [
                'genres' => ['Strategy', 'Turn-Based', 'Sci-Fi'],
                'ref'    => ['Dota 2'],
                'sub'    => -5,
            ],
            [
                'genres' => ['Adventure', 'Indie', 'Pixel Graphics'],
                'ref'    => ['Terraria'],
                'sub'    => -12,
            ],
            [
                'genres' => ['Battle Royale', 'Shooter', 'Multiplayer'],
                'ref'    => ['PUBG: BATTLEGROUNDS', 'Counter-Strike 2'],
                'sub'    => -24,
            ],
            [
                'genres' => ['Survival', 'Crafting', 'Co-op'],
                'ref'    => ['Terraria', 'Grand Theft Auto V Legacy'],
                'sub'    => -48,
            ],
            [
                'genres' => ['Souls-like', 'Dark Fantasy', 'Action RPG'],
                'ref'    => ['Dota 2'],
                'sub'    => -72,
            ],
        ];

        $counter = 1;
        foreach ($users as $index => $user) {
            // Berikan 2-3 riwayat rekomendasi per user
            $count = ($index % 2 === 0) ? 3 : 2;

            for ($i = 0; $i < $count; $i++) {
                $tpl = $sessionTemplates[($counter + $i) % count($sessionTemplates)];
                
                // Ambil 3-4 game acak dari sampleGames sebagai hasil rekomendasi
                $pickedGames = $sampleGames->shuffle()->take(rand(3, 4));
                $recommendedList = [];
                $totalSim = 0;

                foreach ($pickedGames as $pGame) {
                    $score = round(rand(880, 985) / 1000, 3);
                    $totalSim += $score;
                    $recommendedList[] = [
                        'game_id'    => $pGame->id,
                        'title'      => $pGame->title,
                        'rating'     => $pGame->rating,
                        'similarity' => $score,
                        'percentage' => round($score * 100, 1),
                        'platform'   => $pGame->platform ?? 'PC',
                        'image_url'  => $pGame->image_url ?? '',
                    ];
                }

                // Urutkan berdasarkan similarity tertinggi
                usort($recommendedList, fn($a, $b) => $b['similarity'] <=> $a['similarity']);

                $avgSim = count($recommendedList) > 0 ? round($totalSim / count($recommendedList), 3) : 0.900;
                $createdAt = now()->addHours($tpl['sub'] - ($i * 18));

                RecommendationHistory::create([
                    'user_id'           => $user->id,
                    'session_code'      => 'REC-' . strtoupper(Str::random(4)) . '-' . str_pad($counter, 4, '0', STR_PAD_LEFT),
                    'user_name'         => $user->name,
                    'user_email'        => $user->email,
                    'selected_genres'   => $tpl['genres'],
                    'reference_games'   => $tpl['ref'],
                    'recommended_games' => $recommendedList,
                    'avg_similarity'    => $avgSim,
                    'algorithm'         => 'Content-Based Filtering (Cosine Similarity + TF-IDF)',
                    'ip_address'        => '127.0.0.1',
                    'created_at'        => $createdAt,
                    'updated_at'        => $createdAt,
                ]);

                $counter++;
            }
        }

        // Tambah 1 sesi pencarian guest/anonim
        $guestGames = $sampleGames->shuffle()->take(3);
        $recommendedList = [];
        $totalSim = 0;
        foreach ($guestGames as $gGame) {
            $score = round(rand(890, 975) / 1000, 3);
            $totalSim += $score;
            $recommendedList[] = [
                'game_id'    => $gGame->id,
                'title'      => $gGame->title,
                'rating'     => $gGame->rating,
                'similarity' => $score,
                'percentage' => round($score * 100, 1),
                'platform'   => $gGame->platform ?? 'PC',
                'image_url'  => $gGame->image_url ?? '',
            ];
        }
        usort($recommendedList, fn($a, $b) => $b['similarity'] <=> $a['similarity']);

        RecommendationHistory::create([
            'user_id'           => null,
            'session_code'      => 'REC-GST-' . str_pad($counter, 4, '0', STR_PAD_LEFT),
            'user_name'         => 'Guest Explorer',
            'user_email'        => 'guest@gamematch.internal',
            'selected_genres'   => ['Action', 'Shooter'],
            'reference_games'   => ['Counter-Strike 2'],
            'recommended_games' => $recommendedList,
            'avg_similarity'    => round($totalSim / count($recommendedList), 3),
            'algorithm'         => 'Content-Based Filtering (Cosine Similarity + TF-IDF)',
            'ip_address'        => '127.0.0.1',
            'created_at'        => now()->subMinutes(35),
            'updated_at'        => now()->subMinutes(35),
        ]);
    }
}
