<?php

namespace App\Http\Controllers;
use App\Models\SingleIncomeEarner;
use App\Models\Teo;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MinisterOfficeController extends Controller
{
    public function singleEarnerListMo(Request $request)
    {
        return view('Mo.singleEarner.index');
    }
    public function getSingleEarnerListMo(Request $request)
    {
        
        $name = $request->name;
        $user_id=Auth::user()->id;
        $role =  Auth::user()->role;       
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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


         $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();
           
         $teoIds = $teos->pluck('_id')->toArray();
         
             // Total records
             $totalRecord = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_acs_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_acs_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_acs_status',1);
            
             if($name != ""){
                $items->where('applicant_name','like',"%".$name."%");
            }
          
             $records = $items->skip($start)->take($rowperpage)->get();
         


         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->applicant_name;
             $address = $record->address;
             $applicant_caste = $record->applicant_caste;
             $district = @$record->districtRelation->name;
              $created_at =  $record->created_at;

              $status = @$record->Mo_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerMoView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->Mo_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerMoView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->Mo_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerMoView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
              }

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "caste" => $applicant_caste,
                "district" => $district,
                "created_at" => $created_at,  
                "teo" => $teo_name,                
                "edit" => $edit

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

    public function singleEarnerMoView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->Mo_view_status==null ){
        $formData->update([
        "Mo_view_status"=>1,
        "Mo_view_id" =>Auth::user()->id,
        "Mo_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('Mo.singleEarner.view', compact('formData'));

    }
    public function singleEarnerMoApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'Mo_status' => 1,
            'Mo_status_date' => $currenttime,
            'Mo_status_id' => Auth::user()->id,
            'Mo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerS_acsReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'Mo_status' => 2,
            'Mo_status_date' => $currenttime,
            'Mo_status_id' => Auth::user()->id,
            'Mo_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }
}
