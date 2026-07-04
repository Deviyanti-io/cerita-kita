<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurahanController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\DailyInsightController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ============================================================
// Halaman Utama (Welcome)
// ============================================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ============================================================
// Dashboard (setelah login) - menggunakan closure
// ============================================================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// ============================================================
// Route yang membutuhkan autentikasi
// ============================================================
Route::middleware('auth')->group(function () {

    // ---------- Profile ----------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ---------- Curahan Hati (CRUD + Like + Comment) ----------
    Route::resource('curahan', CurahanController::class);
    Route::post('/curahan/{curahan}/like', [CurahanController::class, 'toggleLike'])->name('curahan.like');
    Route::post('/curahan/{curahan}/comment', [CurahanController::class, 'addComment'])->name('curahan.comment');
    Route::delete('/comment/{comment}', [CurahanController::class, 'deleteComment'])->name('comment.delete');

    // ---------- Mood Tracker ----------
    Route::resource('mood', MoodController::class);

    // ---------- Daily Insight ----------
    Route::get('/insight', [DailyInsightController::class, 'index'])->name('insight');

    // Playlist 
    Route::get('/playlist', function () {return view('playlist');
})->middleware(['auth'])->name('playlist');

});
// ============================================================
// Halaman Publik (tanpa login)
// ============================================================
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/fitur', function () {
    return view('fitur');
})->name('fitur');

Route::get('/komunitas', function () {
    return view('komunitas');
})->name('komunitas');

// ============================================================
// Auth routes (Login, Register, dll) - disediakan Breeze
// ============================================================
require __DIR__.'/auth.php';