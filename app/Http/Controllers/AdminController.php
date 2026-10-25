<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan Dashboard SuperAdmin & Konsol Rekomendasi ML.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = \App\Models\User::latest()->get();
        $totalUsers = $users->count();
        $totalAdmin = $users->where('role', 'admin')->count();
        $totalGamer = $users->where('role', 'user')->count();

        $activeTab = $request->query('tab', 'dashboard');

        return view('dashboard.admin', compact('users', 'totalUsers', 'totalAdmin', 'totalGamer', 'activeTab'));
    }
}
