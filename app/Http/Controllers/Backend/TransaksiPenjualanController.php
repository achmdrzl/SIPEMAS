<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    public function transaksi_penjualan()
    {
        return view('penjualan.transaksi-penjualan');
    }

    public function retur_penjualan()
    {
        return view('penjualan.retur-penjualan');
    }public function invoice_penjualan()
    {
        return view('penjualan.invoice-struk-penjualan');
    }
}
