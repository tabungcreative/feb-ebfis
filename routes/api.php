<?php

use App\Http\Controllers\Api\BeritaApiController;
use App\Http\Controllers\Api\DosenApiController;
use App\Http\Controllers\Api\FasilitasApiController;
use App\Http\Controllers\Api\MahasiswaApiController;
use App\Http\Controllers\Api\PengumumanApiController;
use App\Http\Controllers\Api\ProgramApiController;
use App\Http\Controllers\Api\UnduhanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/berita', BeritaApiController::class)->only('index', 'show');
Route::resource('/dosen', DosenApiController::class)->only('index', 'show');
Route::resource('/fasilitas', FasilitasApiController::class)->only('index', 'show');
Route::resource('/mahasiswa', MahasiswaApiController::class)->only('index', 'show');
Route::resource('/pengumuman', PengumumanApiController::class)->only('index', 'show');
Route::resource('/program', ProgramApiController::class)->only('index', 'show');
Route::resource('/unduhan', UnduhanApiController::class)->only('index', 'show');
