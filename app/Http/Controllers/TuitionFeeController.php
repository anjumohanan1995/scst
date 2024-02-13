<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\TuitionFee;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TuitionFeeController extends Controller
{
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
        return view("user.tuitionFee.create",compact('districts'));
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
         
            'submitted_district' => 'required',
            'submitted_teo' => 'required',          
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

      

       

        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/tuition'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('principal_declaration')) {

            $image = $request->principal_declaration;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/tuition'), $imgfileName);

            $principal_declaration = $imgfileName;

        }else{
            $principal_declaration = '';
        }


        if ($request->hasfile('photo')) {

            $image = $request->photo;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/photo'), $imgfileName);

            $photo = $imgfileName;

        }else{
            $photo = '';
        }
      
        $formData = $data;
       
        $formData['principal_declaration']= $principal_declaration;
        $formData['signature']= $signature;
        $formData['photo']= $photo;
        $currentDate = Carbon::now();

        // Format the date if needed
        $formattedDate = $currentDate->toDateString();
        $formData['date']= $formattedDate;
        $request->flash();


        return view('user.tuitionFee.preview', compact('formData'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TuitionFee  $tuitionFee
     * @return \Illuminate\Http\Response
     */
    public function show(TuitionFee $tuitionFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TuitionFee  $tuitionFee
     * @return \Illuminate\Http\Response
     */
    public function edit(TuitionFee $tuitionFee)
    {
        //
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

   

    public function TuitionFeeStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);

        $datainsert = TuitionFee::create([
            'name' => $data['name'],
            'address' => @$data['address'],
            'current_district' => @$data['current_district'],
            'current_district_name' => @$data['current_district_name'],
            'current_taluk' => @$data['current_taluk'],
            'current_taluk_name' => @$data['current_taluk_name'],
            'current_pincode' => @$data['current_pincode'],
            'mobile' => @$data['mobile'],
            'caste' => @$data['caste'], 
            'relegion' => @$data['relegion'],
            'annual_income' => @$data['annual_income'],

            'student_name' => @$data['student_name'],
            'relation' => @$data['relation'],
            'school_name' => @$data['school_name'],
            'class_number' => @$data['class_number'],
            'tuition_center' => @$data['tuition_center'],
            'place' => @$data['place'],

            'signature' => @$data['signature'],
            'photo' => @$data['photo'],

            'submitted_district' => @$data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'dist_name' => @$data['dist_name'],
            'teo_name' => @$data['dob'],
            'date' =>date('d-m-Y'),
            'time'=>date('H:i:s'),
            'user_id' =>Auth::user()->id, 
            'status' =>0,
            'principal_declaration' => @$data['principal_declaration'],
            'panchayath' => @$data['panchayath'],
            'parent_bank_branch' => @$data['parent_bank_branch'],
            'parent_account_no' => @$data['parent_account_no'],
            'parent_ifsc_code' => @$data['parent_ifsc_code'],
        ]);

        return redirect('userTuitionFeeList')->with('status','Application Submitted Successfully.');

    }

    public function userTuitionFeeList(Request $request)
    {
        return view('user.tuitionFee.index');

    }


    public function getUserTuitionFeeList(Request $request)
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
             $totalRecord = TuitionFee::where('user_id',Auth::user()->id)->where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = TuitionFee::where('user_id',Auth::user()->id)->where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = TuitionFee::where('user_id',Auth::user()->id)->where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $student_name = $record->student_name;
             $caste = $record->caste;
             $date = $record->date;
             $time = $record->time;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "student_name" => $student_name,
                "caste" => $caste,
                "date" => $date." ".$time,  
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . url('tuitionUserFeeView/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function tuitionUserFeeView(Request $request, $id)
    {     
      



        
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $tuitionFee=TuitionFee::find($id);
        if($tuitionFee->teo_view_status==null && Auth::user()->role=='TEO'){
            $tuitionFee->update([
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime
            ]);
        }

        $formData = TuitionFee::where('_id',$id)->first();
       
        return view('user.tuitionFee.details', compact('formData','tuitionFee'));



    }

    public function adminTuitionFeeList(Request $request)
    {
        return view('admin.tuitionFee.index');

    }



    
    public function getTuitionFeeList(Request $request)
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
             $totalRecord = TuitionFee::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = TuitionFee::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = TuitionFee::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $student_name = $record->student_name;
             $caste = $record->caste;
             $date = $record->date;
             $time = $record->time;
              $created_at =  $record->created_at;
              $edit ='';
              if(Auth::user()->role== "TEO"){
                if($record->teo_status== 1){
                    $edit='<div class="settings-main-icon"><a  href="' . route('tuitionAdminFeeView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div></div>';
                }
                else if($record->teo_status ==2){
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit='<div class="settings-main-icon"><a  href="' . route('tuitionAdminFeeView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$teo_status_reason.'</span></div>';
              
                }
                else if($record->teo_status ==null){
                    $edit='<div class="settings-main-icon"><a  href="' . route('tuitionAdminFeeView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
                }
               
              }
              else{
                $edit='<div class="settings-main-icon"><a  href="' . route('tuitionAdminFeeView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
             
              }
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "student_name" => $student_name,
                "caste" => $caste,
                "created_at" => $created_at, 
                "date"=>  $date." ".$time,             
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

    public function tuitionAdminFeeView(Request $request,$id)
    {

        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
     
        $tuitionFee=TuitionFee::find($id);
        if($tuitionFee->teo_view_status==null && Auth::user()->role=='TEO'){
            $tuitionFee->update([
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime
            ]);
        }
        $formData = TuitionFee::where('_id',$id)->first();

       
        return view('admin.tuitionFee.details', compact('formData','tuitionFee'));
    }

    public function tuitionFeeTeoApprove(Request $request){
     
        $reason =$request->reason;
        $data = TuitionFee::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'teo_status' => 1,
            'teo_status_date' =>$currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function tuitionFeeTeoReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = TuitionFee::where('_id', $request->id)->first();

      

        $data->update([
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
