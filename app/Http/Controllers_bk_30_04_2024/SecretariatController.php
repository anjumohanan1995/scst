<?php

namespace App\Http\Controllers;
use App\Models\SingleIncomeEarner;
use App\Models\Teo;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SecretariatController extends Controller
{
    public function singleEarnerListSa(Request $request)
    {
        return view('Sa.singleEarner.index');
    }
    public function getSingleEarnerListSa(Request $request)
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
             ->where('D_jd_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('D_jd_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('D_jd_status',1);
            
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

              $status = @$record->Sa_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerSaView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->Sa_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerSaView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->Sa_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerSaView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerSaView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->Sa_view_status==null ){
        $formData->update([
        "Sa_view_status"=>1,
        "Sa_view_id" =>Auth::user()->id,
        "Sa_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('Sa.singleEarner.view', compact('formData'));

    }
    public function singleEarnerSaApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'Sa_status' => 1,
            'Sa_status_date' => $currenttime,
            'Sa_status_id' => Auth::user()->id,
            'Sa_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerSaReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'Sa_status' => 2,
            'Sa_status_date' => $currenttime,
            'Sa_status_id' => Auth::user()->id,
            'Sa_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    

    public function singleEarnerListS_so(Request $request)
    {
        return view('S_so.singleEarner.index');
    }
    public function getSingleEarnerListS_so(Request $request)
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
             ->where('Sa_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('Sa_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('Sa_status',1);
            
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

              $status = @$record->S_so_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_soView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->S_so_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_soView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->S_so_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_soView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerS_soView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->S_so_view_status==null ){
        $formData->update([
        "S_so_view_status"=>1,
        "S_so_view_id" =>Auth::user()->id,
        "S_so_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('S_so.singleEarner.view', compact('formData'));

    }
    public function singleEarnerS_soApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'S_so_status' => 1,
            'S_so_status_date' => $currenttime,
            'S_so_status_id' => Auth::user()->id,
            'S_so_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerS_soReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'S_so_status' => 2,
            'S_so_status_date' => $currenttime,
            'S_so_status_id' => Auth::user()->id,
            'S_so_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    

    public function singleEarnerListS_us(Request $request)
    {
        return view('S_us.singleEarner.index');
    }
    public function getSingleEarnerListS_us(Request $request)
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
             ->where('S_so_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_so_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_so_status',1);
            
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

              $status = @$record->S_us_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_usView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->S_us_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_usView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->S_us_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_usView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerS_usView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->S_us_view_status==null ){
        $formData->update([
        "S_us_view_status"=>1,
        "S_us_view_id" =>Auth::user()->id,
        "S_us_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('S_us.singleEarner.view', compact('formData'));

    }
    public function singleEarnerS_usApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'S_us_status' => 1,
            'S_us_status_date' => $currenttime,
            'S_us_status_id' => Auth::user()->id,
            'S_us_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerS_usReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'S_us_status' => 2,
            'S_us_status_date' => $currenttime,
            'S_us_status_id' => Auth::user()->id,
            'S_us_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    

    public function singleEarnerListS_as(Request $request)
    {
        return view('S_as.singleEarner.index');
    }
    public function getSingleEarnerListS_as(Request $request)
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
             ->where('S_us_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_us_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_us_status',1);
            
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

              $status = @$record->S_as_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_asView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->S_as_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_asView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->S_as_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_asView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerS_asView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->S_as_view_status==null ){
        $formData->update([
        "S_as_view_status"=>1,
        "S_as_view_id" =>Auth::user()->id,
        "S_as_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('S_as.singleEarner.view', compact('formData'));

    }
    public function singleEarnerS_asApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'S_as_status' => 1,
            'S_as_status_date' => $currenttime,
            'S_as_status_id' => Auth::user()->id,
            'S_as_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerS_asReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'S_as_status' => 2,
            'S_as_status_date' => $currenttime,
            'S_as_status_id' => Auth::user()->id,
            'S_as_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    

    public function singleEarnerListS_acs(Request $request)
    {
        return view('S_acs.singleEarner.index');
    }
    public function getSingleEarnerListS_acs(Request $request)
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
             ->where('S_as_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_as_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('S_as_status',1);
            
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

              $status = @$record->S_acs_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_acsView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->S_acs_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_acsView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->S_acs_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerS_acsView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerS_acsView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->S_acs_view_status==null ){
        $formData->update([
        "S_acs_view_status"=>1,
        "S_acs_view_id" =>Auth::user()->id,
        "S_acs_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('S_acs.singleEarner.view', compact('formData'));

    }
    public function singleEarnerS_acsApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'S_acs_status' => 1,
            'S_acs_status_date' => $currenttime,
            'S_acs_status_id' => Auth::user()->id,
            'S_acs_status_reason' => $reason,
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
            'S_acs_status' => 2,
            'S_acs_status_date' => $currenttime,
            'S_acs_status_id' => Auth::user()->id,
            'S_acs_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

}
