<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UnduhanController;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('index');
});




// route resource crud
Route::resource('/berita', BeritaController::class);
Route::resource('/dosen', DosenController::class);
Route::resource('/fasilitas', FasilitasController::class);
Route::resource('/mahasiswa', MahasiswaController::class);
Route::post('/import-mahasiswa', function () {
    try {
        Excel::import(new MahasiswaImport, request()->file('file'));
        return response()->redirectTo(route('mahasiswa.index'))->with('success', 'Berhasil import mahasiswa');
    } catch (\Exception $exception) {
        return redirect()->back()->with('error', 'Gagal import mahasiswa, file yang anda masukkan tidak cocok');
    }
});
Route::resource('/pengumuman', PengumumanController::class);
Route::resource('/program', ProgramController::class);
Route::resource('/unduhan', UnduhanController::class);
