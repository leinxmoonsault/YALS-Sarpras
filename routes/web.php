<?php

use App\Http\Controllers\LaporanSarprasKelasController;
use App\Http\Controllers\LaporanSarprasRuanganController;
use App\Http\Controllers\ManageKelasController;
use App\Http\Controllers\ManageRequestSarprasController;
use App\Http\Controllers\ManageRuanganController;
use App\Http\Controllers\ManageSarprasKelasController;
use App\Http\Controllers\ManageSarprasRuanganController;
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
        Route::get('Existed/{id}', [\App\Http\Controllers\ManageSarprasKelasController::class,'getExistedData'])->name('getExisted.data');
        Route::resource('Aksi', ManageSarprasKelasController::class);
    });

    Route::group(['prefix'  =>  'YALS/Administrator/Manage/Ruangan/'], function () {
        Route::get('/', [\App\Http\Controllers\ManageRuanganController::class, 'index'])->name('homeruangan');
        Route::get('List', [\App\Http\Controllers\ManageRuanganController::class, 'getRuangan'])->name('ruangan.list');
        Route::resource('Go', ManageRuanganController::class);
    });
    
    Route::group(['prefix'  =>  'YALS/Administrator/Manage/Sarpras/Ruangan/'], function () {
        Route::get('/', [\App\Http\Controllers\ManageSarprasRuanganController::class, 'index'])->name('homesarprasruangan');      
        Route::get('Edit', [\App\Http\Controllers\ManageSarprasRuanganController::class,'editDataSarprasRuangan'])->name('editdatasarprasruangan');
        Route::get('List', [\App\Http\Controllers\ManageSarprasRuanganController::class,'getSarprasRuangan'])->name('saprasRuangan.list');
        Route::get('Existed/{id}', [\App\Http\Controllers\ManageSarprasRuanganController::class,'getExistedRuanganData'])->name('getExistedRuangan.data');
        Route::resource('Do', ManageSarprasRuanganController::class);
    });

    Route::group(['prefix'  =>  'YALS/Administrator/Laporan/Sarpras/Kelas/'], function () {
        Route::get('/', [\App\Http\Controllers\LaporanSarprasKelasController::class, 'index'])->name('homelaporansarpraskelas');      
        Route::get('List', [\App\Http\Controllers\LaporanSarprasKelasController::class,'getLaporanSarprasKelas'])->name('laporanSaprasKelas.list');
        Route::get('Existed/{id}', [\App\Http\Controllers\LaporanSarprasKelasController::class,'getExistedLaporanData'])->name('getExistedLaporan.data');
        Route::get('Pass/Cetak-Laporan-Sarpras/{id}',[\App\Http\Controllers\LaporanSarprasKelasController::class, 'print_laporan_sarpras'])->name('print_laporan_sarpras');
        Route::resource('Pass', LaporanSarprasKelasController::class);
    });

    Route::group(['prefix'  =>  'YALS/Administrator/Laporan/Sarpras/Ruangan/'], function () {
        Route::get('/', [\App\Http\Controllers\LaporanSarprasRuanganController::class, 'index'])->name('homelaporansarprasruangan');      
        Route::get('List', [\App\Http\Controllers\LaporanSarprasRuanganController::class,'getLaporanSarprasRuangan'])->name('laporanSaprasRuangan.list');
        Route::get('Existed/{id}', [\App\Http\Controllers\LaporanSarprasRuanganController::class,'getExistedLaporanRuanganData'])->name('getExistedLaporanRuangan.data');
        Route::get('Toss/Cetak-Laporan-Sarpras/{id}',[\App\Http\Controllers\LaporanSarprasRuanganController::class, 'print_laporan_sarpras_ruangan'])->name('print_laporan_sarpras_ruangan');
        Route::resource('Toss', LaporanSarprasRuanganController::class);
    });

    Route::group(['prefix'  =>  'YALS/Administrator/Manage/Request/Sarpras/'], function () {
        Route::get('/', [\App\Http\Controllers\ManageRequestSarprasController::class, 'index'])->name('homereqsarpras');      
        Route::get('Edit', [\App\Http\Controllers\ManageRequestSarprasController::class,'editReqSarpras'])->name('editReqSarpras');
        Route::get('List', [\App\Http\Controllers\ManageRequestSarprasController::class,'getReqSarpras'])->name('reqSapras.list');
        Route::get('Existed/{id}', [\App\Http\Controllers\ManageRequestSarprasController::class,'getExistedReqData'])->name('getExistedReq.data');
        Route::resource('Try', ManageRequestSarprasController::class);
    });
});
