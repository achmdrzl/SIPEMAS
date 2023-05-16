<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function supplier()
    {
        return view('masterdata.data-supplier');
    }

    public function model(){
        return view('masterdata.data-model');
    }
}
