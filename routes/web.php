<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
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
    Route::get('/', 'index')->name('siswa.index');
    Route::post('siswa-import', 'import')->name('siswa.import');
});
Route::controller(KelasController::class)->group(function(){
    Route::get('kelas', 'index')->name('kelas.index');
    Route::post('kelas-import', 'import')->name('kelas.import');
});

