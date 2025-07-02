<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ImageController;

// ✅ 1. Redirect / ke login
Route::get('/', fn () => redirect()->route('login'));

// ✅ 2. Route login & logout (tidak perlu login untuk mengakses ini)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ 3. Semua route penting diproteksi middleware login + maintenance
Route::middleware(['check.login', 'toko.maintenance'])->group(function () {

    // 🏠 Halaman utama setelah login
    Route::get('/home', fn () => view('welcome'))->name('home');

    // 📦 Barang
    Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
    Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
    Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
    Route::get('/barangs/{id}', [BarangController::class, 'show'])->name('barangs.show');
    Route::delete('/barangs/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');
    Route::post('/barangs/cari', [BarangController::class, 'searchByName'])->name('barangs.search');

    // 💰 Transaksi Penjualan
    Route::get('/transaksis', [TransaksiController::class, 'index'])->name('transaksis.index');
    Route::get('/transaksis/create', [TransaksiController::class, 'create'])->name('transaksis.create');
    Route::post('/transaksis', [TransaksiController::class, 'store'])->name('transaksis.store');
    Route::resource('transaksis', TransaksiController::class)->except(['index', 'create', 'store']);

    // 🖼️ Upload Gambar
    Route::get('/upload', [ImageController::class, 'create']);
    Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
    Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.delete');
    
});
