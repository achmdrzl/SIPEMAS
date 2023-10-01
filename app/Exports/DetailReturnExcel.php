<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DetailReturnExcel implements FromView
{
    protected $returnpenjualans;
    protected $startDate;
    protected $endDate;

    public function __construct($returnpenjualans, $startDate, $endDate)
    {
        $this->returnpenjualans = $returnpenjualans;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view('layout-print.detail-returnpenjualan', [
            'returnpenjualans' => $this->returnpenjualans,
            'startDate'        => $this->startDate, // Use $this to access the class property
            'endDate'          => $this->endDate,     // Use $this to access the class property
        ]);
    }
}
