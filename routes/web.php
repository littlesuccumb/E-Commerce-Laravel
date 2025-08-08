<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ProductController::class)->group(
    function () {
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');
        Route::get('/product/catalog', [ProductController::class, 'catalog'])->name('product.catalog');
    
        });

Route::controller(TransaksiController::class)->group(
    function () {
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
        Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
        Route::get('/transaksi/search', [TransaksiController::class, 'search'])->name('transaksi.search');
        Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
        Route::get('/transaksi/laporan', [TransaksiController::class, 'laporan'])->name('transaksi.laporan');
        Route::get('/transaksi/searchLaporan', [TransaksiController::class, 'searchLaporan'])->name('transaksi.searchLaporan');

    });
  

Route::controller(UserController::class)->group(
    function () {
        Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [UserController::class, 'login'])->name('login');
        Route::post('/register', [UserController::class, 'register'])->name('register.submit');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::put('/user/{id}/updatePhoto', [UserController::class, 'updatePhoto'])->name('user.updatePhoto');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    

});

Route::controller(HomeController::class)->group(
    function () {
        Route::get('/', 'index');
        Route::get('/profil', [HomeController::class, 'profil'])->name('profil');


});

