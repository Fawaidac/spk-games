<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Menampilkan Klasifikasi & Taksonomi Genre Steam dari database.
     */
    public function index(Request $request)
    {
        $genres = Genre::withCount('games')->orderBy('games_count', 'desc')->get();
        $totalGenres = $genres->count();
        $totalGames = Game::count();

        return view('admin.genres.index', compact('genres', 'totalGenres', 'totalGames'));
    }
}
