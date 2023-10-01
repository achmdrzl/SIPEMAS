<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPenjualanExcel implements FromView
{
    protected $penjualans;
    protected $startDate;
    protected $endDate;

    public function __construct($penjualans, $startDate, $endDate)
    {
        $this->penjualans = $penjualans;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view('layout-print.rekap-penjualan', [
            'penjualans' => $this->penjualans,
            'startDate'  => $this->startDate, // Use $this to access the class property
            'endDate'    => $this->endDate,     // Use $this to access the class property
        ]);
    }
}
