<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Menampilkan Landing Page GameMatch.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('landing.index');
    }
}
