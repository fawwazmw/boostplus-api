<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\TransaksiFormController;


// Halaman Utama (app.blade.php)

// Menampilkan halaman transaksi (GET)
Route::get('/', [TransaksiFormController::class, 'index'])->name('home');

// Menyimpan transaksi (POST)
Route::post('/transaksi', [TransaksiFormController::class, 'store'])->name('transaksi.store');


// Halaman Riwayat Transaction (history.blade.php)

Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/transaction/{id}', [HistoryController::class, 'getTransactionDetail'])->name('transaction.detail');


Route::prefix('auth')->group(function () {
    // Rute Login
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    // Rute Register
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Rute untuk admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Rute untuk menampilkan data pengguna
Route::get('/admin/data', [AdminController::class, 'showUsers'])->name('admin.data');
     // Rute user
    Route::get('/user/user', [UserController::class, 'index'])->name('user.user');
    Route::match(['get', 'put'], '/user/update', [UserController::class, 'updateProfile'])->name('user.update');

Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');

Route::get('/admin/game', [GameController::class, 'index'])->name('admin.game');

