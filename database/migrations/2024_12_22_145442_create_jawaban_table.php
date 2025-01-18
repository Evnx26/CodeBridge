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
        if (!Schema::hasTable('jawaban')) {
            Schema::create('jawaban', function (Blueprint $table) {
                $table->id();
                $table->string('id_user');
                $table->string('id_kelas');
                $table->string('id_quiz');
                $table->string('nama_quiz');
                $table->string('nilai');
                $table->timestamps(); // Tambahkan timestamps jika diperlukan
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
