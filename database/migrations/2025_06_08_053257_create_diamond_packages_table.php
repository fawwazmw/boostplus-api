<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diamond_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: '86 Diamonds'
            $table->integer('diamonds'); // Contoh: 86
            $table->unsignedInteger('price'); // Contoh: 15000 (harga dalam Rupiah)
            $table->string('image_url')->nullable(); // Jika ada gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diamond_packages');
    }
};
