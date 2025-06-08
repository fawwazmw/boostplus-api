<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_transaksi' => $this->id,
            'game_name' => $this->nama_game,
            'player_id' => $this->id_akun,
            'player_nickname' => $this->whenLoaded('akunGame', fn() => $this->akunGame->nickname, null),
            'amount' => $this->jumlah,
            'status' => $this->status,
            // Gunakan format standar ISO 8601 untuk konsistensi API
            'transaction_date' => $this->created_at->toIso8601String(),
        ];
    }
}
