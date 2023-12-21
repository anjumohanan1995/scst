<?php

namespace App\Exports;

use App\Diagonosis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;
class DiagnosisExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    /* public function collection()
    {
        return Laboratory::all();
    } */
    public function collection()
    {
        return Diagonosis::select('name','mobile','abha','adhar','diagonosis_name','amount','date','time')->where('deleted_at',null)->get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Mobile',
            'Abha Number',
            'Aadhar Number',
            'Diagonosis',
            'Amount',
            'Time',
            'Date',


        ];
    }
}
