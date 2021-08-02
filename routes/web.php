<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FrontController::class,'welcome']);
Route::get('/produk',[FrontController::class,'produk']);
Route::get('/produk/{produk}',[FrontController::class,'showProduk']);
Route::view('/summary', 'summary');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart',[FrontController::class,'cart']);
    Route::post('/cart',[CartController::class,'store']);
    Route::post('/transaksi',[TransaksiController::class,'store']);
});
Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/produk', [DashboardController::class,'produk']);
    Route::get('/dashboard/kategori', [DashboardController::class,'kategori']);
    Route::get('/dashboard/transaksi', [DashboardController::class,'transaksi']);
    Route::get('/dashboard/admin', [DashboardController::class,'admin']);
    Route::get('/dashboard/customer', [DashboardController::class,'customer']);

    Route::post('/produk',[ProdukController::class,'store']);
    Route::put('/produk/{produk}',[ProdukController::class,'update']);
    Route::delete('/produk/{produk}',[ProdukController::class,'destroy']);

    Route::post('/kategori',[KategoriController::class,'store']);
    Route::put('/kategori/{kategori}',[KategoriController::class,'update']);
    Route::delete('/kategori/{kategori}',[KategoriController::class,'destroy']);

    Route::put('/transaksi/{transaksi}',[TransaksiController::class,'update']);


});
