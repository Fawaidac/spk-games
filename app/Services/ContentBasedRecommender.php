<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ContentBasedRecommender
{
    /**
     * Bobot penyeimbang antar-blok fitur (Feature Block Weighting).
     */
    public const GENRE_WEIGHT = 1.0;
    public const DESC_WEIGHT = 1.0;
    public const RATING_WEIGHT = 0.5;

    /**
     * Lokasi file cache matriks representasi vektor game.
     */
    protected string $cachePath;

    /**
     * Stopwords umum bahasa Inggris & Indonesia untuk pembersihan teks deskripsi.
     *
     * @var array<string, bool>
     */
    protected array $stopwords = [
        'a' => true, 'about' => true, 'above' => true, 'after' => true, 'again' => true,
        'against' => true, 'all' => true, 'also' => true, 'am' => true, 'an' => true,
        'and' => true, 'any' => true, 'are' => true, 'aren\'t' => true, 'as' => true,
        'at' => true, 'be' => true, 'because' => true, 'been' => true, 'before' => true,
        'being' => true, 'below' => true, 'between' => true, 'both' => true, 'but' => true,
        'by' => true, 'can' => true, 'can\'t' => true, 'cannot' => true, 'could' => true,
        'couldn\'t' => true, 'did' => true, 'didn\'t' => true, 'do' => true, 'does' => true,
        'doesn\'t' => true, 'doing' => true, 'don\'t' => true, 'down' => true, 'during' => true,
        'each' => true, 'few' => true, 'for' => true, 'from' => true, 'further' => true,
        'had' => true, 'hadn\'t' => true, 'has' => true, 'hasn\'t' => true, 'have' => true,
        'haven\'t' => true, 'having' => true, 'he' => true, 'he\'d' => true, 'he\'ll' => true,
        'he\'s' => true, 'her' => true, 'here' => true, 'here\'s' => true, 'hers' => true,
        'herself' => true, 'him' => true, 'himself' => true, 'his' => true, 'how' => true,
        'how\'s' => true, 'i' => true, 'i\'d' => true, 'i\'ll' => true, 'i\'m' => true,
        'i\'ve' => true, 'if' => true, 'in' => true, 'into' => true, 'is' => true,
        'isn\'t' => true, 'it' => true, 'it\'s' => true, 'its' => true, 'itself' => true,
        'let\'s' => true, 'me' => true, 'more' => true, 'most' => true, 'mustn\'t' => true,
        'my' => true, 'myself' => true, 'no' => true, 'nor' => true, 'not' => true,
        'of' => true, 'off' => true, 'on' => true, 'once' => true, 'only' => true,
        'or' => true, 'other' => true, 'ought' => true, 'our' => true, 'ours' => true,
        'ourselves' => true, 'out' => true, 'over' => true, 'own' => true, 'same' => true,
        'shan\'t' => true, 'she' => true, 'she\'d' => true, 'she\'ll' => true, 'she\'s' => true,
        'should' => true, 'shouldn\'t' => true, 'so' => true, 'some' => true, 'such' => true,
        'than' => true, 'that' => true, 'that\'s' => true, 'the' => true, 'their' => true,
        'theirs' => true, 'them' => true, 'themselves' => true, 'then' => true, 'there' => true,
        'there\'s' => true, 'these' => true, 'they' => true, 'they\'d' => true, 'they\'ll' => true,
        'they\'re' => true, 'they\'ve' => true, 'this' => true, 'those' => true, 'through' => true,
        'to' => true, 'too' => true, 'under' => true, 'until' => true, 'up' => true,
        'very' => true, 'was' => true, 'wasn\'t' => true, 'we' => true, 'we\'d' => true,
        'we\'ll' => true, 'we\'re' => true, 'we\'ve' => true, 'were' => true, 'weren\'t' => true,
        'what' => true, 'what\'s' => true, 'when' => true, 'when\'s' => true, 'where' => true,
        'where\'s' => true, 'which' => true, 'while' => true, 'who' => true, 'who\'s' => true,
        'whom' => true, 'why' => true, 'why\'s' => true, 'with' => true, 'won\'t' => true,
        'would' => true, 'wouldn\'t' => true, 'you' => true, 'you\'d' => true, 'you\'ll' => true,
        'you\'re' => true, 'you\'ve' => true, 'your' => true, 'yours' => true, 'yourself' => true,
        'yourselves' => true,
        // Stopwords Bahasa Indonesia umum
        'yang' => true, 'dan' => true, 'di' => true, 'dari' => true, 'ini' => true,
        'itu' => true, 'untuk' => true, 'dengan' => true, 'pada' => true, 'adalah' => true,
        'ke' => true, 'sebagai' => true, 'dalam' => true, 'bisa' => true, 'akan' => true,
        'atau' => true, 'juga' => true, 'mereka' => true, 'anda' => true, 'kami' => true,
    ];

    /**
     * In-memory cache selama request lifecycle.
     */
    protected static ?array $cachedMatrix = null;

    public function __construct()
    {
        $this->cachePath = storage_path('app/recsys_matrix.json');
    }

    /**
     * Membangun ulang (rebuild) matriks representasi vektor Content-Based Filtering.
     * Fitur: One-Hot Genre + 500 Vocabulary TF-IDF Deskripsi + Min-Max Rating.
     *
     * @return array Metadata dan ringkasan pembangunan matriks.
     */
    public function buildMatrix(): array
    {
        @ini_set('memory_limit', '512M');
        $startTime = microtime(true);

        // 1. Ambil data game secara efisien (hanya kolom yang diperlukan untuk fitur)
        $games = \Illuminate\Support\Facades\DB::table('games')
            ->select('id', 'description', 'rating')
            ->get();
        $totalGames = $games->count();

        if ($totalGames === 0) {
            return [
                'status' => 'empty',
                'total_games' => 0,
                'message' => 'Tidak ada game di database untuk diindeks.',
            ];
        }

        // 2. Taksonomi Genre untuk One-Hot Encoding
        $allGenres = Genre::orderBy('name')->pluck('name')->values()->toArray();
        $genreIndexMap = array_flip($allGenres);
        $totalGenres = count($allGenres);

        // Ambil relasi genre tiap game via query join langsung (ringan di memori)
        $gameGenreRows = \Illuminate\Support\Facades\DB::table('game_genre')
            ->join('genres', 'game_genre.genre_id', '=', 'genres.id')
            ->select('game_genre.game_id', 'genres.name as genre_name')
            ->get();

        $gameGenresMap = [];
        foreach ($gameGenreRows as $row) {
            $gameGenresMap[$row->game_id][] = $row->genre_name;
        }

        // 3. Normalisasi Rating Min-Max: x' = (x - x_min) / (x_max - x_min)
        $minRating = (float) $games->min('rating');
        $maxRating = (float) $games->max('rating');
        $ratingRange = $maxRating - $minRating;

        if ($ratingRange <= 0.0) {
            Log::warning("ContentBasedRecommender: Rating x_max sama dengan x_min ({$minRating}). Semua normalized rating di-set ke 0.");
        }

        // 4. Ekstraksi Vocabulary TF-IDF dari Deskripsi
        // Hitung Document Frequency: df(t) = jumlah game yang memuat kata t
        $dfCounts = [];
        $tokenizedDescriptions = [];

        foreach ($games as $game) {
            $tokens = $this->tokenizeText((string) $game->description);
            $tokenizedDescriptions[$game->id] = $tokens;

            $uniqueWords = array_unique($tokens);
            foreach ($uniqueWords as $word) {
                $dfCounts[$word] = ($dfCounts[$word] ?? 0) + 1;
            }
        }

        // Urutkan vocabulary berdasarkan df tertinggi menurun, batasi ke 500 kata
        arsort($dfCounts);
        $top500Words = array_slice(array_keys($dfCounts), 0, 500);
        $vocabIndexMap = array_flip($top500Words);
        $vocabSize = count($top500Words);

        // Hitung IDF untuk setiap kata di vocabulary: idf(t) = log(N / df(t))
        $idfValues = [];
        foreach ($top500Words as $word) {
            $df = $dfCounts[$word] ?? 1;
            $idfValues[$word] = log($totalGames / $df);
        }

        // 5. Susun Label Nama Fitur (Feature Names) untuk representasi dimensi skripsi
        // Urutan dimensi: [0..G-1: Genre] [G..G+V-1: TF-IDF Kata] [G+V: Rating Min-Max]
        $featureNames = [];
        foreach ($allGenres as $gName) {
            $featureNames[] = 'Genre: ' . $gName;
        }
        foreach ($top500Words as $w) {
            $featureNames[] = 'TF-IDF: ' . $w;
        }
        $featureNames[] = 'Rating (Normalized)';
        $totalDimensions = count($featureNames);

        // 6. Bangun representasi vektor tiap game dengan normalisasi L2 antar-blok fitur
        // Simpan dalam format sparse per game (hanya indeks dimensi non-nol beserta bobotnya)
        // dan pre-compute norma Euclidean akhir ||B|| = sqrt(sum(Bi^2))
        $gameVectors = [];

        foreach ($games as $game) {
            $vectorEntries = []; // [dim_index => float_value]
            $sumSq = 0.0;

            // a. Blok Genre (Normalisasi L2 blok genre: tiap genre bernilai 1/sqrt(jumlah genre) * GENRE_WEIGHT)
            $gameGenreNames = $gameGenresMap[$game->id] ?? [];
            $genreDims = [];
            foreach ($gameGenreNames as $gName) {
                if (isset($genreIndexMap[$gName])) {
                    $genreDims[] = $genreIndexMap[$gName];
                }
            }
            $genreCount = count($genreDims);
            if ($genreCount > 0) {
                $genreVal = (1.0 / sqrt($genreCount)) * self::GENRE_WEIGHT;
                foreach ($genreDims as $dim) {
                    $vectorEntries[$dim] = round($genreVal, 6);
                    $sumSq += ($genreVal * $genreVal);
                }
            }

            // b. Blok TF-IDF Deskripsi: w(t,d) = tf(t,d) * log(N / df(t))
            // Normalisasi L2 blok TF-IDF per game: w' = w / sqrt(sum(w^2)) * DESC_WEIGHT. Jika norma 0, biarkan 0.
            $tokens = $tokenizedDescriptions[$game->id] ?? [];
            if (!empty($tokens)) {
                $tfCounts = array_count_values($tokens);
                $rawTfIdf = [];
                $sumSqTfIdf = 0.0;

                foreach ($tfCounts as $word => $tf) {
                    if (isset($vocabIndexMap[$word])) {
                        $dim = $totalGenres + $vocabIndexMap[$word];
                        $weight = (float) $tf * $idfValues[$word];
                        if ($weight > 0) {
                            $rawTfIdf[$dim] = $weight;
                            $sumSqTfIdf += ($weight * $weight);
                        }
                    }
                }

                $normTfIdf = sqrt($sumSqTfIdf);
                if ($normTfIdf > 0.0) {
                    foreach ($rawTfIdf as $dim => $w) {
                        $wPrime = ($w / $normTfIdf) * self::DESC_WEIGHT;
                        if ($wPrime > 0.0) {
                            $vectorEntries[$dim] = round($wPrime, 6);
                            $sumSq += ($wPrime * $wPrime);
                        }
                    }
                }
            }

            // c. Blok Rating Min-Max: ((x - min) / (max - min)) * RATING_WEIGHT
            $ratingDim = $totalGenres + $vocabSize;
            if ($ratingRange > 0.0) {
                $normRating = ((float) $game->rating - $minRating) / $ratingRange;
                $normRating = max(0.0, min(1.0, $normRating));
            } else {
                $normRating = 0.0;
            }

            $weightedRating = $normRating * self::RATING_WEIGHT;
            if ($weightedRating > 0.0) {
                $vectorEntries[$ratingDim] = round($weightedRating, 6);
                $sumSq += ($weightedRating * $weightedRating);
            }

            // d. Hitung 'norm' dari vektor akhir
            $norm = sqrt($sumSq);

            $gameVectors[$game->id] = [
                'id'           => $game->id,
                'genres'       => $gameGenreNames,
                'rating'       => (float) $game->rating,
                'norm_rating'  => round($normRating, 4),
                'norm'         => round($norm, 6),
                'vector'       => $vectorEntries, // sparse representation
            ];
        }

        $matrixData = [
            'metadata' => [
                'total_games'      => $totalGames,
                'total_genres'     => $totalGenres,
                'vocab_size'       => $vocabSize,
                'total_dimensions' => $totalDimensions,
                'min_rating'       => $minRating,
                'max_rating'       => $maxRating,
                'built_at'         => now()->toIso8601String(),
                'version'          => '1.1',
            ],
            'genres'        => $allGenres,
            'genre_map'     => $genreIndexMap,
            'vocab'         => $top500Words,
            'vocab_map'     => $vocabIndexMap,
            'idf'           => $idfValues,
            'feature_names' => $featureNames,
            'games'         => $gameVectors,
        ];

        // Simpan matriks ke cache file JSON
        File::ensureDirectoryExists(dirname($this->cachePath));
        File::put($this->cachePath, json_encode($matrixData, JSON_UNESCAPED_UNICODE));

        $buildDurationMs = round((microtime(true) - $startTime) * 1000, 2);

        return [
            'status'           => 'success',
            'total_games'      => $totalGames,
            'total_genres'     => $totalGenres,
            'vocab_size'       => $vocabSize,
            'total_dimensions' => $totalDimensions,
            'min_rating'       => $minRating,
            'max_rating'       => $maxRating,
            'build_time_ms'    => $buildDurationMs,
            'cache_path'       => $this->cachePath,
            'cache_size_kb'    => round(filesize($this->cachePath) / 1024, 2),
        ];
    }

    /**
     * Memuat matriks dari cache, atau membangun baru jika cache belum ada.
     *
     * @return array
     */
    public function loadMatrix(): array
    {
        if (static::$cachedMatrix !== null) {
            return static::$cachedMatrix;
        }

        if (!File::exists($this->cachePath)) {
            $this->buildMatrix();
        }

        $content = File::get($this->cachePath);
        $data = json_decode($content, true);

        if (!$data || !isset($data['games']) || ($data['metadata']['version'] ?? '') !== '1.1') {
            $this->buildMatrix();
            $data = json_decode(File::get($this->cachePath), true);
        }

        static::$cachedMatrix = $data;
        return static::$cachedMatrix;
    }

    /**
     * Menghitung rekomendasi Content-Based Filtering menggunakan Cosine Similarity.
     *
     * @param array<int>    $favoriteGameIds  Minimal 1 ID game favorit pengguna.
     * @param array<string> $selectedGenres   Genre yang dipilih pengguna di langkah 1.
     * @param int           $topN             Jumlah rekomendasi yang diinginkan (default 10).
     * @return array
     */
    public function calculateRecommendations(array $favoriteGameIds, array $selectedGenres = [], int $topN = 10): array
    {
        $startTime = microtime(true);

        if (empty($favoriteGameIds)) {
            throw new \InvalidArgumentException('Minimal 1 game favorit harus dipilih sebagai basis kalkulasi vektor.');
        }

        $matrix = $this->loadMatrix();
        $totalDimensions = $matrix['metadata']['total_dimensions'];
        $genreMap = $matrix['genre_map'];
        $featureNames = $matrix['feature_names'];
        $gamesData = $matrix['games'];

        // ── Langkah c: Vektor profil pengguna A ──────────────────────────────
        // A = rata-rata vektor game favorit.
        // Genre yang dipilih di langkah 1 ikut ditambahkan ke vektor profil (nilai 1 pada dimensi genre tersebut sebelum dirata-ratakan).
        $profileAccumulator = array_fill(0, $totalDimensions, 0.0);
        $validFavCount = 0;

        foreach ($favoriteGameIds as $favId) {
            if (isset($gamesData[$favId])) {
                $validFavCount++;
                foreach ($gamesData[$favId]['vector'] as $dim => $val) {
                    $profileAccumulator[$dim] += (float) $val;
                }
            }
        }

        // Jika tidak ada game favorit yang cocok di database
        if ($validFavCount === 0) {
            throw new \RuntimeException('Game favorit yang dipilih tidak ditemukan dalam matriks rekomendasi.');
        }

        // Tambahkan nilai 1 pada dimensi genre yang dipilih sebelum dirata-ratakan
        foreach ($selectedGenres as $genreName) {
            if (isset($genreMap[$genreName])) {
                $dim = $genreMap[$genreName];
                $profileAccumulator[$dim] += 1.0;
            }
        }

        // Hitung rata-rata vektor profil A dan hitung norma ||A||
        $profileVector = []; // Simpan sparse untuk efisiensi dot product
        $sumSqA = 0.0;

        foreach ($profileAccumulator as $dim => $sumVal) {
            if ($sumVal > 0.0) {
                $avgVal = $sumVal / $validFavCount;
                $profileVector[$dim] = $avgVal;
                $sumSqA += ($avgVal * $avgVal);
            }
        }

        $normA = sqrt($sumSqA);

        // ── Langkah d & e: Hitung Cosine Similarity untuk SEMUA game lain di dataset ──
        // cosine(A,B) = sum(Ai*Bi) / (sqrt(sum(Ai^2)) * sqrt(sum(Bi^2)))
        // Keluarkan game favorit pengguna dari daftar rekomendasi
        $favLookup = array_flip($favoriteGameIds);
        $candidates = [];

        foreach ($gamesData as $gameId => $gameEntry) {
            // e. KELUARKAN game favorit pengguna dari daftar
            if (isset($favLookup[$gameId])) {
                continue;
            }

            $normB = (float) $gameEntry['norm'];
            if ($normA <= 0.0 || $normB <= 0.0) {
                $cosine = 0.0;
                $dotProduct = 0.0;
                $topContributions = [];
            } else {
                $dotProduct = 0.0;
                $contributions = [];

                // Hitung dot product hanya pada dimensi non-nol antara profil dan game
                foreach ($gameEntry['vector'] as $dim => $valB) {
                    if (isset($profileVector[$dim])) {
                        $valA = $profileVector[$dim];
                        $contrib = $valA * (float) $valB;
                        if ($contrib > 0.0) {
                            $dotProduct += $contrib;
                            $contributions[] = [
                                'dim'          => (int) $dim,
                                'feature'      => $featureNames[$dim] ?? "Dimensi #{$dim}",
                                'profile_val'  => round($valA, 4),
                                'game_val'     => round((float) $valB, 4),
                                'contribution' => round($contrib, 4),
                            ];
                        }
                    }
                }

                $denominator = $normA * $normB;
                $cosine = $denominator > 0.0 ? ($dotProduct / $denominator) : 0.0;
                // Batasi nilai cosine agar строго berada di rentang [0.0, 1.0]
                $cosine = max(0.0, min(1.0, (float) $cosine));

                // Ambil 5 dimensi fitur dengan kontribusi dot product terbesar
                usort($contributions, fn($x, $y) => $y['contribution'] <=> $x['contribution']);
                $topContributions = array_slice($contributions, 0, 5);
            }

            // Hitung irisan genre game ini dengan profil preferensi pengguna
            $matchedGenres = array_values(array_intersect($gameEntry['genres'], $selectedGenres));

            $candidates[] = [
                'id'                  => (int) $gameId,
                'similarity'          => round($cosine, 4),
                'percentage'          => round($cosine * 100, 2),
                'rating'              => (float) $gameEntry['rating'],
                'genres'              => $gameEntry['genres'],
                'matched_genres'      => $matchedGenres,
                'calculation_details' => [
                    'dot_product'       => round($dotProduct, 4),
                    'norm_profile'      => round($normA, 4),
                    'norm_game'         => round($normB, 4),
                    'cosine_similarity' => round($cosine, 4),
                    'top_features'      => $topContributions,
                ],
            ];
        }

        // Urutkan menurun: similarity DESC, lalu rating DESC, lalu ID ASC (deterministik)
        usort($candidates, function ($a, $b) {
            return ($b['similarity'] <=> $a['similarity'])
                ?: ($b['rating'] <=> $a['rating'])
                ?: ($a['id'] <=> $b['id']);
        });

        // Ambil Top N
        $topCandidates = array_slice($candidates, 0, $topN);
        $topIds = array_column($topCandidates, 'id');

        // Eager load data lengkap Game dari database untuk mencegah N+1
        $dbGames = Game::with('genres:id,name,slug')
            ->whereIn('id', $topIds)
            ->get()
            ->keyBy('id');

        // Gabungkan atribut game lengkap dengan hasil kalkulasi
        $finalRecommendations = [];
        $totalSimSum = 0.0;

        foreach ($topCandidates as $cand) {
            $gameModel = $dbGames->get($cand['id']);
            if (!$gameModel) {
                continue;
            }

            $totalSimSum += $cand['similarity'];

            $finalRecommendations[] = [
                'id'                  => $gameModel->id,
                'title'               => $gameModel->title,
                'description'         => $gameModel->description,
                'developers'          => $gameModel->developers ?? 'Steam Publisher',
                'publishers'          => $gameModel->publishers ?? 'Steam Publisher',
                'image_url'           => $gameModel->image_url,
                'rating'              => (float) $gameModel->rating,
                'platform'            => 'PC', // Dataset steam khusus PC
                'genres'              => $gameModel->genres->pluck('name')->toArray(),
                'matched_genres'      => $cand['matched_genres'],
                'similarity'          => $cand['similarity'],
                'percentage'          => $cand['percentage'],
                'calculation_details' => $cand['calculation_details'],
            ];
        }

        $recCount = count($finalRecommendations);
        $avgSimilarity = $recCount > 0 ? round($totalSimSum / $recCount, 3) : 0.0;
        $executionTimeMs = round((microtime(true) - $startTime) * 1000, 2);

        return [
            'status'            => 'success',
            'execution_time_ms' => $executionTimeMs,
            'total_evaluated'   => count($candidates),
            'top_n'             => $topN,
            'avg_similarity'    => $avgSimilarity,
            'profile_norm'      => round($normA, 4),
            'feature_dim_count' => $totalDimensions,
            'recommendations'   => $finalRecommendations,
        ];
    }

    /**
     * Tokenisasi teks: lowercase, hapus tanda baca/angka, filter stopword & panjang >= 3.
     *
     * @param string $text
     * @return array<string>
     */
    protected function tokenizeText(string $text): array
    {
        $text = mb_strtolower($text, 'UTF-8');
        // Hapus karakter selain huruf dan spasi
        $text = preg_replace('/[^\p{L}\s]/u', ' ', $text);
        $words = preg_split('/\s+/', (string) $text, -1, PREG_SPLIT_NO_EMPTY) ?: [];

        $filtered = [];
        foreach ($words as $w) {
            if (mb_strlen($w, 'UTF-8') >= 3 && !isset($this->stopwords[$w])) {
                $filtered[] = $w;
            }
        }

        return $filtered;
    }
}
