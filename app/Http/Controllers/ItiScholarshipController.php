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
             'signature' => 'max:2048',
            // 'parent_name' => 'required',
             'parent_signature' => 'max:2048',
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
      $formData['parent_signature']= $parent_signature;
      $formData['caste_certificate']= $caste_certificate;
      $formData['income_certificate']= $income_certificate;
      $currentDate = Carbon::now();

        // Format the date if needed
        $formattedDate = $currentDate->toDateString();
        $formData['date']= $formattedDate;
        $request->flash();
        // $request->flashExcept(['income_certificate']);
        
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
            'submitted_district_name' => $data['dist_name'],
            'submitted_teo_name' => @$data['teo_name'],
            'current_district' => $data['current_district'],
            'current_taluk' => @$data['current_taluk'],
            'institution_name' => $data['institution_name'],
            'current_institution' => @$data['current_institution'],
        ]);


        return redirect()->route('home')->with('success','Application Submitted Successfully.');

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
                "edit" => '<div class="settings-main-icon"><a  href="' . route('itiScholarship.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = ItiFund::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = ItiFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
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

    public function itiAdminFeeView(Request $request,$id)
    {
       
       
        $studentFund=ItiFund::find($id);
        return view('admin.itiFund.details', compact('studentFund'));
    }

    



}
