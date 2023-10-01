<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPembelianExcel implements FromView
{
    protected $pembelians;
    protected $startDate;
    protected $endDate;

    public function __construct($pembelians, $startDate, $endDate)
    {
        $this->pembelians = $pembelians;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view('layout-print.rekap-pembelian', [
            'pembelians' => $this->pembelians,
            'startDate'  => $this->startDate, // Use $this to access the class property
            'endDate'    => $this->endDate,     // Use $this to access the class property
        ]);
    }
}
