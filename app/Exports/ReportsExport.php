<?php

namespace App\Exports;

use App\Models\Reports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;


class ReportsExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        return Reports::all();
    }
}

