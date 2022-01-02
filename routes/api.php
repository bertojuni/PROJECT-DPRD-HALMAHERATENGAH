<?php

use App\Http\Controllers\ApiController;
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

Route::get('/getallprovince', [ApiController::class, 'getAllProvince']);
Route::get('/getprovince/{id}', [ApiController::class, 'getProvince']);

Route::get('/getallcity', [ApiController::class, 'getAllCity']);
Route::get('/getcity/{id}', [ApiController::class, 'getCityByID']);
Route::get('/getcityprovince/{id}', [ApiController::class, 'getCityByIDProvince']);

Route::get('/getallsubdistrict', [ApiController::class, 'getAllSubdistrict']);
Route::get('/getsubdistrict/{id}', [ApiController::class, 'getSubdistrictByID']);
Route::get('/getsubdistrictcity/{id}', [ApiController::class, 'getSubdistrictByIDCity']);

Route::get('/getallanggota', [ApiController::class, 'getAllAnggotaDPRD']);

Route::get('/getallpegawai', [ApiController::class, 'getAllPendampingPegawai']);
Route::get('/getallptt', [ApiController::class, 'getAllPendampingPTT']);
