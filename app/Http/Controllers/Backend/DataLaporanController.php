<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataLaporanController extends Controller
{
    public function historyBarang()
    {
        return view('laporan.history-barang');
    }
    public function laporanStockIndex()
    {
        return view('laporan.rekap-stok-barang');
    }
}
