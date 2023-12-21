<?php

namespace App\Exports;

use App\Miscellaneous;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MiscellaneousExport implements FromCollection,WithHeadings
{


    protected $patient, $abha, $from_date_data, $to_date_data;

    public function __construct(String $patient, String $abha, String $from_date_data, String $to_date_data) {

        $this->patient = $patient;
        $this->abha = $abha;
        $this->from_date_data = $from_date_data;
        $this->to_date_data = $to_date_data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */

        //return Miscellaneous::all();
        public function collection()
        {
            if($this->from_date_data !=''){

                $from_date  = date("M d,Y",strtotime($this->from_date_data));
                $stDate=Carbon::createFromFormat('m/d/Y',$this->from_date_data)->format('Y-m-d');

            }
            if($this->to_date_data !=''){
                $to_date  =   date("Y-m-d",strtotime($this->to_date_data));
                $edDate= Carbon::createFromFormat('m/d/Y',$this->to_date_data)->format('Y-m-d');
            }
            $totalRecord = Miscellaneous::select('name','mobile','abha','adhar','miscellaneous_name','quantity','amount','total','date','time')->where('deleted_at',null);
            if($this->patient != ""){
                $totalRecord->where('name','like',"%".$this->patient."%");
            }
            if($this->abha != ""){
               $totalRecord->where('abha','like',"%".$this->abha."%");
           }
           if($this->from_date_data != "" && $this->to_date_data != "" ){
            ///  echo "khk";exit;
              $totalRecord->whereBetween('date', [$stDate, $edDate]);
      }
           $records = $totalRecord->get();
           foreach($records as $record){

            // return $record ;
         $sum = array_sum($record->total);
         $sum_data = number_format((float)$sum, 2, '.', '');
         $id = $record->id;
         $name = $record->name;
         $mobile = $record->mobile;
         $abha = $record->abha;
         $miscellaneous = $record->miscellaneous_name;
         $quantity = $record->quantity;
         $amount = $record->grant_total;
         $date = $record->date;
         $time =  $record->time;
         $adhar =  $record->adhar;
         $data_arr[] = array(
             "id" => $id,
             "name" => $name,
             "mobile" => $mobile,
             "abha" => $abha,
             "adhar" => $adhar,
             "miscellaneous_name" => $miscellaneous,
             "quantity" => $quantity,
             "amount" => $amount,
             "date" => $date,
             "time" => $time
         );

     }
            return $records;
        }
        public function headings(): array
        {
            return [
                'Id',
                'Name',
                'Mobile',
                'Abha Number',
                'Aadhar',
                'Miscellaneous',
                'Quantity',
                'Amount',

                'Time',
                'Date',

            ];
        }
    }

