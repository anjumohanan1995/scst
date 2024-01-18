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
             $totalRecord = StudentAward::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }


             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = StudentAward::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }

           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = StudentAward::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
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

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,                 
                "edit" => '<div class="settings-main-icon"><a  href="' . url('studentAward/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
        $formData = StudentAward::where('_id',$id)->first();
       
        return view('admin.student_award_view', compact('formData'));

    }
    


}
