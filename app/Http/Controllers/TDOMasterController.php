<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\TDOMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TDOMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tdomaster.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::get();
        return view('admin.tdomaster.create', compact('districts'));
       
    }

    public function getTdo(Request $request)
    {


        $tdo_name = $request->name;


        if ($request->from_date != '') {

            $from_date  = date("M d,Y", strtotime($request->from_date));
            $stDate = new Carbon($from_date);
        }
        if ($request->to_date != '') {
            $to_date  =   date("Y-m-d", strtotime($request->to_date));
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
        $totalRecord = TDOMaster::with('districts')->where('deleted_at', null);

        if ($tdo_name != "") {
            $totalRecord->where('name', 'like', "%" . $tdo_name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = TDOMaster::with('districts')->where('deleted_at', null);

        if ($tdo_name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $tdo_name . "%");
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = TDOMaster::with('districts')->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($tdo_name != "") {
            $items->where('name', 'like', "%" . $tdo_name . "%");
        }

        $records = $items->skip($start)->take($rowperpage)->get();



        $data_arr = array();

        foreach ($records as $record) {
            // dd($record);
            $id = $record->id;
            $name = $record->name;
            $type = $record->type;
            $district_name = $record->districts->name;
            $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "tdo_name" => $name,
                'type'=>$type,
                "district_name" => $district_name,
                "created_at" => $created_at,
                "edit" => '<div class="settings-main-icon"><a  href="' . url('po-tdo/' . $id . '/edit') . '"><i class="fe fe-edit-2 bg-info me-1"></i></a>&nbsp;&nbsp;<a class="deleteItem" data-id="' . $id . '"><i class="si si-trash bg-danger "></i></a></div>'

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'district_id' => 'required',
                'type' => 'required',
                'name'  => 'required'
            ]
        );
        if ($validate->fails()) {
            $messages = $validate->getMessageBag();
            return redirect()->back()->withErrors($validate);
        }

        $data = $request->all();


        TDOMaster::create([
            'district_id' => $data['district_id'],
            'name' => $data['name'],
            'type' =>$data['type'],
        ]);


        return redirect()->route('po-tdo.index')

            ->with('success', 'TDO/PO Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function show(TDOMaster $tDOMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $districts = District::get();
        $data = TDOMaster::with('districts')->find($id);
        return view('admin.tdomaster.edit', compact('data', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'district_id' => 'required',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'type' => 'required',
        ]);


        $book = TDOMaster::findOrFail($id);
        $data = $request->all();


        $book->update([
            'district_id' => $data['district_id'],
            'name' => $data['name'],
            'type' => $data['type'],
        ]);

        return redirect()->route('po-tdo.index')
            ->with('success', 'PO/TDO updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TDOMaster::find($id)->delete();

        return response()->json([
            'success' => 'TDO/PO Deleted successfully.'
        ]);
    }
    public function fetchTDO(Request $request){
        $data['tdo'] = TDOMaster::where('district_id', $request->district_id)->where('deleted_at', null)->get();
        return response()->json($data);
    }

}
