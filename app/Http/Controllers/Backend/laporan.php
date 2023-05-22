<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class laporan extends Controller
{
    public function laporan_stok()
    {
        return view('laporan.stok-barang');
    }
    public function laporan_rekap_stok()
    {
        return view('laporan.rekap-stok-barang');
    }
}
