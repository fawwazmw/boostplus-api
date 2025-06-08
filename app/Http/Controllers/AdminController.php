<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class AdminController extends Controller
{
    // Method untuk menampilkan dashboard
 public function index()
{
    $transaksi = Transaction::with('akunGame')->latest()->paginate(10);

    // Hitung total transaksi
    $totalTransaksi = Transaction::count();

    // Hitung transaksi pending
    $pending = Transaction::where('status', 'pending')->count();

    // Hitung transaksi selesai
    $selesai = Transaction::where('status', 'success')->count();

    // Hitung total pendapatan (anggap kolom `jumlah` adalah nominal uang)
    $totalPendapatan = Transaction::where('status', 'success')->sum('jumlah');

    return view('admin.dashboard', compact(
        'transaksi',
        'totalTransaksi',
        'pending',
        'selesai',
        'totalPendapatan'
    ));
}


    // Method untuk menampilkan data pengguna
    public function showUsers()
    {
        $users = User::all();  // Mengambil seluruh data pengguna
        return view('admin.data', compact('users'));  // Mengirim data pengguna ke data.blade.php
    }
}

