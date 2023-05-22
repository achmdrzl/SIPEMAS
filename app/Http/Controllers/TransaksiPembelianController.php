<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiPembelianController extends Controller
{
    public function transaksi_pembelian()
    {
        return view('pembelian.transaksi-pembelian');
    }
}
