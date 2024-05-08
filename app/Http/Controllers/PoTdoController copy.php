<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildFinance;
use App\Models\District;
use App\Models\ExamApplication;
use App\Models\studentFund;
use App\Models\HouseManagement;
use App\Models\ItiFund;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;
use App\Models\TDOMaster;
use App\Models\Teo;
use App\Models\TuitionFee;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PoTdoController extends Controller
{
    public function examApplicationListOfficer(){
        return view('PoTdo.examApplication.index');
    }

    public function getexamApplicationListOfficer(Request $request){
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
             $totalRecord = ExamApplication::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ExamApplication::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = ExamApplication::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
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
            $school_name = $record->school_name;
            $student_name = $record->student_name;
            $gender = $record->gender;
            $address = $record->address;
            $relation = $record->relation;
            $mother_name =  $record->mother_name;
            $created_at =  $record->created_at;
           
             $status = $record->officer_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name=@$record->submittedTeo->teo_name;
              $created_at =  $record->created_at;
              $edit='';
              if($status == 1){
                $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            }
            else if($status ==2){
                $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

          
              
        
        
             
           
                $data_arr[] = array(
                    "sl_no" => $i,
                    "school_name" => $school_name,
                    "student_name" => $student_name,
                    "gender" => $gender,
                    "address" => $address,
                    "relation" => $relation,
                    "mother_name" => $mother_name,
                    "date" => $date." ".$time,                 
                    "action" => $edit,
                    "teo_name" =>$teo_name
    
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
    public function examApplicationDetailsOfficer($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =ExamApplication::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
            "officer_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.examApplication.details',compact('formData'));


    }
    public function examApplicationApproveOfficer (Request $request){
        $marriage = ExamApplication::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Exam Application Approved successfully.'
        ]);
    }
    public function examApplicationRejectOfficer  (Request $request){
        $marriage = ExamApplication::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 2,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Exam Application Rejected successfully.'
        ]);
    }



    public function couplefinancialListOfficer(){
        return view('PoTdo.couplefinancial.index');
    }

    public function getcouplefinancialListOfficer(Request $request){
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
             $totalRecord = studentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = studentFund::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = studentFund::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
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
             $husband_name = $record->husband_name;
             $wife_name = $record->wife_name;
             $register_details = $record->register_details;
             $certificate_details = $record->certificate_details;
             $husband_caste = $record->husband_caste;
             $wife_caste =  $record->wife_caste;
             $created_at =  $record->created_at;
             $date =  $record->date;
             $time =  $record->time;
             $status = $record->officer_status;
           
            $teo_name=$record->teo->teo_name;
          
              $edit='';
              if($status == 1){
                $edit='<div class="settings-main-icon"><a  href="' . route('couplefinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            }
            else if($status ==2){
                $edit='<div class="settings-main-icon"><a  href="' . route('couplefinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('couplefinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

          
              
        
        
             
           
                $data_arr[] = array(
                    "sl_no" => $i,
                    "id" => $id,
                    "husband_name" => $husband_name,
                "wife_name" => $wife_name,
                "register_details" => $register_details,
                "certificate_details" => $certificate_details,
                "husband_caste" => $husband_caste,
                "wife_caste" => $wife_caste,
                "date" => $date . ' ' . $time,
                "created_at" => $created_at,

                    "teo_name" =>$teo_name,
                                    
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
    public function couplefinancialDetailsOfficer($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =studentFund::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
            "officer_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.couplefinancial.details',compact('formData'));


    }
    public function couplefinancialApproveOfficer (Request $request){
        $marriage = studentFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Couple Financial Scheme Application Approved successfully.'
        ]);
    }
    public function couplefinancialRejectOfficer (Request $request){
        $marriage = studentFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 2,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Couple Financial Application Rejected successfully.'
        ]);
    }




    public function motherChildSchemeListOfficer(){
        return view('PoTdo.motherChild.index');
    }

    public function getmotherChildSchemeListOfficer(Request $request){
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
             $totalRecord = MotherChildScheme::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MotherChildScheme::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = MotherChildScheme::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
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
            $dob = $record->dob;
            $hus_name = $record->hus_name;
            $caste = $record->caste;
            $village =  $record->village;
            $created_at =  $record->created_at;
           
             $status = $record->officer_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name=@$record->submittedTeo->teo_name;
              $created_at =  $record->created_at;
              $edit='';
              if($status == 1){
                $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            }
            else if($status ==2){
                $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

          
              
        
        
             
           
                $data_arr[] = array(
                    "sl_no" => $i,
                    "name" => $name,
                    "address" => $address,
                    "dob" => $age . '/' . $dob,
                    "caste" => $caste,
                    "village" => $village,
                    "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i a '),
                    // "edit" => '<div class="settings-main-icon"><a  href="' . url('motherChildScheme/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'
                    "edit" =>$edit,
    
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
    public function motherChildSchemeDetailsOfficer($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =MotherChildScheme::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
            "officer_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.motherChild.details',compact('formData'));


    }
    public function motherChildSchemeApproveOfficer (Request $request){
        $motherChild = MotherChildScheme::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $motherChild->update([
            'officer_status' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Mother Child Scheme Application Approved Successfully.'
        ]);
    }
    public function motherChildSchemeRejectOfficer (Request $request){
        $motherChild = MotherChildScheme::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $motherChild->update([
            'officer_status' => 2,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Mother Child Scheme Application Rejected successfully.'
        ]);
    }


    public function marriageGrantListOfficer(){
        return view('PoTdo.marriageGrant.index');
    }

    public function getmarriageGrantListOfficer(Request $request){
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
             $totalRecord = MarriageGrant::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MarriageGrant::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = MarriageGrant::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
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
            $current_address = $record->current_address;
            $age = $record->age;
            $caste = $record->caste;
            $created_at =  $record->created_at;
           
             $status = $record->officer_status;
           $teo_name=$record->submittedTeo->teo_name;
            $teo_name=@$record->submittedTeo->teo_name;
             
              $edit='';
              if($status == 1){
                $edit='<div class="settings-main-icon"><a  href="' . route('marriageGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            }
            else if($status ==2){
                $edit='<div class="settings-main-icon"><a  href="' . route('marriageGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('marriageGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

          
              
        
        
             
           
                $data_arr[] = array(
                    "sl_no" =>$i,
                    "id" => $id,
                    "name" => $name,
                    "current_address" => $current_address,
                    "age" => $age,
                    "caste" => $caste,
                    "teo_name" =>$teo_name,
                    "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i a'),
                    //"edit" => '<div class="settings-main-icon"><a  href="' . url('marriageGrant/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'
                    "edit" =>$edit
    
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
    public function marriageGrantDetailsOfficer($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =MarriageGrant::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
            "officer_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.marriageGrant.details',compact('formData'));


    }
    public function marriageGrantApproveOfficer (Request $request){
        $marriage = MarriageGrant::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Marriage grant  Scheme Application approved Successfully.'
        ]);
    }
    public function marriageGrantRejectOfficer (Request $request){
        $marriage = MarriageGrant::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 2,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Marriage grant Scheme Application Rejected successfully.'
        ]);
    }
    public function houseGrantListOfficer (){
        return view('PoTdo.houseGrant.index');
    }

    public function gethouseGrantListOfficer(Request $request){
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
             $totalRecord = HouseManagement::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = HouseManagement::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = HouseManagement::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
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
             $place = $record->place;
             $panchayath = $record->panchayath;
             $caste = $record->caste;
             $status = $record->officer_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name=$record->teo->teo_name;
              $created_at =  $record->created_at;
              $edit='';
              if($status == 1){
                $edit='<div class="settings-main-icon"><a  href="' . route('houseGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            }
            else if($status ==2){
                $edit='<div class="settings-main-icon"><a  href="' . route('houseGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('houseGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

          
              
        
        
             
           
                $data_arr[] = array(

                    "sl_no" =>$i,
                    "id" => $id,
                    "place" => $place,
                    "name" => $name,
                    "address" => $address,
                    "panchayath" => $panchayath,
                    "caste" => $caste,
                    "date" => $date .' ' .$time,     
                    "teo_name" =>$teo_name,              
                    "edit" => $edit,
                    
    
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
    public function houseGrantDetailsOfficer($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =HouseManagement::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
                "officer_view_status"=>1,
                "officer_view_id" =>Auth::user()->id,
                "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.houseGrant.details',compact('formData'));


    }
    public function houseGrantApproveOfficer  (Request $request){
        $house = HouseManagement::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $house->update([
            'officer_status' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'House Grant Scheme Application Approved successfully.'
        ]);
    }
    public function houseGrantRejectOfficer (Request $request){
        $house = HouseManagement::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $house->update([
            'officer_status' => 2,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'House Grant Scheme Application Rejected successfully.'
        ]);
    }

    public function tuitionFeeListOfficer(){
        return view('PoTdo.tuitionFee.index');
    }

    public function gettuitionFeeListOfficer(Request $request){
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
             $totalRecord = TuitionFee::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = TuitionFee::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = TuitionFee::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
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
             $student_name = $record->student_name;
             $caste = $record->caste;
             $status = $record->officer_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name=$record->teo->teo_name;
              $created_at =  $record->created_at;
              $edit='';
              if($status == 1){
                $edit='<div class="settings-main-icon"><a  href="' . route('tuitionFeeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            }
            else if($status ==2){
                $edit='<div class="settings-main-icon"><a  href="' . route('tuitionFeeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('tuitionFeeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

          
              
        
        
             
           
                $data_arr[] = array(

                    "sl_no" =>$i,
                    "id" => $id,
                    "name" => $name,
                    "address" => $address,
                    "student_name" => $student_name,
                    "caste" => $caste,
                    "date" => $date .' ' .$time,     
                    "teo_name" =>$teo_name,              
                    "edit" => $edit,
                    
    
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
    public function tuitionFeeDetailsOfficer($id){
        
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =TuitionFee::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
                "officer_view_status"=>1,
                "officer_view_id" =>Auth::user()->id,
                "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.tuitionFee.details',compact('formData'));


    }
    public function tuitionFeeApproveOfficer  (Request $request){
        $tuition = TuitionFee::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $tuition->update([
            'officer_status' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Tuition Fee Scheme Application Approved successfully.'
        ]);
    }
    public function tuitionFeeRejectOfficer (Request $request){
        $tuition = TuitionFee::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $tuition->update([
            'officer_status' => 2,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Tuition Fee Application Rejected successfully.'
        ]);
    }

}
