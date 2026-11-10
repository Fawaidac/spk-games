<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - GameMatch RecSys Platform
|--------------------------------------------------------------------------
|
| Rute web untuk platform GameMatch:
| - Landing: / (Landing Page)
| - Auth: /login, /register, /logout
| - Admin: /admin/* (Clean Architecture per-section)
|
*/

/* ── 1. Landing Page ─────────────────────────────────────── */
Route::get('/', [LandingController::class, 'index'])->name('landing');

/* ── 2. Autentikasi (Guest Only) ─────────────────────────── */
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/login',    [AuthController::class, 'doLogin'])->name('login.post');
    Route::post('/register', [AuthController::class, 'doRegister'])->name('register.post');
});

/* ── 3. Logout (Auth Only) ───────────────────────────────── */
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/* ── 4. Konsol SuperAdmin & Pipeline ML (Clean Architecture) ── */
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/',          [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/games',     [Admin\GameController::class,      'index'])->name('games');
    Route::get('/genres',    [Admin\GenreController::class,     'index'])->name('genres');
    Route::get('/history',   [Admin\HistoryController::class,   'index'])->name('history');
    Route::delete('/history/{id}', [Admin\HistoryController::class, 'destroy'])->name('history.destroy');
    Route::get('/imports',   [Admin\ImportController::class,    'index'])->name('imports');
    Route::get('/users',     [Admin\UserController::class,      'index'])->name('users');
    Route::get('/help',      [Admin\HelpController::class,      'index'])->name('help');
    Route::get('/settings',  [Admin\SettingController::class,   'index'])->name('settings');
});

/* ── 5. Simpan Sesi Rekomendasi ── */
Route::post('/recommendations/save-history', [Admin\HistoryController::class, 'storeHistory'])->name('recommendations.save');

// Backward-compatibility alias
Route::get('/dashboard-admin', [Admin\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard.admin');
