<?php

namespace App\Imports;

use App\Patient;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Auth;

class ImportPatient implements ToModel, WithStartRow
{   
    /**
         * @return int
         */
        public function startRow(): int
        {
            return 2;
        }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Patient([
            'name'     => @$row[0],
            'age'    => @$row[1],
            'user_id' =>Auth::user()->id
            
        ]);
    }
}
