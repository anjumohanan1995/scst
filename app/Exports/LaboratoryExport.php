<?php

namespace App\Exports;

use App\Laboratory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;
class LaboratoryExport implements FromCollection,WithHeadings
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
        return Laboratory::select('name','mobile','abha','adhar','test_name','amount','date','time')->where('deleted_at',null)->get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Mobile',
            'Abha Number',
            'Aadhar Number',
            'Test Name',
            'Amount',
            'Time',
            'Date',


        ];
    }
}
