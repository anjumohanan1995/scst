<?php

namespace App\Http\Controllers;
use App\Models\SingleIncomeEarner;
use App\Models\Teo;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DirectorateController extends Controller
{
    public function singleEarnerListDc(Request $request)
    {
        return view('Dc.singleEarner.index');
    }
    public function getSingleEarnerListDc(Request $request)
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
             ->where('officer_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('officer_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('officer_status',1);
            
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

              $status = @$record->Dc_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerDcView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->Dc_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerDcView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->Dc_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerDcView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerDcView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->Dc_view_status==null ){
        $formData->update([
        "Dc_view_status"=>1,
        "Dc_view_id" =>Auth::user()->id,
        "Dc_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('Dc.singleEarner.view', compact('formData'));

    }
    public function singleEarnerDcApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'Dc_status' => 1,
            'Dc_status_date' => $currenttime,
            'Dc_status_id' => Auth::user()->id,
            'Dc_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerDcReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'Dc_status' => 2,
            'Dc_status_date' => $currenttime,
            'Dc_status_id' => Auth::user()->id,
            'Dc_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    

    public function singleEarnerListD_JsSeo(Request $request)
    {
        return view('D_JsSeo.singleEarner.index');
    }
    public function getSingleEarnerListD_JsSeo(Request $request)
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
             ->where('Dc_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('Dc_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('Dc_status',1);
            
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

              $status = @$record->D_JsSeo_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_JsSeoView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->D_JsSeo_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_JsSeoView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->D_JsSeo_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_JsSeoView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerD_JsSeoView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->D_JsSeo_view_status==null ){
        $formData->update([
        "D_JsSeo_view_status"=>1,
        "D_JsSeo_view_id" =>Auth::user()->id,
        "D_JsSeo_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('D_JsSeo.singleEarner.view', compact('formData'));

    }
    public function singleEarnerD_JsSeoApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'D_JsSeo_status' => 1,
            'D_JsSeo_status_date' => $currenttime,
            'D_JsSeo_status_id' => Auth::user()->id,
            'D_JsSeo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerD_JsSeoReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'D_JsSeo_status' => 2,
            'D_JsSeo_status_date' => $currenttime,
            'D_JsSeo_status_id' => Auth::user()->id,
            'D_JsSeo_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    

    public function singleEarnerListD_ad(Request $request)
    {
        return view('D_ad.singleEarner.index');
    }
    public function getSingleEarnerListD_ad(Request $request)
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
             ->where('D_JsSeo_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('D_JsSeo_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('D_JsSeo_status',1);
            
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

              $status = @$record->D_ad_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_adView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->D_ad_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_adView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->D_ad_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_adView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerD_adView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->D_ad_view_status==null ){
        $formData->update([
        "D_ad_view_status"=>1,
        "D_ad_view_id" =>Auth::user()->id,
        "D_ad_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('D_ad.singleEarner.view', compact('formData'));

    }
    public function singleEarnerD_adApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'D_ad_status' => 1,
            'D_ad_status_date' => $currenttime,
            'D_ad_status_id' => Auth::user()->id,
            'D_ad_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerD_adReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'D_ad_status' => 2,
            'D_ad_status_date' => $currenttime,
            'D_ad_status_id' => Auth::user()->id,
            'D_ad_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    

    public function singleEarnerListD_jd(Request $request)
    {
        return view('D_jd.singleEarner.index');
    }
    public function getSingleEarnerListD_jd(Request $request)
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
             ->where('D_ad_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('D_ad_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
            //  ->whereIn('submitted_teo', $teoIds)
            //  ->where('submitted_district', $district)
             ->where('D_ad_status',1);
            
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

              $status = @$record->D_jd_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_jdView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->D_jd_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_jdView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->D_jd_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerD_jdView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerD_jdView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->D_jd_view_status==null ){
        $formData->update([
        "D_jd_view_status"=>1,
        "D_jd_view_id" =>Auth::user()->id,
        "D_jd_view_date" =>$date .' ' .$currenttime
        ]);
    } 
       
        return view('D_jd.singleEarner.view', compact('formData'));

    }
    public function singleEarnerD_jdApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'D_jd_status' => 1,
            'D_jd_status_date' => $currenttime,
            'D_jd_status_id' => Auth::user()->id,
            'D_jd_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerD_jdReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

        $data->update([
            'D_jd_status' => 2,
            'D_jd_status_date' => $currenttime,
            'D_jd_status_id' => Auth::user()->id,
            'D_jd_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }


}
