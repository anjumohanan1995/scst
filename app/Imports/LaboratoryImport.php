<?php

namespace App\Imports;

use App\Laboratory;
use App\Patient;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
class LaboratoryImport implements ToCollection, WithStartRow
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
                    'Aadhar'              => $row[3],
                    'Test name'           => $row[4],
                    'Amount'             => $row[5],
                    'Date'               => $row[6],
                    'Time'               => $row[7],
                    'Attachment'         => $row[8],
                ];
            });

         //   dd($collection);
            Validator::make($collection->toArray(), [
                '*.Patient name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
                '*.Mobile' => 'required',
                '*.Abha' => 'required',
                '*.Aadhar' => ['required', 'regex:/^([0-9]{4}[0-9]{4}[0-9]{4}$)|([0-9]{4}\s[0-9]{4}\s[0-9]{4}$)|([0-9]{4}-[0-9]{4}-[0-9]{4}$)/'],
                '*.Test name' => 'required',
                '*.Amount' => 'required|numeric|min:1',
                '*.Date' => 'required|date',

            ])->validate();
            $total = 0;
            $grand_total = 0;
            $count = 0;
            foreach($collection as $collect){
                $patient=Patient::where('name',$collect['Patient name'])->where('mobile',(string)$collect['Mobile'])->where('adhar',(string)$collect['Aadhar'])->first();

                if($patient){
                //  $total = (string)$collect[5] * (string)$collect[6];
                $grand_total = $grand_total + $collect['Amount'];
                $miscellaneous = new Laboratory();
                $miscellaneous->name=$collect['Patient name'];
                $miscellaneous->mobile=(string)$collect['Mobile'];
                $miscellaneous->abha=(string)$collect['Abha'];
                $miscellaneous->adhar=(string)$collect['Aadhar'];
                $miscellaneous->test_name=array($collect['Test name']);
                $miscellaneous->amount=array((string)$collect['Amount']);
                $miscellaneous->grant_total=(string)$grand_total;
                //$miscellaneous->date=(string)$collect[6];
                $miscellaneous->date=Carbon::parse((string)$collect['Date'])->format('Y-m-d');
                $miscellaneous->time=(string)$collect['Time'];
                $miscellaneous->attachment=(string)$collect['Attachment'];
                $miscellaneous->creator_id=Auth::user()->id;
                $miscellaneous->hospital_name=Auth::user()->hospital_name;
                $miscellaneous->hospital_id=Auth::user()->hospital_id;

                $miscellaneous->save();
            }
            }
            $headers = array(
                'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Content-Disposition' => 'attachment; filename=abc.xlsx',
                'Expires' => '0',
                'Pragma' => 'public',
            );

        $filename = "Patient.csv";
        $handle = fopen($filename, 'w');

            fputcsv($handle, [
                "Patient name",
                "Mobile",
                "Abha No.",
                "Aadhar No.",
                "Test name",
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
                        $each_user['Test name'],
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
