<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GameAccount; // Pastikan model ini sudah ada
use Illuminate\Http\Request;

class GameAccountController extends Controller
{
    public function check(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|string',
            // 'zone_id' => 'required|string', // Zone ID bisa ditambahkan jika perlu
        ]);

        // Menggunakan tabel `akun_game` yang sudah ada
        $account = GameAccount::where('id_akun', $validated['game_id'])->first();

        if ($account) {
            return response()->json([
                'success' => true,
                'message' => 'Akun ditemukan',
                'data' => [
                    'game_id' => $account->id_akun,
                    'nickname' => $account->nickname,
                    'game_name' => $account->nama_game,
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Akun tidak ditemukan.',
        ], 404);
    }
}
