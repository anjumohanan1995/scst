<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

         foreach($records as $record){
           // dd($record);
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $email =$record->email;
             $contact_no=$record->phone_no;
              $created_at =  $record->created_at;

            $data_arr[] = array(
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
    public function show(Institution $institution)
    {
        //
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
    public function update(Request $request, Institution $institution)
    {
        //
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
}
