<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/barangs', [BarangController::class, 'index']);
Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
Route::get('/barangs/{id}', [BarangController::class, 'show']);
Route::get('/barangs/{id}/edit', [BarangController::class, 'edit']);
Route::get('/barangs/{id}/delete', [BarangController::class, 'delete']);
