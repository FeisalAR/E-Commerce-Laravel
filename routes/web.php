<?php

use App\Http\Controllers\ProdukController;
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
