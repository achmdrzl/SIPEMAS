<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiPembelianController extends Controller
{
    public function transaksi_pembelian()
    {
        return view('pembelian.pembelian-index');
    }
}
