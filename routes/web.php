<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\keluarKampusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuratTelatController;
use Illuminate\Support\Facades\Route;

// Admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(SiswaController::class)->group(function () {
        Route::get('siswa', 'index')->name('siswa.index');
        Route::post('siswa-import', 'import')->name('siswa.import');
        Route::delete('siswa/delete/{id}', 'delete')->name('siswa.delete');
    });

    Route::controller(KelasController::class)->group(function () {
        Route::get('kelas', 'index')->name('kelas.index');
        Route::post('kelas-import', 'import')->name('kelas.import');
        Route::delete('kelas/delete/{id}', 'delete')->name('kelas.delete');
    });

    Route::controller(DataSiswaController::class)->group(function () {
        Route::get('data', 'index')->name('data.index');
        Route::get('data/izin', 'izin')->name('data.izin');

        Route::get('data/terlambat', 'terlambat')->name('data.terlambat');
        Route::delete('data/terlambat/delete/{id}', 'lateDelete')->name('data.lateDelete');
        Route::get('data/terlambat/filter', 'filterLate')->name('filter.terlambat');

        Route::get('data/guest', 'guest')->name('data.guest');
        Route::delete('data/guest/delete/{id}', 'guestDelete')->name('data.guestDelete');
        Route::get('data/guest/filter', 'filterGuest')->name('filter.guest');
    });
});

// User
Route::controller(SuratTelatController::class)->group(function () {
    Route::get('terlambat', 'index')->name('terlambat.index');
    Route::post('terlambat/store', 'store')->name('terlambat.store');
});

Route::redirect('/', 'keluar-kampus');
Route::get('/', [DashboardUserController::class, 'index'])->name('home');

Route::resource('keluar-kampus', keluarKampusController::class);

Route::controller(keluarKampusController::class)->group(function () {
    Route::post('keluar-kampus/storeIzinkeluar', 'storeIzinkeluar')->name('keluar-kampus.storeIzinkeluar');
    Route::post('keluar-kampus/storePindahkelas', 'storePindahkelas')->name('keluar-kampus.storePindahkelas');
    Route::post('keluar-kampus/storeSuratTamu',  'storeSuratTamu')->name('keluar-kampus.storeSuratTamu');
    Route::get('/pdf/{filename}', 'showPdf')->name('showPdf');
});

// etc
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
