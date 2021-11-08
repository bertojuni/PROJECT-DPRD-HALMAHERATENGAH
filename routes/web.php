<?php

use Illuminate\Support\Facades\Route;

//AUTH
use App\Http\Controllers\auth\Index;
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
Route::get('/', [Index::class, 'index']);
//end

Route::get('/umum', function () {
    return view('index');
});
