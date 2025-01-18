<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log; // Untuk mencatat log jika diperlukan

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cek apakah tabel 'kategori' sudah ada
        if (!Schema::hasTable('kategori')) {
            Schema::create('kategori', function (Blueprint $table) {
                $table->id();
                $table->string('kategori');
                $table->timestamps(); // Tambahkan timestamps jika diperlukan
            });
        } else {
            // Tabel sudah ada, catat pesan sukses
            Log::info('Tabel kategori sudah ada, tidak perlu dibuat ulang.');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cek apakah tabel 'kategori' ada sebelum menghapusnya
        if (Schema::hasTable('kategori')) {
            Schema::dropIfExists('kategori');
        }
    }
};
