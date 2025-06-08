<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Transaction::create([
    'nama_game' => 'Mobile Legends',
    'id_akun' => 'MLG123',
    'jumlah' => 100,
    'status' => 'success',
]);

Transaction::create([
    'nama_game' => 'Genshin Impact',
    'id_akun' => 'GSI456',
    'jumlah' => 50,
    'status' => 'pending',
]);
    }
}
