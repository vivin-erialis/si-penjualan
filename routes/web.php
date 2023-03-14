<?php

use App\Http\Controllers\BarangMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;


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
Route::get('/dashboard', function () {
    return view('dashboard.layouts.main');
})->middleware('auth');

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

//Kategori Dashboard
Route::resource('/kategori', KategoriController::class)->middleware('auth');

//Barang Masuk
Route::resource('/barangMasuk', BarangMasukController::class)->middleware('auth');