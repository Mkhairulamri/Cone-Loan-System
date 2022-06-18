<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Log;

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

Route::get('/',[LoginController::class,'index'])->name('index');
Route::get('/lupa-password',[LoginController::class,'lupa_password'])->name('lupa_password');
Route::post('/reset-password',[LoginController::class,'reset_password'])->name('reset_password');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::post('/login', [LoginController::class,'login'])->name('login');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

    //Route Halaman Profil
    Route::get('/profil',[AdminController::class,'profil'])->name('profil');
    Route::post('/update_profil',[AdminController::class,'update_profil'])->name('update_profil');

    //Route Halaman Data-Cone
    Route::get('/data-cone',[AdminController::class,'data_cone'])->name('data_cone');

    //Route halamn pengadaan cone
    Route::get('/pengadaan-cone',[AdminController::class,'pengadaan_cone'])->name('pengadaan_cone');
    Route::post('/tambah-pengadaan',[AdminController::class,'tambah_pengadaan'])->name('tambah_pengadaan');
    Route::post('/update-pengadaan',[AdminController::class,'update_pengadaan'])->name('update_pengadaan');
    // Route::get('/hapus_pengadaan/{$id}',[AdminController::class,'hapus_pengadaan']);

    //Route halaman daftar Peminjaman
    Route::get('/daftar-peminjaman',[AdminController::class,'daftar_peminjaman'])->name('daftar_peminjaman');
    Route::get('/tambah_peminjaman',[AdminController::class,'tambah_peminjaman'])->name('tambah_peminjaman');
    Route::get('/detail/{id}',[AdminController::class,'detail']);
    Route::get('/edit/{id}',[AdminController::class,'edit']);
    Route::post('/tambah',[AdminController::class,'simpan_peminjaman'])->name('tambah_p');
    Route::get('/hapus_peminjaman/{id}',[AdminController::class,'hapus_peminjaman']);
    Route::post('/update_status',[AdminController::class,'update_status'])->name('update_status');
    
   
    //Route Riwayat Peminjaman Cone
    Route::get('/riwayat-peminjaman',[AdminController::class,'riwayat_peminjaman'])->name('riwayat_peminjaman');

    //Route Uji Coba aja
    Route::get('/test',[AdminController::class,'test'])->name('coba');

});