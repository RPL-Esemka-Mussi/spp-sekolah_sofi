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


// Login + Middleware guest
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);

});

//Page Routes + Middleware auth
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\LoginController::class, 'dashboard']);
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

    //USER
    Route::get('/user/tampil', [App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create']);
    Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit']);
    Route::post('/user/update/{id}', [App\Http\Controllers\UsersController::class, 'update']);
    Route::get('/user/destroy/{id}', [App\Http\Controllers\UsersController::class, 'destroy']);

    //CRUD SPP
    Route::get('/spp/tampil', [App\Http\Controllers\SppController::class, 'index']);
    Route::get('/spp/tambah', [App\Http\Controllers\SppController::class, 'create']);
    Route::post('/spp/store', [App\Http\Controllers\SppController::class, 'store']);
    Route::get('/spp/edit/{id}', [App\Http\Controllers\SppController::class, 'edit']);
    Route::post('/spp/update/{id}', [App\Http\Controllers\SppController::class, 'update']);
    Route::get('/spp/destroy/{id}', [App\Http\Controllers\SppController::class, 'destroy']);

    //CRUD KELAS
    Route::get('/kelas/tampil', [App\Http\Controllers\KelasController::class, 'index']);
    Route::get('/kelas/tambah', [App\Http\Controllers\KelasController::class, 'create']);
    Route::post('/kelas/store', [App\Http\Controllers\KelasController::class, 'store']);
    Route::get('/kelas/edit/{id}', [App\Http\Controllers\KelasController::class, 'edit']);
    Route::post('/kelas/update/{id}', [App\Http\Controllers\KelasController::class, 'update']);
    Route::get('/kelas/destroy/{id}', [App\Http\Controllers\KelasController::class, 'destroy']);

    //CRUD SISWA
    Route::get('/siswa/tampil', [App\Http\Controllers\SiswaController::class, 'index']);
    Route::get('/siswa/tambah', [App\Http\Controllers\SiswaController::class, 'create']);
    Route::post('/siswa/store', [App\Http\Controllers\SiswaController::class, 'store']);
    Route::get('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit']);
    Route::post('/siswa/update/{id}', [App\Http\Controllers\SiswaController::class, 'update']);
    Route::get('/siswa/destroy/{id}', [App\Http\Controllers\SiswaController::class, 'destroy']);

    //CRUD PEMBAYARAN
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/transaksi/{id}', [PembayaranController::class, 'transaksi']);
    Route::get('/pembayaran/tambah', [PembayaranController::class, 'tambah']);
    Route::post('/pembayaran/simpan', [PembayaranController::class, 'simpan']);
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
    Route::post('/pembayaran/update', [PembayaranController::class, 'update']);
    Route::get('/pembayaran/hapus/{id}', [PembayaranController::class, 'hapus']);

});



//CRUD FIKTIF
Route::get('/user/tambah', [App\Http\Controllers\LoginController::class, 'createUser']);

?>
