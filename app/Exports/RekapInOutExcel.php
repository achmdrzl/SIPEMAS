<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RekapInOutExcel implements FromView
{
    protected $inOuts;
    protected $startDate;
    protected $endDate;

    public function __construct($inOuts, $startDate, $endDate)
    {
        $this->inOuts    = $inOuts;
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }

    public function view(): View
    {
        return view('layout-print.rekap-inOut', [
            'inOuts'     => $this->inOuts,
            'startDate'  => $this->startDate, // Use $this to access the class property
            'endDate'    => $this->endDate,     // Use $this to access the class property
        ]);
    }
}
