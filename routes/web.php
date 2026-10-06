<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HitungTotalSksController;
use App\Http\Controllers\Laporan\RekapController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QueryBuilderDemoController;
use App\Http\Controllers\SapaController;
use App\Http\Controllers\StatistikMahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, ini adalah route pertama saya!';
});

Route::get('/sapa', function () {
    return view('sapa', [
        'nama' => 'Muhammad Ajidannoor Arsyad',
        'kontenHtml' => '<strong>Teks Tebal</strong>',
    ]);
});

Route::get('/latihan-blade', function () {
    return view('latihan-blade', [
        'mahasiswa' => Mahasiswa::all(),
        'xss' => "<script>alert('XSS')</script>",
    ]);
});

Route::get('/profil', function () {
    return view('profil')
        ->with('nama', 'Nama Anda')
        ->with('nim', '2024010001')
        ->with('prodi', 'Teknik Informatika');
});

Route::get('/akademik/statistik', function () {
    return view('akademik.statistik', [
        'totalMahasiswa' => Mahasiswa::count(),
    ]);
});

Route::get('/kontak', function () {
    return 'Ini halaman kontak';
});

Route::get('/tentang', function () {
    return 'Ini halaman tentang';
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ---- Controller (Praktikum 1-3) ----
Route::get('/sapa-closure', function () {
    $nama = 'Ahmad Fauzi';
    return "Halo, {$nama}! Ini ditulis langsung di route.";
});
Route::get('/sapa-controller', [SapaController::class, 'index']);
Route::get('/latihan', [LatihanController::class, 'index']);
Route::get('/statistik', StatistikMahasiswaController::class);
Route::get('/total-sks', HitungTotalSksController::class);
Route::get('/laporan/rekap', [RekapController::class, 'index'])->name('laporan.rekap');

// Praktikum 2: Request, JSON, pencarian
Route::get('/mahasiswa-uji', [MahasiswaController::class, 'formUji']);
Route::post('/mahasiswa-uji', [MahasiswaController::class, 'storeUji']);
Route::get('/api/mahasiswa-contoh', [MahasiswaController::class, 'apiIndex']);
Route::get('/mahasiswa-cari', [MahasiswaController::class, 'formCari'])->name('mahasiswa.cari');
Route::get('/mahasiswa-cari/hasil', [MahasiswaController::class, 'cariMahasiswa'])->name('mahasiswa.cari.hasil');
Route::get('/mahasiswa-banding-query', [MahasiswaController::class, 'bandingQuery']);

// ---- Query Builder (Praktikum 5) ----
Route::prefix('demo/qb')->name('demo.qb.')->controller(QueryBuilderDemoController::class)->group(function () {
    Route::get('/', 'tampilkanSemua')->name('semua');
    Route::get('/filter', 'tampilkanFilter')->name('filter');
    Route::get('/tugas-filter', 'tugasFilter')->name('tugas');
    Route::get('/statistik-prodi', 'statistikProdi')->name('statistik');
    Route::get('/paginasi', 'paginasi')->name('paginasi');
    Route::get('/tambah', 'formTambah')->name('tambah');
    Route::post('/tambah', 'simpan')->name('simpan');
    Route::get('/ubah/{nim}', 'ubah')->name('ubah');
    Route::get('/hapus/{nim}', 'hapus')->name('hapus');
});

// ---- Resource controller + Route Model Binding ----
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MatakuliahController::class);
