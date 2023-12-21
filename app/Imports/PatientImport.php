<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Validator;
use App\Patient;
use Auth;

class PatientImport implements ToCollection, WithStartRow
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
        $collection->transform(function ($row) {

            return [
                'Patient name'       => $row[0],
                'Aadhar'             => $row[1],
                'Age'               => $row[2],
                'Gender'              => $row[3],
                'Mobile'           => $row[4],
                'Email'             => $row[5],
                'Scheme Name'               => $row[6],
                'Abha'               => $row[7],
                'Address'         => $row[8],
                'Ptype'             =>$row[9]
            ];
        });

     //   dd($collection);
        Validator::make($collection->toArray(), [
            '*.Patient name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            '*.Mobile' => 'required',
            '*.Aadhar' => ['nullable', 'regex:/^([0-9]{4}[0-9]{4}[0-9]{4}$)|([0-9]{4}\s[0-9]{4}\s[0-9]{4}$)|([0-9]{4}-[0-9]{4}-[0-9]{4}$)/'],
            '*.Age' => 'required',
        ])->validate();
        foreach($collection as $collect){
            $scheme=Patient::orderBy('_id','desc')->latest()->first();
            //  dd($scheme);
              if($scheme){
                  $pid = $scheme->patient_id;
                  $pid++;
                  $data['patient_id']  = $pid;
              }else{
                  $data['patient_id']  = 'P0001';
              }
            $patient = new Patient();
            $patient->patient_id= @$data['patient_id'];
            $patient->adhar=(string)$collect['Aadhar'];
            $patient->age=(string)$collect['Age'];
            $patient->gender=$collect['Gender'];
            $patient->mobile=(string)$collect['Mobile'];
            $patient->email=$collect['Email'];
            $patient->sc_id=$collect['Scheme Name'];
            $patient->abha=(string)$collect['Abha'];
            $patient->address=$collect['Address'];
            $patient->type=$collect['Ptype'];
            $patient->creater_id=Auth::user()->id;
            $patient->hospital_id=Auth::user()->hospital_id;
            $patient->save();
        }
    }


}
