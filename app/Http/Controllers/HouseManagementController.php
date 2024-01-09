<?php

namespace App\Http\Controllers;

use App\Models\HouseManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HouseManagementController extends Controller
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
    return view("houseMng.create");
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
                 
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
       
      
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/homeMng'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
      
        $formData = $data;
       
      $formData['signature']= $signature;
        return view('application.marriage_grant_preview', compact('formData'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function show(HouseManagement $houseManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseManagement $houseManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseManagement $houseManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseManagement $houseManagement)
    {
        //
    }
    public function userHouseGrantList(Request $request)
    {
        return view('user.marriage_grant_list');

    }
    public function getUserHouseGrantList(Request $request)
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
             $totalRecord = HouseManagement::where('user_id',$user_id)->where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = HouseManagement::where('user_id',$user_id)->where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = HouseManagement::where('user_id',$user_id)->where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
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
                "edit" => '<div class="settings-main-icon"><a  href="' . url('userMarriageGrant/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
}
