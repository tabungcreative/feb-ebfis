<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UnduhanController;
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




Route::controller(AuthController::class)
    ->prefix('auth')
    ->as('auth.')
    ->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/callback', 'callback')->name('callback');
    });

Route::get('/', function () {
    return redirect('auth/login');
});
// Route::middleware('custom-auth')->group(function () {
Route::get('/dashboard', function () {
    return view('index');
});
// route resource crud
Route::resource('/berita', BeritaController::class);
Route::resource('/dosen', DosenController::class);
Route::resource('/fasilitas', FasilitasController::class);
Route::resource('/mahasiswa', MahasiswaController::class);
Route::post('/import-mahasiswa', [MahasiswaController::class, 'import']);
Route::resource('/pengumuman', PengumumanController::class);
Route::resource('/program', ProgramController::class);
Route::resource('/unduhan', UnduhanController::class);
// });
