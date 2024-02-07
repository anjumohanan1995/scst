<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\HouseManagement;
use App\Models\Taluk;
use App\Models\Teo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HouseManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::all();
    return view("houseMng.create",compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->current_taluk);
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z]+$/',
            'submitted_district' => 'required',
            'submitted_teo' => 'required', 
            'signature' => 'required|max:2048',
            'applicant_image' => 'required|max:2048',
            'prove_eligibility_file' => 'max:2048',
            
           
                 
        ]);
        if ($request->input('payment_details') == 'yes') {
            $validator->sometimes('payment_amount', 'required', function ($input) {
                return $input->payment_details == 'yes';
            });
        
            $validator->sometimes('date_received', 'required', function ($input) {
                return $input->payment_details == 'yes';
            });
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        if ($request->hasfile('applicant_image')) {

            $image = $request->applicant_image;
            $applicant_img = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/homeMng'), $applicant_img);

            $applicant_image = $applicant_img;

        }else{
            $applicant_image = '';
        }
      
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/homeMng'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('prove_eligibility_file')) {

            $eligibility = $request->prove_eligibility_file;
            $imgfileName1 = time() . rand(100, 999) . '.' . $eligibility->extension();

            $eligibility->move(public_path('/homeMng'), $imgfileName1);

            $eligibility_file = $imgfileName1;

        }else{
            $eligibility_file = '';
        }
        $formData = $data;
      if($request->payment_details==''){
        $formData['payment_details']="no";
      }
      if($request->current_district!=''){
       $dis=District::where('_id',$request->current_district)->first();
       $formData['current_district_name']= $dis->name;
      }
      if($request->current_taluk!=''){
        $taluk=Taluk::where('_id',$request->current_taluk)->first();
        $formData['current_taluk_name']= $taluk->taluk_name;
       }
       if($request->submitted_district!=''){
        $dis1=District::where('_id',$request->submitted_district)->first();
        $formData['dist_name']= $dis1->name;
       }
       if($request->submitted_teo!=''){
         $teo=Teo::where('_id',$request->submitted_teo)->first();
         $formData['teo_name']= $teo->teo_name;
        }
       
      $formData['signature']= $signature;
      $formData['applicant_image']= $applicant_image;
      $formData['prove_eligibility_file']= $eligibility_file;
      $currentDate = Carbon::now();

// Format the date if needed
$formattedDate = $currentDate->toDateString();
      $formData['date']= $formattedDate;
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $time = $currentTimeInKerala->format('h:i A');
      $formData['time']= $time;
      $request->flash();
        return view('houseMng.preview', compact('formData'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $houseManagement=HouseManagement::find($id);
        return view('houseMng.details', compact('houseManagement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseManagement $houseManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseManagement $houseManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseManagement $houseManagement)
    {
        //
    }
    public function userHouseGrantList(Request $request)
    {
        return view('user.house_grant_list');

    }
    public function getUserHouseGrantList(Request $request)
    {
        
        $name = $request->name;
        $user_id=Auth::user()->id;


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
             $totalRecord = HouseManagement::where('user_id',$user_id)->where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = HouseManagement::where('user_id',$user_id)->where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = HouseManagement::where('user_id',$user_id)->where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
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
             $panchayath = $record->panchayath;
             $place = $record->place;
             $caste = $record->caste;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);

              // Extract date
              $date = $carbonDate->format('d-m-Y');
              
              // Extract time
              $time =@$record->time;
            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "place" => $place,
                "name" => $name,
                "address" => $address,
                "panchayath" => $panchayath,
                "caste" => $caste,
                "date" => $date,      
                "time" => $time,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . route('houseGrant.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function HouseGrantStoreDetails (Request $request)
    {

        $data = json_decode($request->input('formData'), true);
     

        $datainsert = HouseManagement::create([
            'name' => $data['name'],
            'address' => @$data['address'],
            'panchayath' => @$data['panchayath'],
            'ward_no' => @$data['ward_no'],
            'caste' => @$data['caste'],
            'annual_income' => @$data['annual_income'],
            'house_details' => @$data['house_details'],
            'agency' => @$data['agency'],
            'last_payment_year' => @$data['last_payment_year'],
            'family_details' => @$data['family_details'],
            'nature_payment' => @$data['nature_payment'],
            'payment_details' => @$data['payment_details'],
            'payment_amount' => @$data['payment_amount'],
            'date_received' => @$data['date_received'],
            'prove_eligibility_file' => @$data['prove_eligibility_file'],
            'prove_eligibility' => @$data['prove_eligibility'],
            'place' => @$data['place'],
            'date' => @$data['date'],
            'signature' => @$data['signature'],
            'applicant_image' => @$data['applicant_image'],
            'user_id' =>Auth::user()->id, 
            'status' =>0,
            'current_district_name' => @$data['current_district_name'],
            'current_taluk_name' => @$data['current_taluk_name'],
            'current_pincode' => @$data['current_pincode'],
            'submitted_district' => @$data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'dist_name' => $data['dist_name'],
            'teo_name' => @$data['teo_name'],
            'current_district' => $data['current_district'],
            'current_taluk' => @$data['current_taluk'],
            'time' =>@$data['time'],
            
            

        ]);
        return redirect()->route('userHouseGrantList')->with('status','Application Submitted Successfully.');
       // return redirect()->route('home')->with('success','Application Submitted Successfully.');
    }
    public function adminHouseGrantList(Request $request)
    {
        return view('admin.houseMng.house_grant_list');

    }
    public function getAdminHouseGrantList(Request $request)
    {
        
        $name = $request->name;
        $user_id=Auth::user()->id;
        $role =  Auth::user()->role;       
        $teo =  Auth::user()->teo_name;

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
             $totalRecord = HouseManagement::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }
            if($role == "TDO" || $role == "Project Officer"){
                $totalRecord->where('submitted_teo',$teo)->where('teo_status',1);
            }

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = HouseManagement::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }
           
            if($role == "TDO" || $role == "Project Officer"){
                $totalRecordswithFilte->where('submitted_teo',$teo)->where('teo_status',1);
            }
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = HouseManagement::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $items->where('submitted_teo',$teo);
            }
            if($role == "TDO" || $role == "Project Officer"){
                $items->where('submitted_teo',$teo)->where('teo_status',1);
            }
             $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');
         



         $data_arr = array();
            $i=$start;
         foreach($records as $record){
            $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $panchayath = $record->panchayath;
             $place = $record->place;
             $caste = $record->caste;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);

              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');
              $edit='';
              if($role == "TDO" && $record->pjct_offcr_status == 1) {
                $approved_status =" Approved By Project Officer";
              }
              else if($role == "Project Officer" && $record->tdo_status == 1){
                $approved_status ="Approved By TDO ";
              }
              else{
                $approved_status ="Approved  ";
              }

              if($role == "TDO" && $record->pjct_offcr_status == 2) {
                $rejected_status =" Rejected By Project Officer";
                $status_reason =Str::limit($record->pjct_offcr_status_reason, 10);
              }
              else if($role == "TDO" && $record->tdo_status == 2){
                $rejected_status =" Rejected";
                $status_reason =Str::limit($record->tdo_status_reason, 10);
              
              }
              else if($role == "Project Officer" && $record->tdo_status == 2){
                $rejected_status ="Rejected By TDO ";
                $status_reason =Str::limit($record->tdo_status_reason, 10);
              
              }
              else if($role == "Project Officer" && $record->pjct_offcr_status == 2){
                $rejected_status ="Rejected ";
                $status_reason =Str::limit($record->pjct_offcr_status_reason, 10);
               
              }
              else{
                $rejected_status ="Rejected ";
              }



              if($role == "TEO"){
                if($record->teo_status== 1){
                    $edit='<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div></div>';
                }
                else if($record->teo_status ==2){
                    $edit='<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->teo_status_reason.'</span></div>';
              
                }
                else if($record->teo_status ==null){
                    $edit='<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
                }
               
              }
              else if($role == "TDO" || $role == "Project Officer"){
               
                if($record->tdo_status== 1 || $record->pjct_offcr_status== 1 ){
                    $edit = '<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">'.$approved_status.'</div></div>';
                }
                else if($record->tdo_status ==2 || $record->pjct_offcr_status== 2){
                    $edit='<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">'.$rejected_status.'</div>&nbsp;&nbsp;<span>'.$status_reason.'</span></div>';
              
                }
                else {
                    $edit='<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
                }
               
              }
              else{
                $edit='<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
             
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
    public function getAdminHouseGrantDetails($id){
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
        $houseManagement=HouseManagement::find($id);
        if($houseManagement->teo_view_status==null && Auth::user()->role=='TEO'){
            $houseManagement->update([
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime
            ]);
        }
        else  if($houseManagement->tdo_view_status==null && Auth::user()->role=='TDO'){
            $houseManagement->update([
            "tdo_view_status"=>1,
            "tdo_view_id" =>Auth::user()->id,
            "tdo_view_date" =>$date .' ' .$currenttime
            ]);
        }
        else  if($houseManagement->pjct_offcr_view_status==null && Auth::user()->role=='Project Officer'){
            $houseManagement->update([
            "pjct_offcr_view_status"=>1,
            "pjct_offcr_view_id" =>Auth::user()->id,
            "pjct_offcr_view_date" =>$date .' ' .$currenttime
            ]);
        }
        return view('admin.houseMng.details', compact('houseManagement'));
    }
   
    public function redirectBack(){
        //dd("fkhsdfjh");
        //return redirect()->route('houseGrant.create')->withInput();
        return redirect()->route('houseGrant.create')->withInput();
    }

    public function teoApprove(Request $request){
        $id = $request->id;

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $houseGrant = HouseManagement::where('_id', $request->id)->first();

      if(Auth::user()->role == "TEO"){
        $houseGrant->update([
            'teo_status' => 1,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
        ]);
      }

       else  if(Auth::user()->role == "TDO"){
        $houseGrant->update([
            'tdo_status' => 1,
            'tdo_status_date' => $currenttime,
            'tdo_status_id' => Auth::user()->id,
        ]);
      }

      else  if(Auth::user()->role == "Project Officer"){
        $houseGrant->update([
            'pjct_offcr_status' => 1,
            'pjct_offcr_status_date' => $currenttime,
            'pjct_offcr_status_id' => Auth::user()->id,
        ]);
      }

        return response()->json([
            'success' => 'House Grant Scheme Application approved successfully.'
        ]);
    
    }
    public function teoReject(Request $request){

        // dd('holo');
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $houseGrant = HouseManagement::where('_id', $request->id)->first();

      
        if(Auth::user()->role == "TEO"){
        $houseGrant->update([
            'teo_status' => 2,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);
        }
        else  if(Auth::user()->role == "TDO"){
            $houseGrant->update([
                'tdo_status' => 2,
                'tdo_status_date' => $currenttime,
                'tdo_status_id' => Auth::user()->id,
                'tdo_status_reason' => $reason,
            ]);
        }
        else  if(Auth::user()->role == "Project Officer"){
            $houseGrant->update([
                'pjct_offcr_status' => 2,
                'pjct_offcr_status_date' => $currenttime,
                'pjct_offcr_status_id' => Auth::user()->id,
                'pjct_offcr_status_reason' => $reason,
            ]);
          }

        return response()->json([
            'success' => 'House Grant Scheme Application Rejected successfully.'
        ]);
    
    }
}
