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
        // Cek apakah tabel 'bahasa' sudah ada
        if (!Schema::hasTable('bahasa')) {
            Schema::create('bahasa', function (Blueprint $table) {
                $table->id();
                $table->string('bahasa')->unique();
                $table->timestamps(); // Tambahkan timestamps jika diperlukan
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cek apakah tabel 'bahasa' ada sebelum menghapusnya
        if (Schema::hasTable('bahasa')) {
            Schema::dropIfExists('bahasa');
        }
    }
};
