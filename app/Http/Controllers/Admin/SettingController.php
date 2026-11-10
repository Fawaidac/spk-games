<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Menampilkan Konfigurasi Mesin Rekomendasi & Algoritma.
     */
    public function index(Request $request)
    {
        return view('admin.settings.index');
    }
}
