<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\InformasiController;
/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/status', [PageController::class, 'status'])->name('status');
Route::get('/informasi', [PageController::class, 'informasi'])->name('informasi');

/*
|--------------------------------------------------------------------------
| AUTH (Login & Register) — Hanya untuk Guest
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

/*
|--------------------------------------------------------------------------
| LOGOUT (Harus POST)
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| GOOGLE AUTH
|--------------------------------------------------------------------------
*/
Route::prefix('auth/google')->group(function () {
    Route::get('/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
    Route::get('/callback', [GoogleController::class, 'callback'])->name('google.callback');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD (Semua role)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| ROLE-BASED ROUTES
|--------------------------------------------------------------------------
*/

// ==================== USER ====================
Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /*
    | INFORMASI (USER)
    | hanya bisa lihat & detail
    */
    Route::get('/informasi', [InformasiController::class, 'indexUser'])
        ->name('informasi.index');

    Route::get('/informasi/{id}', [InformasiController::class, 'show'])
        ->name('informasi.show');

    // Laporan user
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
    Route::get('/laporan/create', [LaporanController::class, 'create'])
        ->name('laporan.create');
});

// ==================== STAF ====================
Route::prefix('staf')->name('staf.')->middleware(['auth', 'role:staf'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /*
    | INFORMASI (STAF)
    | hanya lihat & detail seperti user
    */
    Route::get('/informasi', [InformasiController::class, 'indexStaf'])
        ->name('informasi.index');

    Route::get('/informasi/{id}', [InformasiController::class, 'show'])
        ->name('informasi.show');

    // Laporan staf
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
});


// ==================== ADMIN ====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');


    /*
    |--------------------------------------------------------------------------
    | INFORMASI (ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::get('/informasi', [InformasiController::class, 'index'])
        ->name('informasi.index');

    Route::get('/informasi/create', [InformasiController::class, 'create'])
        ->name('informasi.create');

    Route::post('/informasi', [InformasiController::class, 'store'])
        ->name('informasi.store');

    Route::get('/informasi/{id}/edit', [InformasiController::class, 'edit'])
        ->name('informasi.edit');

    Route::put('/informasi/{id}', [InformasiController::class, 'update'])
        ->name('informasi.update');

    Route::delete('/informasi/{id}', [InformasiController::class, 'destroy'])
        ->name('informasi.destroy');


    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
});



/*
|--------------------------------------------------------------------------
| DEBUG SESSION
|--------------------------------------------------------------------------
*/
Route::get('/test-session', function () {
    return response()->json([
        'auth_check' => Auth::check(),
        'user' => Auth::user(),
        'session_all' => session()->all(),
    ]);
});
