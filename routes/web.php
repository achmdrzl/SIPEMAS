<?php

use App\Http\Controllers\Backend\MasterBarangController;
use App\Http\Controllers\Backend\MasterDataController;
use App\Http\Controllers\Backend\TransaksiPenjualanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', MasterDataController::class. '@index');
Route::get('/transaksi_penjualan', TransaksiPenjualanController::class. '@transaksi_penjualan');
Route::get('/barang', MasterBarangController::class. '@list_barang');
Route::get('/supplier', MasterDataController::class. '@supplier');
Route::get('/model', MasterDataController::class. '@model');

