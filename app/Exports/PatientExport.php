<?php

namespace App\Exports;

use App\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Auth;
class PatientExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patient::select('name','g_name','g_relation','age','gender','mobile','email','adhar','sc_id','abha_num')->where('deleted_at',null)->get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Guardian Name',
            'Guardian Relation',
            'Age',
            'Gender',
            'Mobile',
            'Adhar',
            'Scheme Id',
            'Abha NUmber',
            'Email',

        ];
    }
}
