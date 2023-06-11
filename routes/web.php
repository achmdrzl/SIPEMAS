<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DataLaporanController;
use App\Http\Controllers\Backend\laporan;
use App\Http\Controllers\Backend\MasterBarangController;
use App\Http\Controllers\Backend\MasterDataController;
use App\Http\Controllers\Backend\ReturnPenjualanController;
use App\Http\Controllers\Backend\TransaksiPembelianController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['role:admin', 'auth']], function () {

    // Dashboard User
    Route::get('/dashboard', MasterDataController::class . '@index')->name('dashboard.index');

    // MASTER USER
    Route::get('/user', MasterDataController::class . '@userIndex')->name('user.index');
    Route::post('/userStore', MasterDataController::class. '@userStore')->name('user.store');
    Route::post('/userEdit', MasterDataController::class. '@userEdit')->name('user.edit');
    Route::post('/userDestroy', MasterDataController::class. '@userDestroy')->name('user.destroy');

    Route::post('/pabrikStore', MasterDataController::class. '@pabrikStore')->name("pabrik.store");
    // MASTER PABRIK
    Route::get('/pabrik', MasterDataController::class . '@pabrikIndex')->name('pabrik.index');
    
    // Transaksi Pembelian Section
    Route::get('/pembelian', TransaksiPembelianController::class . '@transaksi_pembelian')->name('pembelian.index');

    // Transaksi Penjualan Section
    Route::get('/penjualan', TransaksiPenjualanController::class . '@transaksi_penjualan')->name('penjualan.index');

    // Transaksi Return Penjualan Section
    Route::get('/return_penjualan', ReturnPenjualanController::class . '@returnPenjualanIndex')->name('return.index');

    // Master Data Barang Section
    Route::get('/barang', MasterBarangController::class . '@barangIndex')->name('barang.index');

    // Master Data Supplier Section
    Route::get('/supplier', MasterDataController::class . '@supplierIndex')->name('supplier.index');

    // Master Data Model Section
    Route::get('/model', MasterDataController::class . '@modelIndex')->name('model.index');

    // Laporan Section
    Route::get('/laporan_stock', DataLaporanController::class . '@laporanStockIndex')->name('laporanStock.index');
    Route::get('/history_barang', DataLaporanController::class . '@historyBarang')->name('history.barang');


    Route::get('/invoice_penjualan', TransaksiPenjualanController::class . '@invoice_penjualan');
});




// Route::get('/login', function () {
//     return view('login');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
