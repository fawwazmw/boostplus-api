<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Menambahkan foreign key ke tabel users
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users') // Nama tabelnya 'users'
                ->onDelete('set null')
                ->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Cara yang benar untuk drop foreign key
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
