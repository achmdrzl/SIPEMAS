<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPengeluaranExcel implements FromView
{
    protected $pengeluarans;
    protected $startDate;
    protected $endDate;

    public function __construct($pengeluarans, $startDate, $endDate)
    {
        $this->pengeluarans = $pengeluarans;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view('layout-print.rekap-pengeluaran', [
            'pengeluarans' => $this->pengeluarans,
            'startDate'  => $this->startDate, // Use $this to access the class property
            'endDate'    => $this->endDate,     // Use $this to access the class property
        ]);
    }
}
