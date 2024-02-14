<?php

namespace App\Http\Controllers;

use App\Models\ItiFund;
use App\Models\Teo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ClerkController extends Controller
{
  public function ChildFinanceListClerk(){
    return view('clerk.ChildFinanceList');
  }





























































  public function clerkItiFundList(Request $request)
  {
      return view('clerk.itiFund.index');

  }
  public function getClerkItiFundList(Request $request)
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
           ->where('teo_status',1);
       
           if($name != ""){
               $totalRecord->where('name','like',"%".$name."%");
           }
          

           $totalRecords = $totalRecord->select('count(*) as allcount')->count();


           $totalRecordswithFilte = ItiFund::where('deleted_at',null)
           ->whereIn('submitted_teo', $teoIds)
           ->where('submitted_district', $district)
           ->where('teo_status',1);
        
           if($name != ""){
              $totalRecordswithFilte->where('name','like',"%".$name."%");
          }
         
         

           $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

           // Fetch records
           $items = ItiFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
           ->whereIn('submitted_teo', $teoIds)
           ->where('submitted_district', $district)
           ->where('teo_status',1);
           if($name != ""){
              $items->where('name','like',"%".$name."%");
          }
         

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

            $edit ='';
            if(Auth::user()->role== "TEO"){
              if($record->teo_status== 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('adminItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div></div>';
              }
              else if($record->teo_status ==2){
                  $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                  $edit='<div class="settings-main-icon"><a  href="' . route('adminItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$teo_status_reason.'</span></div>';
            
              }
              else if($record->teo_status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('adminItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
              }
             
            }
            else{
              $edit='<div class="settings-main-icon"><a  href="' . route('adminItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
           
            }
          $data_arr[] = array(
              "id" => $id,
             "sl_no" => $i,
              "name" => $name,
              "address" => $address,
              "course_name" => $course_name,
              "caste" => $caste,
              "income" =>$income,
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

  public function itiFeeClerkView(Request $request,$id)
  {
     
      $currentTime = Carbon::now();

      $date = $currentTime->format('d-m-Y');
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
    $currenttime = $currentTimeInKerala->format('h:i A');
   
    $studentFund=ItiFund::find($id);
      if($studentFund->teo_view_status==null && Auth::user()->role=='TEO'){
          $studentFund->update([
          "teo_view_status"=>1,
          "teo_view_id" =>Auth::user()->id,
          "teo_view_date" =>$date .' ' .$currenttime
          ]);
      }
    
      return view('admin.itiFund.details', compact('studentFund'));
  }

}
