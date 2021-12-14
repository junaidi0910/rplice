<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PpaController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SuratDaftarHadirController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\TugasPribadiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/masuk', [AuthController::class, 'login'])->name('masuk');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('tanda', SignController::class);
Route::resource('ppa', PpaController::class);
Route::resource('berita_acara', BeritaAcaraController::class);
Route::get('/validasi/berita_acara/{id}', [BeritaAcaraController::class, 'showValidasi'])->name('berita_acara.validasi');
Route::put('/validasi/berita_acara/{id}', [BeritaAcaraController::class, 'takenValidasi'])->name('berita_acara.validate');
Route::get('/unduh/berita_acara/{id}', [BeritaAcaraController::class, 'download'])->name('berita_acara.download');
Route::resource('surat_tugas', SuratTugasController::class);
Route::put('/validasi/surat_tugas/{id}', [SuratTugasController::class, 'validasi'])->name('surat_tugas.validate');
Route::get('/download/surat_tugas/{id}', [SuratTugasController::class, 'download'])->name('surat_tugas.download');

// surat daftar hadir
Route::resource('surat_daftar_hadir', SuratDaftarHadirController::class);
Route::get('/undih/surat_daftar_hadir/{id}', [SuratDaftarHadirController::class, 'unduh'])->name('surat_daftar_hadir.unduh');
Route::resource('tugas_pribadi', TugasPribadiController::class);
Route::put('/validasi/tugas_pribadi/{id}', [TugasPribadiController::class, 'validasi'])->name('tugas_pribadi.validasi');
Route::get('/download/tugas_pribadi/{id}', [TugasPribadiController::class, 'download'])->name('tugas_pribadi.download');
Route::resource('arsip', ArsipController::class);
Route::get('/getData', [ChartController::class, 'chart'])->name('chart');