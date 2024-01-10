<?php

namespace App\Http\Controllers;

use App\Models\TuitionFee;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function  tuitionFeeStore(Request $request)
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

            $image->move(public_path('/tuition/signature'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
      
        $formData = $data;
       
        
        $formData['signature']= $signature;
        return view('child.child_form_preview', compact('formData'));
    }

    public function tuitionFeeStoreDetails(Request $request)
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
            'submitted_district' => @$data['submitted_district'],
            'submitted_teo' => @$data['submitted_teo'],
            'dist_name' => @$data['dist_name'],
            'teo_name' => @$data['dob'],
            'date' => @$data['dob'],
            'user_id' =>Auth::user()->id, 
            'status' =>0
        ]);

        return redirect()->route('home')->with('success','Application Submitted Successfully.');

    }

    public function gettuitionFeeList(Request $request)
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
             
             $caste = $record->caste;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
               
                "caste" => $caste,
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . url('childFinance/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function tuitionFeeView(Request $request, $id)
    {     
      
        $formData = TuitionFee::where('_id',$id)->first();
       
        return view('admin.child_finance_view', compact('formData'));



    }



}
