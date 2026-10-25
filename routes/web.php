<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - GameMatch RecSys Platform
|--------------------------------------------------------------------------
|
| Rute web untuk platform GameMatch:
| - Landing: / (Landing Page)
| - Auth: /login, /register, /logout
| - User: /dashboard (Portal Gamer)
| - Admin: /admin (Konsol ML Admin)
| - Template: /template/*
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

/* ── 4. Portal Rekomendasi Gamer (User Dashboard) ───────── */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',        [DashboardController::class, 'index'])->name('dashboard.user');
    Route::get('/user-after-login', [DashboardController::class, 'index'])->name('user.dashboard');
});

/* ── 5. Konsol SuperAdmin & Pipeline ML (Admin Dashboard) ── */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin',           [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

/* ── 6. Template Group Navigator ───────────────────────────── */
Route::prefix('template')->name('template.')->group(function () {
    Route::get('/',        [TemplateController::class, 'index'])->name('index');
    Route::get('/landing', [TemplateController::class, 'landing'])->name('landing');
    Route::get('/user',    [TemplateController::class, 'user'])->name('user');
    Route::get('/admin',   [TemplateController::class, 'admin'])->name('admin');
});

