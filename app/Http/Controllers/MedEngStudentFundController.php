<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\MedEngStudentFund;
use App\Models\Taluk;
use App\Models\Teo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MedEngStudentFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       return view("user.studentFund.index");
    }

    public function getStudentFundList(Request $request){
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
             $totalRecord = MedEngStudentFund::where('user_id',$user_id)->where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MedEngStudentFund::where('user_id',$user_id)->where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MedEngStudentFund::where('user_id',$user_id)->where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
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

              // Extract date
              $date = $carbonDate->format('d-m-Y');
              
              // Extract time
              $time = $carbonDate->format('H:i a');
            
            $data_arr[] = array(
                "id" => $id,
               "sl_no" =>$i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "date" => $date.' ' .$record->time,                   
                "edit" => '<div class="settings-main-icon"><a  href="' . route('MedicalEngineeringStudentFund.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
       public function create()
    {
        $districts=District::all();
        return view("user.studentFund.create",compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
           // 'income' => 'required',
         'income_certificate' => 'max:2048',
            // 'caste' => 'required',
             'caste_certificate' => 'max:2048',
             'signature' => 'required|max:2048',
            // 'parent_name' => 'required',
             'allotment_demo' => 'nullable|max:2048',
             'applicant_image' => 'required|max:2048',
            'submitted_district' => 'required',
            'submitted_teo' => 'required',
            
                 
        ]);
        if ($request->input('account_details') == 'yes') {
            $validator->sometimes('account_no', 'required', function ($input) {
                return $input->account_details == 'yes';
            });
        
            $validator->sometimes('ifsc_code', 'required', function ($input) {
                return $input->account_details == 'yes';
            });
            $validator->sometimes('bank_branch', 'required', function ($input) {
                return $input->account_details == 'yes';
            });
        }
        if ($request->input('admission_type') == 'others') {
            $validator->sometimes('other_details', 'required', function ($input) {
                return $input->admission_type == 'others';
            });
        
           
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
       
        if ($request->hasfile('applicant_image')) {

            $image = $request->applicant_image;
            $applicant_img = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/medEngStudentFund'), $applicant_img);

            $applicant_image = $applicant_img;

        }else{
            $applicant_image = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/medEngStudentFund'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('allotment_memo')) {

            $image1 = $request->allotment_memo;
            $imgfileName1 = time() . rand(100, 999) . '.' . $image1->extension();

            $image1->move(public_path('/medEngStudentFund'), $imgfileName1);

            $allotment_memo = $imgfileName1;

        }else{
            $allotment_memo = '';
        }
        if ($request->hasfile('income_certificate')) {

            $image2 = $request->income_certificate;
            $imgfileName2 = time() . rand(100, 999) . '.' . $image2->extension();

            $image2->move(public_path('/medEngStudentFund'), $imgfileName2);

            $income_certificate = $imgfileName2;

        }else{
            $income_certificate = '';
        }
        if ($request->hasfile('caste_certificate')) {

            $image3 = $request->caste_certificate;
            $imgfileName3 = time() . rand(100, 999) . '.' . $image3->extension();

            $image3->move(public_path('/medEngStudentFund'), $imgfileName3);

            $caste_certificate = $imgfileName3;

        }else{
            $caste_certificate = '';
        }
      
        $formData = $data;
        if($request->account_details==''){
            $formData['account_details']="no";
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
      $formData['allotment_memo']= $allotment_memo;
      $formData['applicant_image']= $applicant_image;
      $formData['caste_certificate']= $caste_certificate;
      $formData['income_certificate']= $income_certificate;
      $currentDate = Carbon::now();

// Format the date if needed
$formattedDate = $currentDate->toDateString();
      $formData['date']= $formattedDate;
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $time = $currentTimeInKerala->format('h:i A');
      $formData['time']= $time;
      $request->flash();
      
        return view('user.studentFund.preview', compact('formData'));
    }

    public function StudentFundStore(Request $request){
        $data = json_decode($request->input('formData'), true);
     

        $datainsert = MedEngStudentFund::create([
            'name' => @$data['name'],
            'address' => @$data['address'],
            'course_name' => @$data['course_name'],
            'class_start_date' => @$data['class_start_date'],
            'admission_type' => @$data['admission_type'],
            'caste' => @$data['caste'],
            'caste_certificate' => @$data['caste_certificate'],
            'income' => @$data['income'],
            'income_certificate' => @$data['income_certificate'],
            'account_details' => @$data['account_details'],
            'account_no' => @$data['account_no'],
            'ifsc_code' => @$data['ifsc_code'],
            'bank_branch' => @$data['bank_branch'],
            'signature' => @$data['signature'],
            'parent_name' => @$data['parent_name'],
            'applicant_image' => @$data['applicant_image'],
            'allotment_memo' => @$data['allotment_memo'],
            'date' => @$data['date'],
            'user_id' =>Auth::user()->id, 
            'status' =>0,
            'current_district_name' => @$data['current_district_name'],
            'current_taluk_name' => @$data['current_taluk_name'],
            'current_pincode' => @$data['current_pincode'],
            'submitted_district' => @$data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'dist_name' => @$data['dist_name'],
            'teo_name' => @$data['teo_name'],
            'current_district' => $data['current_district'],
            'current_taluk' => @$data['current_taluk'],
            'time' => @$data['time'],
            'panchayath' => @$data['panchayath'],
            'institution_type' => @$data['institution_type'],
            'other_details' => @$data['other_details'],
        ]);

        return redirect()->route('MedicalEngineeringStudentFund.index')->with('status','Application Submitted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedEngStudentFund  $medEngStudentFund
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentFund=MedEngStudentFund::find($id);
        return view('user.studentFund.details', compact('studentFund'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedEngStudentFund  $medEngStudentFund
     * @return \Illuminate\Http\Response
     */
    public function edit(MedEngStudentFund $medEngStudentFund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedEngStudentFund  $medEngStudentFund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedEngStudentFund $medEngStudentFund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedEngStudentFund  $medEngStudentFund
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedEngStudentFund $medEngStudentFund)
    {
        //
    }


    public function adminStudentFundList(){
        return view("admin.studentFund.index");
    }
    public function getAdminStudentFundList(Request $request){
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
             $totalRecord = MedEngStudentFund::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }
             $totalRecord->where('teo_return', null);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MedEngStudentFund::where('deleted_at',null);
          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }
             $totalRecordswithFilte->where('teo_return', null);
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MedEngStudentFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $items->where('submitted_teo',$teo);
            }
            $items->where('teo_return', null);
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
              $edit ='';
              if($role == "TEO"){
                if($record->teo_status== 1){
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit='<div class="settings-main-icon"><a  href="' . route('adminStudentFundDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$teo_status_reason.'</span></div>';
                }
                else if($record->teo_status ==2){
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit='<div class="settings-main-icon"><a  href="' . route('adminStudentFundDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$teo_status_reason.'</span></div>';
              
                }
                else if($record->teo_status ==null){
                    $edit='<div class="settings-main-icon"><a  href="' . route('adminStudentFundDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;</div>';
                }
               
              }
              else{
                $edit='<div class="settings-main-icon"><a  href="' . route('adminStudentFundDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
             
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
    public function getAdminStudentFundListReturn(Request $request){
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
             $totalRecord = MedEngStudentFund::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }
             $totalRecord->where('teo_return', null);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MedEngStudentFund::where('deleted_at',null);
          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }
             $totalRecordswithFilte->where('teo_return', 1);
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MedEngStudentFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $items->where('submitted_teo',$teo);
            }
            $items->where('teo_return',1);
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
              $edit ='';
              
              $edit='<div class="settings-main-icon"><a  href="' .  url('MedicalEngineeringStudentFund/' . $id) . '"><i class="fa fa-eye bg-info me-1"></i></a><a class="btn btn-primary" href="' .  url('medical-engineering/' . $id) . '">Resubmit</a></div>';

            $data_arr[] = array(
                "id" => $id,
               "sl_no" =>$i,
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
    public function adminStudentFundDetails ($id){


        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $studentFund=MedEngStudentFund::find($id);
        if($studentFund->teo_view_status==null && Auth::user()->role=='TEO'){
            $studentFund->update([
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime
            ]);
        }
       
        return view('admin.studentFund.details', compact('studentFund'));

    }
    public function teoApprove(Request $request){
        $id = $request->id;
        $reason =$request->reason;
       // $currentTime = Carbon::now();
        $studentFund = MedEngStudentFund::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $studentFund->update([
            'teo_status' => 1,
            'teo_status_date' =>$currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Medical/Engineering Student Fund Scheme Application approved successfully.'
        ]);
    
    }
    public function teoReject(Request $request){
        $id = $request->id;
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $studentFund = MedEngStudentFund::where('_id', $request->id)->first();

      

        $studentFund->update([
            'teo_status' => 2,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Medical/Engineering Student Fund Scheme Application Rejected successfully.'
        ]);
    
    }

    public function medicalEngineeringEdit(Request $request){

        $data = Auth::user();
        $districts = District::get();
        $datas = MedEngStudentFund::where('_id',$request->id)->first();

        return view('admin.studentFund.edit',compact('districts','data','datas'));
    }
    public function MedicalEngineeringStudentFundupdate(Request $request ,$id)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
           // 'income' => 'required',
         'income_certificate' => 'max:2048',
            // 'caste' => 'required',
             'caste_certificate' => 'max:2048',
             'signature' => 'required|max:2048',
            // 'parent_name' => 'required',
             'allotment_demo' => 'nullable|max:2048',
             'applicant_image' => 'required|max:2048',
            'submitted_district' => 'required',
            'submitted_teo' => 'required',
            
                 
        ]);
        if ($request->input('account_details') == 'yes') {
            $validator->sometimes('account_no', 'required', function ($input) {
                return $input->account_details == 'yes';
            });
        
            $validator->sometimes('ifsc_code', 'required', function ($input) {
                return $input->account_details == 'yes';
            });
            $validator->sometimes('bank_branch', 'required', function ($input) {
                return $input->account_details == 'yes';
            });
        }
        if ($request->input('admission_type') == 'others') {
            $validator->sometimes('other_details', 'required', function ($input) {
                return $input->admission_type == 'others';
            });
        
           
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
       
        if ($request->hasfile('applicant_image')) {

            $image = $request->applicant_image;
            $applicant_img = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/medEngStudentFund'), $applicant_img);

            $applicant_image = $applicant_img;

        }else{
            $applicant_image = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/medEngStudentFund'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('allotment_memo')) {

            $image1 = $request->allotment_memo;
            $imgfileName1 = time() . rand(100, 999) . '.' . $image1->extension();

            $image1->move(public_path('/medEngStudentFund'), $imgfileName1);

            $allotment_memo = $imgfileName1;

        }else{
            $allotment_memo = '';
        }
        if ($request->hasfile('income_certificate')) {

            $image2 = $request->income_certificate;
            $imgfileName2 = time() . rand(100, 999) . '.' . $image2->extension();

            $image2->move(public_path('/medEngStudentFund'), $imgfileName2);

            $income_certificate = $imgfileName2;

        }else{
            $income_certificate = '';
        }
        if ($request->hasfile('caste_certificate')) {

            $image3 = $request->caste_certificate;
            $imgfileName3 = time() . rand(100, 999) . '.' . $image3->extension();

            $image3->move(public_path('/medEngStudentFund'), $imgfileName3);

            $caste_certificate = $imgfileName3;

        }else{
            $caste_certificate = '';
        }
      
        $formData = $data;
        if($request->account_details==''){
            $formData['account_details']="no";
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

        $datainsert = MedEngStudentFund::where('_id',$request->id)->first();
        
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
        $datainsert->update([
            'name' => @$request['name'],
            'address' => @$request['address'],
            'course_name' => @$request['course_name'],
            'class_start_date' => @$request['class_start_date'],
            'admission_type' => @$request['admission_type'],
            'caste' => @$request['caste'],
            'caste_certificate' => @$request['caste_certificate'],
            'income' => @$request['income'],
            'income_certificate' => @$request['income_certificate'],
            'account_details' => @$request['account_details'],
            'account_no' => @$request['account_no'],
            'ifsc_code' => @$request['ifsc_code'],
            'bank_branch' => @$request['bank_branch'],
            'signature' => @$request['signature'],
            'parent_name' => @$request['parent_name'],
            'applicant_image' => @$request['applicant_image'],
            'allotment_memo' => @$request['allotment_memo'],
            'date' => @$request['date'],
            //'user_id' =>Auth::user()->id, 
            'status' =>0,
            'current_district_name' => @$request['current_district_name'],
            'current_taluk_name' => @$request['current_taluk_name'],
            'current_pincode' => @$request['current_pincode'],
            'submitted_district' => @$request['submitted_district'],
            'submitted_teo' => @$request['submitted_teo'],
            'dist_name' => @$request['dist_name'],
            'teo_name' => @$request['teo_name'],
            'current_district' => $request['current_district'],
            'current_taluk' => @$request['current_taluk'],
            'time' => @$request['time'],
            'panchayath' => @$request['panchayath'],
            'institution_type' => @$request['institution_type'],
            'other_details' => @$request['other_details'],
            'teo_return' => null,
            'return_status' =>1,
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime,
            "teo_status_date"=>$date .' ' .$currenttime,
            "teo_return_view_date" =>$date .' ' .$currenttime 
        ]);

        return redirect()->route('adminStudentFundList')->with('status','Application updated Successfully.');
    }
}
