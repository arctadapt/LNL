<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(SiswaController::class)->group(function(){
    Route::get('/', 'index')->name('siswa.index');
    Route::post('siswa-import', 'import')->name('siswa.import');
    Route::delete('siswa/delete/{id}', 'delete')->name('siswa.delete');
});
Route::controller(KelasController::class)->group(function(){
    Route::get('kelas', 'index')->name('kelas.index');
    Route::post('kelas-import', 'import')->name('kelas.import');
    Route::delete('kelas/delete/{id}', 'delete')->name('kelas.delete');
});

