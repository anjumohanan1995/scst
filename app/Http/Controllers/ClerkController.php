<?php

namespace App\Http\Controllers;

use App\Models\ChildFinance;
use App\Models\District;
use App\Models\TDOMaster;
use App\Models\Teo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClerkController extends Controller
{
    public function ChildFinanceListClerk(){
        return view('clerk.childFinance.index');
    }

    public function getchildFinanceListClerk(Request $request){
        $role =  Auth::user()->role;       
       $district =  Auth::user()->district;
       $tdo= Auth::user()->po_tdo_office;

        $name = $request->name;
         $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();
         
        $teoIds = $teos->pluck('_id')->toArray();


         ## Read value
         $draw = $request->get('draw');
         $start = $request->get("start");
         $rowperpage = $request->get("length"); // Rows display per page

         $columnIndex_arr = $request->get('order');
         $columnName_arr = $request->get('columns');
         $order_arr = $request->get('order');
         $search_arr = $request->get('search');

         $columnIndex = $columnIndex_arr[0]['column']; // Column index
         $columnName = $columnName_arr[$columnIndex]['data']; // Column name
         $columnSortOrder = $order_arr[0]['dir']; // asc or desc
         $searchValue = $search_arr['value']; // Search value


         

             // Total records
             $totalRecord = ChildFinance::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('teo_status',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ChildFinance::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('teo_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = ChildFinance::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('teo_status',1)
                 ->orderBy($columnName, $columnSortOrder);
             
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();
            $i=$start;
             
         foreach($records as $record){
            $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $age = $record->age;
             $caste = $record->caste;
             $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name=$record->teo->teo_name;
              $created_at =  $record->created_at;
              $edit='';
              if($status == 1){
                $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialClerkDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->clerk_status_reason.'</span></div>';
            }
            else if($status ==2){
                $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialClerkDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->clerk_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialClerkDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

          
              
        
        
             
           
                $data_arr[] = array(
                    "sl_no" => $i,
                    "id" => $id,
                    "name" => $name,
                    "address" => $address,
                    "age" => $age,
                    "caste" => $caste,
                    "teo_name" =>$teo_name,
                    "date" => $date." ".$time,  
                    "created_at" => $created_at,                  
                    "action" => $edit
    
                );
          
         }

         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
         );

         return response()->json($response);
    }
    public function childFinancialClerkDetails($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =ChildFinance::find($id);
        if($formData->clerk_view_status==null ){
            $formData->update([
            "clerk_view_status"=>1,
            "clerk_view_id" =>Auth::user()->id,
            "clerk_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('clerk.childFinance.details',compact('formData'));


    }
    public function childFinanceApprove (Request $request){
        $marriage = ChildFinance::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'clerk_status' => 1,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Child Finance Scheme Application Approved successfully.'
        ]);
    }
    public function childFinanceReject (Request $request){
        $marriage = ChildFinance::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Child Finance Scheme Application Rejected successfully.'
        ]);
    }
}
