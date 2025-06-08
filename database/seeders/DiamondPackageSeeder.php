<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DiamondPackage;

class DiamondPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            ['name' => '86 Diamonds', 'diamonds' => 86, 'price' => 15000],
            ['name' => '172 Diamonds', 'diamonds' => 172, 'price' => 30000],
            ['name' => '257 Diamonds', 'diamonds' => 257, 'price' => 45000],
            ['name' => '344 Diamonds', 'diamonds' => 344, 'price' => 60000],
            ['name' => '514 Diamonds', 'diamonds' => 514, 'price' => 90000],
            ['name' => '706 Diamonds', 'diamonds' => 706, 'price' => 120000],
        ];

        foreach ($packages as $package) {
            DiamondPackage::create($package);
        }
    }
}
