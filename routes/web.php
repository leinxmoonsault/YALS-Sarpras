<?php

use App\Http\Controllers\ManageKelasController;
use App\Http\Controllers\ManageSarprasKelasController;
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

Route::get('/',[\App\Http\Controllers\AuthController::class, 'Login'])->name('login');
Route::post('/Login/Process', [\App\Http\Controllers\AuthController::class, 'ProsesLoginAdmin'])->name('proseslogiadmin');
Route::post('/Logout', [\App\Http\Controllers\AuthController::class, 'Logout'])->name('pagelogoutadmin');

// Admin
Route::group(['middleware'  =>  ['auth', 'cekRole:Admin,Sarpras']], function (){
    Route::get('YALS/Administrator/Home', [\App\Http\Controllers\AdminController::class, 'index'])->name('home');

    Route::group(['prefix'  =>  'YALS/Administrator/Manage/Kelas/'], function () {
        Route::get('/', [\App\Http\Controllers\ManageKelasController::class, 'index'])->name('homekelas');
        Route::get('List', [\App\Http\Controllers\ManageKelasController::class, 'getKelas'])->name('kelas.list');
        Route::resource('Action', ManageKelasController::class);
    });

    Route::group(['prefix'  =>  'YALS/Administrator/Manage/Sarpras/Kelas/'], function () {
        Route::get('/', [\App\Http\Controllers\ManageSarprasKelasController::class, 'index'])->name('homesarpraskelas');      
        Route::get('Edit', [\App\Http\Controllers\ManageSarprasKelasController::class,'editDataSarprasKelas'])->name('editdatasarpras');
        Route::get('List', [\App\Http\Controllers\ManageSarprasKelasController::class,'getSarprasKelas'])->name('saprasKelas.list');
        Route::resource('Aksi', ManageSarprasKelasController::class);
    });
});
