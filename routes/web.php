<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');


Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');
Route::get('/status', [PageController::class, 'status'])->name('status');
Route::get('/informasi', [PageController::class, 'informasi'])->name('informasi');
