<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SiswaController;
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

Route::get('/', [ProdukController::class, 'index']);

Route::get('/kategori-produk', [ProdukController::class, 'cetakKategoriProduk']);

Route::get('/checkout', [ProdukController::class, 'checkout']);

Route::get('/registrasi', [ProdukController::class, 'registrasi']);

Route::get('/login', [ProdukController::class, 'login']);

Route::get('/produk', [ProdukController::class, 'index']);

Route::get('/produk/create', [ProdukController::class, 'create']);

Route::post('/produk', [ProdukController::class, 'store']);


//Module 5 Update
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);

Route::patch('/produk/{id}', [ProdukController::class, 'update']);

Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);



//Module 4 Routes for SiswaController
Route::get('/kategori-kelas', [SiswaController::class, 'kategoriKelas']);

Route::get('/kategori-kelas/create', [SiswaController::class, 'createKelas']);

Route::post('/kategori-kelas', [SiswaController::class, 'storeKelas']);



Route::get('/siswa', [SiswaController::class, 'cetakSiswa']);

Route::get('/siswa/create', [SiswaController::class, 'createSiswa']);

Route::post('/siswa', [SiswaController::class, 'storeSiswa']);
