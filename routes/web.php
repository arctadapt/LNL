<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\keluarKampusController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerpindahanKelasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(SiswaController::class)->group(function(){
    Route::get('siswa', 'index')->name('siswa.index');
    Route::post('siswa-import', 'import')->name('siswa.import');
});
Route::controller(KelasController::class)->group(function(){
    Route::get('kelas', 'index')->name('kelas.index');
    Route::post('kelas-import', 'import')->name('kelas.import');
});
Route::redirect('/','keluar-kampus');
Route::resource('keluar-kampus', keluarKampusController::class);
Route::post('keluar-kampus/storeIzinkeluar', [KeluarKampusController::class, 'storeIzinkeluar'])->name('keluar-kampus.storeIzinkeluar');
Route::post('keluar-kampus/storePindahkelas', [KeluarKampusController::class, 'storePindahkelas'])->name('keluar-kampus.storePindahkelas');

