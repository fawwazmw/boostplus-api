<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Sebaiknya ditambahkan
use Illuminate\Database\Eloquent\Model;

class DiamondPackage extends Model
{
    use HasFactory; // Sebaiknya ditambahkan

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'diamonds',
        'price',
        'image_url',
    ];
}
