<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

// Route untuk halaman utama
Route::get('/', [KaryawanController::class, 'index']);

// Route untuk karyawan
Route::resource('karyawan', KaryawanController::class);
