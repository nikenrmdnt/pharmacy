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

Route::get('/', function () {
    return view('home');
})->name('login')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\usercontroller::class)->middleware('auth');
Route::resource('obat', \App\Http\Controllers\obatcontroller::class)->middleware('auth');
Route::resource('distributor', \App\Http\Controllers\distributorcontroller::class)->middleware('auth');
Route::resource('penjualan', \App\Http\Controllers\penjualancontroller::class)->middleware('auth');
Route::resource('pembelian', \App\Http\Controllers\pembeliancontroller::class)->middleware('auth');
Route::resource('detail_penjualan', \App\Http\Controllers\detail_penjualancontroller::class)->middleware('auth');
Route::resource('detail_pembelian', \App\Http\Controllers\detail_pembeliancontroller::class)->middleware('auth');
Route::get('/laporanpj', [App\Http\Controllers\laporancontroller::class, 'laporan'])->name('laporan');
Route::get('/download-laporan-pdf', [App\Http\Controllers\laporancontroller::class, 'downloadpdf']);
Route::get('/laporanpb', [App\Http\Controllers\laporanpbcontroller::class, 'laporan'])->name('laporan');
Route::get('/download-laporanpb-pdf', [App\Http\Controllers\laporanpbcontroller::class, 'downloadpdf']);
Route::get('/laporandpj', [App\Http\Controllers\laporandpjcontroller::class, 'laporan'])->name('laporan');
Route::get('/download-laporandpj-pdf', [App\Http\Controllers\laporandpjcontroller::class, 'downloadpdf']);
Route::get('/laporandpb', [App\Http\Controllers\laporandpbcontroller::class, 'laporan'])->name('laporan');
Route::get('/download-laporandpb-pdf', [App\Http\Controllers\laporandpbcontroller::class, 'downloadpdf']);
