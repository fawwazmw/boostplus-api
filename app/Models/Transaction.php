<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'nama_game',
        'id_akun',
        'jumlah',
        'status',
        'user_id', // <-- TAMBAHKAN INI
    ];

    public function akunGame()
    {
        return $this->belongsTo(GameAccount::class, 'id_akun', 'id_akun');
    }

    /**
     * Definisikan relasi bahwa transaksi ini milik seorang User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
