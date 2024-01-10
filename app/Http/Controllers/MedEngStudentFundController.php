<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\MedEngStudentFund;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $course_name = $record->course_name;
             $place = $record->place;
             $date=$record->date;
             $income=$record->income;
             $caste = $record->caste;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
               
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "created_at" => $created_at,                  
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

            $image->move(public_path('/medEngStudentFund'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        if ($request->hasfile('parent_signature')) {

            $image1 = $request->parent_signature;
            $imgfileName1 = time() . rand(100, 999) . '.' . $image1->extension();

            $image1->move(public_path('/medEngStudentFund'), $imgfileName1);

            $parent_signature = $imgfileName1;

        }else{
            $parent_signature = '';
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
       
      $formData['signature']= $signature;
      $formData['parent_signature']= $parent_signature;
      $formData['caste_certificate']= $caste_certificate;
      $formData['income_certificate']= $income_certificate;
      $currentDate = Carbon::now();

// Format the date if needed
$formattedDate = $currentDate->toDateString();
      $formData['date']= $formattedDate;
        return view('user.studentFund.preview', compact('formData'));
    }

    public function StudentFundStore(Request $request){
        $data = json_decode($request->input('formData'), true);
     

        $datainsert = MedEngStudentFund::create([
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
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MedEngStudentFund::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MedEngStudentFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $course_name = $record->course_name;
             $place = $record->place;
             $date=$record->date;
             $income=$record->income;
             $caste = $record->caste;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
               
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . route('adminStudentFundDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
        $studentFund=MedEngStudentFund::find($id);
        return view('admin.studentFund.details', compact('studentFund'));

    }
}
