<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DataLaporanController;
use App\Http\Controllers\Backend\laporan;
use App\Http\Controllers\Backend\MasterBarangController;
use App\Http\Controllers\Backend\MasterDataController;
use App\Http\Controllers\Backend\ReturnPenjualanController;
use App\Http\Controllers\Backend\TransaksiPembelianController;
use App\Http\Controllers\Backend\TransaksiPenerimaanController;
use App\Http\Controllers\Backend\TransaksiPengeluaranController;
use App\Http\Controllers\Backend\TransaksiPenjualanController;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPengeluaran;
use App\Models\TransaksiPenjualan;
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

    // DASHBOARD USER
    Route::get('/dashboard', MasterDataController::class . '@index')->name('dashboard.index');

    // MASTER USER
    Route::get('/user', MasterDataController::class . '@userIndex')->name('user.index');
    Route::post('/userStore', MasterDataController::class . '@userStore')->name('user.store');
    Route::post('/userEdit', MasterDataController::class . '@userEdit')->name('user.edit');
    Route::post('/userDestroy', MasterDataController::class . '@userDestroy')->name('user.destroy');

    // MASTER PABRIK
    Route::get('/pabrik', MasterDataController::class . '@pabrikIndex')->name('pabrik.index');
    Route::post('/pabrikStore', MasterDataController::class . '@pabrikStore')->name("pabrik.store");
    Route::post('/pabrikEdit', MasterDataController::class . '@pabrikEdit')->name('pabrik.edit');
    Route::post('/pabrikDestroy', MasterDataController::class . '@pabrikDestroy')->name('pabrik.destroy');

    // MASTER KADAR
    Route::get('/kadar', MasterDataController::class . '@kadarIndex')->name('kadar.index');
    Route::post('/kadarStore', MasterDataController::class . '@kadarStore')->name("kadar.store");
    Route::post('/kadarkEdit', MasterDataController::class . '@kadarEdit')->name('kadar.edit');
    Route::post('/kadarDestroy', MasterDataController::class . '@kadarDestroy')->name('kadar.destroy');

    // MASTER MODEL
    Route::get('/model', MasterDataController::class . '@modelIndex')->name('model.index');
    Route::post('/modelStore', MasterDataController::class . '@modelStore')->name("model.store");
    Route::post('/modelkEdit', MasterDataController::class . '@modelEdit')->name('model.edit');
    Route::post('/modelDestroy', MasterDataController::class . '@modelDestroy')->name('model.destroy');

    // MASTER SUPPLIER
    Route::get('/supplier', MasterDataController::class . '@supplierIndex')->name('supplier.index');
    Route::post('/supplierStore', MasterDataController::class . '@supplierStore')->name("supplier.store");
    Route::post('/supplierkEdit', MasterDataController::class . '@supplierEdit')->name('supplier.edit');
    Route::post('/supplierDestroy', MasterDataController::class . '@supplierDestroy')->name('supplier.destroy');

    // MASTER MERK
    Route::get('/merk', MasterDataController::class . '@merkIndex')->name('merk.index');
    Route::post('/merkStore', MasterDataController::class . '@merkStore')->name("merk.store");
    Route::post('/merkkEdit', MasterDataController::class . '@merkEdit')->name('merk.edit');
    Route::post('/merkDestroy', MasterDataController::class . '@merkDestroy')->name('merk.destroy');

    // MASTER DATA TRANSAKSI PENDAPATAN LAIN / PENGELUARAN
    Route::get('/transaksi-in_out', MasterDataController::class . '@transaksi_in_out')->name('transaksi.in.out');
    Route::post('/transaksiInOutStore', MasterDataController::class . '@transaksiInOutStore')->name('transaksiInOut.store');
    Route::post('/transaksiInOutEdit', MasterDataController::class . '@transaksiInOutEdit')->name('transaksiInOut.Edit');
    Route::post('/transaksiInOutDestroy', MasterDataController::class . '@transaksiInOutDestroy')->name('transaksiInOut.Destroy');
    Route::get('/loadInOut', MasterDataController::class . '@loadInOut')->name('load.in.out');

    // MASTER DATA TRANSAKSI HUTANG
    Route::get('/transaksi-hutang', MasterDataController::class . '@transaksiHutang')->name('transaksi.hutang');
    Route::post('/transaksiHutangStore', MasterDataController::class . '@transaksiHutangStore')->name('transaksiHutang.store');
    Route::post('/transaksiHutangEdit', MasterDataController::class . '@transaksiHutangEdit')->name('transaksiHutang.Edit');
    Route::post('/transaksiHutangDestroy', MasterDataController::class . '@transaksiHutangDestroy')->name('transaksiHutang.Destroy');
    Route::get('/loadHutang', MasterDataController::class . '@loadHutang')->name('load.hutang');

    // TRANSAKSI PEMBELIAN
    Route::get('/pembelian', TransaksiPembelianController::class . '@transaksi_pembelian')->name('pembelian.index');
    Route::get('/pembelianBarang', TransaksiPembelianController::class . '@barangIndex')->name('pembelian.barang.index');
    Route::post('/pembelianStore', TransaksiPembelianController::class . '@pembelianStore')->name('pembelian.store');
    Route::post('/pembelianDetail', TransaksiPembelianController::class . '@pembelianDetail')->name('pembelian.detail');
    Route::post('/filterdDatePembelian', TransaksiPembelianController::class . '@filterdata')->name('filtered.data.pembelian');

    // TRANSAKSI PENJUALAN
    Route::get('/penjualan', TransaksiPenjualanController::class . '@transaksi_penjualan')->name('penjualan.index');
    Route::get('/penjualanBarang', TransaksiPenjualanController::class . '@barangIndex')->name('penjualan.barang.index');
    Route::post('/loadSelectedBarang', TransaksiPenjualanController::class . '@loadSelectedBarang')->name('load.barangSelected');
    Route::post('/penjualanStore', TransaksiPenjualanController::class . '@penjualanStore')->name('penjualan.store');
    Route::post('/penjualanDetail', TransaksiPenjualanController::class . '@penjualanDetail')->name('penjualan.detail');
    Route::post('/filterdDatePenjualan', TransaksiPenjualanController::class . '@filterdata')->name('filtered.data.penjualan');
    Route::get('/cetakFakturPenjualan', TransaksiPenjualanController::class . '@cetakFakturPenjualan')->name('cetak.faktur.penjualan');
    Route::get('/latest-penjualan', [TransaksiPenjualanController::class, 'getLatestPenjualanId']);

    // TRANSAKSI PENJUALAN RETURN
    Route::get('/return_penjualan', ReturnPenjualanController::class . '@returnPenjualanIndex')->name('penjualan.return.index');
    Route::get('/returnBarang', ReturnPenjualanController::class. '@barangIndex')->name('return.barang.index');
    Route::post('/return_penjualanStore', ReturnPenjualanController::class . '@returnPenjualanStore')->name('penjualan.return.store');
    Route::post('/returnDetail', ReturnPenjualanController::class . '@returnDetail')->name('penjualan.return.detail');
    Route::post('/filterdDatePenjualanReturn', ReturnPenjualanController::class . '@filterdata')->name('filtered.data.penjualan.return');

    // TRANSAKSI PENGELUARAN BARANG
    Route::get('/pengeluaran', TransaksiPengeluaranController::class . '@pengeluaranIndex')->name('pengeluaran.index');
    Route::post('/pengeluaranDetail', TransaksiPengeluaranController::class . '@pengeluaranDetail')->name('pengeluaran.detail');
    Route::post('/pengeluaranStore', TransaksiPengeluaranController::class . '@pengeluaranStore')->name('pengeluaran.store');
    Route::post('filterDatePengeluaran', TransaksiPengeluaranController::class . '@filterdata')->name('filtered.data.pengeluaran');

    // TRANSAKSI PENERIMAAN BARANG
    Route::get('/penerimaan', TransaksiPenerimaanController::class . '@penerimaanIndex')->name('penerimaan.index');
    Route::get('/penerimaanBarang', TransaksiPenerimaanController::class . '@barangIndex')->name('penerimaan.barang.index');
    Route::post('/penerimaanStore', TransaksiPenerimaanController::class . '@penerimaanStore')->name('penerimaan.store');
    Route::post('/filteredDatePenerimaan', TransaksiPenerimaanController::class . '@filterdata')->name('filtered.data.penerimaan');


    Route::get('/cekRelasi', function () {
        $pengeluarans   =   TransaksiPengeluaran::with(['pengeluarandetail', 'supplier'])->latest()->get();

        return $pengeluarans;
    });

    // MASTER DATA BARANG
    Route::get('/barang', MasterBarangController::class . '@barangIndex')->name('barang.index');
    Route::post('/barangStore', MasterBarangController::class . '@barangStore')->name('barang.store');
    Route::post('/barangkEdit', MasterBarangController::class . '@barangEdit')->name('barang.edit');
    Route::post('/barangDestroy', MasterBarangController::class . '@barangDestroy')->name('barang.destroy');
    Route::post('/barangPindahEtalase', MasterBarangController::class . '@barangPindahEtalase')->name('barang.etalase');
    Route::get('/barangDetail/{barang_id}', MasterBarangController::class . '@barangDetail')->name('barang.detail');
    Route::post('/barangBarcode', MasterBarangController::class . '@barangBarcode')->name('barang.barcode');
    Route::get('/barangCetak', MasterBarangController::class . '@barangCetak')->name('barang.cetak');
    Route::get('/loadBerat', MasterBarangController::class . '@loadBerat')->name('load.berat');

    // MASTER DATA SUPPLIER
    Route::get('/supplier', MasterDataController::class . '@supplierIndex')->name('supplier.index');

    // MASTER DATA MODEL
    Route::get('/model', MasterDataController::class . '@modelIndex')->name('model.index');

    // LAPORAN SECTION ROUTE
    // PEMBELIAN
    Route::get('/laporanPembelian', DataLaporanController::class . '@laporanPembelianIndex')->name('laporan.pembelian.index');
    Route::get('/laporanPembelianDetail', DataLaporanController::class . '@laporanPembelianIndexDetail')->name('laporan.pembelianDetail.index');
    Route::get('/cetakPembelian', DataLaporanController::class . '@cetakPembelian')->name('cetak.pembelian');

    // PENJUALAN
    Route::get('/laporanPenjualan', DataLaporanController::class . '@laporanPenjualanIndex')->name('laporan.penjualan.index');
    Route::get('/laporanPenjualanDetail', DataLaporanController::class . '@laporanPenjualanIndexDetail')->name('laporan.penjualanDetail.index');
    Route::get('/cetakPenjualan', DataLaporanController::class . '@cetakPenjualan')->name('cetak.penjualan');

    // RETURNPENJUALAN
    Route::get('/laporanReturnPenjualan', DataLaporanController::class . '@laporanReturnPenjualanIndex')->name('laporan.returnPenjualan.index');
    Route::get('/laporanReturnPenjualanDetail', DataLaporanController::class . '@laporanReturnPenjualanIndexDetail')->name('laporan.returnPenjualanDetail.index');
    Route::get('/cetakReturn', DataLaporanController::class . '@cetakReturn')->name('cetak.return');

    // PENGELUARAN
    Route::get('/laporanPengeluaran', DataLaporanController::class . '@laporanPengeluaranIndex')->name('laporan.pengeluaran.index');
    Route::get('/laporanPengeluaranDetail', DataLaporanController::class . '@laporanPengeluaranIndexDetail')->name('laporan.pengeluaranDetail.index');
    Route::get('/cetakPengeluaran', DataLaporanController::class . '@cetakPengeluaran')->name('cetak.pengeluaran');

    // PENERIMAAN
    Route::get('/laporanPenerimaan', DataLaporanController::class . '@laporanPenerimaanIndex')->name('laporan.penerimaan.index');
    Route::get('/laporanPenerimaanDetail', DataLaporanController::class . '@laporanPenerimaanIndexDetail')->name('laporan.penerimaanDetail.index');
    Route::get('/cetakPenerimaan', DataLaporanController::class . '@cetakPenerimaan')->name('cetak.penerimaan');

    // HUTANG
    Route::get('/laporanHutang', DataLaporanController::class . '@laporanHutang')->name('laporan.hutang.index');
    Route::get('/cetakHutang', DataLaporanController::class . '@cetakHutang')->name('cetak.hutang');

    // PENDAPATAN - PENGELUARAN LAIN
    Route::get('/laporanInOut', DataLaporanController::class . '@laporanInOut')->name('laporan.inOut.index');
    Route::get('/cetakInOut', DataLaporanController::class . '@cetakInOut')->name('cetak.inOut');

    // STOCK
    Route::get('/laporanStock', DataLaporanController::class . '@laporanStock')->name('laporan.stock.index');
    Route::get('/cetakStock', DataLaporanController::class . '@cetakStock')->name('cetak.stock');

    // HISTORY BARANG
    Route::get('/laporanHistory', DataLaporanController::class . '@laporanHistoryBarang')->name('laporan.history.index');
    Route::get('/cetakHistory', DataLaporanController::class . '@cetakHistory')->name('cetak.history');

    //Get Data Filter For Laporan
    Route::post('/filterData', DataLaporanController::class . '@filter_data')->name('filter_data');
    Route::post('/filteredPembelian', DataLaporanController::class . '@sortingPembelian')->name('sorting.pembelian');
    Route::post('/filteredPenjualan', DataLaporanController::class . '@sortingPenjualan')->name('sorting.penjualan');
    Route::post('/filteredReturnPenjualan', DataLaporanController::class . '@sortingReturnPenjualan')->name('sorting.returnPenjualan');
    Route::post('/filteredPengeluaran', DataLaporanController::class . '@sortingPengeluaran')->name('sorting.pengeluaran');
    Route::post('/filteredPenerimaan', DataLaporanController::class . '@sortingPenerimaan')->name('sorting.penerimaan');
    Route::post('/filteredHutang', DataLaporanController::class . '@sortingHutang')->name('sorting.hutang');
    Route::post('/filteredInOut', DataLaporanController::class . '@sortingInOut')->name('sorting.inOut');
    Route::post('/filteredStock', DataLaporanController::class . '@sortingStock')->name('sorting.stock');
    Route::post('/filteredHistory', DataLaporanController::class . '@sortingHistory')->name('sorting.history');

    // END LAPORAN SECTION ROUTE

    // INVOICE PENJUALAN
    Route::get('/invoice_penjualan', TransaksiPenjualanController::class . '@invoice_penjualan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
