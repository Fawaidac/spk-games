<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     * Menampilkan Terminal Bantuan & Dokumentasi Sistem ML.
     */
    public function index(Request $request)
    {
        return view('admin.help.index');
    }
}
