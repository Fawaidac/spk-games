<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard / Portal Rekomendasi Gamer.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.user');
    }

    /**
     * Alias untuk tampilan Portal Gamer.
     *
     * @return \Illuminate\View\View
     */ 
    public function user()
    {
        return view('dashboard.user');
    }
}
