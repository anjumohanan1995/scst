<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\ItiFund;
use App\Models\Institution;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ItiScholarshipController extends Controller
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
            'income' => 'required',
            'income_certificate' => 'required',
            'caste' => 'required',
            'caste_certificate' => 'required',
            'signature' => 'required',
            'parent_name' => 'required',
            'parent_signature' => 'required',
            
                 
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
       
      
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/itiStudentFund'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('parent_signature')) {

            $image1 = $request->parent_signature;
            $imgfileName1 = time() . rand(100, 999) . '.' . $image1->extension();

            $image1->move(public_path('/itiStudentFund'), $imgfileName1);

            $parent_signature = $imgfileName1;

        }else{
            $parent_signature = '';
        }
        if ($request->hasfile('income_certificate')) {

            $image2 = $request->income_certificate;
            $imgfileName2 = time() . rand(100, 999) . '.' . $image2->extension();

            $image2->move(public_path('/itiStudentFund'), $imgfileName2);

            $income_certificate = $imgfileName2;

        }else{
            $income_certificate = '';
        }
        if ($request->hasfile('caste_certificate')) {

            $image3 = $request->caste_certificate;
            $imgfileName3 = time() . rand(100, 999) . '.' . $image3->extension();

            $image3->move(public_path('/itiStudentFund'), $imgfileName3);

            $caste_certificate = $imgfileName3;

        }else{
            $caste_certificate = '';
        }
      
        $formData = $data;
       
      $formData['signature']= $signature;
      $formData['parent_signature']= $parent_signature;
      $formData['caste_certificate']= $caste_certificate;
      $formData['income_certificate']= $income_certificate;
      $currentDate = Carbon::now();

        // Format the date if needed
        $formattedDate = $currentDate->toDateString();
        $formData['date']= $formattedDate;
        return view('user.itiFund.preview', compact('formData'));
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


    public function itiScholarshipForm(Request $request)
    {

        $districts=District::all();
        $institutions=Institution::all();
        return view("user.itiFund.create",compact('districts','institutions'));

       
    }
    

   

    public function itiFundStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);
     

        $datainsert = ItiFund::create([
            'name' => $data['name'],
            'address' => @$data['address'],
            'course_name' => @$data['course_name'],
            'class_start_date' => @$data['class_start_date'],
            'admission_type' => @$data['admission_type'],
            'caste' => $data['caste'],
            'caste_certificate' => $data['caste_certificate'],
            'income' => @$data['income'],
            'income_certificate' => @$data['income_certificate'],
            'account_details' => @$data['account_details'],
            'signature' => $data['signature'],
            'parent_name' => $data['parent_name'],
            'parent_signature' => $data['parent_signature'],
            'date' => $data['date'],
            'user_id' =>Auth::user()->id, 
            'status' =>0,
            'current_district_name' => $data['current_district_name'],
            'current_taluk_name' => $data['current_taluk_name'],
            'current_pincode' => $data['current_pincode'],
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'current_district' => $data['current_district'],
            'current_taluk' => @$data['current_taluk'],
            'institution_name' => $data['institution_name'],
            'current_institution' => @$data['current_institution'],
        ]);


        return redirect()->route('home')->with('success','Application Submitted Successfully.');

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
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "student_name" => $student_name,
                "caste" => $caste,
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
      
        $formData = TuitionFee::where('_id',$id)->first();
       
        return view('user.tuitionFee.details', compact('formData'));



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
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "student_name" => $student_name,
                "caste" => $caste,
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . url('tuitionAdminFeeView/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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

    public function tuitionAdminFeeView(Request $request)
    {
        $formData = TuitionFee::where('_id',$id)->first();
       
        return view('admin.tuitionFee.details', compact('formData'));
    }

    



}
