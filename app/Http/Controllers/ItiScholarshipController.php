<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\ItiFund;
use App\Models\Institution;
use App\Models\Taluk;
use App\Models\Teo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ItiScholarshipController extends Controller
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
        $institutions=Institution::where('deleted_at',null)->get();
        return view("user.itiFund.create",compact('districts','institutions'));
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
            'income_certificate' => 'max:2048',
            // 'caste' => 'required',
             'caste_certificate' => 'max:2048',
             'signature' => 'required|max:2048',
             // 'parent_name' => 'required',
              'attendance_doc' => 'nullable|max:2048',
              'applicant_image' => 'required|max:2048',
            'submitted_district' => 'required',
            'submitted_teo' => 'required',
            
                 
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
       
        if ($request->hasfile('applicant_image')) {

            $image = $request->applicant_image;
            $applicant_img = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/itiStudentFund'), $applicant_img);

            $applicant_image = $applicant_img;

        }else{
            $applicant_image = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/itiStudentFund'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('attendance_doc')) {

            $image1 = $request->attendance_doc;
            $imgfileName1 = time() . rand(100, 999) . '.' . $image1->extension();

            $image1->move(public_path('/itiStudentFund'), $imgfileName1);

            $attendance_doc = $imgfileName1;

        }else{
            $attendance_doc = '';
        }
        if ($request->hasfile('income_certificate')) {

            $image2 = $request->income_certificate;
            $imgfileName2 = time() . rand(100, 999) . '.' . $image2->extension();

            $image2->move(public_path('/itiStudentFund'), $imgfileName2);

            $income_certificate = $imgfileName2;
            // session(['file_details' => [
            //     'path' => '/itiStudentFund/'.$income_certificate,
            //     'original_name' => $imgfileName2,
            // ]]);

        }else{
            $income_certificate = '';
        }
        if ($request->hasfile('caste_certificate')) {

            $image3 = $request->caste_certificate;
            $imgfileName3 = time() . rand(100, 999) . '.' . $image3->extension();

           $path= $image3->move(public_path('/itiStudentFund'), $imgfileName3);

            $caste_certificate = $imgfileName3;

        }else{
            $caste_certificate = '';
        }
      
        $formData = $data;
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
                if($request->current_institution!=''){
                    $inst=Institution::where('_id',$request->current_institution)->first();
                    $formData['institution_name']= $inst->name;
                   }
      $formData['signature']= $signature;
      $formData['applicant_image']= $applicant_image;
      $formData['attendance_doc']= $attendance_doc;
      $formData['caste_certificate']= $caste_certificate;
      $formData['income_certificate']= $income_certificate;
      $currentDate = Carbon::now();

        // Format the date if needed
        $formattedDate = $currentDate->toDateString();
        $formData['date']= $formattedDate;
        $request->flash();
        // $request->flashExcept(['income_certificate']);
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $time = $currentTimeInKerala->format('h:i A');
        $formData['time']= $time;
        return view('user.itiFund.preview', compact('formData'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TuitionFee  $tuitionFee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentFund=ItiFund::find($id);
        return view('user.itiFund.details', compact('studentFund'));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TuitionFee  $tuitionFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TuitionFee $tuitionFee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TuitionFee  $tuitionFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(TuitionFee $tuitionFee)
    {
        //
    }


    public function itiScholarshipForm(Request $request)
    {

        $districts=District::all();
        $institutions=Institution::where('deleted_at',null)->get();
        return view("user.itiFund.create",compact('districts','institutions'));

       
    }
    

   

    public function itiFundStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);
     

        $datainsert = ItiFund::create([
            'name' => @$data['name'],
            'address' => @$data['address'],
            'course_name' => @$data['course_name'],
            'class_start_date' => @$data['class_start_date'],
            'admission_type' => @$data['admission_type'],
            'caste' => $data['caste'],
            'caste_certificate' => $data['caste_certificate'],
            'income' => @$data['income'],
            'income_certificate' => @$data['income_certificate'],
            'account_details' => @$data['account_details'],
            'signature' => @$data['signature'],
            'parent_name' => @$data['parent_name'],
            'attendance_doc' => @$data['attendance_doc'],
            'applicant_image' => @$data['applicant_image'],
            'date' => @$data['date'],
            'user_id' =>Auth::user()->id, 
            'status' =>0,
            'current_district_name' => @$data['current_district_name'],
            'current_taluk_name' => @$data['current_taluk_name'],
            'current_pincode' => @$data['current_pincode'],
            'submitted_district' => @$data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'submitted_district_name' => @$data['dist_name'],
            'submitted_teo_name' => @$data['teo_name'],
            'current_district' => $data['current_district'],
            'current_taluk' => @$data['current_taluk'],
            'institution_name' => @$data['institution_name'],
            'current_institution' => @$data['current_institution'],
            'time' => @$data['time'],

            'panchayath' => $data['panchayath'],
            'metric_type' => @$data['metric_type'],
            'course_duration' => @$data['course_duration'],
            'institution_type' => @$data['institution_type'],
            'admission_date' => @$data['admission_date'],
            'parent_bank_branch' => $data['parent_bank_branch'],
            'parent_account_no' => @$data['parent_account_no'],
            'parent_ifsc_code' => @$data['parent_ifsc_code'],
            'principal_bank_branch' => @$data['principal_bank_branch'],
            'principal_account_no' => @$data['principal_account_no'],
            'principal_ifsc_code' => @$data['principal_ifsc_code'],
        ]);


        return redirect('userItiFundList')->with('status','Application Submitted Successfully.');

    }

    public function userItiFundList(Request $request)
    {
        return view("user.itiFund.index");

    }


    public function getUserItiFundList(Request $request)
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
             $totalRecord = ItiFund::where('user_id',$user_id)->where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ItiFund::where('user_id',$user_id)->where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = ItiFund::where('user_id',$user_id)->where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
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
             $course_duration=$record->course_duration;
             $institution_type = $record->institution_type;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);

              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');
            $data_arr[] = array(
                "id" => $id,
               "sl_no" =>$i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "course_duration" => $course_duration,
                "institution_type" => $institution_type,
                "created_at" => $date .' ' .$record->time,               
                "edit" => '<div class="settings-main-icon"><a  href="' . route('userItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
   

    public function adminItiFundList(Request $request)
    {
        return view('admin.itiFund.index');

    }



    
    public function getAdminItiFundList(Request $request)
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
             $totalRecord = ItiFund::where('deleted_at',null);
             if(Auth::user()->role =="TEO"){
                $totalRecord =  $totalRecord ->where('submitted_teo',Auth::user()->teo_name);
             }
            
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            
             $totalRecord->where('teo_return', null);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ItiFund::where('deleted_at',null);
             if(Auth::user()->role =="TEO"){
                $totalRecordswithFilte =  $totalRecordswithFilte ->where('submitted_teo',Auth::user()->teo_name);
             }
          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('teo_return', null);

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = ItiFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
             if(Auth::user()->role =="TEO"){
                $items =  $items ->where('submitted_teo',Auth::user()->teo_name);
             }
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            $items->where('teo_return', null);

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
            $course_duration=$record->course_duration;
            $institution_type = $record->institution_type;
             $created_at =  $record->created_at;
             $carbonDate = Carbon::parse($record->created_at);

              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');

              $edit ='';
              if(Auth::user()->role== "TEO"){
                if($record->teo_status== 1){
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit='<div class="settings-main-icon"><a  href="' . route('adminItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$teo_status_reason.'</span></div>';
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
            //     "id" => $id,
            //    "sl_no" => $i,
            //     "name" => $name,
            //     "address" => $address,
            //     "course_name" => $course_name,
            //     "income" =>$income,
            //     "caste" => $caste,
            //     "date" => $date .' ' .$record->time, 
                
                "id" => $id,
                "sl_no" =>$i,
                 "name" => $name,
                 "address" => $address,
                 "course_name" => $course_name,
                 "course_duration" => $course_duration,
                 "institution_type" => $institution_type,
                 "created_at" => $date .' ' .$record->time, 

                                
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

    public function getItiFundReturnList(Request $request)
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
             $totalRecord = ItiFund::where('deleted_at',null);
             if(Auth::user()->role =="TEO"){
                $totalRecord =  $totalRecord ->where('submitted_teo',Auth::user()->teo_name);
             }
            
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            
             $totalRecord->where('teo_return', 1);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ItiFund::where('deleted_at',null);
             if(Auth::user()->role =="TEO"){
                $totalRecordswithFilte =  $totalRecordswithFilte ->where('submitted_teo',Auth::user()->teo_name);
             }
          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('teo_return', 1);

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = ItiFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
             if(Auth::user()->role =="TEO"){
                $items =  $items ->where('submitted_teo',Auth::user()->teo_name);
             }
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            $items->where('teo_return', 1);

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
            $course_duration=$record->course_duration;
            $institution_type = $record->institution_type;
             $created_at =  $record->created_at;
             $carbonDate = Carbon::parse($record->created_at);

              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');

              $edit ='';
              if(Auth::user()->role== "TEO"){
                $edit='<div class="settings-main-icon"><a  href="' .  route('adminItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="btn btn-primary" href="' .  url('iti-fund-application-edit/' . $id) . '">Resubmit</a></div>';

               
              }
              else{
                $edit='<div class="settings-main-icon"><a  href="' . route('adminItiFundList.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
             
              }
            $data_arr[] = array(
            //     "id" => $id,
            //    "sl_no" => $i,
            //     "name" => $name,
            //     "address" => $address,
            //     "course_name" => $course_name,
            //     "income" =>$income,
            //     "caste" => $caste,
            //     "date" => $date .' ' .$record->time, 
                
                "id" => $id,
                "sl_no" =>$i,
                 "name" => $name,
                 "address" => $address,
                 "course_name" => $course_name,
                 "course_duration" => $course_duration,
                 "institution_type" => $institution_type,
                 "created_at" => $date .' ' .$record->time, 

                                
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
    public function itiFundApplicationEdit(Request $request)
    {

        $data = Auth::user();
        $districts = District::get();
        $datas = ItiFund::where('_id',$request->id)->first();
      //  dd($datas);
        return view('itiFund.edit', compact('data', 'districts','datas'));
    }

    public function itiAdminFeeView(Request $request,$id)
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

    public function teoApprove(Request $request){
        $id = $request->id;
        $reason =$request->reason;
       // $currentTime = Carbon::now();
        $studentFund = ItiFund::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $studentFund->update([
            'teo_status' => 1,
            'teo_status_date' =>$currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Scolarship for students in ITI/Training Centres Application approved successfully.'
        ]);
    
    }
    public function teoReject(Request $request){
        $id = $request->id;
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $studentFund = ItiFund::where('_id', $request->id)->first();

      

        $studentFund->update([
            'teo_status' => 2,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Scolarship for students in ITI/Training Centres Application Rejected successfully.'
        ]);
    
    }



}
