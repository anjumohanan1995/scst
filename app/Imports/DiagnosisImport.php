<?php

namespace App\Imports;
use App\Patient;
use App\Diagonosis;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
class DiagnosisImport implements ToCollection, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function collection(Collection $collection)
    {
        $collection->transform(function ($row) {

            return [
                'Patient name'       => $row[0],
                'Mobile'             => $row[1],
                'Abha'               => $row[2],
                'Aadhar'             => $row[3],
                'Diagonosis name'      => $row[4],
                'Amount'             => $row[5],
                'Date'               => $row[6],
                'Time'               => $row[7],
                'Attachment'         => $row[8],
            ];
        });

        Validator::make($collection->toArray(), [
            '*.Patient name' => 'required',
            '*.Mobile' => 'required',
            '*.Abha' => 'required',
            '*.Aadhar' => 'required|regex:/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/',
            '*.Diagonosis name' => 'required',
            '*.Amount' => 'required|numeric|min:1',
            '*.Date' => 'required|date',
            '*.Time' => 'required|date_format:H:i',
        ])->validate();

        $grand_total = 0;
        foreach($collection as $collect){
            $patient=Patient::where('adhar',(string)$collect['Aadhar'])->first();
            if(!$patient){
                $adhar_list = (string)$collect['Aadhar'];
                $adharList[]=$adhar_list;
            }
            $grand_total = $grand_total + $collect['Amount'];
             $diagnosis = new Diagonosis();
             $diagnosis->name=$collect['Patient name'];
             $diagnosis->mobile=(string)$collect['Mobile'];
            $diagnosis->abha=(string)$collect['Abha'];
            $diagnosis->adhar=(string)$collect['Aadhar'];
             $diagnosis->diagonosis_name=array($collect['Diagonosis name']);
             $diagnosis->amount=array((string)$collect['Amount']);
             $diagnosis->grant_total=(string)$grand_total;
             $diagnosis->date=Carbon::parse((string)$collect['Date'])->format('Y-m-d');
             $diagnosis->time=(string)$collect['Time'];
             $diagnosis->attachment=(string)$collect['Attachment'];
             $diagnosis->creator_id=Auth::user()->id;
             $diagnosis->hospital_name=Auth::user()->hospital_name;
             $diagnosis->hospital_id=Auth::user()->hospital_id;
             $diagnosis->save();
        }
        if(isset($adharList)){
            $adhar = implode(",",$adharList);

            return \Session::flash('PatientList', 'Aadhar Nos: '.$adhar. ' not exist');
        }
    }
}
