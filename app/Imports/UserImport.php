<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UserImport implements ToCollection, WithStartRow
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
                    'hospital'               => $row[7],
                ];
            });

            Validator::make($collection->toArray(), [
               


            ])->validate();

            foreach($collection as $collect){
                if($collect['Email'] !=null){
                $parts = explode("@", @$collect['Email']);
             $username = $parts[0];
            $hospital = new User();
            $hospital->name=$username;
            $hospital->email=@$collect['Email'];
            $hospital->role='Data Entry';

               $hospital->district=$collect['District'];
            $hospital->hospital_id=$collect['hospital'];
            $hospital->hospital_name=$collect['Hospital Name'];
             $hospital->password=Hash::make('12345678');
            $hospital->save();
        }
        }
    }


}
