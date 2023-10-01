<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RekapHistory implements FromView
{
    protected $barangs;

    public function __construct($barangs)
    {
        $this->barangs    = $barangs;
    }

    public function view(): View
    {
        return view('layout-print.rekap-history', [
            'barangs'     => $this->barangs,
        ]);
    }
}
