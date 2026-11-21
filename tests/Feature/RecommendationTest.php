<?php

namespace Tests\Feature;

use App\Models\RecommendationHistory;
use App\Models\User;
use App\Services\ContentBasedRecommender;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Feature tests untuk sistem rekomendasi Content-Based Filtering.
 *
 * Menggunakan DatabaseTransactions agar setiap test di-rollback
 * sehingga data MySQL tidak terkontaminasi.
 */
class RecommendationTest extends TestCase
{
    use DatabaseTransactions;

    /** User non-admin untuk pengujian */
    protected User $user;

    /** ID game yang ada di database (diambil saat runtime) */
    protected array $validGameIds;

    /** Genre pertama yang ada di DB */
    protected string $validGenre;

    protected function setUp(): void
    {
        parent::setUp();

        // Gunakan user non-admin yang sudah ada
        $this->user = User::where('role', 'user')->first() ?? User::factory()->create(['role' => 'user']);

        // Ambil 3 game nyata dari DB untuk dijadikan favorit
        $this->validGameIds = DB::table('games')
            ->orderBy('id')
            ->limit(3)
            ->pluck('id')
            ->toArray();

        // Ambil nama genre pertama dari DB
        $this->validGenre = DB::table('genres')->orderBy('id')->value('name') ?? 'Action';
    }

    // =========================================================================
    // TEST 1: Game favorit TIDAK muncul dalam hasil rekomendasi
    // =========================================================================

    /**
     * @test
     * Memastikan bahwa game yang dipilih sebagai favorit tidak ikut muncul
     * dalam daftar rekomendasi yang dihasilkan algoritma CBF.
     */
    public function test_favorite_games_are_excluded_from_recommendations(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson('/recommendations/calculate', [
                'game_ids' => $this->validGameIds,
                'genres'   => [$this->validGenre],
                'top_n'    => 10,
            ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ])
            ->assertJsonStructure([
                'status',
                'session_code',
                'recommendations' => [
                    '*' => ['id', 'title', 'similarity', 'percentage'],
                ],
            ]);

        $recommendedIds = collect($response->json('recommendations'))
            ->pluck('id')
            ->toArray();

        // Pastikan tidak ada overlap antara favorit dan rekomendasi
        $overlap = array_intersect($this->validGameIds, $recommendedIds);

        $this->assertEmpty(
            $overlap,
            'Game favorit ditemukan dalam hasil rekomendasi: ' . implode(', ', $overlap)
        );
    }

    // =========================================================================
    // TEST 2: Semua skor similarity berada di rentang [0.0, 1.0]
    // =========================================================================

    /**
     * @test
     * Memastikan bahwa setiap skor cosine similarity yang dikembalikan
     * berada pada rentang valid [0, 1] sesuai definisi cosine similarity.
     */
    public function test_similarity_scores_are_within_valid_range(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson('/recommendations/calculate', [
                'game_ids' => $this->validGameIds,
                'genres'   => [$this->validGenre],
                'top_n'    => 20,
            ]);

        $response->assertStatus(200);

        $recommendations = $response->json('recommendations');

        $this->assertNotEmpty($recommendations, 'Tidak ada rekomendasi yang dikembalikan');

        foreach ($recommendations as $rec) {
            $score = (float) $rec['similarity'];

            $this->assertGreaterThanOrEqual(
                0.0,
                $score,
                "Skor similarity untuk id={$rec['id']} lebih kecil dari 0: {$score}"
            );

            $this->assertLessThanOrEqual(
                1.0,
                $score,
                "Skor similarity untuk id={$rec['id']} lebih besar dari 1: {$score}"
            );
        }
    }

    // =========================================================================
    // TEST 3: Riwayat tersimpan ke database setelah kalkulasi
    // =========================================================================

    /**
     * @test
     * Memastikan bahwa setiap kalkulasi rekomendasi menyimpan satu entri
     * riwayat ke tabel recommendation_histories dengan format yang benar.
     */
    public function test_recommendation_history_is_saved_after_calculation(): void
    {
        $countBefore = RecommendationHistory::where('user_id', $this->user->id)->count();

        $response = $this->actingAs($this->user)
            ->postJson('/recommendations/calculate', [
                'game_ids' => $this->validGameIds,
                'genres'   => [$this->validGenre],
                'top_n'    => 10,
            ]);

        $response->assertStatus(200);

        $sessionCode = $response->json('session_code');

        // Pastikan riwayat bertambah satu
        $countAfter = RecommendationHistory::where('user_id', $this->user->id)->count();
        $this->assertEquals($countBefore + 1, $countAfter, 'Riwayat tidak bertambah setelah kalkulasi');

        // Pastikan entri tersimpan dengan data yang benar
        $history = RecommendationHistory::where('user_id', $this->user->id)
            ->where('session_code', $sessionCode)
            ->first();

        $this->assertNotNull($history, "Riwayat dengan session_code={$sessionCode} tidak ditemukan");

        // Validasi format session code: RC-YYYYMMDD-XXXX
        $this->assertMatchesRegularExpression(
            '/^RC-\d{8}-[A-Z0-9]{4}$/',
            $history->session_code,
            "Format session_code tidak valid: {$history->session_code}"
        );

        // Pastikan reference_games tersimpan (array)
        $this->assertIsArray($history->reference_games);
        $this->assertNotEmpty($history->reference_games);

        // Pastikan recommended_games tersimpan (array)
        $this->assertIsArray($history->recommended_games);
        $this->assertNotEmpty($history->recommended_games);

        // Pastikan avg_similarity berada di rentang [0, 1]
        $this->assertGreaterThanOrEqual(0.0, (float) $history->avg_similarity);
        $this->assertLessThanOrEqual(1.0, (float) $history->avg_similarity);
    }

    // =========================================================================
    // TEST 4: Unauthenticated request ditolak (Redirect ke login atau 401)
    // =========================================================================

    /**
     * @test
     * Memastikan bahwa endpoint kalkulasi hanya dapat diakses oleh user
     * yang sudah login (middleware auth aktif).
     */
    public function test_unauthenticated_user_cannot_calculate_recommendations(): void
    {
        $response = $this->postJson('/recommendations/calculate', [
            'game_ids' => $this->validGameIds,
            'genres'   => [$this->validGenre],
            'top_n'    => 10,
        ]);

        $response->assertStatus(401);
    }

    // =========================================================================
    // TEST 5: Input tidak valid dikembalikan 422
    // =========================================================================

    /**
     * @test
     * Memastikan validasi Form Request bekerja: request tanpa game_ids
     * mengembalikan status 422 Unprocessable Entity.
     */
    public function test_invalid_request_returns_validation_error(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson('/recommendations/calculate', [
                'game_ids' => [],  // kosong — harus minimal 1
                'genres'   => [$this->validGenre],
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['game_ids']);
    }

    // =========================================================================
    // TEST 6: Unit Service Algoritma CBF langsung
    // =========================================================================

    /**
     * @test
     * Menguji ContentBasedRecommender secara langsung tanpa HTTP request.
     * Memastikan top-N tidak melebihi yang diminta dan semua skor valid.
     */
    public function test_recommender_service_respects_top_n_limit(): void
    {
        $topN = 5;

        /** @var ContentBasedRecommender $service */
        $service = app(ContentBasedRecommender::class);

        $result = $service->calculateRecommendations(
            favoriteGameIds: $this->validGameIds,
            selectedGenres: [$this->validGenre],
            topN: $topN
        );

        $this->assertArrayHasKey('recommendations', $result);
        $recommendations = $result['recommendations'];

        // Jumlah rekomendasi tidak boleh melebihi top_n
        $this->assertLessThanOrEqual(
            $topN,
            count($recommendations),
            "Jumlah rekomendasi melebihi top-N yang diminta"
        );

        // Semua skor harus [0, 1] dan game favorit tidak ada di hasil
        $favoriteSet = array_flip($this->validGameIds);
        foreach ($recommendations as $rec) {
            $this->assertArrayNotHasKey(
                $rec['id'],
                $favoriteSet,
                "Game favorit (id={$rec['id']}) muncul dalam hasil rekomendasi service"
            );
            $this->assertGreaterThanOrEqual(0.0, (float) $rec['similarity']);
            $this->assertLessThanOrEqual(1.0, (float) $rec['similarity']);
        }
    }

    // =========================================================================
    // TEST 7: Metadata versi 1.1 dan konstanta bobot penyeimbang blok fitur
    // =========================================================================

    /**
     * Memastikan konstanta bobot penyeimbang (GENRE_WEIGHT, DESC_WEIGHT, RATING_WEIGHT)
     * dan metadata matriks berversi 1.1.
     */
    #[Test]
    public function test_matrix_metadata_version_and_balanced_constants(): void
    {
        $this->assertEquals(1.0, ContentBasedRecommender::GENRE_WEIGHT);
        $this->assertEquals(1.0, ContentBasedRecommender::DESC_WEIGHT);
        $this->assertEquals(0.5, ContentBasedRecommender::RATING_WEIGHT);

        /** @var ContentBasedRecommender $service */
        $service = app(ContentBasedRecommender::class);
        $matrix = $service->loadMatrix();

        $this->assertArrayHasKey('metadata', $matrix);
        $this->assertEquals('1.1', $matrix['metadata']['version'] ?? null);
    }

    // =========================================================================
    // TEST 8: Validasi calculation_details dan top_features
    // =========================================================================

    /**
     * Memastikan detail perhitungan matematika (dot product, norma, cosine)
     * dan 5 dimensi fitur dengan kontribusi terbesar tersaji lengkap dan valid.
     */
    #[Test]
    public function test_calculation_details_and_top_features_structure(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson('/recommendations/calculate', [
                'game_ids' => $this->validGameIds,
                'genres'   => [$this->validGenre],
                'top_n'    => 5,
            ]);

        $response->assertStatus(200);

        $recommendations = $response->json('recommendations');
        $this->assertNotEmpty($recommendations);

        foreach ($recommendations as $rec) {
            $this->assertArrayHasKey('calculation_details', $rec);
            $details = $rec['calculation_details'];

            $this->assertArrayHasKey('dot_product', $details);
            $this->assertArrayHasKey('norm_profile', $details);
            $this->assertArrayHasKey('norm_game', $details);
            $this->assertArrayHasKey('cosine_similarity', $details);
            $this->assertArrayHasKey('top_features', $details);

            $this->assertGreaterThan(0.0, (float) $details['norm_profile']);
            $this->assertGreaterThan(0.0, (float) $details['norm_game']);
            $this->assertGreaterThanOrEqual(0.0, (float) $details['dot_product']);

            // Validasi top_features (maksimal 5 dimensi)
            $topFeatures = $details['top_features'];
            $this->assertIsArray($topFeatures);
            $this->assertLessThanOrEqual(5, count($topFeatures));

            foreach ($topFeatures as $feature) {
                $this->assertArrayHasKey('dim', $feature);
                $this->assertArrayHasKey('feature', $feature);
                $this->assertArrayHasKey('profile_val', $feature);
                $this->assertArrayHasKey('game_val', $feature);
                $this->assertArrayHasKey('contribution', $feature);
                $this->assertGreaterThanOrEqual(0.0, (float) $feature['contribution']);
            }
        }
    }

    // =========================================================================
    // TEST 9: Matched genres dihitung dari union genre pilihan dan favorit
    // =========================================================================

    /**
     * Memastikan 'matched_genres' pada kartu hasil rekomendasi dihitung
     * terhadap gabungan (union) genre pilihan pengguna dan genre dari game favoritnya.
     */
    #[Test]
    public function test_matched_genres_is_union_of_selected_genres_and_favorite_game_genres(): void
    {
        /** @var ContentBasedRecommender $service */
        $service = app(ContentBasedRecommender::class);
        $matrix = $service->loadMatrix();

        // Ambil game favorit pertama dan dapatkan genre-genrenya
        $favGameId = $this->validGameIds[0];
        $favGenres = $matrix['games'][$favGameId]['genres'] ?? [];
        $this->assertNotEmpty($favGenres, 'Game favorit harus memiliki genre');

        // Pilih selectedGenres yang sengaja kosong atau berbeda dari genre favorit
        $result = $service->calculateRecommendations(
            favoriteGameIds: [$favGameId],
            selectedGenres: [], // kosong, sehingga union hanya berisi $favGenres
            topN: 10
        );

        $this->assertNotEmpty($result['recommendations']);

        // Pastikan matched_genres dievaluasi terhadap $favGenres
        foreach ($result['recommendations'] as $rec) {
            $expectedOverlap = array_values(array_intersect($rec['genres'], $favGenres));
            $this->assertEquals(
                $expectedOverlap,
                $rec['matched_genres'],
                "matched_genres untuk id={$rec['id']} harus sesuai union genre favorit"
            );
        }
    }
}
