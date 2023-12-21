<?php

namespace App\Imports;

use App\Miscellaneous;
use App\Patient;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
class MIscellaneousImport implements ToCollection, WithStartRow,ToArray
{
    use Importable;
    private $data;

    public function __construct()
    {
        $this->data = [];
    }
    public function array(array $rows)
    {
        foreach ($rows as $row) {

            $this->data[] = array( $row[1], $row[2]);
        }
        //dd($this->data);
        return $this->data;
    }

    public function getArray(): array
    {
        return $this->data;
        //dd($this->data);
    }
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
                'Mobile'             => $row[1],
                'Abha'               => $row[2],
                'Aadhar'              => $row[3],
                'Miscellaneous name' => $row[4],
                'Quantity'           => $row[5],
                'Amount'             => $row[6],
                'Date'               => $row[7],
                'Time'               => $row[8],
                'Attachment'               => $row[9],
            ];
        });

     //   dd($collection);
        Validator::make($collection->toArray(), [
            '*.Patient name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            '*.Mobile' => 'required',
            '*.Abha' => 'required',
            '*.Aadhar' => ['required', 'regex:/^([0-9]{4}[0-9]{4}[0-9]{4}$)|([0-9]{4}\s[0-9]{4}\s[0-9]{4}$)|([0-9]{4}-[0-9]{4}-[0-9]{4}$)/'],
            '*.Miscellaneous name' => 'required',
            '*.Quantity' => 'required|numeric|min:1',
            '*.Amount' => 'required|numeric|min:1',
            '*.Date' => 'required|date',
            '*.Time' => 'required|date_format:H:i',
        ])->validate();



        $total = 0;
        $grand_total = 0;
        $count = 0;
        $adhar_list =[];
        foreach($collection as $collect){
            $patient=Patient::where('adhar',(string)$collect['Aadhar'])->first();

            if ($patient) {
                $total = (string)$collect['Quantity'] * (string)$collect['Amount'];
                $grand_total = $grand_total + $total;
                $miscellaneous = new Miscellaneous();
                $miscellaneous->name=$collect['Patient name'];
                $miscellaneous->mobile=(string)$collect['Mobile'];
                $miscellaneous->abha=(string)$collect['Abha'];
                $miscellaneous->adhar=(string)$collect['Aadhar'];
                $miscellaneous->miscellaneous_name=array($collect['Miscellaneous name']);
                $miscellaneous->quantity=array((string)$collect['Quantity']);
                $miscellaneous->amount=array((string)$collect['Amount']);
                $miscellaneous->total=array((string)$total);
                $miscellaneous->grant_total=(string)$grand_total;
                // $miscellaneous->date=(string)$collect[7];
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

    $filename = "Patients.csv";
    $handle = fopen($filename, 'w');

        fputcsv($handle, [
            "Patient name",
            "Mobile",
            "Abha No.",
            "Aadhar No.",
            "Miscellaneous name",
            "Quantity",
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
                    $each_user['Miscellaneous name'],
                    $each_user['Quantity'],
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

        //   return \Session::flash('PatientList', 'Aadhar Nos: '.$adhar. ' not exist');

    }
}
