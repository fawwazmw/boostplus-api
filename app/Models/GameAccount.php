<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameAccount extends Model
{
    use HasFactory;

    protected $table = 'akun_game';

    protected $fillable = [
        'nama_game', 'id_akun', 'nickname'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_akun', 'id_akun');
    }
}
