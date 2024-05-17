<?php

namespace App\Http\Controllers;

use App\Models\AnemiaFinance;
use App\Models\FinancialHelp;
use App\Models\MedEngStudentFund;
use App\Models\SingleIncomeEarner;
use App\Models\StudentAward;
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
             ->where('assistant_status',1)
             ->where('officer_return',null);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ExamApplication::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = ExamApplication::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null)
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
            else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
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

    public function getexamApplicationListOfficerReturned(Request $request){
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
             ->where('assistant_return',null)
             ->where('officer_return',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ExamApplication::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_return',null)
                 ->where('officer_return',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = ExamApplication::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_return',null)
                 ->where('officer_return',1)
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

              $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
            //   if($status == 1){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            // }
            // else if($status ==2){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            // }
            // else if($status ==null){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            // }

          
              
        
        
             
           
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
        if($formData->officer_return_view_status==null && $formData->return_status==1){
            $formData->update([
            "officer_return_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_return_view_date" =>$date .' ' .$currenttime
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
            'officer_return' => null,
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
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'return_date' => $currenttime,
            'return_userid' => Auth::user()->id,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Exam Application Rejected successfully.'
        ]);
    }

    public function examApplicationRemoveOfficer (Request $request){
        //  dd($request);
          $marriage = ExamApplication::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
          $marriage->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,

          ]);
          return response()->json([
              'success' => 'Exam Application Rejected successfully.'
          ]);
      }


    public function getcouplefinancialListOfficerReturn(Request $request){
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
             $totalRecord = FinancialHelp::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             $totalRecord->where('assistant_return', null)->where('officer_return', 1);

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = FinancialHelp::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district);


           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('assistant_return', null)->where('officer_return', 1);

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             

            
             $items = FinancialHelp::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->orderBy($columnName, $columnSortOrder);
             
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            // $items->where('assistant_return', null)->where('officer_return', 1  || 'rejection_status', 1);
            

            $items->where('assistant_return', null)->where('officer_return', 1);
          

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
           
                $edit='<div class="settings-main-icon"><a  href="' . route('couplefinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
           
             
           
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
             $totalRecord = FinancialHelp::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);

            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             $totalRecord->where('officer_return', null);


             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = FinancialHelp::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('officer_return', null);


             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = FinancialHelp::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->orderBy($columnName, $columnSortOrder);
             
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            // $items->where('officer_return', null || 'rejection_status',null);

            $items->where('officer_return', null);


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
                $edit='<div class="settings-main-icon"><a  href="' . route('couplefinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Returned</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('couplefinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('couplefinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
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
     
        $formData =FinancialHelp::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
            "officer_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }

        if($formData->officer_return_view_status==null && $formData->return_status==1){
            $formData->update([
            "officer_return_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_return_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.couplefinancial.details',compact('formData'));


    }
    public function couplefinancialApproveOfficer (Request $request){
        $marriage = FinancialHelp::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 1,
            'officer_return' => null,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Couple Financial Scheme Application Approved successfully.'
        ]);
    }
    public function couplefinancialRejectOfficer (Request $request){
        $marriage = FinancialHelp::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'officer_status' => 2,
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'officer_status_date' => $currenttime,
            'return_userid' => Auth::user()->id,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,

        ]);
        return response()->json([
            'success' => 'Couple Financial Application Rejected successfully.'
        ]);
    }
    public function couplefinancialRemoveOfficer (Request $request){
      //  dd($request);
        $marriage = FinancialHelp::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $marriage->update([
            'rejection_status' => 1,
            'officer_status' => 3,
            'teo_return' => null,////////////////
            'clerk_return' => null,
            'jsSeo_return' => null,
            'assistant_return' => null,
            'officer_return' => null,
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
             ->where('assistant_status',1)
             ->where('officer_return',null);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MotherChildScheme::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = MotherChildScheme::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null)
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
            else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
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

    public function getmotherChildSchemeListOfficerReturned(Request $request){
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
             ->where('assistant_return',null)
             ->where('officer_return',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MotherChildScheme::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_return',null)
                 ->where('officer_return',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = MotherChildScheme::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_return',null)
                 ->where('officer_return',1)
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

              $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';


            //   if($status == 1){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
            // }
            // else if($status ==2){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            // }
            // else if($status ==null){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
            // }

          
              
        
        
             
           
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
        if($formData->officer_return_view_status==null && $formData->return_status==1){
            $formData->update([
            "officer_return_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_return_view_date" =>$date .' ' .$currenttime
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
            'officer_return' => null,
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
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'return_date' => $currenttime,
            'return_userid' => Auth::user()->id,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Mother Child Scheme Application Return successfully.'
        ]);
    }

    public function motherChildSchemeRemoveOfficer (Request $request){
        //  dd($request);
        $motherChild = MotherChildScheme::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
        $motherChild->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
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
             ->where('assistant_status',1)
             ->where('officer_return',null);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MarriageGrant::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = MarriageGrant::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null)
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
            else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('marriageGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('marriageGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
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
    

    public function getmarriageGrantListOfficerReturned(Request $request){
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
             ->where('assistant_return',null)
             ->where('officer_return',1);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MarriageGrant::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_return',null)
                 ->where('officer_return',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = MarriageGrant::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_return',null)
                 ->where('officer_return',1)
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

              $edit='<div class="settings-main-icon"><a  href="' . route('marriageGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
             
           
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
        if($formData->officer_return_view_status==null && $formData->return_status==1){
            $formData->update([
            "officer_return_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_return_view_date" =>$date .' ' .$currenttime
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
            'officer_return' => null,
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
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'return_date' => $currenttime,
            'return_userid' => Auth::user()->id,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Marriage grant Scheme Application Rejected successfully.'
        ]);
    }

    public function marriageGrantRemoveOfficer (Request $request){
        //  dd($request);
        $motherChild = MarriageGrant::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
        $motherChild->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
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
             ->where('assistant_status',1)
             ->where('officer_return',null);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = HouseManagement::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = HouseManagement::where('deleted_at', null)
                 ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1)
                 ->where('officer_return',null)
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
            else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('houseGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('houseGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></a></div>';
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

    public function gethouseGrantListOfficerReturned(Request $request)
    {
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
              ->where('assistant_return',null)
              ->where('officer_return',1);
             
              if($name != ""){
                  $totalRecord->where('name','like',"%".$name."%");
              }
             
 
              $totalRecords = $totalRecord->select('count(*) as allcount')->count();
 
 
              $totalRecordswithFilte = HouseManagement::where('deleted_at',null)
               ->whereIn('submitted_teo', $teoIds)
                  ->where('submitted_district', $district)
                  ->where('assistant_return',null)
                  ->where('officer_return',1);
 
            
              if($name != ""){
                 $totalRecordswithFilte->where('name','like',"%".$name."%");
             }
            
            
 
              $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();
 
              // Fetch records
              
             
              $items = HouseManagement::where('deleted_at', null)
                  ->whereIn('submitted_teo', $teoIds)
                  ->where('submitted_district', $district)
                  ->where('assistant_return',null)
                  ->where('officer_return',1)
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

               $edit='<div class="settings-main-icon"><a  href="' . route('houseGrantDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
                    
            
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
        if($formData->officer_return_view_status==null && $formData->return_status==1){
            $formData->update([
            "officer_return_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_return_view_date" =>$date .' ' .$currenttime
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
            'officer_return' => null,
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
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'return_date' => $currenttime,
            'return_userid' => Auth::user()->id,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'House Grant Scheme Application Rejected successfully.'
        ]);
    }

    public function houseGrantRemoveOfficer(Request $request){
        //  dd($request);
        $houseGrant= HouseManagement::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
        $houseGrant->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,
          ]);
          return response()->json([
              'success' => 'Application Rejected successfully.'
          ]);
      }

    public function tuitionFeeListOfficer(){
        return view('PoTdo.tuitionFee.index');
    }

    public function gettuitionFeeListOfficerReturn(Request $request){
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
            
             $totalRecord->where('assistant_return', null)->where('officer_return', 1);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = TuitionFee::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('assistant_return', null)->where('officer_return', 1);

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
            $items->where('assistant_return', null)->where('officer_return', 1);

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
             
          
            $edit='<div class="settings-main-icon"><a  href="' . route('tuitionFeeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';

        
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
             $totalRecord->where('officer_return', null);

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = TuitionFee::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
                 ->where('submitted_district', $district)
                 ->where('assistant_status',1);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('officer_return', null);

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
            $items->where('officer_return', null);

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
                $edit='<div class="settings-main-icon"><a  href="' . route('tuitionFeeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Returnend</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('tuitionFeeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
            else if($status ==null){
                $edit='<div class="settings-main-icon"><a  href="' . route('tuitionFeeDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
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
        if($formData->officer_return_view_status==null && $formData->return_status==1){
            $formData->update([
                "officer_return_view_status"=>1,
                "officer_view_id" =>Auth::user()->id,
                "officer_return_view_date" =>$date .' ' .$currenttime
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
            'officer_return' => null,
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
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Tuition Fee Application Rejected successfully.'
        ]);
    }
    public function tuitionFeeRemoveOfficer (Request $request){
        //  dd($request);
          $marriage = TuitionFee::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
          $marriage->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,
          ]);
          return response()->json([
              'success' => 'Tuition Fee Application Rejected successfully.'
          ]);
      }

    public function StudentFundListOfficer(Request $request)
    {
        return view('PoTdo.studentFund.index');
  
    }
    public function getStudentFundListOfficer(Request $request)
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
             $totalRecord = MedEngStudentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
           
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MedEngStudentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
          
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MedEngStudentFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null)
             ->orderBy($columnName, $columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
             $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');;
         



         $data_arr = array();
            $i=$start;
         foreach($records as $record){
            $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $course_name = $record->course_name;
             $place = $record->place;
             $date=$record->date;
             $income=$record->income;
             $caste = $record->caste;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);

              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');

              $status = $record->officer_status;
              $teo_name=$record->teo->teo_name;
               
                
                 $edit='';
                 if($status == 1){
                   $edit='<div class="settings-main-icon"><a  href="' . route('studentFundOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
               }
               else if($status ==2){
                   $edit='<div class="settings-main-icon"><a  href="' . route('studentFundOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
             
               }
               else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('studentFundOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
               else if($status ==null){
                   $edit='<div class="settings-main-icon"><a  href="' . route('studentFundOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
               }



            $data_arr[] = array(
                "id" => $id,
               "sl_no" =>$i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "date" => $date .' ' .$record->time, 
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
    public function getStudentFundListOfficerReturn(Request $request)
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
             $totalRecord = MedEngStudentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);
      
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
           
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MedEngStudentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);
          
          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
          
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MedEngStudentFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1)
             ->orderBy($columnName, $columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }

                       
             $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');;
         



         $data_arr = array();
            $i=$start;
         foreach($records as $record){
            $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $course_name = $record->course_name;
             $place = $record->place;
             $date=$record->date;
             $income=$record->income;
             $caste = $record->caste;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);

              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');

              $status = $record->officer_status;
              $teo_name=$record->teo->teo_name;
               
                
                 $edit='';
                 $edit='<div class="settings-main-icon"><a href="'.route('studentFundOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="removeItem" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';

            $data_arr[] = array(
                "id" => $id,
               "sl_no" =>$i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "date" => $date .' ' .$record->time, 
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
    public function studentFundOfficerView(Request $request,$id)
    {
      
        $currentTime = Carbon::now();
  
        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $studentFund=MedEngStudentFund::find($id);
      if($studentFund->officer_view_status==null ){
        $studentFund->update([
        "officer_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_view_date" =>$date .' ' .$currenttime
        ]);
    }
    if($studentFund->officer_return_view_status==null && $studentFund->return_status==1){
        $studentFund->update([
        "officer_return_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_return_view_date" =>$date .' ' .$currenttime
        ]);
    }
    
      
        return view('PoTdo.studentFund.details', compact('studentFund'));
    }
    public function studentFundOfficerApprove (Request $request){
        $data = MedEngStudentFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
      $data->update([
        'officer_status' => 1,
        'officer_return' => null,
        'officer_status_date' => $currenttime,
        'officer_status_id' => Auth::user()->id,
        'officer_status_reason' => $reason,
    ]);
        return response()->json([
            'success' => 'Application approved Successfully.'
        ]);
    }
    public function studentFundOfficerReject (Request $request){
        $data = MedEngStudentFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      $data->update([
        'assistant_status' => 2,
        'teo_return' => 1,
        'clerk_return' => 1,
        'JsSeo_return' => 1,
        'assistant_return' => 1,
        'officer_return' => 1,
        'return_date' => $currenttime,
        'return_userid' => Auth::user()->id,
        'return_reason' => $reason,
        'assistant_status_date' => $currenttime,
        'assistant_status_id' => Auth::user()->id,
        'assistant_status_reason' => $reason,
    ]);
        return response()->json([
            'success' => 'Application Returned successfully.'
        ]);
    }

    public function studentfundRemoveOfficer (Request $request){
        //  dd($request);
          $studentfund = MedEngStudentFund::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
          $studentfund->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,
          ]);
          return response()->json([
              'success' => 'Application Rejected successfully.'
          ]);
      }

    public function singleEarnerListOfficer(Request $request)
    {
        return view('PoTdo.singleEarner.index');
    }
    public function getSingleEarnerListOfficer(Request $request)
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
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
            
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

              $status = $record->officer_status;
              $teo_name=$record->teo->teo_name;
               
                
                 $edit='';
                 if($status == 1){
                   $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
               }
               else if($status ==2){
                   $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
             
               }
               else if($status ==null){
                   $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
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

    public function singleEarnerOfficerView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
      if($formData->officer_view_status==null ){
        $formData->update([
        "officer_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_view_date" =>$date .' ' .$currenttime
        ]);
    }
       
        return view('PoTdo.singleEarner.view', compact('formData'));

    }
    public function singleEarnerOfficerApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data->update([
            'officer_status' => 1,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerOfficerReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();
        $data->update([
            'officer_status' => 2,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }
    public function anemiaFinanceListOfficer(Request $request)
    {
        return view('PoTdo.anemiaFinance.index');
    }
    public function getAnemiaFinanceListOfficer(Request $request)
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
             $totalRecord = AnemiaFinance::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
           
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = AnemiaFinance::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
          

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = AnemiaFinance::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $dob = $record->dob;
             $district = @$record->districtRelation->name;
              $created_at =  $record->created_at;

              $status = $record->officer_status;
              $teo_name=$record->submittedTeo->teo_name;
               
                
                 $edit='';
                 if($status == 1){
                   $edit='<div class="settings-main-icon"><a  href="' . route('anemiaFinanceOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
               }
               else if($status ==2){
                   $edit='<div class="settings-main-icon"><a  href="' . route('anemiaFinanceOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
             
               }
               else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('anemiaFinanceOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
               else if($status ==null){
                   $edit='<div class="settings-main-icon"><a  href="' . route('anemiaFinanceOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
               }

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,
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

    public function getAnemiaFinanceListOfficerReturned(Request $request)
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
             $totalRecord = AnemiaFinance::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
           
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = AnemiaFinance::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
          

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = AnemiaFinance::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $dob = $record->dob;
             $district = @$record->districtRelation->name;
              $created_at =  $record->created_at;

              $status = $record->officer_status;
              $teo_name=$record->submittedTeo->teo_name;
               
                
                 $edit='';

                 $edit='<div class="settings-main-icon"><a  href="' . route('anemiaFinanceOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';


            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,
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
    public function anemiaFinanceOfficerView(Request $request, $id)
    {           
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=AnemiaFinance::find($id);
      if($formData->officer_view_status==null ){
        $formData->update([
        "officer_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_view_date" =>$date .' ' .$currenttime
        ]);
    }
    if($formData->officer_return_view_status==null && $formData->return_status==1){
        $formData->update([
        "officer_return_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_return_view_date" =>$date .' ' .$currenttime
        ]);
    }
        $formData = AnemiaFinance::where('_id',$id)->first();
       
        return view('PoTdo.anemiaFinance.view', compact('formData'));

    }
    public function anemiaFinanceOfficerApprove(Request $request){
     
        $reason =$request->reason;
        $data = AnemiaFinance::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'officer_status' => 1,
            'officer_return' => null,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);



        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function anemiaFinanceOfficerReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = AnemiaFinance::where('_id', $request->id)->first();

        $data->update([
            'officer_status' => 2,
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'return_date' => $currenttime,
            'return_userid' => Auth::user()->id,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    public function anemiaFinanceOfficerRemove (Request $request){
        //  dd($request);
        $anemiaFinance = AnemiaFinance::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
        $anemiaFinance->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,
          ]);
          return response()->json([
              'success' => 'Mother Child Scheme Application Rejected successfully.'
          ]);
      }

    public function studentAwardListOfficer(Request $request)
    {
        return view('PoTdo.studentAward.index');
  
    }
    public function getStudentAwardListOfficer(Request $request)
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
             $totalRecord = StudentAward::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);
             // Total records
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = StudentAward::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);

             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }

           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = StudentAward::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $items->where('submitted_teo',$teo);
            }


             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $dob = $record->dob;
             $district = @$record->districtRelation->name;
              $created_at =  $record->created_at;

              $status = $record->officer_status;
              $teo_name=$record->submittedTeo->teo_name;
               
                
                 $edit='';
                 if($status == 1){
                   $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
               }
               else if($status ==2){
                   $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
             
               }
               else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
               else if($status ==null){
                   $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
               }

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,  
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

    public function getStudentAwardListOfficerReturned(Request $request)
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
             $totalRecord = StudentAward::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);
             // Total records
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = StudentAward::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);

             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }

           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = StudentAward::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_return',null)
             ->where('officer_return',1);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $items->where('submitted_teo',$teo);
            }


             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $dob = $record->dob;
             $district = @$record->districtRelation->name;
              $created_at =  $record->created_at;

              $status = $record->officer_status;
              $teo_name=$record->submittedTeo->teo_name;
               
                
                 $edit='';

                 $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,  
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
    
    public function studentAwardOfficerView(Request $request, $id)
    {   
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=StudentAward::find($id);
      if($formData->officer_view_status==null ){
        $formData->update([
        "officer_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_view_date" =>$date .' ' .$currenttime
        ]);
    }
    if($formData->officer_return_view_status==null && $formData->return_status==1){
        $formData->update([
        "officer_return_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_return_view_date" =>$date .' ' .$currenttime
        ]);
    }
              
        $formData = StudentAward::where('_id',$id)->first();
       
        return view('PoTdo.studentAward.view', compact('formData'));

    }
    public function studentAwardOfficerApprove(Request $request){
     
        $reason =$request->reason;
        $studentAward = StudentAward::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $studentAward->update([
            'officer_status' => 1,
            'officer_return' => null,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function studentAwardOfficerReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $studentAward = StudentAward::where('_id', $request->id)->first();
     

        $studentAward->update([
            'officer_status' => 2,
            'teo_return' => 1,
            'clerk_return' => 1,
            'JsSeo_return' => 1,
            'assistant_return' => 1,
            'officer_return' => 1,
            'return_date' => $currenttime,
            'return_userid' => Auth::user()->id,
            'officer_status_date' => $currenttime,
            'officer_status_id' => Auth::user()->id,
            'officer_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }

    public function studentAwardOfficerRemove (Request $request){
        //  dd($request);
        $studentAward = StudentAward::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
        $studentAward->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,
          ]);
          return response()->json([
              'success' => 'Application Rejected successfully.'
          ]);
      }

    public function officerItiFundList(Request $request)
    {
        return view('PoTdo.itiFund.index');
  
    }
    public function getOfficerItiFundList(Request $request)
    {
        
        $name = $request->name;
        $user_id=Auth::user()->id;
        $district=Auth::user()->district;
  
  
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
             $totalRecord = ItiFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
         
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             $totalRecord->where('officer_return',null);
  
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();
  
  
             $totalRecordswithFilte = ItiFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('officer_return',null);
  
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();
  
             // Fetch records
             $items = ItiFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            $items->where('officer_return',null);
  
             $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');
         
            
  
  
         $data_arr = array();
  $i=$start;
         foreach($records as $record){
            $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $course_name = $record->course_name;
             $place = $record->place;
             $date=$record->date;
             $income=$record->income;
             $caste = $record->caste;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);
  
              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');
  
           
              $teo_name=@$record->teo->teo_name;
             
              $status = $record->officer_status;
            
               
                
                 $edit='';
                 if($status == 1){
                   $edit='<div class="settings-main-icon"><a  href="' . route('itiFeeOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
               }
               else if($status ==2){
                   $edit='<div class="settings-main-icon"><a  href="' . route('itiFeeOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
             
               }
               else if($status ==3){
                $edit='<div class="settings-main-icon"><a  href="' . route('itiFeeOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
          
            }
               else if($status ==null){
                   $edit='<div class="settings-main-icon"><a  href="' . route('itiFeeOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
               }

            $data_arr[] = array(
                "id" => $id,
               "sl_no" => $i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "teo" =>$teo_name,
                "date" => $date .' ' .$record->time, 
                                
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

    public function getOfficerItiFundListReturn(Request $request)
    {
        
        $name = $request->name;
        $user_id=Auth::user()->id;
        $district=Auth::user()->district;
  
  
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
             $totalRecord = ItiFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
         
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            
             $totalRecord->where('assistant_return',null)->where('officer_return',1);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();
  
  
             $totalRecordswithFilte = ItiFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('assistant_return',null)->where('officer_return',1);
  
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();
  
             // Fetch records
             $items = ItiFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1);
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            $items->where('assistant_return',null)->where('officer_return',1);
  
             $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');
         
            
  
  
         $data_arr = array();
  $i=$start;
         foreach($records as $record){
            $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $course_name = $record->course_name;
             $place = $record->place;
             $date=$record->date;
             $income=$record->income;
             $caste = $record->caste;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);
  
              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');
  
           
              $teo_name=@$record->teo->teo_name;
             
              $status = $record->officer_status;
            
               
                
                 $edit='';
                 if($status == 1){
                   $edit='<div class="settings-main-icon"><a  href="' . route('itiFeeOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
               }
               else if($status ==2){
                   $edit='<div class="settings-main-icon"><a  href="' . route('itiFeeOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
             
               }
               else if($status ==null){
                   $edit='<div class="settings-main-icon"><a  href="' . route('itiFeeOfficerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
               }

            $data_arr[] = array(
                "id" => $id,
               "sl_no" => $i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "teo" =>$teo_name,
                "date" => $date .' ' .$record->time, 
                                
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
  
    public function itiFeeOfficerView(Request $request,$id)
    {
      
        $currentTime = Carbon::now();
  
        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $studentFund=ItiFund::find($id);
      if($studentFund->officer_view_status==null ){
        $studentFund->update([
        "officer_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_view_date" =>$date .' ' .$currenttime
        ]);
    }
    if($studentFund->officer_return_view_status==null && $studentFund->return_status==1){
        $studentFund->update([
        "officer_return_view_status"=>1,
        "officer_view_id" =>Auth::user()->id,
        "officer_return_view_date" =>$date .' ' .$currenttime
        ]);
    }
      
        return view('PoTdo.itiFund.details', compact('studentFund'));
    }
    public function itiScholarshipOfficerApprove (Request $request){
        $data = ItiFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      $data->update([
        'officer_status' => 1,
        'officer_return' => null,
        'officer_status_date' => $currenttime,
        'officer_status_id' => Auth::user()->id,
        'officer_status_reason' => $reason,
    ]);
        return response()->json([
            'success' => 'Application approved Successfully.'
        ]);
    }
    public function itiScholarshipOfficerReject (Request $request){
        $data = ItiFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
      $data->update([
        'officer_status' => 2,
        'teo_return' => 1,
        'clerk_return' => 1,
        'JsSeo_return' => 1,
        'assistant_return' => 1,
        'officer_return' => 1,
        'return_date' => $currenttime,
        'return_userid' => Auth::user()->id,
        'officer_status_date' => $currenttime,
        'officer_status_id' => Auth::user()->id,
        'officer_status_reason' => $reason,
    ]);
        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    }

    public function itiScholarshipOfficerRemove (Request $request){
        //  dd($request);
        $motherChild = ItiFund::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
        $motherChild->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,
          ]);
          return response()->json([
              'success' => 'Mother Child Scheme Application Rejected successfully.'
          ]);
      }

    public function ChildFinanceListOfficer(){
        return view('PoTdo.childFinance.index');
    }
    public function getchildFinanceListOfficer(Request $request){
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
             ->where('assistant_status',1)
             ->where('officer_return',null);
            
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ChildFinance::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null);

           
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             
            
             $items = ChildFinance::where('deleted_at', null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('assistant_status',1)
             ->where('officer_return',null)
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
           //  $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
           // $teo_name=$record->teo->teo_name;
              $created_at =  $record->created_at;         
           

              $teo_name=@$record->teo->teo_name;
       
          $status = $record->officer_status;          
               
                
          $edit='';
          if($status == 1){
            $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
        }
        else if($status ==2){
            $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
      
        }
        else if($status ==3){
            $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->officer_status_reason.'</span></div>';
      
        }
        else if($status ==null){
            $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
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

    public function getchildFinanceListOfficerReturned(Request $request)
    {
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
              ->where('assistant_return',null)
              ->where('officer_return',1);
             
              if($name != ""){
                  $totalRecord->where('name','like',"%".$name."%");
              }
             
 
              $totalRecords = $totalRecord->select('count(*) as allcount')->count();
 
 
              $totalRecordswithFilte = ChildFinance::where('deleted_at',null)
              ->whereIn('submitted_teo', $teoIds)
              ->where('submitted_district', $district)
              ->where('assistant_return',null)
              ->where('officer_return',1);
 
            
              if($name != ""){
                 $totalRecordswithFilte->where('name','like',"%".$name."%");
             }
            
            
 
              $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();
 
              // Fetch records
              
             
              $items = ChildFinance::where('deleted_at', null)
              ->whereIn('submitted_teo', $teoIds)
              ->where('submitted_district', $district)
              ->where('assistant_return',null)
              ->where('officer_return',1)
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
            //  $status = $record->clerk_status;
             $date = $record->date;
             $time = $record->time;
            // $teo_name=$record->teo->teo_name;
               $created_at =  $record->created_at;         
            
 
               $teo_name=@$record->teo->teo_name;
        
           $status = $record->officer_status;          
                
                 
           $edit='';

           $edit='<div class="settings-main-icon"><a  href="' . route('childFinancialDetailsOfficer',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a>&nbsp;&nbsp;<a class="remove" data-id="'.$id.'"><i class="fa fa-times bg-danger "></i></a></div>';
 
            
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

    public function childFinancialDetailsOfficer($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $formData =ChildFinance::find($id);
        if($formData->officer_view_status==null ){
            $formData->update([
            "officer_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_view_date" =>$date .' ' .$currenttime
            ]);
        }
        if($formData->officer_return_view_status==null && $formData->return_status==1){
            $formData->update([
            "officer_return_view_status"=>1,
            "officer_view_id" =>Auth::user()->id,
            "officer_return_view_date" =>$date .' ' .$currenttime
            ]);
        }
        
        return view('PoTdo.childFinance.details',compact('formData'));


    }

    public function childFinanceApproveOfficer (Request $request){
        $data = ChildFinance::where('_id', $request->id)->first();
        //dd($data);
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

      $data->update([
        'officer_status' => 1,
        'officer_return' => null,
        'officer_status_date' => $currenttime,
        'officer_status_id' => Auth::user()->id,
        'officer_status_reason' => $reason,
    ]);
        return response()->json([
            'success' => 'Application approved Successfully.'
        ]);
    }
    public function childFinanceRejectOfficer (Request $request){
        $data = ChildFinance::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
      $data->update([
        'officer_status' => 2,
        'teo_return' => 1,
        'clerk_return' => 1,
        'JsSeo_return' => 1,
        'assistant_return' => 1,
        'officer_return' => 1,
        'return_date' => $currenttime,
        'return_userid' => Auth::user()->id,
        'officer_status_date' => $currenttime,
        'officer_status_id' => Auth::user()->id,
        'officer_status_reason' => $reason,
    ]);
        return response()->json([
            'success' => 'Application Return successfully.'
        ]);
    }

    public function childFinanceRemoveOfficer(Request $request){
        //  dd($request);
        $motherChild = ChildFinance::where('_id', $request->id)->first();
          $id = $request->id;
          $reason =$request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        
         
        $motherChild->update([
              'rejection_status' => 1,
              'officer_status' => 3,
              'teo_return' => null,////////////////
              'clerk_return' => null,
              'jsSeo_return' => null,
              'assistant_return' => null,
              'officer_return' => null,
              'officer_status_date' => $currenttime,
              'officer_status_id' => Auth::user()->id,
              'officer_status_reason' => $reason,
          ]);
          return response()->json([
              'success' => 'Application Rejected successfully.'
          ]);
      }
}
