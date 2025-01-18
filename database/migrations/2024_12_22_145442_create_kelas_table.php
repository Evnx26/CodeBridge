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
        // Cek apakah tabel 'jawaban' sudah ada
        if (!Schema::hasTable('kelas')) {
            Schema::create('kelas', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('deskripsi');
                $table->string('author');
                $table->string('harga');
                $table->string('kategori');
                $table->string('bahasa');
                $table->string('foto');
                
            });
        } else {
            // Tabel sudah ada, catat pesan sukses
            Log::info('Tabel jawaban sudah ada, tidak perlu dibuat ulang.');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cek apakah tabel 'jawaban' ada sebelum menghapusnya
        if (Schema::hasTable('jawaban')) {
            Schema::dropIfExists('jawaban');
        }
    }
};
