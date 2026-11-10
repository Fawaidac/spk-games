<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Menampilkan Katalog & Manajemen Data Game PC dengan filter genre, search, dan pagination 10.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $genreId = $request->query('genre');

        $query = Game::with('genres');

        // Pencarian berdasarkan Judul, Developer, Publisher, atau Steam App ID
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('developers', 'like', "%{$search}%")
                  ->orWhere('publishers', 'like', "%{$search}%");

                if (is_numeric($search)) {
                    $q->orWhere('steam_app_id', (int) $search);
                }
            });
        }

        // Filter berdasarkan Genre
        if (!empty($genreId) && $genreId !== 'all') {
            $query->whereHas('genres', function ($q) use ($genreId) {
                if (is_numeric($genreId)) {
                    $q->where('genres.id', $genreId);
                } else {
                    $q->where('genres.slug', $genreId)
                      ->orWhere('genres.name', $genreId);
                }
            });
        }

        // Pagination 10 sesuai permintaan user
        $games = $query->orderBy('rating', 'desc')
                       ->orderBy('total_reviews', 'desc')
                       ->paginate(10)
                       ->withQueryString();

        // Ambil semua genre untuk filter dropdown
        $genres = Genre::withCount('games')->orderBy('name')->get();
        $totalGames = Game::count();

        return view('admin.games.index', compact(
            'games',
            'genres',
            'search',
            'genreId',
            'totalGames'
        ));
    }
}
