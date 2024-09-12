<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SchemeAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class SchemeAmountController extends Controller
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
        return view("admin.scheme_amount.index");
    }
    public function getSchemeAmount(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length'); // Rows display per page
    
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
    
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
    

    
        // Get additional search parameter from DataTables AJAX request
        $name = $request->get('name');
    
        // Search query
        $query = SchemeAmount::whereNull('deleted_at');
        if (!empty($name)) {
            $query->where('scheme_name', 'like', '%' . $name . '%');
        }
    
        if (!empty($searchValue)) {
            $query->orWhere('scheme_amount', 'like', '%' . $searchValue . '%');
        }
  
        ## Total records
        $totalRecords = $query->count();
    
        ## Filtered records count
        $totalRecordswithFilter = $query->count(); 
    
        ## Fetch records
        $records = $query->orderBy($columnName, $columnSortOrder)
                         ->skip($start)
                         ->take($rowperpage)
                         ->get();
    
        ## Prepare response data
        $data_arr = [];
        $i = $start;
        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $scheme_name = $record->scheme_name;
            $scheme_amount = $record->scheme_amount;
            // $created_at = $record->created_at->format('Y-m-d H:i:s'); // Optional: format created_at
    
            $data_arr[] = [
                "sl_no" => $i,
                "id" => $id,
                "scheme_name" => $scheme_name,
                "scheme_amount" => $scheme_amount,
                // "created_at" => $created_at,
                "edit" => '<div class="settings-main-icon">
                             <a href="' . route('scheme_amount.edit', $id) . '">
                               <i class="fe fe-edit-2 bg-info me-1"></i>
                             </a>&nbsp;&nbsp;
                             <a class="deleteItem" data-id="' . $id . '">
                               <i class="si si-trash bg-danger "></i>
                             </a>
                           </div>'
            ];
        }
    
        ## Response
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        ];
    
        return response()->json($response);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scheme_amount =new SchemeAmount();
        return view("admin.scheme_amount.create",compact("scheme_amount"));
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
            'scheme_name' => 'required|unique:scheme_amounts,scheme_name',
            'scheme_amount' => 'required|numeric|min:0', 
        ]);

        // Create a new SchemeAmount entry
        SchemeAmount::create([
            'scheme_name' => $request->scheme_name, // Convert to uppercase if needed
            'scheme_amount' => $request->scheme_amount,
        ]);


       return redirect()->route('scheme_amount.index')->with('status','Scheme Amount Added Successfully.');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchemeAmount  $institution
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchemeAmount  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheme_amount = SchemeAmount::find($id);
        return view("admin.scheme_amount.create",compact("scheme_amount"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchemeAmount  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the SchemeAmount entry by ID
        $schemeAmount = SchemeAmount::findOrFail($id);
    
        // Validate the incoming request data
        $this->validate($request, [
            'selected_scheme_name' => 'required',
            'scheme_amount' => 'required|numeric|min:0',
        ]);
    
        // Update the SchemeAmount entry with new values
        $schemeAmount->scheme_name = $request->selected_scheme_name; // Convert to uppercase if needed
        $schemeAmount->scheme_amount = $request->scheme_amount;
    
        // Save the changes
        $schemeAmount->save();
    
        // Redirect to index route with a success message
        return redirect()->route('scheme_amount.index')->with('status', 'Scheme Amount Updated Successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchemeAmount $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= SchemeAmount::find($id);
      
        $data->delete();
        return response()->json([
                        'success' => 'Scheme Amount Deleted successfully.'
                    ]);
    }

   
}
