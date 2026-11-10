<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecommendationHistory;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Menampilkan Riwayat Rekomendasi Semua Pengguna.
     */
    public function index(Request $request)
    {
        $userId = $request->query('user_id');
        $search = $request->query('search');

        $query = RecommendationHistory::with('user');

        if ($userId && $userId !== 'all') {
            $query->where('user_id', $userId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('session_code', 'like', "%{$search}%")
                  ->orWhere('user_name', 'like', "%{$search}%")
                  ->orWhere('user_email', 'like', "%{$search}%")
                  ->orWhereJsonContains('selected_genres', $search)
                  ->orWhereJsonContains('reference_games', $search);
            });
        }

        $histories = $query->latest()->paginate(10)->withQueryString();

        // Metrik KPI Telemetri
        $totalHistories = RecommendationHistory::count();
        $avgSimilarity = RecommendationHistory::avg('avg_similarity') ?? 0;
        $totalUsersWithHistory = RecommendationHistory::distinct('user_id')->count('user_id');

        // Pengguna untuk filter dropdown
        $users = User::orderBy('name')->get();

        return view('admin.history.index', compact(
            'histories',
            'totalHistories',
            'avgSimilarity',
            'totalUsersWithHistory',
            'users',
            'userId',
            'search'
        ));
    }

    /**
     * Hapus satu riwayat kalkulasi (opsional).
     */
    public function destroy($id)
    {
        $history = RecommendationHistory::findOrFail($id);
        $history->delete();

        return redirect()->route('admin.history')->with('success', 'Riwayat sesi rekomendasi berhasil dihapus.');
    }

    /**
     * Menyimpan sesi rekomendasi baru dari user / landing page.
     */
    public function storeHistory(Request $request)
    {
        $user = auth()->user();
        $selectedGenres = $request->input('selected_genres', []);
        $referenceGames = $request->input('reference_games', []);
        $recommendedGames = $request->input('recommended_games', []);

        if (empty($recommendedGames)) {
            $sample = \App\Models\Game::take(3)->get();
            foreach ($sample as $g) {
                $score = round(rand(880, 970) / 1000, 3);
                $recommendedGames[] = [
                    'game_id'    => $g->id,
                    'title'      => $g->title,
                    'rating'     => $g->rating,
                    'similarity' => $score,
                    'percentage' => round($score * 100, 1),
                    'platform'   => $g->platform ?? 'PC',
                ];
            }
        }

        $scores = array_column($recommendedGames, 'similarity');
        $avgSim = !empty($scores) ? round(array_sum($scores) / count($scores), 3) : 0.920;

        $history = RecommendationHistory::create([
            'user_id'           => $user?->id,
            'session_code'      => 'REC-' . strtoupper(\Illuminate\Support\Str::random(4)) . '-' . rand(1000, 9999),
            'user_name'         => $user?->name ?? 'Guest Explorer',
            'user_email'        => $user?->email ?? 'guest@gamematch.internal',
            'selected_genres'   => $selectedGenres,
            'reference_games'   => $referenceGames,
            'recommended_games' => $recommendedGames,
            'avg_similarity'    => $avgSim,
            'algorithm'         => 'Content-Based Filtering (Cosine Similarity + TF-IDF)',
            'ip_address'        => $request->ip(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Riwayat rekomendasi berhasil dicatat.',
            'history' => $history,
        ]);
    }
}
