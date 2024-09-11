<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\FinancialHelp;
use App\Models\Taluk;
use App\Models\Teo;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Carbon\Carbon;
use Excel;

use App\Hospital;
use App\Models\studentFund;
use App\Models\MarriageGrant;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Illuminate\Support\Facades\Auth;

class TeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::where('deleted_at',null)->get();
        return view('teos.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeo(Request $request)
    {
        $teo_name = $request->name;
        $district_name = $request->dis_name;

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
        $totalRecord = Teo::with('districts')->where('deleted_at', null);

        if ($teo_name != "") {
            $totalRecord->where('teo_name', 'like', "%" . $teo_name . "%");
        }
        if ($district_name != "") {
            $totalRecord->where('district_id', $district_name);
        }
       
        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = Teo::with('districts')->where('deleted_at', null);

        if ($teo_name != "") {
            $totalRecordswithFilte->where('teo_name', 'like', "%" . $teo_name . "%");
        }
        if ($district_name != "") {
            $totalRecordswithFilte->where('district_id', $district_name);
        }
       
        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = Teo::with('districts')->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($teo_name != "") {
            $items->where('teo_name', 'like', "%" . $teo_name . "%");
        }
        if ($district_name != "") {
            $items->where('district_id', $district_name);
        }
        $records = $items->skip($start)->take($rowperpage)->get();



        $data_arr = array();
            $i=$start;
        foreach ($records as $record) {
            $i++;
            // dd($record);
            $id = $record->id;
            $teo_name = $record->teo_name;
            $district_name = $record->districts->name;
            $created_at =  $record->created_at;

            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "teo_name" => $teo_name,
                "po_or_tdo" =>@$record->tdo->name,
                "district_name" => $district_name,
                "created_at" => $created_at,
                "edit" => '<div class="settings-main-icon"><a  href="' . url('teo/' . $id . '/edit') . '"><i class="fe fe-edit-2 bg-info me-1"></i></a>&nbsp;&nbsp;<a class="deleteItem" data-id="' . $id . '"><i class="si si-trash bg-danger "></i></a></div>'

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
        return view('teos.create', compact('districts'));
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
                'teo_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
                'tdo_id' => 'required',
            ]
        );
        if ($validate->fails()) {
            $messages = $validate->getMessageBag();
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = $request->all();



        Teo::create([
            'district_id' => $data['district_id'],
            'teo_name' => $data['teo_name'],
            'po_or_tdo' =>$data['tdo_id'],
        ]);


        return redirect()->route('teo.index')

            ->with('success', 'TEO Added Successfully');
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
        $data = Teo::with('districts')->find($id);
        return view('teos.edit', compact('data', 'districts'));
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
            'teo_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'tdo_id' => 'required',
        ]);


        $book = Teo::findOrFail($id);
        $data = $request->all();


        $book->update([
            'district_id' => $data['district_id'],
            'teo_name' => $data['teo_name'],
            'po_or_tdo' =>$data['tdo_id'],
        ]);

        return redirect()->route('teo.index')
            ->with('success', 'TEO updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Teo::find($id)->delete();

        return response()->json([
            'success' => 'TEO Deleted successfully.'
        ]);
    }
    public function fetchTeo(Request $request)
    {
        $data['teos'] = Teo::where('district_id', $request->district_id)->where('deleted_at', null)->get(["teo_name"]);
        return response()->json($data);
    }


    public function coupleApplicationApprove(Request $request){
        $coupleApplication = FinancialHelp::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $coupleApplication->update([
            'teo_status' => 1,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Couple Financial Scheme Application Approved successfully.'
        ]);
    }
    public function coupleApplicationReject(Request $request){
        $coupleApplication = FinancialHelp::where('_id', $request->id)->first();
        $id = $request->id;
        $reason =$request->reason;
      //  $currentTime = Carbon::now();
      $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
      
       
        $coupleApplication->update([
            'teo_rejection_status' => 1,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Couple Financial Scheme Application Rejected successfully.'
        ]);
    }

        public function marriageGrantApprove(Request $request){
            $marriage = MarriageGrant::where('_id', $request->id)->first();
            $id = $request->id;
            $reason =$request->reason;
          //  $currentTime = Carbon::now();
          $currentTimeInKerala = now()->timezone('Asia/Kolkata');
          $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
          
           
            $marriage->update([
                'teo_status' => 1,
                'teo_status_date' => $currenttime,
                'teo_status_id' => Auth::user()->id,
                'teo_status_reason' => $reason,
            ]);


            return response()->json([
                'success' => 'Marriage Grant Scheme Application Approved successfully.'
            ]);
        }
        public function marriageGrantReject(Request $request){
            $marriage = MarriageGrant::where('_id', $request->id)->first();
            $id = $request->id;
            $reason =$request->reason;
          //  $currentTime = Carbon::now();
          $currentTimeInKerala = now()->timezone('Asia/Kolkata');
          $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
          
           
            $marriage->update([
                'teo_status' => 2,
                'teo_status_date' => $currenttime,
                'teo_status_id' => Auth::user()->id,
                'teo_status_reason' => $reason,
            ]);
            return response()->json([
                'success' => 'Marriage Grant Scheme Application Rejected successfully.'
            ]);
        }
}
