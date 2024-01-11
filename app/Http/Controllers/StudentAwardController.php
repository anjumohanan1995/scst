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

use App\Models\FinancialHelp;
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
            'name' => 'required']
           
        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

     
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/student_award'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        $formData = $data;
      
        $formData['signature']= $signature;

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
            'date' => date('d-m-Y'),         
            'user_id' =>Auth::user()->id, 
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'status' =>0
        ]);

        return redirect()->route('home')->with('success','Application Submitted Successfully.');
    }

    public function examApplicationList(Request $request)
    {
       
        return view('admin.exam_application_list');

    }

    public function getExamList(Request $request)
    {
        $name = $request->name;
        $mobile = $request->mobile;
        $role = $request->role;


         if($request->from_date !=''){

             $from_date  = date("M d,Y",strtotime($request->from_date));
             $stDate = new Carbon($from_date);
         }
         if($request->to_date !=''){
             $to_date  =   date("Y-m-d",strtotime($request->to_date));
             $edDate = new Carbon($to_date);
         }

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
             $totalRecord = ExamApplication::where('deleted_at',null);
             if($mobile != ""){
                 $totalRecord->where('mobile',$mobile);
             }
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role != ""){
                $totalRecord->where('role',$role);
            }
             if($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "" ){
                 //echo "khk";exit;
                 $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
             }

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ExamApplication::where('deleted_at',null);

             if($mobile != ""){
                 $totalRecordswithFilte->where('mobile',$mobile);
             }
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role != ""){
               $totalRecordswithFilte->where('role',$role);
           }
             if($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "" ){
                 //echo "khk";exit;
                 $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
             }

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = ExamApplication::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
             if($mobile != ""){
                 $items->where('mobile',$mobile);
             }
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            if($role != ""){
               $items->where('role',$role);
           }
             if($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "" ){
                 //echo "khk";exit;
                 $items->whereBetween('created_at', [$stDate, $edDate]);
             }

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $school_name = $record->school_name;
             $student_name = $record->student_name;
             $gender = $record->gender;
             $address = $record->address;
             $relation = $record->relation;
              $mother_name =  $record->mother_name;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "school_name" => $school_name,
                "student_name" => $student_name,
                "gender" => $gender,
                "address" => $address,
                "relation" => $relation,
                "mother_name" => $mother_name,
                "created_at" => $created_at,

               //  "more"=>'<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#exampleModal'.$id.'" data-bs-whatever="@mdo">More Details</button><div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">'.$name.'('.$age.')  </h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="eva eva-close-outline header-icons"><g data-name="Layer 2"><g data-name="close"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect><path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path></g></g></svg></button></div><div class="modal-body"><table id="example" class="table table-striped table-bordered" style="width:100%"><tbody><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Name</h6></div></td><td><div class="image-grouped"> '.$name.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Name</h6></div></td><td><div class="image-grouped">'.$gname.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Relationship</h6></div></td><td><div class="image-grouped">'.$g_relation.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Age</h6></div></td><td><div class="image-grouped"> '.$age.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Gender</h6></div></td><td><div class="image-grouped">'.$gender.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Mobile Number</h6></div></td><td><div class="image-grouped"> '.$mobile.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Adhar Number</h6></div></td><td><div class="image-grouped"> '.$adhar.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Scheme Id</h6></div></td><td><div class="image-grouped">  '.$sc_id.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Email Id</h6></div></td><td><div class="image-grouped"> '.$email.' </div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Abha Number</h6></div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Ration card Number</h6></div></td><td><div class="image-grouped"> '.$ration_card.' </div></td></tr></tbody></table></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>',
                "edit" => '<div class="settings-main-icon"><a  href="' . url('exam-application/'.$id) . '"><i class="fe fe-eye bg-info me-1"></i></a></div>'

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


    public function examApplicationView($id)
    { 
        $formData = ExamApplication::where('_id',$id)->first();
        return view('admin.exam_application_view', compact('formData'));

    }
    


    


}
