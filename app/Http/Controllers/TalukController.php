<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Taluk;
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


class TalukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('taluks.index');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTaluks(Request $request){
        $taluk_name = $request->name;


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
             $totalRecord = Taluk::with('district')->where('deleted_at',null);
          
             if($taluk_name != ""){
                 $totalRecord->where('taluk_name','like',"%".$taluk_name."%");
             }
             
            
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = Taluk::with('district')->where('deleted_at',null);
         
             if($taluk_name != ""){
                $totalRecordswithFilte->where('taluk_name','like',"%".$taluk_name."%");
            }          

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = Taluk::with('district')->where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
             if($taluk_name != ""){
                $items->where('taluk_name','like',"%".$taluk_name."%");
            }
          
             $records = $items->skip($start)->take($rowperpage)->get();
      


         $data_arr = array();

         foreach($records as $record){
           // dd($record);
             $id = $record->id;
             $taluk_name = $record->taluk_name;
             $district_name = $record->district->name;
              $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "taluk_name" => $taluk_name,
                "district_name" => $district_name,
                "created_at" => $created_at,
                "edit" => '<div class="settings-main-icon"><a  href="' . url('taluks/'.$id.'/edit') . '"><i class="fe fe-edit-2 bg-info me-1"></i></a>&nbsp;&nbsp;<a class="deleteItem" data-id="'.$id.'"><i class="si si-trash bg-danger "></i></a></div>'

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
        $districts = District::get();
            return view('taluks.create',compact('districts'));
        
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
                'district_id' => 'required',
                'taluk_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50'
            ]);
            if($validate->fails())
            {
                $messages = $validate->getMessageBag();
                return redirect()->back()->withErrors($validate);
            }

            $data = $request->all();

               

            Taluk::create([
                'district_id' => $data['district_id'],
                'taluk_name' => $data['taluk_name'],
            ]);


           return redirect()->route('taluks.index')

           ->with('success','Taluk Added Successfully');

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
            $districts = District::get();
            $data=Taluk::with('district')->find($id);
            return view('taluks.edit', compact('data','districts'));
        
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
            'district_id' => 'required',
            'taluk_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
        ]);


        $book=Taluk::findOrFail($id);
        $data = $request->all();
       

        $book->update([
            'district_id' => $data['district_id'],
            'taluk_name' => $data['taluk_name'],
        ]);

       return redirect()->route('taluks.index')
                       ->with('success','Taluk updated successfully');
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
        $data= Taluk::find($id)->delete();

        return response()->json([
                        'success' => 'Taluk Deleted successfully.'
                    ]);

    }
    public function fetchTaluk(Request $request)
    {
        $data['taluks'] = Taluk::where('district_id',$request->district_id)->where('deleted_at',null)->get(["taluk_name"]);
       //dd( $data['taluks']);
        return response()->json($data);
    }
}
