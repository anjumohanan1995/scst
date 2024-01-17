<?php

namespace App\Http\Controllers;

use App\Models\AnemiaFinance;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;
use App\Models\SingleIncomeEarner;
use App\Models\StudentAward;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use App\Models\ExamApplication;

use App\Models\FinancialHelp;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\UTCDateTime;
use Illuminate\Support\Facades\Auth; // Make sure to include this line


class UserHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function userCoupleFinanceList(Request $request)
    {
        $data  = FinancialHelp::with('User')->get();
        //dd($data);
        return view('user.financial_list', compact('data'));
    }
    public function getUserCoupleList(Request $request)
    {
        $name = $request->name;
        $mobile = $request->mobile;
        $role = $request->role;
        $user_id = Auth::user()->id;

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
        $totalRecord = FinancialHelp::where('user_id', $user_id)->where('deleted_at', null);
        if ($mobile != "") {
            $totalRecord->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $totalRecord->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = FinancialHelp::where('user_id', $user_id)->where('deleted_at', null);

        if ($mobile != "") {
            $totalRecordswithFilte->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $totalRecordswithFilte->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = FinancialHelp::where('user_id', $user_id)->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
        if ($mobile != "") {
            $items->where('mobile', $mobile);
        }
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $items->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $items->whereBetween('created_at', [$stDate, $edDate]);
        }

        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $husband_address = $record->husband_address;
            $wife_address = $record->wife_address;
            $register_details = $record->register_details;
            $certificate_details = $record->certificate_details;
            $husband_caste = $record->husband_caste;
            $wife_caste =  $record->wife_caste;
            $created_at =  $record->created_at;

            $date =  $record->date;
            $time =  $record->time;

            $data_arr[] = array(
                "id" => $id,
                "husband_address" => $husband_address,
                "wife_address" => $wife_address,
                "register_details" => $register_details,
                "certificate_details" => $certificate_details,
                "husband_caste" => $husband_caste,
                "wife_caste" => $wife_caste,
                "created_at" => $created_at,
                "date" => $date . '' . $time,

                //  "more"=>'<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#exampleModal'.$id.'" data-bs-whatever="@mdo">More Details</button><div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">'.$name.'('.$age.')  </h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="eva eva-close-outline header-icons"><g data-name="Layer 2"><g data-name="close"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect><path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path></g></g></svg></button></div><div class="modal-body"><table id="example" class="table table-striped table-bordered" style="width:100%"><tbody><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Name</h6></div></td><td><div class="image-grouped"> '.$name.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Name</h6></div></td><td><div class="image-grouped">'.$gname.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Relationship</h6></div></td><td><div class="image-grouped">'.$g_relation.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Age</h6></div></td><td><div class="image-grouped"> '.$age.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Gender</h6></div></td><td><div class="image-grouped">'.$gender.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Mobile Number</h6></div></td><td><div class="image-grouped"> '.$mobile.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Adhar Number</h6></div></td><td><div class="image-grouped"> '.$adhar.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Scheme Id</h6></div></td><td><div class="image-grouped">  '.$sc_id.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Email Id</h6></div></td><td><div class="image-grouped"> '.$email.' </div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Abha Number</h6></div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Ration card Number</h6></div></td><td><div class="image-grouped"> '.$ration_card.' </div></td></tr></tbody></table></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>',
                "edit" => '<div class="settings-main-icon"><a  href="' . url('user-couple-application/' . $id) . '"><i class="fe fe-eye bg-info me-1"></i></a></div>'

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
    public function userCoupleApplicationView($id)
    {

        $formData = FinancialHelp::where('_id', $id)->first();
        return view('user.financial_view', compact('formData'));
    }



    public function userExamList(Request $request)
    {

        return view('user.exam_application_list');
    }

    public function getUserExamList(Request $request)
    {
        $name = $request->name;
        $mobile = $request->mobile;
        $role = $request->role;
        $user_id = Auth::user()->id;

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
        $totalRecord = ExamApplication::where('user_id', $user_id)->where('deleted_at', null);
        if ($mobile != "") {
            $totalRecord->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $totalRecord->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ExamApplication::where('user_id', $user_id)->where('deleted_at', null);

        if ($mobile != "") {
            $totalRecordswithFilte->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $totalRecordswithFilte->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = ExamApplication::where('user_id', $user_id)->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
        if ($mobile != "") {
            $items->where('mobile', $mobile);
        }
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $items->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $items->whereBetween('created_at', [$stDate, $edDate]);
        }

        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $school_name = $record->school_name;
            $student_name = $record->student_name;
            $gender = $record->gender;
            $address = $record->address;
            $relation = $record->relation;
            $mother_name =  $record->mother_name;
            $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "school_name" => $school_name,
                "student_name" => $student_name,
                "gender" => $gender,
                "address" => $address,
                "relation" => $relation,
                "mother_name" => $mother_name,
                "created_at" => $created_at,

                //  "more"=>'<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#exampleModal'.$id.'" data-bs-whatever="@mdo">More Details</button><div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">'.$name.'('.$age.')  </h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="eva eva-close-outline header-icons"><g data-name="Layer 2"><g data-name="close"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect><path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path></g></g></svg></button></div><div class="modal-body"><table id="example" class="table table-striped table-bordered" style="width:100%"><tbody><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Name</h6></div></td><td><div class="image-grouped"> '.$name.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Name</h6></div></td><td><div class="image-grouped">'.$gname.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Relationship</h6></div></td><td><div class="image-grouped">'.$g_relation.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Age</h6></div></td><td><div class="image-grouped"> '.$age.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Gender</h6></div></td><td><div class="image-grouped">'.$gender.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Mobile Number</h6></div></td><td><div class="image-grouped"> '.$mobile.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Adhar Number</h6></div></td><td><div class="image-grouped"> '.$adhar.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Scheme Id</h6></div></td><td><div class="image-grouped">  '.$sc_id.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Email Id</h6></div></td><td><div class="image-grouped"> '.$email.' </div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Abha Number</h6></div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Ration card Number</h6></div></td><td><div class="image-grouped"> '.$ration_card.' </div></td></tr></tbody></table></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>',
                "edit" => '<div class="settings-main-icon"><a  href="' . url('user-exam-application/' . $id) . '"><i class="fe fe-eye bg-info me-1"></i></a></div>'

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


    public function userExamApplicationView($id)
    {
        $formData = ExamApplication::where('_id', $id)->first();
        return view('user.exam_application_view', compact('formData'));
    }


    public function userMotherChildList(Request $request)
    {
        $data  = FinancialHelp::with('User')->get();
        //dd($data);
        return view('user.motherchild_list', compact('data'));
    }
    public function getUserMotherChildList(Request $request)
    {

        $name = $request->name;
        $mobile = $request->mobile;
        $role = $request->role;
        $user_id = Auth::user()->id;

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
        $totalRecord = MotherChildScheme::where('user_id', $user_id)->where('deleted_at', null);
        if ($mobile != "") {
            $totalRecord->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $totalRecord->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MotherChildScheme::where('user_id', $user_id)->where('deleted_at', null);

        if ($mobile != "") {
            $totalRecordswithFilte->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $totalRecordswithFilte->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = MotherChildScheme::where('user_id', $user_id)->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
        if ($mobile != "") {
            $items->where('mobile', $mobile);
        }
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role != "") {
            $items->where('role', $role);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $items->whereBetween('created_at', [$stDate, $edDate]);
        }

        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $age = $record->age;
            $dob = $record->dob;
            $hus_name = $record->hus_name;
            $caste = $record->caste;
            $village =  $record->village;
            $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $age . '/' . $dob,
                "caste" => $caste,
                "village" => $village,

                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,                        
                "edit" => '<div class="settings-main-icon"><a  href="' . url('userMotherChildScheme/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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

    public function userMotherChildSchemeView(Request $request, $id)
    {

        $formData = MotherChildScheme::where('_id', $id)->first();

        return view('user.mother_child_scheme_view', compact('formData'));
    }

    public function userMarriageGrantList(Request $request)
    {
        return view('user.marriage_grant_list');
    }
    public function getUserMarriageGrantList(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;


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
        $totalRecord = MarriageGrant::where('user_id', $user_id)->where('deleted_at', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MarriageGrant::where('user_id', $user_id)->where('deleted_at', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = MarriageGrant::where('user_id', $user_id)->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
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
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,                 
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
    public function userMarriageGrantView(Request $request, $id)
    {

        $formData = MarriageGrant::where('_id', $id)->first();

        return view('user.marriage_grant_view', compact('formData'));
    }
    public function userStudentAwardList(Request $request)
    {
        return view('user.student_award_list');
    }
    public function getUserStudentAwardList(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;


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
        $totalRecord = StudentAward::where('user_id', $user_id)->where('deleted_at', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = StudentAward::where('user_id', $user_id)->where('deleted_at', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = StudentAward::where('user_id', $user_id)->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $dob = $record->dob;
            $district = @$record->districtRelation->name;
            $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,
                "edit" => '<div class="settings-main-icon"><a  href="' . url('userStudentAward/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function userStudentAwardView(Request $request, $id)
    {
        $formData = StudentAward::where('_id', $id)->first();

        return view('user.student_award_view', compact('formData'));
    }

    public function userAnemiaFinanceList(Request $request)
    {
        return view('user.anemia_finance_list');
    }
    public function getUserAnemiaFinanceList(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;


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
        $totalRecord = AnemiaFinance::where('user_id', $user_id)->where('deleted_at', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = AnemiaFinance::where('user_id', $user_id)->where('deleted_at', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = AnemiaFinance::where('user_id', $user_id)->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $dob = $record->dob;
            $district = @$record->districtRelation->name;
            $created_at =  $record->created_at;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s') ,                    
                "edit" => '<div class="settings-main-icon"><a  href="' . url('userAnemiaFinance/'.$id.'/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'


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
    public function userAnemiaFinanceView(Request $request, $id)
    {
        $formData = AnemiaFinance::where('_id', $id)->first();

        return view('user.anemia_finance_view', compact('formData'));
    }
    public function userSingleEarnerList(Request $request)
    {
        return view('user.single_earner_list');
    }
    public function getUserSingleEarnerList(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;


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
        $totalRecord = SingleIncomeEarner::where('user_id', $user_id)->where('deleted_at', null);

        if ($name != "") {
            $totalRecord->where('applicant_name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = SingleIncomeEarner::where('user_id', $user_id)->where('deleted_at', null);


        if ($name != "") {
            $totalRecordswithFilte->where('applicant_name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = SingleIncomeEarner::where('user_id', $user_id)->where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('applicant_name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->applicant_name;
            $address = $record->address;
            $applicant_caste = $record->applicant_caste;
            $district = @$record->districtRelation->name;
            $date =  $record->date;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "caste" => $applicant_caste,
                "district" => $district,
                "date" => $date,
                "edit" => '<div class="settings-main-icon"><a  href="' . url('userSingleEarner/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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

    public function userSingleEarnerView(Request $request, $id)
    {
        $formData = SingleIncomeEarner::where('_id', $id)->first();

        return view('user.single_earner_view', compact('formData'));
    }
}
