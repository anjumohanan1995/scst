<?php

namespace App\Exports;

use App\Pharmacy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;
class PharmacyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    /* public function collection()
    {
        return Pharmacy::all();
    } */
    public function collection()
    {
        return Pharmacy::select('name','mobile','abha','adhar','medicine_name','amount','date','time')->where('deleted_at',null)->get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Mobile',
            'Abha Number',
            'Aadhar Number',
            'Medicine',
            'Amount',
            'Time',
            'Date',


        ];
    }
}
