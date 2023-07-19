<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Middleware\CheckLevel;
use App\Models\Barang;

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

Route::get('/', function () {
    return view('login');
});

//Dashboard
Route::middleware(['auth', 'CheckLevel:admin'])->group(function () {
    Route::get('/dashboardadmin', [HomeController::class, 'index']);
    Route::resource('/admin/kategoribarang', KategoriBarangController::class);
    Route::resource('/admin/kategoriproduk', KategoriProdukController::class);
    Route::resource('/admin/barang', BarangController::class);
    Route::resource('/admin/produk', ProdukController::class);
    Route::resource('/admin/penjualan', PenjualanController::class);
    Route::resource('/admin/barangMasuk', BarangMasukController::class);
    Route::resource('/admin/barangKeluar', BarangKeluarController::class);



});

Route::middleware(['auth', 'CheckLevel:petugas'])->group(function () {
    Route::get('/dashboardpetugas', [HomeController::class, 'index']);
    Route::resource('/kategori', KategoriController::class);

   
});


Route::get('/register', function () {
    return view('register');
});


//Action Register
Route::get('register', [RegisterController::class,'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

//Action Login
Route::get ('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post ('/logout', [LoginController::class,'logout']);
Route::post ('/login', [LoginController::class,'authenticate']);



//Barang Masuk
// Route::resource('/barangMasuk', BarangMasukController::class)->middleware('auth');

//Barang
// Route::resource('/barang', BarangController::class)->middleware('auth');