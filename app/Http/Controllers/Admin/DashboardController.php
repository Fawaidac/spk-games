<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use App\Models\RecommendationHistory;
use App\Models\User;
use App\Services\ContentBasedRecommender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard Telemetri & KPI ML.
     */
    public function index(Request $request)
    {
        $totalUsers   = User::count();
        $totalGames   = Game::count();
        $totalGenres  = Genre::count();
        $totalFavorites = DB::table('user_favorites')->count();

        // Top 4 game paling banyak difavoritkan
        $topFavorited = DB::table('user_favorites')
            ->select('game_id', DB::raw('COUNT(*) as fav_count'))
            ->groupBy('game_id')
            ->orderByDesc('fav_count')
            ->take(4)
            ->get()
            ->map(function ($row) use ($totalFavorites) {
                $game = Game::find($row->game_id);
                return [
                    'title'     => $game?->title ?? 'Unknown',
                    'count'     => (int) $row->fav_count,
                    'pct'       => $totalFavorites > 0 ? round($row->fav_count / $totalFavorites * 100) : 0,
                ];
            });

        // Distribusi genre: 5 genre teratas berdasarkan jumlah game
        $genreDistribution = Genre::withCount('games')
            ->orderByDesc('games_count')
            ->take(5)
            ->get()
            ->map(function ($g) use ($totalGames) {
                return [
                    'name'  => $g->name,
                    'count' => $g->games_count,
                    'pct'   => $totalGames > 0 ? round($g->games_count / $totalGames * 100) : 0,
                ];
            });

        $users = User::latest()->get();

        return view('admin.dashboard.index', compact(
            'users',
            'totalUsers',
            'totalGames',
            'totalGenres',
            'totalFavorites',
            'topFavorited',
            'genreDistribution',
        ));
    }

    /**
     * Trigger rebuild matriks vektor rekomendasi (dari tombol Sinkronisasi AI sidebar).
     */
    public function buildRecsys(Request $request, ContentBasedRecommender $recommender)
    {
        $result = $recommender->buildMatrix();

        if ($request->wantsJson()) {
            return response()->json($result);
        }

        return redirect()->route('admin.dashboard')
            ->with('success', "✅ Matriks AI berhasil dibangun ulang! {$result['total_games']} game terindeks dalam {$result['build_time_ms']} ms.");
    }
}
