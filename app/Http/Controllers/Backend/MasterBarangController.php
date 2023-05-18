<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function list_barang()
    {
        return view('data-barang');
    }
}
