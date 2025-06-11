<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\DiamondPackageController;
use App\Http\Controllers\API\GameAccountController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Rute-rute ini akan diakses oleh aplikasi Flutter.
| Semua rute di sini otomatis memiliki prefix '/api'.
|
*/

// --- Rute Autentikasi (Publik, tidak perlu login) ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// --- Rute Publik Tambahan untuk Web Frontend ---
Route::get('/top-players', [GameAccountController::class, 'topPlayers']);

// Packages
Route::get('/packages', [DiamondPackageController::class, 'index']);

// Game Account Check
Route::post('/check-game-account', [GameAccountController::class, 'check']);

// --- Rute yang Memerlukan Otentikasi Token (Harus login) ---
Route::middleware('auth:sanctum')->group(function () {
    // Auth & Profile
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']); // Mendapatkan data user yg login

    Route::get('/profile', [ProfileController::class, 'show']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
});
