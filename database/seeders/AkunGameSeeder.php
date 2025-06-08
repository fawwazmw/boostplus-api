<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GameAccount;

class AkunGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         GameAccount::create([
    'nama_game' => 'Mobile Legends',
    'id_akun' => 'MLG123',
    'nickname' => 'ProPlayer1'
]);

GameAccount::create([
    'nama_game' => 'Genshin Impact',
    'id_akun' => 'GSI456',
    'nickname' => 'Traveler123'
]);
    }
}
