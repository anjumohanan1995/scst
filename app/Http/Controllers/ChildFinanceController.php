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
use Carbon\Carbon;

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
        if ($request->hasfile('death_certificate')) {

            $image = $request->death_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/child/death_certificate'), $imgfileName);

            $death_certificate = $imgfileName;

        }else{
            $death_certificate = '';
        }

        if ($request->hasfile('tribal_extension_certificate')) {

            $image = $request->tribal_extension_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/child/tribal_extension_certificate'), $imgfileName);

            $tribal_extension_certificate = $imgfileName;

        }else{
            $tribal_extension_certificate = '';
        }

      
        $formData = $data;
       
        $formData['birth_certificate']= $birth_certificate;
        $formData['child_signature']= $child_signature;
        $formData['signature']= $signature;
        $formData['death_certificate']= $death_certificate;
        $formData['tribal_extension_certificate']= $tribal_extension_certificate;
        $request->flash();

        return view('child.child_form_preview', compact('formData'));
    }

    public function childFinancialStoreDetails(Request $request)
    {
        $data = json_decode($request->input('formData'), true);
       

        $datainsert = ChildFinance::create([
            'name' => $data['name'],
            'age' => @$data['age'],
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
            'email' => @$data['email'],
            'reason_for_orphan' => @$data['reason_for_orphan'],
            'reason' => @$data['reason'],
            'death_certificate' => @$data['death_certificate'],
            'tribal_extension_certificate' => @$data['tribal_extension_certificate'],
            'place' => @$data['place'],
            'signature' => @$data['signature'],
            'child_signature' => @$data['child_signature'],
            'submitted_district' => @$data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'dist_name' => @$data['dist_name'],
            'teo_name' => @$data['teo_name'],
            'date'=> date("d-m-Y"),
            'time'=> date("H:i:s"),
            'user_id' =>Auth::user()->id, 
            'status' =>0
        ]);

        return redirect()->route('userchildFinanceList')->with('status', 'Application Submitted Successfully.');

       // return redirect()->route('home')->with('success','Application Submitted Successfully.');

    }

    // CHILD FINANCE FORM RETURN LIST

    public function getchildFinanceReturnList(Request $request){

        $role =  Auth::user()->role;       
        $teo =  Auth::user()->teo_name;
        
 
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
              $totalRecord = ChildFinance::where('deleted_at',null)->where('teo_return', 1);
              if($role == "TEO"){
                 $totalRecord->where('submitted_teo',$teo);
             }
              if($name != ""){
                  $totalRecord->where('name','like',"%".$name."%");
              }
             
 
              $totalRecords = $totalRecord->select('count(*) as allcount')->count();
 
 
              $totalRecordswithFilte = ChildFinance::where('deleted_at',null)->where('teo_return', 1);
 
              if($role == "TEO"){
                 $totalRecordswithFilte->where('submitted_teo',$teo);
             }
              if($name != ""){
                 $totalRecordswithFilte->where('name','like',"%".$name."%");
             }
            
            
 
              $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();
 
              // Fetch records
              $items = ChildFinance::where('deleted_at',null)->where('teo_return', 1)->orderBy($columnName,$columnSortOrder);
              if($role == "TEO"){
                 $items->where('submitted_teo',$teo);
             }
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
              $status = $record->teo_status;
             $date = $record->date;
             $time = $record->time;
               $created_at =  $record->created_at;
               if($status ==1) $statusvalue='<span class="badge bg-success" style="height: 17px;">Approved</span>'.'<br>'.'Reason: '.@$record->teo_status_reason;
               elseif($status ==2) $statusvalue='<span class="badge bg-danger" style="height: 17px;">Rejected by'.@$record->RejectedUser->name.'</span>'.'<br>'.'Reason: '.@$record->teo_status_reason;
              $edit='';

              $edit='<div class="settings-main-icon"><a  href="' .  url('childFinance/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="btn btn-primary" href="' .  url('childFinance-edit/' . $id) . '">Resubmit</a></div>';
         
              
            
                 $data_arr[] = array(
                     "sl_no" => $i,
                     "id" => $id,
                     "name" => $name,
                     "age" => $age,
                     "address" => $address,
                     "caste" => $caste,
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
     // CHILD FINANCE FORM RETURN EDIT

    public function childFinanceEdit(Request $request)
    {

        $data = Auth::user();
        $districts = District::get();
        $datas = ChildFinance::where('_id',$request->id)->first();
      
      //  dd($datas);
        return view('application.ChildFinance-Scheme-edit', compact('data', 'districts','datas'));
    }

     // CHILD FINANCE FORM RETURN UPDATE

    public function childFinanceUpdate(Request $request)
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
        if ($request->hasfile('death_certificate')) {

            $image = $request->death_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/child/death_certificate'), $imgfileName);

            $death_certificate = $imgfileName;

        }else{
            $death_certificate = '';
        }

        if ($request->hasfile('tribal_extension_certificate')) {

            $image = $request->tribal_extension_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/child/tribal_extension_certificate'), $imgfileName);

            $tribal_extension_certificate = $imgfileName;

        }else{
            $tribal_extension_certificate = '';
        }
       
        $data = $request->all();
        $datainsert =  ChildFinance::where('_id',$request->id)->first();
       // dd($request->id);
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
        $datainsert->update([
            'name' => $data['name'],
            'age' => @$data['age'],
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
            'email' => @$data['email'],
            'reason_for_orphan' => @$data['reason_for_orphan'],
            'reason' => @$data['reason'],
            'death_certificate' => @$data['death_certificate'],
            'tribal_extension_certificate' => @$data['tribal_extension_certificate'],
            'place' => @$data['place'],
            'signature' => @$data['signature'],
            'child_signature' => @$data['child_signature'],
            'submitted_district' => @$data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'dist_name' => @$data['dist_name'],
            'teo_name' => @$data['teo_name'],
            'date'=> date("d-m-Y"),
            'time'=> date("H:i:s"),
            // 'user_id' =>Auth::user()->id, 
            'status' =>0,
            'teo_return' => null,
            'return_status' =>1,
            "teo_view_status"=>1,
            "teo_status_date"=>$date .' ' .$currenttime ,
            "teo_return_view_date" =>$date .' ' .$currenttime 
        ]);


        return redirect()->route('ChildFinanceList')->with('status', 'Application Submitted Successfully.');
    }




   
    public function ChildFinanceList(Request $request)
    {
        return view('admin.child_finance_list');

    }
    public function getchildFinanceList(Request $request)
    {
       $role =  Auth::user()->role;       
       $teo =  Auth::user()->teo_name;
       

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
             $totalRecord = ChildFinance::where('deleted_at',null)->where('teo_return', null);
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ChildFinance::where('deleted_at',null)->where('teo_return', null);

             if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = ChildFinance::where('deleted_at',null)->where('teo_return', null)->orderBy($columnName,$columnSortOrder);
             if($role == "TEO"){
                $items->where('submitted_teo',$teo);
            }
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
             $status = $record->teo_status;
            $date = $record->date;
            $time = $record->time;
              $created_at =  $record->created_at;
              if($status ==1) $statusvalue='<span class="badge bg-success" style="height: 17px;">Approved</span>'.'<br>'.'Reason: '.@$record->teo_status_reason;
              elseif($status ==2) $statusvalue='<span class="badge bg-danger" style="height: 17px;">Rejected by'.@$record->RejectedUser->name.'</span>'.'<br>'.'Reason: '.@$record->teo_status_reason;
             $edit='';
              if($role == "TEO"){
                if($status == 1 || $status == 2){
                    $edit ='<div class="settings-main-icon"><a  href="' . url('childFinance/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;'.$statusvalue.'</div>';
                }
                else{
                    $edit='<div class="settings-main-icon"><a  href="' . url('childFinance/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a></div>';
                }

              }
              else{
                $edit ='<div class="settings-main-icon"><a  href="' . url('childFinance/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
              }
        
        
             
           
                $data_arr[] = array(
                    "sl_no" => $i,
                    "id" => $id,
                    "name" => $name,
                    "age" => $age,
                    "address" => $address,
                    "caste" => $caste,
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
    public function childFinanceView(Request $request, $id)
    {     

        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $childFinancialHelp=ChildFinance::find($id);
        if($childFinancialHelp->teo_view_status==null && Auth::user()->role=='TEO'){
            $childFinancialHelp->update([
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime
            ]);
        }
      
        $formData = ChildFinance::where('_id',$id)->first();
       
        return view('admin.child_finance_view', compact('formData','childFinancialHelp'));



    }

    public function userchildFinanceList(Request $request)
    {     
      

        return view('child.user_child_finance_list');



    }

    public function getUserchildFinanceList(Request $request)
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
             $totalRecord = ChildFinance::where('deleted_at',null)->where('user_id',Auth::user()->id);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ChildFinance::where('deleted_at',null)->where('user_id',Auth::user()->id);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = ChildFinance::where('deleted_at',null)->where('user_id',Auth::user()->id)->orderBy($columnName,$columnSortOrder);
            
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
             $date = $record->date;
             $time = $record->time;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "sl_no" =>$i,
                "name" => $name,
                "address" => $address,
                "age" => $age,
                "caste" => $caste,
                'date'=>$date." ".$time,
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . url('userchildFinance/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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

    public function userchildFinanceView(Request $request, $id)
    {     
      
        $formData = ChildFinance::where('_id',$id)->first();
       
        return view('child.user_child_finance_view', compact('formData'));



    }

    
    public function approve(Request $request, $id)
    {
        $application_id = $request->application_id;
     
        $verify =ChildFinance::where('_id',$application_id)->first();
        $verify->teo_status = 1;
        $verify->teo_status_id = Auth::user()->id;
        $verify->teo_status_date = date('Y-m-d');
        $verify->teo_status_reason =$request->reason;
        $verify->update();


            return response()->json([
                'success' => 'Application Approved successfully.'
           ]);


    }


    public function reject(Request $request, $id)
    {
        $reason = $request->reason;
     
        $verify =ChildFinance::where('_id',$id)->first();
        $verify->teo_status = 2;
        $verify->teo_status_id = Auth::user()->id;
        $verify->teo_status_date = date('Y-m-d');
        $verify->teo_status_reason = $reason;
        $verify->update();


            return response()->json([
                'success' => 'Application Rejected successfully.'
           ]);


    }
    

    



}
