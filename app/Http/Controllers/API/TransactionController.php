<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\GameAccount;
use App\Models\DiamondPackage; // <-- Tambahkan ini
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    /**
     * Tampilkan histori transaksi HANYA untuk user yang sedang login.
     */
    public function index(Request $request)
    {
        $transactions = $request->user()
            ->transactions() // Asumsi ada relasi di model User
            ->with('akunGame')
            ->latest()
            ->paginate(15);

        return TransactionResource::collection($transactions);
    }

    /**
     * Simpan transaksi baru berdasarkan package_id.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'package_id' => 'required|exists:diamond_packages,id',
            'game_player_id' => 'required|string',
            'game_name' => 'required|string',
        ]);

        $akunGame = GameAccount::where('id_akun', $validatedData['game_player_id'])
            ->where('nama_game', $validatedData['game_name'])
            ->first();

        if (!$akunGame) {
            return response()->json(['success' => false, 'message' => 'Player ID tidak cocok untuk game yang dipilih.'], 422);
        }

        $package = DiamondPackage::find($validatedData['package_id']);
        $user = $request->user();

        // LOGIKA UTAMA: Tambah saldo user dan catat transaksi
        $user->increment('balance', $package->diamonds);

        $transaksi = Transaction::create([
            'nama_game' => $package->name, // Bisa juga dari $validatedData['game_name']
            'id_akun' => $validatedData['game_player_id'],
            'jumlah' => $package->price, // Ambil harga dari paket
            'status' => 'success',
            'user_id' => $user->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Top up ' . $package->name . ' berhasil!',
            'data' => new TransactionResource($transaksi),
        ], 201);
    }

    /**
     * Tampilkan detail satu transaksi.
     */
    public function show($id)
    {
        $transaction = Transaction::with('akunGame')->find($id);

        if (!$transaction) {
            return response()->json(['success' => false, 'message' => 'Transaction tidak ditemukan'], 404);
        }

        // Keamanan tambahan: pastikan user hanya bisa melihat transaksinya sendiri
        if ($transaction->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Tidak diizinkan'], 403);
        }

        return response()->json([
            'success' => true,
            'data' => new TransactionResource($transaction),
        ]);
    }
}
