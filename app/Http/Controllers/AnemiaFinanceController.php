<?php

namespace App\Http\Controllers;

use App\Models\AnemiaFinance;
use App\Models\District;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;
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


class AnemiaFinanceController extends Controller
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


     public function anemiaFinancialAssistance()
     {
        
         $districts = District::get();
         return view('application.anemia_finance',compact('districts'));
     }

    
    public function anemiaFinancePreview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required']
           
        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('caste_certificate')) {

            $image = $request->caste_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/anemia_finance'), $imgfileName);

            $caste_certificate = $imgfileName;

        }else{
            $caste_certificate = '';
        }
        if ($request->hasfile('adhaar_copy')) {

            $adhar = $request->adhaar_copy;
            $imgfileName1 = time() . rand(100, 999) . '.' . $adhar->extension();

            $adhar->move(public_path('/applications/anemia_finance'), $imgfileName1);

            $adhaar_copy = $imgfileName1;

        }else{
            $adhaar_copy = '';
        }
        if ($request->hasfile('passbook_copy')) {

            $passbook = $request->passbook_copy;
            $imgfileName2 = time() . rand(100, 999) . '.' . $passbook->extension();

            $passbook->move(public_path('/applications/anemia_finance'), $imgfileName2);

            $passbook_copy = $imgfileName2;

        }else{
            $passbook_copy = '';
        }
        if ($request->hasfile('ration_card')) {

            $ration = $request->passbook_copy;
            $imgfileName3 = time() . rand(100, 999) . '.' . $ration->extension();

            $ration->move(public_path('/applications/anemia_finance'), $imgfileName3);

            $ration_card = $imgfileName3;

        }else{
            $ration_card = '';
        }

        if ($request->hasfile('medical_certificate')) {

            $medical = $request->passbook_copy;
            $imgfileName4 = time() . rand(100, 999) . '.' . $medical->extension();

            $medical->move(public_path('/applications/anemia_finance'), $imgfileName4);

            $medical_certificate = $imgfileName4;

        }else{
            $medical_certificate = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/anemia_finance'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        $formData = $data;
        $formData['caste_certificate']= $caste_certificate;
        $formData['adhaar_copy']= $adhaar_copy;
        $formData['passbook_copy']= $passbook_copy;
        $formData['ration_card']= $ration_card;
        $formData['medical_certificate']= $medical_certificate;
        $formData['signature']= $signature;

        return view('application.anemia_finance_preview', compact('formData'));



        
    }
    public function anemiaFinanceStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);
       
      

        $datainsert = AnemiaFinance::create([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'age' => $data['age'],
            'caste' => $data['caste'],
            'caste_certificate' => $data['caste_certificate'],
            'phone' => $data['phone'],
            'district' => @$data['district'],
            'taluk' => @$data['taluk'],
            'pincode' => @$data['pincode'],
            'adhaar_number' => @$data['adhaar_number'],
            'adhaar_copy' => @$data['adhaar_copy'],
            'bank_account_details' => @$data['bank_account_details'],
            'passbook_copy' => @$data['passbook_copy'],
            'ration_card_type' => @$data['ration_card_type'],
            'ration_card' => $data['ration_card'],
            'is_medical_certificate_submitted' => @$data['is_medical_certificate_submitted'],
            'medical_certificate' => $data['medical_certificate'],  
            'date' => date('d-m-Y'),
            'place' => $data['place'],            
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
