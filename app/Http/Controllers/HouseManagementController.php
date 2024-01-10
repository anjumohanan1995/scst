<?php

namespace App\Http\Controllers;

use App\Models\HouseManagement;
use Carbon\Carbon;
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
        if ($request->hasfile('prove_eligibility_file')) {

            $eligibility = $request->prove_eligibility_file;
            $imgfileName1 = time() . rand(100, 999) . '.' . $eligibility->extension();

            $eligibility->move(public_path('/homeMng'), $imgfileName1);

            $eligibility_file = $imgfileName1;

        }else{
            $eligibility_file = '';
        }
      
        $formData = $data;
       
      $formData['signature']= $signature;
      $formData['prove_eligibility_file']= $signature;
      $currentDate = Carbon::now();

// Format the date if needed
$formattedDate = $currentDate->toDateString();
      $formData['date']= $formattedDate;
        return view('houseMng.preview', compact('formData'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseManagement  $houseManagement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $houseManagement=HouseManagement::find($id);
        return view('houseMng.details', compact('houseManagement'));
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
        return view('user.house_grant_list');

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
             $address = $record->address;
             $panchayath = $record->panchayath;
             $place = $record->place;
             $caste = $record->caste;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "place" => $place,
                "name" => $name,
                "address" => $address,
                "panchayath" => $panchayath,
                "caste" => $caste,
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . route('houseGrant.show',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function HouseGrantStoreDetails (Request $request)
    {

        $data = json_decode($request->input('formData'), true);
     

        $datainsert = HouseManagement::create([
            'name' => $data['name'],
            'address' => @$data['address'],
            'panchayath' => @$data['panchayath'],
            'caste' => @$data['caste'],
            'anual_income' => @$data['anual_income'],
            'house_details' => $data['house_details'],
            'agency' => $data['agency'],
            'last_payment_year' => @$data['last_payment_year'],
            'family_details' => @$data['family_details'],
            'nature_payment' => @$data['nature_payment'],
            'payment_details' => $data['payment_details'],
            'prove_eligibility_file' => $data['prove_eligibility_file'],
            'prove_eligibility' => $data['prove_eligibility'],
            'place' => $data['place'],
            'date' => $data['date'],
            'signature' => @$data['signature'],
            'user_id' =>Auth::user()->id, 
            'status' =>0
        ]);

        return redirect()->route('home')->with('success','Application Submitted Successfully.');
    }
    public function adminHouseGrantList(Request $request)
    {
        return view('admin.houseMng.house_grant_list');

    }
    public function getAdminHouseGrantList(Request $request)
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
             $totalRecord = HouseManagement::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
            

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = HouseManagement::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
           

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = HouseManagement::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
           

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $panchayath = $record->panchayath;
             $place = $record->place;
             $caste = $record->caste;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "place" => $place,
                "name" => $name,
                "address" => $address,
                "panchayath" => $panchayath,
                "caste" => $caste,
                "created_at" => $created_at,                  
                "edit" => '<div class="settings-main-icon"><a  href="' . route('getAdminHouseGrantDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function getAdminHouseGrantDetails($id){
        $houseManagement=HouseManagement::find($id);
        return view('admin.houseMng.details', compact('houseManagement'));
    }
}
