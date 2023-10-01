<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPenerimaanExcel implements FromView
{
    protected $penerimaans;
    protected $startDate;
    protected $endDate;

    public function __construct($penerimaans, $startDate, $endDate)
    {
        $this->penerimaans = $penerimaans;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view('layout-print.rekap-penerimaan', [
            'penerimaans' => $this->penerimaans,
            'startDate'   => $this->startDate, // Use $this to access the class property
            'endDate'     => $this->endDate,     // Use $this to access the class property
        ]);
    }
}
