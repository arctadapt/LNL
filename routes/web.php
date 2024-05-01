<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\keluarKampusController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerpindahanKelasController;
use App\Http\Controllers\SuratTelatController;
use Illuminate\Support\Facades\Route;

Route::controller(SiswaController::class)->group(function(){
    Route::get('siswa', 'index')->name('siswa.index');
    Route::post('siswa-import', 'import')->name('siswa.import');
    Route::delete('siswa/delete/{id}', 'delete')->name('siswa.delete');
});
Route::controller(KelasController::class)->group(function(){
    Route::get('kelas', 'index')->name('kelas.index');
    Route::post('kelas-import', 'import')->name('kelas.import');
    Route::delete('kelas/delete/{id}', 'delete')->name('kelas.delete');
});

Route::get('terlambat', [SuratTelatController::class, 'index'])->name('terlambat.index');
Route::post('terlambat/store', [SuratTelatController::class, 'store'])->name('terlambat.store');

Route::redirect('/','keluar-kampus');
Route::resource('keluar-kampus', keluarKampusController::class);
Route::post('keluar-kampus/storeIzinkeluar', [KeluarKampusController::class, 'storeIzinkeluar'])->name('keluar-kampus.storeIzinkeluar');
Route::post('keluar-kampus/storePindahkelas', [KeluarKampusController::class, 'storePindahkelas'])->name('keluar-kampus.storePindahkelas');
Route::post('keluar-kampus/storeSuratTamu', [KeluarKampusController::class, 'storeSuratTamu'])->name('keluar-kampus.storeSuratTamu');

