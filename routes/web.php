<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;

/*
| HALAMAN AWAL
*/
Route::get('/', function () {
    return view('welcome');
});

/*
| DASHBOARD
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
| PROFILE
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
| ADMIN (FULL CRUD + LAPORAN)
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // CRUD PENUH
        Route::resource('barang', BarangController::class);
        Route::resource('barang-masuk', BarangMasukController::class);
        Route::resource('barang-keluar', BarangKeluarController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('lokasi', LokasiController::class);

        // LAPORAN
        Route::get('/laporan/stok', [BarangController::class, 'laporan'])->name('laporan.stok');
        Route::get('/laporan/barang-habis', [BarangController::class, 'barangHampirHabis'])->name('laporan.hampirhabis');
    });

/*
| PETUGAS (READ ONLY)
*/
Route::middleware(['auth', 'role:petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        Route::resource('barang', BarangController::class)->only(['index', 'show']);
        Route::resource('barang-masuk', BarangMasukController::class)->only(['index', 'show']);
        Route::resource('barang-keluar', BarangKeluarController::class)->only(['index', 'show']);

        // Laporan
        Route::get('/laporan/stok', [BarangController::class, 'laporan'])->name('laporan.stok');
        Route::get('/laporan/barang-habis', [BarangController::class, 'barangHampirHabis'])->name('laporan.hampirhabis');
    });

/*
| PIMPINAN (READ ONLY)
*/
Route::middleware(['auth', 'role:pimpinan'])
    ->prefix('pimpinan')
    ->name('pimpinan.')
    ->group(function () {

        Route::resource('barang', BarangController::class)->only(['index', 'show']);
        Route::resource('barang-masuk', BarangMasukController::class)->only(['index', 'show']);
        Route::resource('barang-keluar', BarangKeluarController::class)->only(['index', 'show']);

        Route::get('/laporan/stok', [BarangController::class, 'laporan'])->name('laporan.stok');
        Route::get('/laporan/barang-habis', [BarangController::class, 'barangHampirHabis'])->name('laporan.hampirhabis');
    });

require __DIR__ . '/auth.php';
