<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnPenjualanController extends Controller
{
    public function returnPenjualanIndex()
    {
        return view('penjualan.return-penjualan');
    }
}
