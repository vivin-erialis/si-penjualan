<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\CetakLaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Controller\SewaContoller;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PetugasBarangController;
use App\Http\Controllers\PetugasProdukController;
use App\Http\Controllers\PetugasSewaController;
use App\Http\Controllers\PetugasTransaksiController;
use App\Http\Controllers\SewaController;
use App\Http\Middleware\CheckLevel;


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

//Dashboard Admin
Route::middleware(['auth', 'CheckLevel:admin'])->group(function () {
    Route::get('/dashboardadmin', [HomeController::class, 'index']);
    Route::resource('/admin/kategoribarang', KategoriBarangController::class);
    Route::resource('/admin/kategoriproduk', KategoriProdukController::class);
    Route::resource('/admin/barang', BarangController::class);
    Route::resource('/admin/produk', ProdukController::class);
    Route::get('/admin/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/admin/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::post('/admin/komponen', [ProdukController::class, 'store'])->name('produk_komponen.store');

    Route::resource('/admin/penjualan', PenjualanController::class);
    Route::resource('/admin/transaksi', TransaksiController::class);
    Route::resource('/admin/sewa', SewaController::class);
    Route::resource('/admin/petugas', StaffController::class);
    Route::get('/admin/cetakpenjualan', [CetakLaporanController::class, 'cetaklaporanpenjualan'])->name('cetaklaporanpenjualan');
    Route::get('/admin/cetakbuktisewa', [SewaController::class, 'cetakbuktisewa'])->name('cetakbuktisewa');
    Route::get('/admin/penjualan/by-date-range', [PenjualanController::class, 'getDataByDateRange']);
    Route::get('/register', function () {
        return view('register');
    });

    //Action Register untuk membuat akun petugas oleh admin
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/action', [StaffController::class, 'actionregister'])->name('actionregister');
});

// Ganti Password
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/gantipassword', 'App\Http\Controllers\GantiPasswordController@showChangePasswordForm')->name('ganti.password');
    Route::post('/admin/gantipassword', 'App\Http\Controllers\GantiPasswordController@changePassword')->name('ganti.password.post');
});


// Dashboard Petugas
Route::middleware(['auth', 'CheckLevel:petugas'])->group(function () {
    Route::get('/dashboardpetugas', [HomeController::class, 'indexPetugas']);
    Route::resource('/petugas/produk', PetugasProdukController::class);
    // Route::get('/petugas/produk/create', [PetugasProdukController::class, 'create'])->name('produk.create');
    // Route::post('/petugas/produk', [PetugasProdukController::class, 'store'])->name('produk.store');
    Route::post('/petugas/komponen', [ProdukController::class, 'store'])->name('produk_komponen.store');
    Route::resource('/petugas/sewa', PetugasSewaController::class);
    Route::resource('/petugas/barang', PetugasBarangController::class);
    Route::resource('/petugas/transaksi', PetugasTransaksiController::class);

});

//Action Login
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'authenticate']);

//Galeri
Route::resource('/galeri', GaleriController::class);
