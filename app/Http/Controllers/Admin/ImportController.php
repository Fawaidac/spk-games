<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Menampilkan Pipeline Ingesti Dataset Steam Kaggle.
     */
    public function index(Request $request)
    {
        return view('admin.imports.index');
    }
}
