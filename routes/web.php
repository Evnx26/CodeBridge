<?php

use App\Http\Controllers\BahasaController;
use App\Http\Controllers\CekController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasAktifController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout'])->name('/logout');
Route::post('processRegister', [LoginController::class, 'insert_register'])->name("processRegister");

//hakakses
Route::get('/cek', [CekController::class, 'index']);

//login admin
Route::post('processLoginuser', [LoginController::class, 'processLoginuser'])->name("processLoginuser");

//admin bahasa
Route::get('/bahasa/list', [BahasaController::class, 'index']);
//insertbahasa
Route::post('tambah/bahasa', [BahasaController::class, 'insert_bahasa'])->name("tambah/bahasa");
//update
Route::post('hapus/bahasa/{id}', [BahasaController::class, 'delete'])->name('hapus/bahasa');;
Route::post('update/bahasa/{id}', [BahasaController::class, 'update'])->name('update/bahasa');

//admin kategori
Route::get('/kategori/list', [KategoriController::class, 'index']);
//insert kategori
Route::post('tambah/kategori', [KategoriController::class, 'insert_kategori'])->name("tambah/kategori");
//update
Route::post('hapus/kategori/{id}', [KategoriController::class, 'delete'])->name('hapus/kategori');
Route::post('update/kategori/{id}', [KategoriController::class, 'update'])->name('update/kategori');

// admin kelas
Route::post('tambah/kelas', [KelasController::class, 'insert_kelas'])->name("tambah/kelas");
//update
Route::post('hapus/kelas/{id}', [KelasController::class, 'delete'])->name('hapus/kelas');
Route::post('update/kelas/{id}', [KelasController::class, 'update'])->name('update/kelas');
Route::get('/kelas/list', [KelasController::class, 'index']);

//manage kelas
Route::get('manage/kelas/{id}', [KelasController::class, 'manage_kelas'])->name('manage/kelas');
Route::get('tambah_modul/{idnya}', [KelasController::class, 'tambah_modul'])->name('manage/kelas');

//tambah modul
Route::post('insert/modul', [KelasController::class, 'insert_modul'])->name("insert/modul");
//edit modul
Route::post('edit/modul/{id}', [KelasController::class, 'edit_modul'])->name('edit/modul');
Route::get('/modul/edit/{id}', [KelasController::class, 'modul_edit']);
Route::get('/lihat/modul/{id}', [KelasController::class, 'lihat_modul']);

//Quix tmbah
Route::post('tambah/quiz', [KelasController::class, 'tambah_quiz'])->name('tambah/quiz');

//
Route::get('/in/pertanyaan/{id}', [KelasController::class, 'pertanyaan']);
//insert pertanyaan
Route::post('/quiz/insert/{idnya}', [KelasController::class, 'manage_pertanyaan'])->name('quiz.insert');
Route::get('/edit/pertanyaan/{id}', [KelasController::class, 'editPertanyaan'])->name('edit.pertanyaan');
Route::post('/quiz/update/{id_quiz}', [KelasController::class, 'updatePertanyaan'])->name('/quiz/update');
 


//User
Route::get('/user/dashboard', [HomeController::class, 'index_user']);
Route::get('/daftar/kelas', [HomeController::class, 'daftar_kelas']);

//detail kelas
Route::get('/beli/kelas/{id}', [HomeController::class, 'detail_kelas'])->name('/beli/kelas');
Route::post('/pembelian/kelas', [HomeController::class, 'insert_beli_kelas'])->name('/pembelian/kelas');

//admin_transaksi
Route::post('hapus/transaksi/{id}', [TransaksiController::class, 'delete'])->name('hapus/transaksi');
Route::post('update/transaksi/{id}', [TransaksiController::class, 'update'])->name('update/transaksi');
Route::get('/transaksi/list', [TransaksiController::class, 'index']);

Route::get('/history/transaksi', [TransaksiController::class, 'index_user']);


//kelas aktif
Route::get('/kelas/aktif', [KelasAktifController::class, 'index']);
Route::post('update/transaksi_user/{id}', [TransaksiController::class, 'update_user'])->name('update/transaksi_user');
// tuang kelas
Route::get('/ruang/kelas/{id}', [KelasAktifController::class, 'ruang_kelas'])->name('/ruang/kelas');

//isiquiz
Route::get('/isi/quiz/{id}', [KelasAktifController::class, 'ruang_ujian'])->name('/isi/quiz');
//submit quiz
Route::post('quiz/submit/{id_quiz}', [KelasAktifController::class, 'submit_ujian'])->name('quiz.submit');

//registr
Route::get('/register', [LoginController::class, 'register']);
Route::get('/hasil/quiz/{id}', [KelasAktifController::class, 'hasil_quiz'])->name('hasil/quiz');

//qris
Route::get('/qris/list', [TransaksiController::class, 'indexqris']);
Route::post('update/qris/{id}', [TransaksiController::class, 'updateqris'])->name('update/qris');

//landingpage
Route::get('landingpage', [CekController::class, 'landingpage']);
Route::get('errorpage',[CekController::class, 'errorpage']);
 