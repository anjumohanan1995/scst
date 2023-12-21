<?php

namespace App\Exports;

use App\Hospital;
use Maatwebsite\Excel\Concerns\FromCollection;

class HospitalReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Hospital::all();
    }
}
