<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RekapHutangExcel implements FromView
{
    protected $hutangs;
    protected $startDate;
    protected $endDate;

    public function __construct($hutangs, $startDate, $endDate)
    {
        $this->hutangs = $hutangs;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view('layout-print.rekap-hutang', [
            'hutangs'    => $this->hutangs,
            'startDate'  => $this->startDate, // Use $this to access the class property
            'endDate'    => $this->endDate,     // Use $this to access the class property
        ]);
    }
}
