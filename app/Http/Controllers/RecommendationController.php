<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecommendationRequest;
use App\Models\Game;
use App\Models\Genre;
use App\Models\RecommendationHistory;
use App\Services\ContentBasedRecommender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecommendationController extends Controller
{
    public function __construct(protected ContentBasedRecommender $recommender)
    {
    }

    /**
     * Hitung rekomendasi berbasis content-based filtering.
     * Hanya untuk pengguna yang sudah login.
     * Simpan ke riwayat dan favorit.
     *
     * @param  RecommendationRequest  $request
     * @return JsonResponse
     */
    public function calculate(RecommendationRequest $request): JsonResponse
    {
        $user = auth()->user();

        $favoriteGameIds = $request->input('game_ids', []);
        $selectedGenres  = $request->input('genres', []);
        $topN            = (int) $request->input('top_n', 10);
        $topN            = in_array($topN, [5, 10, 20]) ? $topN : 10;

        try {
            $result = $this->recommender->calculateRecommendations(
                $favoriteGameIds,
                $selectedGenres,
                $topN
            );
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 422);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }

        // Simpan game favorit ke tabel user_favorites (upsert, tidak duplikat)
        if ($user) {
            $user->favoriteGames()->syncWithoutDetaching($favoriteGameIds);
        }

        // Simpan sesi riwayat rekomendasi
        $sessionCode = $this->generateSessionCode();
        $recommendedForHistory = collect($result['recommendations'])->map(fn($r) => [
            'game_id'    => $r['id'],
            'title'      => $r['title'],
            'rating'     => $r['rating'],
            'similarity' => $r['similarity'],
            'percentage' => $r['percentage'],
            'platform'   => 'PC',
            'image_url'  => $r['image_url'],
        ])->toArray();

        // Ambil judul game favorit dari DB untuk disimpan di riwayat
        $favGameTitles = Game::whereIn('id', $favoriteGameIds)->pluck('title')->toArray();

        $history = RecommendationHistory::create([
            'user_id'           => $user?->id,
            'session_code'      => $sessionCode,
            'user_name'         => $user?->name ?? 'Guest',
            'user_email'        => $user?->email ?? 'guest@gamematch.internal',
            'selected_genres'   => $selectedGenres,
            'reference_games'   => $favGameTitles,
            'recommended_games' => $recommendedForHistory,
            'avg_similarity'    => $result['avg_similarity'],
            'algorithm'         => 'Content-Based Filtering (Cosine Similarity + TF-IDF)',
            'ip_address'        => $request->ip(),
        ]);

        return response()->json([
            'status'            => 'success',
            'session_code'      => $sessionCode,
            'history_id'        => $history->id,
            'execution_time_ms' => $result['execution_time_ms'],
            'total_evaluated'   => $result['total_evaluated'],
            'avg_similarity'    => $result['avg_similarity'],
            'feature_dim_count' => $result['feature_dim_count'],
            'top_n'             => $result['top_n'],
            'recommendations'   => $result['recommendations'],
        ]);
    }

    /**
     * Ambil riwayat rekomendasi milik user yang sedang login.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function userHistory(Request $request): JsonResponse
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['status' => 'unauthenticated', 'histories' => []], 401);
        }

        $histories = RecommendationHistory::where('user_id', $user->id)
            ->latest()
            ->take(20)
            ->get()
            ->map(function ($h) {
                return [
                    'id'               => $h->id,
                    'session_code'     => $h->session_code,
                    'selected_genres'  => $h->selected_genres ?? [],
                    'reference_games'  => $h->reference_games ?? [],
                    'recommended_games' => $h->recommended_games ?? [],
                    'avg_similarity'   => $h->avg_similarity,
                    'created_at'       => $h->created_at?->format('d M Y, H:i'),
                    'created_ago'      => $h->created_at?->diffForHumans(),
                ];
            });

        return response()->json(['status' => 'success', 'histories' => $histories]);
    }

    /**
     * Generate kode sesi unik format RC-YYYYMMDD-XXXX.
     */
    protected function generateSessionCode(): string
    {
        $dateStr = now()->format('Ymd');
        $suffix  = strtoupper(Str::random(4));

        return "RC-{$dateStr}-{$suffix}";
    }
}

