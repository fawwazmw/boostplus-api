<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // GANTI 'akun' menjadi 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password'); // Menambahkan role
        });
    }

    public function down(): void
    {
        // GANTI 'akun' menjadi 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
