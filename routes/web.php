<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;

//AUTH
use App\Http\Controllers\auth\Index;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartaiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PPTController;
use App\Http\Controllers\PTTController;
use App\Http\Controllers\SPPDController;
use App\Http\Controllers\SuratMasukController;

//end


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

//AUTH
Route::get('/login', [Index::class, 'index']);
//end


// dashboard
Route::get('/', [DashboardController::class, 'index']);

Route::get('/login', [AuthController::class, 'index']);

Route::post('/authenticate', [AuthController::class, 'authenticate']);

// Partai
Route::get('/partai', [PartaiController::class, 'index']);
Route::post('/partai/store', [PartaiController::class, 'store']);
Route::post('/partai/delete/{id}', [PartaiController::class, 'delete']);
Route::get('/partai/edit/{id}', [PartaiController::class, 'edit']);
Route::post('/partai/update/{id}', [PartaiController::class, 'update']);

// Anggota
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/anggota/store', [AnggotaController::class, 'store']);
Route::get('/anggota/detail/{id}', [AnggotaController::class, 'detail']);
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
Route::post('/anggota/update/{id}', [AnggotaController::class, 'update']);
Route::post('/anggota/delete/{id}', [AnggotaController::class, 'delete']);

// pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::post('/pegawai/store', [PegawaiController::class, 'store']);
Route::get('/pegawai/detail/{id}', [PegawaiController::class, 'detail']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update']);
Route::post('/pegawai/delete/{id}', [PegawaiController::class, 'delete']);

// surat masuk
Route::get('/suratmasuk', [SuratMasukController::class, 'index']);
Route::get('/suratmasuk/detail/{id}', [SuratMasukController::class, 'detail']);
Route::post('/suratmasuk/store', [SuratMasukController::class, 'store']);
Route::get('/suratmasuk/edit/{id}', [SuratMasukController::class, 'edit']);
Route::post('/suratmasuk/update/{id}', [SuratMasukController::class, 'update']);
Route::post('/suratmasuk/delete/{id}', [SuratMasukController::class, 'delete']);

// SPPD
Route::get('/sppd', [SPPDController::class, 'index']);
Route::get('/sppd/add', [SPPDController::class, 'create']);
Route::post('/sppd/store', [SPPDController::class, 'store']);
Route::get('/sppd/detail/{id}', [SPPDController::class, 'detail']);
Route::post('/sppd/delete/{id}', [SPPDController::class, 'delete']);


Route::get('/ptt', [PTTController::class, 'index']);
Route::post('/ptt/store', [PTTController::class, 'store']);


Route::get('/umum', function () {
    return view('index');
});

// ppt

Route::get('/public', function() {
    echo public_path('uploads/');
});
