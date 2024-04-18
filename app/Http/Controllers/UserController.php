<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\TDOMaster;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Carbon\Carbon;
use Excel;
use Auth;
use App\Hospital;
use Illuminate\Support\Facades\Hash;
use App\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            return view('user.index');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers(Request $request){
        $name = $request->name;
        $mobile = $request->mobile;
        $role = $request->role;


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


         if($request->delete_ctm =='1'){

             $totalRecord = User::where('deleted_at','!=',null);

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = User::where('deleted_at','!=',null);



             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = User::where('deleted_at','!=',null)->orderBy($columnName,$columnSortOrder);

             $records = $items->skip($start)->take($rowperpage)->get();
         }else{

             // Total records
             $totalRecord = User::where('deleted_at',null);
             if($mobile != ""){
                 $totalRecord->where('mobile',$mobile);
             }
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             if($role != ""){
                $totalRecord->where('role',$role);
            }
             if($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "" ){
                 //echo "khk";exit;
                 $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
             }

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = User::where('deleted_at',null);

             if($mobile != ""){
                 $totalRecordswithFilte->where('mobile',$mobile);
             }
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
            if($role != ""){
               $totalRecordswithFilte->where('role',$role);
           }
             if($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "" ){
                 //echo "khk";exit;
                 $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
             }

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = User::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
             if($mobile != ""){
                 $items->where('mobile',$mobile);
             }
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            if($role != ""){
               $items->where('role',$role);
           }
             if($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "" ){
                 //echo "khk";exit;
                 $items->whereBetween('created_at', [$stDate, $edDate]);
             }

             $records = $items->skip($start)->take($rowperpage)->get();
         }



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->name;
             $mobile = $record->mobile;
             $role = $record->role;
             $district = $record->district;
             $hospital_name = $record->hospital_name;
              $email =  $record->email;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "mobile" => $mobile,
                "role" => $role,
                "district" => $district,
                "hospital_name" => $hospital_name,
                "created_at" => $created_at,

               //  "more"=>'<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#exampleModal'.$id.'" data-bs-whatever="@mdo">More Details</button><div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">'.$name.'('.$age.')  </h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="eva eva-close-outline header-icons"><g data-name="Layer 2"><g data-name="close"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect><path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path></g></g></svg></button></div><div class="modal-body"><table id="example" class="table table-striped table-bordered" style="width:100%"><tbody><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Name</h6></div></td><td><div class="image-grouped"> '.$name.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Name</h6></div></td><td><div class="image-grouped">'.$gname.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Relationship</h6></div></td><td><div class="image-grouped">'.$g_relation.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Age</h6></div></td><td><div class="image-grouped"> '.$age.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Gender</h6></div></td><td><div class="image-grouped">'.$gender.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Mobile Number</h6></div></td><td><div class="image-grouped"> '.$mobile.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Adhar Number</h6></div></td><td><div class="image-grouped"> '.$adhar.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Scheme Id</h6></div></td><td><div class="image-grouped">  '.$sc_id.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Email Id</h6></div></td><td><div class="image-grouped"> '.$email.' </div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Abha Number</h6></div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Ration card Number</h6></div></td><td><div class="image-grouped"> '.$ration_card.' </div></td></tr></tbody></table></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>',
                "edit" => '<div class="settings-main-icon"><a  href="' . url('users/'.$id.'/edit') . '"><i class="fe fe-edit-2 bg-info me-1"></i></a>&nbsp;&nbsp;<a class="deleteItem" data-id="'.$id.'"><i class="si si-trash bg-danger "></i></a></div>'

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
        $role = Role::where('deleted_at', null)->get();
        $districts = District::get();
            return view('user.create',compact('role','districts'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           $validate = Validator::make($request->all(),
            [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
                'email' => 'required|email|unique:users',
                'mobile' => 'nullable|numeric',
                'role' => 'required',
             
                 'password' =>'required' //['required', Password::min(8)
                // ->mixedCase()
                // ->letters()
                // ->numbers()
                // ->symbols()
                // ->uncompromised(),
                //     ],
            ]);
            if($validate->fails())
            {
                $messages = $validate->getMessageBag();
                return redirect()->back()->withErrors($validate);
            }

            $data = $request->all();



            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'mobile' => $data['mobile'],
                'district' => @$data['district'],
                'teo_name' => @$data['teo_name'],
                'po_tdo_office' => @$data['po_tdo_office'],
                'password' => Hash::make($data['password']),
            ]);


           return redirect()->route('users.index')

           ->with('success','User Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
            $patient=User::find($id);
            $role =Role::where('deleted_at', null)->get();
            $districts = District::get();
            return view('user.edit', compact('patient','role','districts'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'email' => 'required',
            'mobile' => 'nullable|numeric',
            'role' => 'required',
            // 'district' => 'alpha_num',
            // 'hospital_name' => 'alpha_num',
            // 'password' => ['required', Password::min(8)
            // ->mixedCase()
            // ->letters()
            // ->numbers()
            // ->symbols()
            // ->uncompromised(),
            //     ],
        ]);


        $book=User::findOrFail($id);
        $data = $request->all();
       

        $book->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'mobile' => $data['mobile'],
            'district' => @$data['district'],
            'teo_name' => @$data['teo_name'],
            'po_tdo_office' => @$data['po_tdo_office'],
            //'password' => Hash::make($data['password']),
        ]);

        //$book->update($request->all());

       return redirect()->route('users.index')
                       ->with('success','User updated successfully');
        //  return response()->json([
        //                 'success' => 'User updated successfully.'
        //             ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= User::find($id)->delete();

        return response()->json([
                        'success' => 'User Deleted successfully.'
                    ]);

    }
    public function fetchOffice(Request $request)
    {
        $category=$request->category;
        if($category == 'Project Officer' || $category =='APO'){
            $data['offices'] = TDOMaster::where('district_id', $request->district_id)->where('type','PO')->where('deleted_at', null)->get(["name","type"]);

        }
        else if($category == 'TDO' || $category =='ATDO'){
            $data['offices'] = TDOMaster::where('district_id', $request->district_id)->where('type','TDO')->where('deleted_at', null)->get(["name","type"]);

        }
        else{
            $data['offices'] = TDOMaster::where('district_id', $request->district_id)->where('deleted_at', null)->get(["name","type"]);
 
        }
       //  dd($data['offices']);
        return response()->json($data);
    }
}
