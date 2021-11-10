<?php

use Illuminate\Support\Facades\Route;

//AUTH
use App\Http\Controllers\auth\Index;
use App\Http\Controllers\PartaiController;

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
Route::get('/', function() {
    return view('keuangan/index');
});


// Partai
Route::get('/partai', [PartaiController::class, 'index']);
Route::post('/partai/store', [PartaiController::class, 'store']);
Route::post('/partai/delete/{id}', [PartaiController::class, 'delete']);

Route::get('/umum', function () {
    return view('index');
});
