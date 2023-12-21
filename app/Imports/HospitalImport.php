<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Validator;
use App\Hospital;
use Auth;

class HospitalImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */


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
    public function collection(Collection $collection)
    {
        /*dd($collection);
         return new Patient([
            'name'     => @$collection[0],
            'age'    => @$collection[1],
            'user_id' =>Auth::user()->id


        ]);*/

            $collection->transform(function ($row) {

                return [
                    'Hospital Name'       => $row[0],
                    'Hospital Id'         => $row[1],
                    'Mobile'              => $row[2],
                    'Email'               => $row[3],
                    'Address'             => $row[4],
                    'Hospital Type'       => $row[5],
                    'District'            => $row[6],
                    'Place'               => $row[7],
                    'Bank Name'           => $row[8],
                    'Bank Address'        => $row[9],
                    'Account number'      => $row[10],
                    'IFSC Code'           => $row[11],
                    'Contact Number'      => $row[12],
                    'Branch Name'         => $row[13],
                    'Account Holder Name' => $row[14],
                ];
            });

            Validator::make($collection->toArray(), [
                '*.Hospital Name' => 'required|max:150',
                '*.Hospital Id' => 'required|alpha_num|max:150',
                '*.Mobile' => 'nullable',
                '*.District' => 'required',

            ])->validate();

            foreach($collection as $collect){

            $hospital = new Hospital();
            $hospital->name=$collect['Hospital Name'];
            $hospital->h_id=$collect['Hospital Id'];
            $hospital->mobile=(string)$collect['Mobile'];
            $hospital->email=$collect['Email'];
            $hospital->address=$collect['Address'];

            $hospital->type=$collect['Hospital Type'];
            $hospital->district=$collect['District'];
            $hospital->place=$collect['Place'];
            $hospital->bank_name=$collect['Bank Name'];
            $hospital->bank_address=$collect['Bank Address'];
            $hospital->ac_no=(string)$collect['Account number'];
            $hospital->ifsc_code=$collect['IFSC Code'];
            $hospital->contact_no=(string)$collect['Contact Number'];
            $hospital->branch_name=$collect['Branch Name'];
            $hospital->account_holder_name=$collect['Account Holder Name'];
            $hospital->user_id=Auth::user()->id;
            $hospital->save();
        }
    }


}
