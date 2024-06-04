<?php

use App\Http\Controllers\AlternatifKontroller;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\BobotKontroller;
use App\Http\Controllers\NormalisasiBobotKontroller;
use App\Http\Controllers\SubKriteriaKontroller;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\WargaController;
use App\Models\Perhitungan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::controller(KriteriaController::class)->prefix('kriteria')->group(function(){
    Route::get('', 'index')->name('kriteria');
    Route::get('tambah', 'tambah')->name('kriteria.tambah');
    Route::post('tambah', 'simpan')->name('kriteria.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('kriteria.edit');
    Route::post('edit/{id}', 'update')->name('kriteria.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('kriteria.hapus');
});

Route::controller(WargaController::class)->prefix('warga')->group(function(){
    Route::get('', 'index')->name('warga');
    Route::get('tambah', 'tambah')->name('warga.tambah');
    Route::post('tambah', 'simpan')->name('warga.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('warga.edit');
    Route::post('edit/{id}', 'update')->name('warga.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('warga.hapus');
});

Route::controller(BobotKontroller::class)->prefix('bobot')->group(function(){
    Route::get('', 'index')->name('bobot');
    // Route::get('normalisasi', 'normalisasi')->name('bobot.normalisasi');
    Route::get('tambah', 'tambah')->name('bobot.tambah');
    Route::post('tambah', 'simpan')->name('bobot.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('bobot.edit');
    Route::post('edit/{id}', 'update')->name('bobot.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('bobot.hapus');
});

// Route::controller(NormalisasiBobotKontrollerKontroller::class)->group(function(){
//     Route::post('/normalisasi-bobot', 'normalisasi')->name('normalisasi.bobot');
// });

Route::post('/normalisasi-bobot', [NormalisasiBobotKontroller::class, 'normalisasi'])->name('normalisasi.bobot');

Route::controller(SubKriteriaKontroller::class)->prefix('subkriteria')->group(function(){
    Route::get('', 'index')->name('subkriteria');
    Route::get('tambah', 'tambah')->name('subkriteria.tambah');
    Route::post('tambah', 'simpan')->name('subkriteria.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('subkriteria.edit');
    Route::post('edit/{id}', 'update')->name('subkriteria.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('subkriteria.hapus');
});

Route::controller(AlternatifKontroller::class)->prefix('alternatif')->group(function(){
    Route::get('', 'index')->name('alternatif');
    Route::get('tambah', 'tambah')->name('alternatif.tambah');
    Route::post('tambah', 'simpan')->name('alternatif.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('alternatif.edit');
    Route::post('edit/{id}', 'update')->name('alternatif.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('alternatif.hapus');
});

Route::controller(PerhitunganController::class)->prefix('perhitungan')->group(function(){
    Route::get('', 'index')->name('perhitungan');
});
