<?php

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

Route::get('/',[\App\Http\Controllers\AuthController::class, 'Login'])->name('Login');
Route::post('/Login/Process', [\App\Http\Controllers\AuthController::class, 'ProsesLoginAdmin'])->name('proseslogiadmin');
Route::post('/Logout', [\App\Http\Controllers\AuthController::class, 'Logout'])->name('pagelogoutadmin');

// Admin
Route::group(['middleware' => ['auth','cekRole:Admin|Sarpras']], function (){
    Route::get('YALS/Administrator/Home',[\App\Http\Controllers\BackendController::class, 'Home'])->name('home');

});
