<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Navigator / Index untuk semua screen template GameMatch.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('landing.index');
    }

    /**
     * Template Landing Page.
     *
     * @return \Illuminate\View\View
     */
    public function landing()
    {
        return view('landing.index');
    }

    /**
     * Template Portal Gamer / User.
     *
     * @return \Illuminate\View\View
     */
    public function user()
    {
        return view('dashboard.user');
    }

    /**
     * Template Konsol ML Admin.
     *
     * @return \Illuminate\View\View
     */
    public function admin(Request $request)
    {
        $users = \App\Models\User::latest()->get();
        $totalUsers = $users->count();
        $totalAdmin = $users->where('role', 'admin')->count();
        $totalGamer = $users->where('role', 'user')->count();
        $activeTab = $request->query('tab', 'dashboard');

        return view('dashboard.admin', compact('users', 'totalUsers', 'totalAdmin', 'totalGamer', 'activeTab'));
    }
}
