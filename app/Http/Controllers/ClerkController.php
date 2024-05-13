<?php

namespace App\Http\Controllers;

use App\Models\AnemiaFinance;
use App\Models\ChildFinance;
use App\Models\District;
use App\Models\ExamApplication;
use App\Models\FinancialHelp;
use App\Models\studentFund;
use App\Models\HouseManagement;
use App\Models\ItiFund;
use App\Models\MarriageGrant;
use App\Models\MedEngStudentFund;
use App\Models\MotherChildScheme;
use App\Models\SingleIncomeEarner;
use App\Models\StudentAward;
use App\Models\TDOMaster;
use App\Models\Teo;
use App\Models\TuitionFee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClerkController extends Controller
{

    public function getchildFinanceReturnListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = ChildFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->where('teo_return', null)->where('clerk_return', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ChildFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->where('teo_return', null)->where('clerk_return', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = ChildFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->where('teo_return', null)->where('clerk_return', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $age = $record->age;
            $caste = $record->caste;
            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = $record->teo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('childFinancialClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';


            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "age" => $age,
                "caste" => $caste,
                "teo_name" => $teo_name,
                "date" => $date . " " . $time,
                "created_at" => $created_at,
                "action" => $edit

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
    public function ChildFinanceListClerk()
    {
        return view('clerk.childFinance.index');
    }

    public function getchildFinanceListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = ChildFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ChildFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = ChildFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $age = $record->age;
            $caste = $record->caste;
            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = $record->teo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('childFinancialClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('childFinancialClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('childFinancialClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            }







            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "age" => $age,
                "caste" => $caste,
                "teo_name" => $teo_name,
                "date" => $date . " " . $time,
                "created_at" => $created_at,
                "action" => $edit

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
    public function childFinancialClerkDetails($id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = ChildFinance::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }
        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.childFinance.details', compact('formData'));
    }
    public function childFinanceApprove(Request $request)
    {
        $marriage = ChildFinance::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Child Finance Scheme Application Approved successfully.'
        ]);
    }
    public function childFinanceReject(Request $request)
    {
        $marriage = ChildFinance::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Child Finance Scheme Application Rejected successfully.'
        ]);
    }



    public function examApplicationListClerk()
    {
        return view('clerk.examApplication.index');
    }

    public function getexamApplicationListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = ExamApplication::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->where('clerk_return', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ExamApplication::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->where('clerk_return', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = ExamApplication::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->where('clerk_return', null)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $school_name = $record->school_name;
            $student_name = $record->student_name;
            $gender = $record->gender;
            $address = $record->address;
            $relation = $record->relation;
            $mother_name =  $record->mother_name;
            $created_at =  $record->created_at;

            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = @$record->submittedTeo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('examApplicationDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('examApplicationDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('examApplicationDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            }







            $data_arr[] = array(
                "sl_no" => $i,
                "school_name" => $school_name,
                "student_name" => $student_name,
                "gender" => $gender,
                "address" => $address,
                "relation" => $relation,
                "mother_name" => $mother_name,
                "date" => $date . " " . $time,
                "action" => $edit,
                "teo_name" => $teo_name

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

    public function getexamApplicationListClerkReturned(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = ExamApplication::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)
            ->where('clerk_return', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ExamApplication::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)
            ->where('clerk_return', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = ExamApplication::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)
            ->where('clerk_return', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $school_name = $record->school_name;
            $student_name = $record->student_name;
            $gender = $record->gender;
            $address = $record->address;
            $relation = $record->relation;
            $mother_name =  $record->mother_name;
            $created_at =  $record->created_at;

            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = @$record->submittedTeo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('examApplicationDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            //   if($status == 1){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->clerk_status_reason.'</span></div>';
            // }
            // else if($status ==2){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->clerk_status_reason.'</span></div>';

            // }
            // else if($status ==null){
            //     $edit='<div class="settings-main-icon"><a  href="' . route('examApplicationDetails',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a></div>';
            // }







            $data_arr[] = array(
                "sl_no" => $i,
                "school_name" => $school_name,
                "student_name" => $student_name,
                "gender" => $gender,
                "address" => $address,
                "relation" => $relation,
                "mother_name" => $mother_name,
                "date" => $date . " " . $time,
                "action" => $edit,
                "teo_name" => $teo_name

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

    public function examApplicationDetails($id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = ExamApplication::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }
        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.examApplication.details', compact('formData'));
    }
    public function examApplicationApprove(Request $request)
    {
        $marriage = ExamApplication::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Exam Application Approved successfully.'
        ]);
    }
    public function examApplicationReject(Request $request)
    {
        $marriage = ExamApplication::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Exam Application Rejected successfully.'
        ]);
    }

    public function getcouplefinancialListClerkReturned(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = FinancialHelp::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        $totalRecord->where('teo_return', null)->where('clerk_return', 1);

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = FinancialHelp::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }

        $totalRecordswithFilte->where('teo_return', null)->where('clerk_return', 1);

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = FinancialHelp::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        $items->where('teo_return', null)->where('clerk_return', 1);

        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $husband_name = $record->husband_name;
            $wife_name = $record->wife_name;
            $register_details = $record->register_details;
            $certificate_details = $record->certificate_details;
            $husband_caste = $record->husband_caste;
            $wife_caste =  $record->wife_caste;
            $created_at =  $record->created_at;
            $date =  $record->date;
            $time =  $record->time;
            $status = $record->clerk_status;

            $teo_name = $record->teo->teo_name;

            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('couplefinancialDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';



            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "husband_name" => $husband_name,
                "wife_name" => $wife_name,
                "register_details" => $register_details,
                "certificate_details" => $certificate_details,
                "husband_caste" => $husband_caste,
                "wife_caste" => $wife_caste,
                "date" => $date . ' ' . $time,
                "created_at" => $created_at,

                "teo_name" => $teo_name,

                "action" => $edit

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


    public function couplefinancialListClerk()
    {
        return view('clerk.couplefinancial.index');
    }

    public function getcouplefinancialListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = FinancialHelp::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        $totalRecord->where('clerk_return', null);

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = FinancialHelp::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        $totalRecordswithFilte->where('clerk_return', null);


        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = FinancialHelp::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        $items->where('clerk_return', null);

        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $husband_name = $record->husband_name;
            $wife_name = $record->wife_name;
            $register_details = $record->register_details;
            $certificate_details = $record->certificate_details;
            $husband_caste = $record->husband_caste;
            $wife_caste =  $record->wife_caste;
            $created_at =  $record->created_at;
            $date =  $record->date;
            $time =  $record->time;
            $status = $record->clerk_status;

            $teo_name = $record->teo->teo_name;

            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('couplefinancialDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('couplefinancialDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('couplefinancialDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            }







            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "husband_name" => $husband_name,
                "wife_name" => $wife_name,
                "register_details" => $register_details,
                "certificate_details" => $certificate_details,
                "husband_caste" => $husband_caste,
                "wife_caste" => $wife_caste,
                "date" => $date . ' ' . $time,
                "created_at" => $created_at,

                "teo_name" => $teo_name,

                "action" => $edit

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
    public function couplefinancialDetails($id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = FinancialHelp::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }

        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }
        $formData = FinancialHelp::where('_id', $id)->first();
        return view('clerk.couplefinancial.details', compact('formData'));
    }
    public function couplefinancialApprove(Request $request)
    {
        $marriage = FinancialHelp::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Couple Financial Scheme Application Approved successfully.'
        ]);
    }
    public function couplefinancialReject(Request $request)
    {
        $marriage = FinancialHelp::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Couple Financial Application Rejected successfully.'
        ]);
    }

    public function getmotherChildSchemeReturnListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = MotherChildScheme::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        $totalRecord->where('teo_return', null)->where('clerk_return', 1);
        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MotherChildScheme::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }


        $totalRecordswithFilte->where('teo_return', null)->where('clerk_return', 1);
        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = MotherChildScheme::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }

        $items->where('teo_return', null)->where('clerk_return', 1);
        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $age = $record->age;
            $dob = $record->dob;
            $hus_name = $record->hus_name;
            $caste = $record->caste;
            $village =  $record->village;
            $created_at =  $record->created_at;

            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = @$record->submittedTeo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';


            $data_arr[] = array(
                "sl_no" => $i,
                "name" => $name,
                "address" => $address,
                "dob" => $age . '/' . $dob,
                "caste" => $caste,
                "village" => $village,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i a '),
                // "edit" => '<div class="settings-main-icon"><a  href="' . url('motherChildScheme/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'
                "edit" => $edit,

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




    public function motherChildSchemeListClerk()
    {
        return view('clerk.motherChild.index');
    }

    public function getmotherChildSchemeListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = MotherChildScheme::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MotherChildScheme::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = MotherChildScheme::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $age = $record->age;
            $dob = $record->dob;
            $hus_name = $record->hus_name;
            $caste = $record->caste;
            $village =  $record->village;
            $created_at =  $record->created_at;

            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = @$record->submittedTeo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('motherChildSchemeDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            }







            $data_arr[] = array(
                "sl_no" => $i,
                "name" => $name,
                "address" => $address,
                "dob" => $age . '/' . $dob,
                "caste" => $caste,
                "village" => $village,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i a '),
                // "edit" => '<div class="settings-main-icon"><a  href="' . url('motherChildScheme/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'
                "edit" => $edit,

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




    public function motherChildSchemeDetails($id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = MotherChildScheme::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }
        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.motherChild.details', compact('formData'));
    }
    public function motherChildSchemeApprove(Request $request)
    {
        $motherChild = MotherChildScheme::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $motherChild->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Mother Child Scheme Application.'
        ]);
    }
    public function motherChildSchemeReject(Request $request)
    {
        $motherChild = MotherChildScheme::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $motherChild->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,

        ]);
        return response()->json([
            'success' => 'Mother Child Scheme Application Rejected successfully.'
        ]);
    }

    public function getmarriageGrantReturnListClerk(Request $request)
    {

        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = MarriageGrant::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MarriageGrant::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = MarriageGrant::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->where('teo_return', null)->where('clerk_return', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $current_address = $record->current_address;
            $age = $record->age;
            $caste = $record->caste;
            $created_at =  $record->created_at;

            $status = $record->clerk_status;
            $teo_name = $record->submittedTeo->teo_name;
            $teo_name = @$record->submittedTeo->teo_name;

            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('marriageGrantDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';

            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "name" => $name,
                "current_address" => $current_address,
                "age" => $age,
                "caste" => $caste,
                "teo_name" => $teo_name,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i a'),
                //"edit" => '<div class="settings-main-icon"><a  href="' . url('marriageGrant/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'
                "edit" => $edit

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


    public function marriageGrantListClerk()
    {
        return view('clerk.marriageGrant.index');
    }

    public function getmarriageGrantListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = MarriageGrant::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MarriageGrant::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = MarriageGrant::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $current_address = $record->current_address;
            $age = $record->age;
            $caste = $record->caste;
            $created_at =  $record->created_at;

            $status = $record->clerk_status;
            $teo_name = $record->submittedTeo->teo_name;
            $teo_name = @$record->submittedTeo->teo_name;

            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('marriageGrantDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('marriageGrantDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('marriageGrantDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            }







            $data_arr[] = array(
                "sl_no" => $i,
                "id" => $id,
                "name" => $name,
                "current_address" => $current_address,
                "age" => $age,
                "caste" => $caste,
                "teo_name" => $teo_name,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i a'),
                //"edit" => '<div class="settings-main-icon"><a  href="' . url('marriageGrant/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'
                "edit" => $edit

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
    public function marriageGrantDetails($id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = MarriageGrant::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }
        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.marriageGrant.details', compact('formData'));
    }
    public function marriageGrantClerkApprove(Request $request)
    {
        $marriage = MarriageGrant::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Marriage grant  Scheme Application approved Successfully.'
        ]);
    }
    public function marriageGrantClerkReject(Request $request)
    {
        $marriage = MarriageGrant::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $marriage->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Marriage grant Scheme Application Rejected successfully.'
        ]);
    }

    public function clerkItiFundList(Request $request)
    {
        return view('clerk.itiFund.index');
    }
    public function getItiFundListClerkReturned(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;
        $district = Auth::user()->district;


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

        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


        // Total records
        $totalRecord = ItiFund::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        $totalRecord->where('teo_return', null)->where('clerk_return', 1);

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ItiFund::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }

        $totalRecordswithFilte->where('teo_return', null)->where('clerk_return', 1);

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = ItiFund::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        $items->where('teo_return', null)->where('clerk_return', 1);

        $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');




        $data_arr = array();
        $i = $start;
        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $course_name = $record->course_name;
            $place = $record->place;
            $date = $record->date;
            $income = $record->income;
            $caste = $record->caste;
            $created_at =  $record->created_at;
            $carbonDate = Carbon::parse($record->created_at);

            $date = $carbonDate->format('d-m-Y');
            $time = $carbonDate->format('g:i a');


            $status = $record->clerk_status;

            $teo_name = $record->teo->teo_name;

            $edit = '';
            $edit = '<div class="settings-main-icon"><a  href="' . route('clerkItiFundList.show', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';



            $data_arr[] = array(
                "id" => $id,
                "sl_no" => $i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" => $income,
                "teo" => $teo_name,
                "date" => $date . ' ' . $record->time,

                "edit" => $edit

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

    public function getClerkItiFundList(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;
        $district = Auth::user()->district;


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

        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


        // Total records
        $totalRecord = ItiFund::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        $totalRecord->where('clerk_return', null);
        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ItiFund::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }

        $totalRecordswithFilte->where('clerk_return', null);

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = ItiFund::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        $items->where('clerk_return', null);

        $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');




        $data_arr = array();
        $i = $start;
        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $course_name = $record->course_name;
            $place = $record->place;
            $date = $record->date;
            $income = $record->income;
            $caste = $record->caste;
            $created_at =  $record->created_at;
            $carbonDate = Carbon::parse($record->created_at);

            $date = $carbonDate->format('d-m-Y');
            $time = $carbonDate->format('g:i a');


            $status = $record->clerk_status;

            $teo_name = $record->teo->teo_name;

            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('clerkItiFundList.show', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('clerkItiFundList.show', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('clerkItiFundList.show', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="' . $id . '"><i class="fa fa-ban bg-danger "></i></a></div>';
            }

            $data_arr[] = array(
                "id" => $id,
                "sl_no" => $i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" => $income,
                "teo" => $teo_name,
                "date" => $date . ' ' . $record->time,

                "edit" => $edit

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

    public function itiFeeClerkView(Request $request, $id)
    {

        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $studentFund = ItiFund::find($id);
        if ($studentFund->clerk_view_status == null) {
            $studentFund->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }
        if ($studentFund->clerk_return_view_status == null && $studentFund->return_status == 1) {
            $studentFund->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.itiFund.details', compact('studentFund'));
    }
    public function itiScholarshipClerkApprove(Request $request)
    {
        $data = ItiFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $data->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Application approved Successfully.'
        ]);
    }
    public function itiScholarshipClerkReject(Request $request)
    {
        $data = ItiFund::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $data->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    }

    public function getStudentAwardListClerkReturned(Request $request)
    {
        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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



        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


        // Total records
        $totalRecord = StudentAward::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1);
        // Total records

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = StudentAward::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1);

        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = StudentAward::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $items->where('submitted_teo', $teo);
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

            $status = @$record->clerk_status;

            $teo_name = @$record->submittedTeo->teo_name;

            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('studentAwardClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
                "teo" => $teo_name,
                "edit" => $edit

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

    public function studentAwardListClerk(Request $request)
    {
        return view('clerk.studentAward.index');
    }
    public function getStudentAwardListClerk(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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



        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


        // Total records
        $totalRecord = StudentAward::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);
        // Total records

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = StudentAward::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);

        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = StudentAward::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $items->where('submitted_teo', $teo);
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

            $status = @$record->clerk_status;

            $teo_name = @$record->submittedTeo->teo_name;

            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('studentAwardClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('studentAwardClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('studentAwardClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            }


            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
                "teo" => $teo_name,
                "edit" => $edit

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
    public function studentAwardClerkView(Request $request, $id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = StudentAward::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }
        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        $formData = StudentAward::where('_id', $id)->first();

        return view('clerk.studentAward.view', compact('formData'));

        $formData = StudentAward::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }

        $formData = StudentAward::where('_id', $id)->first();

        return view('clerk.studentAward.view', compact('formData'));
    }
    public function studentAwardClerkApprove(Request $request)
    {

        $reason = $request->reason;
        $studentAward = StudentAward::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $studentAward->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    }
    public function studentAwardClerkReject(Request $request)
    {

        $reason = $request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $studentAward = StudentAward::where('_id', $request->id)->first();



        $studentAward->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    }
    public function anemiaFinanceListClerk(Request $request)
    {
        return view('clerk.anemiaFinance.index');
    }
    public function getAnemiaFinanceListClerk(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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


        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


        // Total records
        $totalRecord = AnemiaFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)->where('clerk_return', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = AnemiaFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)->where('clerk_return', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }


        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = AnemiaFinance::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }

        $items->where('clerk_return', null);

        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $dob = $record->dob;
            $district = @$record->districtRelation->name;
            $created_at =  $record->created_at;

            $status = @$record->clerk_status;

            $teo_name = @$record->submittedTeo->teo_name;

            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;</div>';
            }

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
                "teo" => $teo_name,
                "edit" => $edit

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
    public function getAnemiaFinanceListClerkReturned(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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


        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


        // Total records
        $totalRecord = AnemiaFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)->where('teo_return', null)->where('clerk_return', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = AnemiaFinance::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)->where('teo_return', null)->where('clerk_return', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }


        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = AnemiaFinance::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }

        $items->where('teo_return', null)->where('clerk_return', 1);



        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $dob = $record->dob;
            $district = @$record->districtRelation->name;
            $created_at =  $record->created_at;

            $status = @$record->clerk_status;

            $teo_name = @$record->submittedTeo->teo_name;

            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
                "teo" => $teo_name,
                "edit" => $edit

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
    public function anemiaFinanceClerkView(Request $request, $id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = AnemiaFinance::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }
        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }
        $formData = AnemiaFinance::where('_id', $id)->first();

        return view('clerk.anemiaFinance.view', compact('formData'));
    }
    public function anemiaFinanceClerkApprove(Request $request)
    {

        $reason = $request->reason;
        $data = AnemiaFinance::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    }
    public function anemiaFinanceClerkReject(Request $request)
    {

        $reason = $request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = AnemiaFinance::where('_id', $request->id)->first();



        $data->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    }
    public function singleEarnerListClerk(Request $request)
    {
        return view('clerk.singleEarner.index');
    }
    public function getSingleEarnerListClerk(Request $request)
    {

        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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


        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();

        // Total records
        $totalRecord = SingleIncomeEarner::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('applicant_name', 'like', "%" . $name . "%");
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('applicant_name', 'like', "%" . $name . "%");
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = SingleIncomeEarner::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

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
            $created_at =  $record->created_at;

            $status = @$record->clerk_status;

            $teo_name = @$record->teo->teo_name;

            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('singleEarnerClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('singleEarnerClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('singleEarnerClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="' . $id . '"><i class="fa fa-ban bg-danger "></i></a></div>';
            }


            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "caste" => $applicant_caste,
                "district" => $district,
                "created_at" => $created_at,
                "teo" => $teo_name,
                "edit" => $edit

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

    public function singleEarnerClerkView(Request $request, $id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = SingleIncomeEarner::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.singleEarner.view', compact('formData'));
    }
    public function singleEarnerClerkApprove(Request $request)
    {

        $reason = $request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'clerk_status' => 1,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    }
    public function singleEarnerClerkReject(Request $request)
    {

        $reason = $request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();



        $data->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);

        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    }
    public function studentFundListClerk()
    {
        return view("clerk.studentFund.index");
    }
    public function getStudentFundListClerk(Request $request)
    {
        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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


<<<<<<< HEAD
         $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();
           
         $teoIds = $teos->pluck('_id')->toArray();
        
             // Total records
             $totalRecord = MedEngStudentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('teo_status',1);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             $totalRecord->where('clerk_return', null);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();
=======
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();

        // Total records
        $totalRecord = MedEngStudentFund::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();
>>>>>>> f0017c8fd1f4ffb0c888383630cc78f3f86b2870


        $totalRecordswithFilte = MedEngStudentFund::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


<<<<<<< HEAD
             // Fetch records
             $items = MedEngStudentFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('teo_status',1)
             ->orderBy($columnName, $columnSortOrder);
           
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            $items->where('clerk_return', null);
             $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');;
=======
        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }


        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = MedEngStudentFund::where('deleted_at', null)->orderBy($columnName, $columnSortOrder)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }

        $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');;


>>>>>>> f0017c8fd1f4ffb0c888383630cc78f3f86b2870


        $data_arr = array();
        $i = $start;
        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $course_name = $record->course_name;
            $place = $record->place;
            $date = $record->date;
            $income = $record->income;
            $caste = $record->caste;
            $created_at =  $record->created_at;
            $carbonDate = Carbon::parse($record->created_at);

            $date = $carbonDate->format('d-m-Y');
            $time = $carbonDate->format('g:i a');

<<<<<<< HEAD
              $status = @$record->clerk_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                if($status == 1){
                  $edit='<div class="settings-main-icon"><a  href="' . route('studentFundClerkView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>'.$record->clerk_status_reason.'</span></div>';
              }
              else if($status ==2){
                  $edit='<div class="settings-main-icon"><a  href="' . route('studentFundClerkView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$record->clerk_status_reason.'</span></div>';
            
              }
              else if($status ==null){
                  $edit='<div class="settings-main-icon"><a  href="' . route('studentFundClerkView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;</div>';
              }
=======
            $status = @$record->clerk_status;

            $teo_name = @$record->teo->teo_name;

            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('studentFundClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('studentFundClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('studentFundClerkView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="' . $id . '"><i class="fa fa-ban bg-danger "></i></a></div>';
            }
>>>>>>> f0017c8fd1f4ffb0c888383630cc78f3f86b2870



            $data_arr[] = array(
                "id" => $id,
                "sl_no" => $i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" => $income,
                "date" => $date . ' ' . $record->time,
                "teo" => $teo_name,
                "edit" => $edit

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
<<<<<<< HEAD
    public function getStudentFundListClerkReturn(Request $request){
        $name = $request->name;
        $user_id=Auth::user()->id;
        $role =  Auth::user()->role;       
        $teo =  Auth::user()->teo_name;
        $district =  Auth::user()->district;

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


         $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();
           
         $teoIds = $teos->pluck('_id')->toArray();
        
             // Total records
             $totalRecord = MedEngStudentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('teo_status',1);
           
             if($name != ""){
                 $totalRecord->where('name','like',"%".$name."%");
             }
             $totalRecord->where('teo_return', 1);
             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = MedEngStudentFund::where('deleted_at',null)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('teo_status',1);

          
             if($name != ""){
                $totalRecordswithFilte->where('name','like',"%".$name."%");
            }
           
            $totalRecordswithFilte->where('teo_return', null)->where('clerk_return', 1);
             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = MedEngStudentFund::where('deleted_at',null)->orderBy($columnName,$columnSortOrder)
             ->whereIn('submitted_teo', $teoIds)
             ->where('submitted_district', $district)
             ->where('teo_status',1)
             ->orderBy($columnName, $columnSortOrder);
             if($name != ""){
                $items->where('name','like',"%".$name."%");
            }
            $items->where('teo_return', null)->where('clerk_return', 1);
             $records = $items->skip($start)->take($rowperpage)->get()->sortByDesc('created_at');;

         $data_arr = array();
            $i=$start;
         foreach($records as $record){
            $i++;
             $id = $record->id;
             $name = $record->name;
             $address = $record->address;
             $course_name = $record->course_name;
             $place = $record->place;
             $date=$record->date;
             $income=$record->income;
             $caste = $record->caste;
              $created_at =  $record->created_at;
              $carbonDate = Carbon::parse($record->created_at);

              $date = $carbonDate->format('d-m-Y');
              $time = $carbonDate->format('g:i a');

              $status = @$record->clerk_status;
            
              $teo_name=@$record->teo->teo_name;
            
                $edit='';
                $edit='<div class="settings-main-icon"><a href="' . route('studentFundClerkView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a></div>';



            $data_arr[] = array(
                "id" => $id,
               "sl_no" =>$i,
                "name" => $name,
                "address" => $address,
                "course_name" => $course_name,
                "caste" => $caste,
                "income" =>$income,
                "date" => $date .' ' .$record->time, 
                "teo" => $teo_name,                            
                "edit" => $edit

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
    public function studentFundClerkView ($id){
=======
    public function studentFundClerkView($id)
    {
>>>>>>> f0017c8fd1f4ffb0c888383630cc78f3f86b2870


        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
<<<<<<< HEAD
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $studentFund=MedEngStudentFund::find($id);
      if($studentFund->clerk_view_status==null ){
        $studentFund->update([
        "clerk_view_status"=>1,
        "clerk_view_id" =>Auth::user()->id,
        "clerk_view_date" =>$date .' ' .$currenttime
        ]);
    } 
    if($studentFund->clerk_return_view_status==null && $studentFund->return_status==1){
        $studentFund->update([
        "clerk_return_view_status"=>1,
        "clerk_view_id" =>Auth::user()->id,
        "clerk_return_view_date" =>$date .' ' .$currenttime
        ]);
    }
       
        return view('clerk.studentFund.details', compact('studentFund'));
=======
        $currenttime = $currentTimeInKerala->format('h:i A');
>>>>>>> f0017c8fd1f4ffb0c888383630cc78f3f86b2870

        $studentFund = MedEngStudentFund::find($id);
        if ($studentFund->clerk_view_status == null) {
            $studentFund->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.studentFund.details', compact('studentFund'));
    }
    public function studentFundClerkApprove(Request $request)
    {
        $id = $request->id;
        $reason = $request->reason;
        // $currentTime = Carbon::now();
        $studentFund = MedEngStudentFund::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $studentFund->update([
                    'clerk_status' => 1,
                    'clerk_return' => null,
                    'clerk_status_date' => $currenttime,
                    'clerk_status_id' => Auth::user()->id,
                    'clerk_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Medical/Engineering Student Fund Scheme Application approved successfully.'
        ]);
    }
    public function studentFundClerkReject(Request $request)
    {
        $id = $request->id;
        $reason = $request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $studentFund = MedEngStudentFund::where('_id', $request->id)->first();

        $studentFund->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);



        return response()->json([
            'success' => 'Medical/Engineering Student Fund Scheme Application Rejected successfully.'
        ]);
    }

    public function gethouseGrantReturnListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_return', null)->where('clerk_return', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $place = $record->place;
            $panchayath = $record->panchayath;
            $caste = $record->caste;
            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = $record->teo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('houseGrantClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';


            $data_arr[] = array(

                "sl_no" => $i,
                "id" => $id,
                "place" => $place,
                "name" => $name,
                "address" => $address,
                "panchayath" => $panchayath,
                "caste" => $caste,
                "date" => $date . ' ' . $time,
                "teo_name" => $teo_name,
                "edit" => $edit,


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

    public function houseGrantListClerk()
    {
        return view('clerk.houseGrant.index');
    }

    public function gethouseGrantListClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->Where('clerk_return', null)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();





        // Total records
        $totalRecord = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = HouseManagement::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $place = $record->place;
            $panchayath = $record->panchayath;
            $caste = $record->caste;
            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = $record->teo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('houseGrantClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('houseGrantClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('houseGrantClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';
            }







            $data_arr[] = array(

                "sl_no" => $i,
                "id" => $id,
                "place" => $place,
                "name" => $name,
                "address" => $address,
                "panchayath" => $panchayath,
                "caste" => $caste,
                "date" => $date . ' ' . $time,
                "teo_name" => $teo_name,
                "edit" => $edit,


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
    public function houseGrantClerkDetails($id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = HouseManagement::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }

        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.houseGrant.details', compact('formData'));
    }
    public function houseGrantClerkApprove(Request $request)
    {
        $house = HouseManagement::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $house->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'House Grant Scheme Application Approved successfully.'
        ]);
    }
    public function houseGrantClerkReject(Request $request)
    {
        $house = HouseManagement::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $house->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'House Grant Scheme Application Rejected successfully.'
        ]);
    }

    public function tuitionFeeListClerk()
    {
        return view('clerk.tuitionFee.index');
    }

    public function gettuitionFeeClerkReturn(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        $totalRecord->where('teo_return', null)->where('clerk_return', 1);

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }

        $totalRecordswithFilte->where('teo_return', null)->where('clerk_return', 1);

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }

        $items->where('teo_return', null)->where('clerk_return', 1);
        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $student_name = $record->student_name;
            $caste = $record->caste;
            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = $record->teo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';

            $edit = '<div class="settings-main-icon"><a  href="' . route('tuitionFeeClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a></div>';





            $data_arr[] = array(

                "sl_no" => $i,
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "student_name" => $student_name,
                "caste" => $caste,
                "date" => $date . ' ' . $time,
                "teo_name" => $teo_name,
                "edit" => $edit,


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

    public function gettuitionFeeClerk(Request $request)
    {
        $role =  Auth::user()->role;
        $district =  Auth::user()->district;
        $tdo = Auth::user()->po_tdo_office;

        $name = $request->name;
        $teos = Teo::where('po_or_tdo', Auth::user()->po_tdo_office)->get();

        $teoIds = $teos->pluck('_id')->toArray();


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
        $totalRecord = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        $totalRecord->where('clerk_return', null);

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }

        $totalRecordswithFilte->where('clerk_return', null);

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        $items->where('clerk_return', null);

        $records = $items->skip($start)->take($rowperpage)->get();





        // Total records
        $totalRecord = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }


        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }



        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records


        $items = TuitionFee::where('deleted_at', null)
            ->whereIn('submitted_teo', $teoIds)
            ->where('submitted_district', $district)
            ->where('teo_status', 1)
            ->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = $start;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $student_name = $record->student_name;
            $caste = $record->caste;
            $status = $record->clerk_status;
            $date = $record->date;
            $time = $record->time;
            $teo_name = $record->teo->teo_name;
            $created_at =  $record->created_at;
            $edit = '';
            if ($status == 1) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('tuitionFeeClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == 2) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('tuitionFeeClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>' . $record->clerk_status_reason . '</span></div>';
            } else if ($status == null) {
                $edit = '<div class="settings-main-icon"><a  href="' . route('tuitionFeeClerkDetails', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="' . $id . '"><i class="fa fa-ban bg-danger "></i></a></div>';
            }







            $data_arr[] = array(

                "sl_no" => $i,
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "student_name" => $student_name,
                "caste" => $caste,
                "date" => $date . ' ' . $time,
                "teo_name" => $teo_name,
                "edit" => $edit,


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
    public function tuitionFeeClerkDetails($id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = TuitionFee::find($id);
        if ($formData->clerk_view_status == null) {
            $formData->update([
                "clerk_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_view_date" => $date . ' ' . $currenttime
            ]);
        }


        if ($formData->clerk_return_view_status == null && $formData->return_status == 1) {
            $formData->update([
                "clerk_return_view_status" => 1,
                "clerk_view_id" => Auth::user()->id,
                "clerk_return_view_date" => $date . ' ' . $currenttime
            ]);
        }

        return view('clerk.tuitionFee.details', compact('formData'));
    }
    public function tuitionFeeClerkApprove(Request $request)
    {
        $tuition = TuitionFee::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $tuition->update([
            'clerk_status' => 1,
            'clerk_return' => null,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Tuition Fee Scheme Application Approved successfully.'
        ]);
    }
    public function tuitionFeeClerkReject(Request $request)
    {
        $tuition = TuitionFee::where('_id', $request->id)->first();
        $id = $request->id;
        $reason = $request->reason;
        //  $currentTime = Carbon::now();
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');


        $tuition->update([
            'clerk_status' => 2,
            'clerk_status_date' => $currenttime,
            'clerk_status_id' => Auth::user()->id,
            'clerk_status_reason' => $reason,
        ]);
        return response()->json([
            'success' => 'Tuition Fee Application Rejected successfully.'
        ]);
    }
}
