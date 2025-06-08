<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DiamondPackage;
use App\Http\Resources\DiamondPackageResource; // <-- Tambahkan ini

class DiamondPackageController extends Controller
{
    public function index()
    {
        $packages = DiamondPackage::all();
        // Gunakan Resource Collection untuk konsistensi
        return DiamondPackageResource::collection($packages);
    }
}
