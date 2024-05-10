<?php

namespace App\Http\Controllers;

use App\Models\AnemiaFinance;
use App\Models\District;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;
use App\Models\StudentAward;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use App\Models\ExamApplication;
use Carbon\Carbon;
use App\Models\studentFund;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\UTCDateTime;
use Illuminate\Support\Facades\Auth; // Make sure to include this line


class StudentAwardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     public function studentAward()
     {
        
         $districts = District::get();
         return view('application.student_award',compact('districts'));
     }

    
    public function studentAwardPreview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'submitted_district' => 'required',
            'submitted_teo' => 'required',
            ]
           
        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('applicant_image')) {

            $image = $request->applicant_image;
            $applicant_img = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/student_award'), $applicant_img);

            $applicant_image = $applicant_img;

        }else{
            $applicant_image = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/student_award'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('syllabus_certificate')) {

            $image = $request->syllabus_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/student_award'), $imgfileName);

            $syllabus_certificate = $imgfileName;

        }else{
            $syllabus_certificate = '';
        }
        $formData = $data;
        $formData['syllabus_certificate']= $syllabus_certificate;
        $formData['signature']= $signature;
        $formData['applicant_image']= $applicant_image;
        $request->flash();

        return view('application.student_award_preview', compact('formData'));



        
    }
    public function studentAwardStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);
       
      

        $datainsert = StudentAward::create([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'district' => @$data['district'],
            'taluk' => @$data['taluk'],
            'pincode' => @$data['pincode'],
            'examination_passed' => @$data['examination_passed'],
            'guardian_name' => @$data['guardian_name'],
            'community' => @$data['community'],
            'panchayath_name' => @$data['panchayath_name'],
            'institution_name' => @$data['institution_name'],
            'pass_month' => $data['pass_month'],
            'pass_year' => @$data['pass_year'],
            'phone' => $data['phone'],  
            'account_number' => $data['account_number'],  
            'ifsc_code' => $data['ifsc_code'],  
            'aadhar_number' => $data['aadhar_number'],  
            'signature' => $data['signature'], 
            'applicant_image' => $data['applicant_image'],  
            'date' => date('d-m-Y'),         
            'user_id' =>Auth::user()->id, 
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'status' =>0,
            'syllabus_certificate' =>@$data['syllabus_certificate'],
            'syllabus' =>@$data['syllabus'],
            'mark' =>@$data['mark'],
        ]);

        return redirect('userStudentAwardList')->with('status','Application Submitted Successfully.');
    }


    // STUDENT AWARD FORM RETURN LIST

    public function getStudentAwardReturnList(Request $request)
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
             $totalRecord = StudentAward::where('deleted_at',null)->where('teo_return',1);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }


             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = StudentAward::where('deleted_at',null)->where('teo_return',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }

           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = StudentAward::where('deleted_at',null)->where('teo_return',1)->orderBy($columnName,$columnSortOrder);
            
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
              $edit ='';

              $edit='<div class="settings-main-icon"><a  href="' .  route('studentAwardView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="btn btn-primary" href="' .  url('studentAward-edit/' . $id) . '">Resubmit</a></div>';

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,                 
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

         // STUDENT AWARD FORM RETURN EDIT

         public function studentAwardEdit(Request $request)
         {
     
             $data = Auth::user();
             $districts = District::get();
             $datas = StudentAward::where('_id',$request->id)->first();
           
           //  dd($datas);
             return view('application.StudentAward-edit', compact('data', 'districts','datas'));
         }

              // STUDENT AWARD FORM RETURN UPDATE

    public function studentAwardUpdate(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'submitted_district' => 'required',
            'submitted_teo' => 'required',
            ]
           
        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('applicant_image')) {

            $image = $request->applicant_image;
            $applicant_img = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/student_award'), $applicant_img);

            $applicant_image = $applicant_img;

        }else{
            $applicant_image = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/student_award'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('syllabus_certificate')) {

            $image = $request->syllabus_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/student_award'), $imgfileName);

            $syllabus_certificate = $imgfileName;

        }else{
            $syllabus_certificate = '';
        }
       
        $data = $request->all();
        $datainsert =  StudentAward::where('_id',$request->id)->first();
       // dd($request->id);
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
        $datainsert->update([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'district' => @$data['district'],
            'taluk' => @$data['taluk'],
            'pincode' => @$data['pincode'],
            'examination_passed' => @$data['examination_passed'],
            'guardian_name' => @$data['guardian_name'],
            'community' => @$data['community'],
            'panchayath_name' => @$data['panchayath_name'],
            'institution_name' => @$data['institution_name'],
            'pass_month' => $data['pass_month'],
            'pass_year' => @$data['pass_year'],
            'phone' => $data['phone'],  
            'account_number' => $data['account_number'],  
            'ifsc_code' => $data['ifsc_code'],  
            'aadhar_number' => $data['aadhar_number'],  
            'signature' => $data['signature'], 
            'applicant_image' => $data['applicant_image'],  
            'date' => date('d-m-Y'),         
            // 'user_id' =>Auth::user()->id, 
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'status' =>0,
            'syllabus_certificate' =>@$data['syllabus_certificate'],
            'syllabus' =>@$data['syllabus'],
            'mark' =>@$data['mark'],
            'status' =>0,
            'teo_return' => null,
            'return_status' =>1,
            "teo_view_status"=>1,
            "teo_status_date"=>$date .' ' .$currenttime ,
            "teo_return_view_date" =>$date .' ' .$currenttime 
        ]);


        return redirect()->route('studentAwardList')->with('status', 'Application Submitted Successfully.');
    }


    public function studentAwardList(Request $request)
    {
        return view('admin.student_award_list');

    }
    public function getStudentAwardList(Request $request)
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
             $totalRecord = StudentAward::where('deleted_at',null)->where('teo_return', null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }


             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = StudentAward::where('deleted_at',null)->where('teo_return', null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }

           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = StudentAward::where('deleted_at',null)->where('teo_return', null)->orderBy($columnName,$columnSortOrder);
            
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
              $edit ='';
              if(Auth::user()->role== "TEO"){
                if($record->teo_status== 1){
                    $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div></div>';
                }
                else if($record->teo_status ==2){
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$teo_status_reason.'</span></div>';
              
                }
                else if($record->teo_status ==null){
                    $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a></div>';
                }
               
              }
              else{
                $edit='<div class="settings-main-icon"><a  href="' . route('studentAwardView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
             
              }
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,                 
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
    public function studentAwardView(Request $request, $id)
    {   
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=StudentAward::find($id);
        if($formData->teo_view_status==null && Auth::user()->role=='TEO'){
            $formData->update([
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime
            ]);
        }
              
        $formData = StudentAward::where('_id',$id)->first();
       
        return view('admin.student_award_view', compact('formData'));

    }
    public function studentAwardTeoApprove(Request $request){
     
        $reason =$request->reason;
        $studentAward = StudentAward::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $studentAward->update([
            'teo_status' => 1,
            'teo_status_date' =>$currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function studentAwardTeoReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $studentAward = StudentAward::where('_id', $request->id)->first();

      

        $studentAward->update([
            'teo_status' => 2,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    
    }


}
