<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan Kontrol Akses & Manajemen Akun Pengguna.
     */
    public function index(Request $request)
    {
        $users      = User::latest()->paginate(15)->withQueryString();
        $totalUsers = User::count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalGamer = User::where('role', 'user')->count();

        return view('admin.users.index', compact('users', 'totalUsers', 'totalAdmin', 'totalGamer'));
    }
}
