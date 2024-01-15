<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Institution;
use App\Models\ItiFund;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class InstitutionController extends Controller
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
        return view("admin.institution.index");
    }
    public function getInstitution(Request $request){
        $name = $request->name;


         if($request->from_date !=''){

             $from_date  = date("M d,Y",strtotime($request->from_date));
             $stDate = new Carbon($from_date);
         }
         if($request->to_date !=''){
             $to_date  =   date("Y-m-d",strtotime($request->to_date));
             $edDate = new Carbon($to_date);
         }

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
             $totalRecord = Institution::where('deleted_at',null);
          
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             
            
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = Institution::where('deleted_at',null);
         
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }          

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = Institution::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
          
             $records = $items->skip($start)->take($rowperpage)->get();
      


         $data_arr = array();
        $i=$start;
         foreach($records as $record){
           // dd($record);
           $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $email =$record->email;
             $contact_no=$record->phone_no;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "sl_no"=>$i,
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "email" => $email,
                "contact_no" => $contact_no,
                "created_at" => $created_at,
                "edit" => '<div class="settings-main-icon"><a  href="' .  route('institution.edit',$id)  . '"><i class="fe fe-edit-2 bg-info me-1"></i></a>&nbsp;&nbsp;<a class="deleteItem" data-id="'.$id.'"><i class="si si-trash bg-danger "></i></a></div>'

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institution =new Institution();
        return view("admin.institution.create",compact("institution"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users', 
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])/u', // Ensure at least one lowercase and one uppercase letter
            ],
            'password_confirmation' => 'required'
        ],
        [
            'password.regex' => 'The password must contain at least one lowercase and one uppercase letter.'
        ]);

        $data=$request->all();
        $user= new User();
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->mobile=$data['phone_no'];
        $user->password= Hash::make($data['password']);
        $user->role= 'Principal';
      $user->save();
      $data['user_id']=$user->id;
       Institution::create($data);
       return redirect()->route('institution.index')->with('status','Institution Added Successfully.');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itiFund =ItiFund::find($id);
        $districts =District::where('deleted_at',null)->get();
        return view("admin.institution.ItiDetails",compact("itiFund","districts"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution =Institution::find($id);
        return view("admin.institution.create",compact("institution"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $inst=Institution::find($id);
        $this->validate($request, [
            'email' => 'unique:users,email,'.$inst->user_id.',_id,deleted_at,NULL',
        //    / 'email'=>'required|unique:users,email,'.$inst->user_id.',_id,deleted,0',
        ]);
        $data=$request->all();
        $user=  User::where('_id',$inst->user_id)->first();
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->mobile=$data['phone_no'];
      $user->update();
      $data['user_id']=$user->id;
      $inst->update($data);
       return redirect()->route('institution.index')->with('status','Institution Updated Successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Institution::find($id);
      
       // dd($data->user_id);
        User::where('_id', $data->user_id)->delete();
        $data->delete();
        return response()->json([
                        'success' => 'Institution Deleted successfully.'
                    ]);
    }

    public function adminInstitutionList(){
        return view ('admin.institution.adminList');
    }

    public function getAdminInstitutionList(Request $request){
        $name = $request->name;


        if($request->from_date !=''){

            $from_date  = date("M d,Y",strtotime($request->from_date));
            $stDate = new Carbon($from_date);
        }
        if($request->to_date !=''){
            $to_date  =   date("Y-m-d",strtotime($request->to_date));
            $edDate = new Carbon($to_date);
        }

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
            $inst=Institution::where('user_id',Auth::user()->id)->first();

            $totalRecord = ItiFund::where('deleted_at',null)->where('current_institution',$inst->id);
           // dd( $inst->id);
            if($name != ""){
                $totalRecord->where('name','like',"%".$name."%");
            }
            
           
            $totalRecords = $totalRecord->select('count(*) as allcount')->count();


            $totalRecordswithFilte = ItiFund::where('deleted_at',null)->where('current_institution',$inst->id);
        
            if($name != ""){
               $totalRecordswithFilte->where('name','like',"%".$name."%");
           }          

            $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

            // Fetch records
            $items = ItiFund::where('deleted_at',null)->where('current_institution',$inst->id)->orderBy($columnName,$columnSortOrder);
           
            if($name != ""){
               $items->where('name','like',"%".$name."%");
           }
         
            $records = $items->skip($start)->take($rowperpage)->get();
     


        $data_arr = array();
       $i=$start;
        foreach($records as $record){
          // dd($record);
          $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $course_name =$record->course_name;
            $income=$record->income;
            $caste=$record->caste;
             $created_at =  $record->created_at;

           $data_arr[] = array(
               "sl_no"=>$i,
               "id" => $id,
               "name" => $name,
               "address" => $address,
               "course_name" => $course_name,
               "income" => $income,
               "caste" => $caste,
               "created_at" => $created_at,
               "edit" => '<div class="settings-main-icon"><a  href="' . route('institution.show',$id) . '"><i class="fa fa-edit bg-info me-1"></i></a></div>'

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
    public function updateItiDetails(Request $request,$id){
      // dd($request->all());
       $data=ItiFund::find($id);
       $data->update([
        "submitted_district" =>$request->submitted_district,
        "submitted_teo" =>$request->submitted_teo,
       ]);
       return redirect()->route('adminInstitutionList')->with('status','Updated Successfully.');
      
    }
}
