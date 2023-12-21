<?php

namespace App\Imports;

use App\Pharmacy;
use App\Patient;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
class PharmacyImport implements ToCollection, WithStartRow
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
                'Medicine name'      => $row[4],
                'Amount'             => $row[5],
                'Date'               => $row[6],
                'Time'               => $row[7],
                'Attachment'         => $row[8],
            ];
        });

        Validator::make($collection->toArray(), [
            '*.Patient name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            '*.Mobile' => 'required',
            '*.Abha' => 'required',
            '*.Aadhar' => ['nullable', 'regex:/^([0-9]{4}[0-9]{4}[0-9]{4}$)|([0-9]{4}\s[0-9]{4}\s[0-9]{4}$)|([0-9]{4}-[0-9]{4}-[0-9]{4}$)/'],
            '*.Medicine name' => 'required',
            '*.Amount' => 'required|numeric|min:1',
            '*.Date' => 'required|date',

        ])->validate();

        $total = 0;
        $grand_total = 0;
        $count = 0;
        foreach ($collection as $collect) {
            $patient=Patient::where('adhar', (string)$collect['Aadhar'])->first();
            if ($patient) {
                $grand_total = $grand_total + $collect['Amount'];
                $pharmacy = new Pharmacy();
                $pharmacy->name=$collect['Patient name'];
                $pharmacy->mobile=(string)$collect['Mobile'];
                $pharmacy->abha=(string)$collect['Abha'];
                $pharmacy->adhar=(string)$collect['Aadhar'];
                $pharmacy->medicine_name=array($collect['Medicine name']);
                $pharmacy->amount=array((string)$collect['Amount']);
                $pharmacy->grant_total=(string)$grand_total;
                // $pharmacy->date=(string)$collect[6];
                $pharmacy->date=Carbon::parse((string)$collect['Date'])->format('Y-m-d');
                $pharmacy->time=(string)$collect['Time'];
                $pharmacy->attachment=(string)$collect['Attachment'];
                $pharmacy->creator_id=Auth::user()->id;
                $pharmacy->hospital_name=Auth::user()->hospital_name;
                $pharmacy->hospital_id=Auth::user()->hospital_id;
                $pharmacy->save();
            }
        }
        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=abc.xlsx',
            'Expires' => '0',
            'Pragma' => 'public',
        );

    $filename = "PatientList.csv";
    $handle = fopen($filename, 'w');

        fputcsv($handle, [
            "Patient name",
            "Mobile",
            "Abha No.",
            "Aadhar No.",
            "Medicine name",
            "Amount",
            "Date",
            "Time",
            "Attachment"
        ], "\t");
        foreach ($collection as $each_user) {
            $patient=Patient::where('name',$each_user['Patient name'])->where('mobile',(string)$each_user['Mobile'])->where('adhar',(string)$each_user['Aadhar'])->first();

            if (!$patient) {
                $count++;
                fputcsv($handle, [
                    $each_user['Patient name'],
                    $each_user['Mobile'],
                    $each_user['Abha'],
                    $each_user['Aadhar'],
                    $each_user['Medicine name'],
                    $each_user['Amount'],
                    $each_user['Date'],
                    $each_user['Time'],
                    $each_user['Attachment'],
                ]);
            }
        }
        fclose($handle);

        if($count > 0){
          //  $adhar = implode(",",$adharList);
          //  return response()->download($filename, "patient.csv", $headers);
            return \Session::flash('PatientList', 'Successfully updated except patients list below.');
        }
    }
}
