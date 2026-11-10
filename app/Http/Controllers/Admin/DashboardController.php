<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard Telemetri & KPI ML.
     */
    public function index(Request $request)
    {
        $users = User::latest()->get();
        $totalUsers = $users->count();
        $totalGames = Game::latest()->get()->count();
        $totalGenres = Genre::latest()->get()->count();

        return view('admin.dashboard.index', compact('users', 'totalUsers', 'totalGames', 'totalGenres'));
    }
}
