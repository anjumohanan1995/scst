<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use App\Models\ExamApplication;

use App\Models\FinancialHelp;
use App\Models\ChildFinance;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\UTCDateTime;
use Illuminate\Support\Facades\Auth; // Make sure to include this line


class ChildFinanceController extends Controller
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

     public function childFinancialAssistanceForm()
    {

        $districts = District::get();
       
        return view('child.child_form',compact('districts'));
    }


    public function childFinancialAssistanceStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required|numeric', 
            'submitted_district' => 'required',
            'submitted_teo' => 'required',          
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('birth_certificate')) {

            $image = $request->birth_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/child/birth_certificate'), $imgfileName);

            $birth_certificate = $imgfileName;

        }else{
            $birth_certificate = '';
        }

        if ($request->hasfile('child_signature')) {

            $image = $request->child_signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/child/child_signature'), $imgfileName);

            $child_signature = $imgfileName;

        }else{
            $child_signature = '';
        }


        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/child/signature'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
      
        $formData = $data;
       
        $formData['birth_certificate']= $birth_certificate;
        $formData['child_signature']= $child_signature;
        $formData['signature']= $signature;
        return view('child.child_form_preview', compact('formData'));
    }

    public function childFinancialStoreDetails(Request $request)
    {
        $data = json_decode($request->input('formData'), true);

        $datainsert = ChildFinance::create([
            'name' => $data['name'],
            'age' => @$data['currentage_address'],
            'dob' => @$data['dob'],
            'birth_certificate' => @$data['birth_certificate'],
            'father_name' => @$data['father_name'],
            'mother_name' => @$data['mother_name'],
            'guardian_name' => @$data['guardian_name'],
            'address' => @$data['address'],
            'current_district' => @$data['current_district'],
            'current_district_name' => @$data['current_district_name'],
            'current_taluk' => @$data['current_taluk'],
            'current_taluk_name' => @$data['current_taluk_name'],
            'current_pincode' => @$data['current_pincode'],
            'caste' => @$data['caste'],
            'mobile' => @$data['mobile'],
            'account_number' => @$data['account_number'],
            'aadhar_number' => @$data['aadhar_number'],
            'voter_id' => @$data['voter_id'],
            'ration_card_number' => @$data['ration_card_number'],
            'place' => @$data['place'],
            'signature' => @$data['signature'],
            'child_signature' => @$data['child_signature'],
            'submitted_district' => @$data['dist_name'],
            'submitted_teo' => @$data['submitted_teo'],
            'dist_name' => @$data['dist_name'],
            'teo_name' => @$data['dob'],
            'date' => @$data['dob'],
            'user_id' =>Auth::user()->id, 
            'status' =>0
        ]);

        return redirect()->route('home')->with('success','Application Submitted Successfully.');

    }



    public function marriageGrantForm()
    {
        $districts = District::get();
        return view('application.marriage_grant_form',compact('districts'));
    }
   
    public function marriageGrantStoreDetails(Request $request)
    {

        $data = json_decode($request->input('formData'), true);
     

        $datainsert = MarriageGrant::create([
            'name' => $data['name'],
            'current_address' => @$data['current_address'],
            'current_district' => @$data['current_district'],
            'current_taluk' => @$data['current_taluk'],
            'current_pincode' => @$data['current_pincode'],
            'age' => $data['age'],
            'permanent_address' => $data['permanent_address'],
            'permanent_district' => @$data['permanent_district'],
            'permanent_taluk' => @$data['permanent_taluk'],
            'permanent_pincode' => @$data['permanent_pincode'],
            'family_details' => $data['family_details'],
            'caste' => $data['caste'],
            'caste_certificate' => $data['caste_certificate'],
            'name_and_address_fiancee' => $data['name_and_address_fiancee'],
            'relation_with_applicant' => $data['relation_with_applicant'],
            'marriage_count' =>$data['marriage_count'],
            'is_widow' => $data['is_widow'],
            'parent_occupation' => $data['parent_occupation'],
            'annual_income' => $data['annual_income'],
            'income_certificate' => $data['income_certificate'],
            'marriage_place' => $data['marriage_place'],
            'marriage_date' => $data['marriage_date'],
            'fiancee_family_details' => $data['fiancee_family_details'],
            'disabled_parent_info' => $data['disabled_parent_info'],
            'freedmen_parent_details' => $data['freedmen_parent_details'],
            'violence_by_non_scheduled_tribes_info' => $data['violence_by_non_scheduled_tribes_info'],
            'land_alienated_details' => $data['land_alienated_details'],
            'outcast_parent_details' => $data['outcast_parent_details'],
            'remarried_parent_details' => $data['remarried_parent_details'],
            'groom_name_and_address' => $data['groom_name_and_address'],
            'name_and_address_groom_parent' => $data['name_and_address_groom_parent'],
            'financial_assistance_details' => $data['financial_assistance_details'],
            'place' => $data['place'],
            'date' => $data['date'],
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'signature' => @$data['signature'],
            'user_id' =>Auth::user()->id, 
            'status' =>0
        ]);

        return redirect()->route('home')->with('success','Application Submitted Successfully.');
    }
    public function marriageGrantList(Request $request)
    {
        return view('admin.marriage_grant_list');

    }
    public function getmarriageGrantList(Request $request)
    {
        
        $name = $request->name;



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
             $totalRecord = MarriageGrant::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MarriageGrant::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MarriageGrant::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $current_address = $record->current_address;
             $age = $record->age;
             $caste = $record->caste;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "current_address" => $current_address,
                "age" => $age,
                "caste" => $caste,
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . url('marriageGrant/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function marriageGrantView(Request $request, $id)
    {     
      
        $formData = MarriageGrant::where('_id',$id)->first();
       
        return view('application.marriage_grant_view', compact('formData'));



    }
}
