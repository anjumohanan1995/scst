<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Permission;
 use App\RolePermission;


use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
    {
        return view('role.index');
    }



    public function create()
    {
        return view('role.create');
    }

      public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
            [
             'name' => 'required',

        ]);
        if ($validate->fails()) {
            return response()->json([
                        'error' => $validate->errors()->all()
                    ]);
        }
     Role::create($request->all());

        return response()->json([
                        'success' => 'Role created successfully.'
                    ]);

    }


      // Fetch records
    public function getRoles(Request $request){
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


            if($request->delete_ctm =='1'){

                $totalRecord = Role::where('deleted_at','!=',null);

                $totalRecords = $totalRecord->select('count(*) as allcount')->count();


                $totalRecordswithFilte = Role::where('deleted_at','!=',null);



                $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

                // Fetch records
                $items = Role::where('deleted_at','!=',null)->orderBy($columnName,$columnSortOrder);

                $records = $items->skip($start)->take($rowperpage)->get();
            }else{

                // Total records
                $totalRecord = Role::where('deleted_at',null);
                if($name != ""){
                    $totalRecord->where('name','like',"%".$name."%");
                }
                $totalRecords = $totalRecord->select('count(*) as allcount')->count();


                $totalRecordswithFilte = Role::where('deleted_at',null);

                if($name != ""){
                    $totalRecordswithFilte->where('name','like',"%".$name."%");
                }
                $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

                // Fetch records
                $items = Role::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
                if($name != ""){
                    $items->where('name','like',"%".$name."%");
                }

                $records = $items->skip($start)->take($rowperpage)->get();
            }



            $data_arr = array();

            foreach($records as $record){
                $id = $record->id;
                if($record->name == 'ED Operator')
                {
                    $name = 'ED Operations';
                }else{
                    $name = $record->name;

                }

               $data_arr[] = array(
                   "id" => $id,
                   "name" => $name,
                 //  "edit" => '<div class="settings-main-icon"><a class="deleteItem" data-id="'.$id.'"><i class="si si-trash bg-danger "></i></a>&nbsp;&nbsp;<a href="' . url('roles/'.$name.'/editPermission') . '"><button class="btn btn-info">Permission</button></a></div>'
                //    "edit" => '  <div style="display:flex; ">
                //    <div class="settings-main-icon"><a href="' . url('roles/'.$name.'/editPermission') . '"><button class="btn btn-info">Permission</button></a></div>&nbsp;&nbsp;
                //    <div class="settings-main-icon"><a class="deleteItem" data-id="'.$id.'"><i class="fa fa-trash bg-danger"></i></a></div>
                //    <div>'
                "edit" => '  <div style="display:flex; ">
                   
                   <div class="settings-main-icon"><a class="deleteItem" data-id="'.$id.'"><i class="fa fa-trash bg-danger"></i></a></div>
                   <div>'

                  /* "edit" => '<div class="settings-main-icon"><a  href="' . url('roles/'.$id.'/edit') . '"><i class="fe fe-edit-2 bg-info me-1"></i></a>&nbsp;&nbsp;<a class="deleteItem" data-id="'.$id.'"><i class="si si-trash bg-danger "></i></a>&nbsp;&nbsp;<a href="' . url('roles/'.$name.'/editPermission') . '"><button class="btn btn-info">Permission</button></a></div>'
*/
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

    public function destroy($id)
    {
        $data= Role::find($id)->delete();

        return response()->json([
                        'success' => 'Role Deleted successfully.'
                    ]);

        //return redirect()->route('patients.index')
                        //->with('success','Patient deleted successfully');
    }

       public function edit( $id)
    {
        $data=Role::find($id);
        return view('role.edit',compact('data'));
    }

     public function update(Request $request, $id)
    {

         $validate = Validator::make($request->all(),
            [
             'name' => 'required',

        ]);
        if ($validate->fails()) {
            return response()->json([
                        'error' => $validate->errors()->all()
                    ]);
        }

        $book=Role::findOrFail($id);
        $book->update($request->all());
        return response()->json([
                        'success' => 'Role updated successfully.'
                    ]);
    }

     public function editPermission( $id)
    {
        $role_name = $id;
        $totalRecord = Permission::where('deleted_at',null)->get();
        $role = \Auth::user()->role;
        $checked = RolePermission::where('role',$role_name)->first();
  return view('role.editpermission',compact('totalRecord','role_name','checked'));

    }
    public function addPermission(Request $request, $id)
    {

        $validate = Validator::make($request->all(),
        [
         'permission' => 'required',

         ]);
        if ($validate->fails()) {
            return response()->json([
                        'error' => $validate->errors()->all()
                    ]);
        }
        $sub="";
        if($request->sub_permission) {
            $content = $request->sub_permission;
            $content = array_values($content);
            $sub = ($content)? json_encode($content): null;
        }
        $data =$request->all();
        $book=RolePermission::where('role',$id)->first();
        if($book == null){
            RolePermission::create([
                'role' => $id,
                'permission' => $data['permission'],
                'sub_permissions' =>$sub
            ]);
            return response()->json([
                            'success' => 'Permission added successfully.'
                        ]);

        }
       else{
        $book->update([
            'role' => $id,
            'permission' => $data['permission'],
            'sub_permissions' =>$sub
        ]);
        return response()->json([
                        'success' => 'Permission added successfully.'
                    ]);
       }

    }












}
