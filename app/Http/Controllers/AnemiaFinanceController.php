<?php

namespace App\Http\Controllers;

use App\Models\AnemiaFinance;
use App\Models\District;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use App\Models\ExamApplication;
use Carbon\Carbon;
use App\Models\studentFund;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\UTCDateTime;
use Illuminate\Support\Facades\Auth; // Make sure to include this line


class AnemiaFinanceController extends Controller
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


    public function anemiaFinancialAssistance()
    {

        $districts = District::get();
        return view('application.anemia_finance', compact('districts'));
    }


    public function anemiaFinancePreview(Request $request)
    {

        // dd($request)
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'age' => 'required',
                'email' => 'email',
                'phone' => 'required',
                'caste' => 'required',
                'caste_certificate' => 'required',
                'address' => 'required',
                'adhaar_number' => 'required',
                'adhaar_copy' => 'required',
                'bank_account_details' => 'required',
                'passbook_copy' => 'required',
                'submitted_district' => 'required',
                'submitted_teo' => 'required',
            ]

        );
        if ($request->input('is_medical_certificate_submitted') == 'Yes') {
            $validator->sometimes('medical_certificate', 'required', function ($input) {
                return true;
            });
        }
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('caste_certificate')) {

            $image = $request->caste_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/anemia_finance'), $imgfileName);

            $caste_certificate = $imgfileName;
        } else {
            $caste_certificate = '';
        }
        if ($request->hasfile('adhaar_copy')) {

            $adhar = $request->adhaar_copy;
            $imgfileName1 = time() . rand(100, 999) . '.' . $adhar->extension();

            $adhar->move(public_path('/applications/anemia_finance'), $imgfileName1);

            $adhaar_copy = $imgfileName1;
        } else {
            $adhaar_copy = '';
        }
        if ($request->hasfile('passbook_copy')) {

            $passbook = $request->passbook_copy;
            $imgfileName2 = time() . rand(100, 999) . '.' . $passbook->extension();

            $passbook->move(public_path('/applications/anemia_finance'), $imgfileName2);

            $passbook_copy = $imgfileName2;
        } else {
            $passbook_copy = '';
        }
        if ($request->hasfile('ration_card')) {

            $ration = $request->ration_card;
            $imgfileName3 = time() . rand(100, 999) . '.' . $ration->extension();

            $ration->move(public_path('/applications/anemia_finance'), $imgfileName3);

            $ration_card = $imgfileName3;
        } else {
            $ration_card = '';
        }

        if ($request->hasfile('medical_certificate')) {

            $medical = $request->medical_certificate;
            $imgfileName4 = time() . rand(100, 999) . '.' . $medical->extension();

            $medical->move(public_path('/applications/anemia_finance'), $imgfileName4);

            $medical_certificate = $imgfileName4;
        } else {
            $medical_certificate = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/anemia_finance'), $imgfileName);

            $signature = $imgfileName;
        } else {
            $signature = '';
        }

        if ($request->hasfile('applicant_photo')) {

            $applicant_photo = $request->applicant_photo;
            $imgfileName1 = time() . rand(100, 999) . '.' . $applicant_photo->extension();

            $applicant_photo->move(public_path('/applications/anemia_finance'), $imgfileName1);

            $applicant_photos = $imgfileName1;
        } else {
            $applicant_photos = '';
        }

        $formData = $data;
        $formData['caste_certificate'] = $caste_certificate;
        $formData['adhaar_copy'] = $adhaar_copy;
        $formData['passbook_copy'] = $passbook_copy;
        $formData['ration_card'] = $ration_card;
        $formData['medical_certificate'] = $medical_certificate;
        $formData['signature'] = $signature;
        $formData['applicant_photo'] = $applicant_photos;
        $request->flash();

        return view('application.anemia_finance_preview', compact('formData'));
    }
    public function anemiaFinanceStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);



        $datainsert = AnemiaFinance::create([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'age' => $data['age'],
            'caste' => $data['caste'],
            'caste_certificate' => $data['caste_certificate'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'district' => @$data['district'],
            'taluk' => @$data['taluk'],
            'pincode' => @$data['pincode'],
            'email' => @$data['email'],
            'adhaar_number' => @$data['adhaar_number'],
            'adhaar_copy' => @$data['adhaar_copy'],
            'bank_account_details' => @$data['bank_account_details'],
            'passbook_copy' => @$data['passbook_copy'],
            'ration_card_type' => @$data['ration_card_type'],
            'ration_card' => $data['ration_card'],
            'is_medical_certificate_submitted' => @$data['is_medical_certificate_submitted'],
            'medical_certificate' => $data['medical_certificate'],
            'signature' => $data['signature'],
            'applicant_photo' => @$data['applicant_photo'],
            'date' => date('d-m-Y'),
            'place' => $data['place'],
            'user_id' => Auth::user()->id,
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'status' => 0
        ]);

        return redirect()->route('userAnemiaFinanceList')->with('status', 'Application Submitted Successfully.');
    }


    public function anemiaFinanceList(Request $request)
    {
        return view('admin.anemia_finance_list');
    }
    public function getAnemiaFinanceList(Request $request)
    {


        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;

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
        $totalRecord = AnemiaFinance::where('deleted_at', null)->where('submitted_teo', $teo);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecord->where('submitted_teo', $teo);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = AnemiaFinance::where('deleted_at', null)->where('submitted_teo', $teo);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }


        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = AnemiaFinance::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $items->where('submitted_teo', $teo);
        }

        //making it null to get only the first data not the returned form.
        $items->where('teo_return', null);

        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $dob = $record->dob;
            $district = @$record->districtRelation->name;
            $created_at =  $record->created_at;
            $edit = '';
            if (Auth::user()->role == "TEO") {
                if ($record->teo_status == 1) {
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div>&nbsp;&nbsp;<span>' . $teo_status_reason . '</span></div>';
                } else if ($record->teo_status == 2) {
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;';
                } else if ($record->teo_status == null) {
                    $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="' . $id . '"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;</div>';
                }
            } else {
                $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
            }
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
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

    public function getAnemiaFinanceReturnList(Request $request)
    {


        $name = $request->name;
        $user_id = Auth::user()->id;
        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;

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
        $totalRecord = AnemiaFinance::where('deleted_at', null)->where('teo_return', 1);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecord->where('submitted_teo', $teo);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = AnemiaFinance::where('deleted_at', null)->where('teo_return', 1);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }


        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = AnemiaFinance::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $items->where('submitted_teo', $teo);
        }

        //making it 1 to get only the returned form.
        $items->where('teo_return', 1);


        $records = $items->skip($start)->take($rowperpage)->get();




        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $dob = $record->dob;
            $district = @$record->districtRelation->name;
            $created_at =  $record->created_at;
            $edit = '';
            if (Auth::user()->role == "TEO") {

                $edit = '<div class="settings-main-icon"><a  href="' .  route('anemiaFinanceView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="btn btn-primary" href="' .  url('anemiaFinanceReturnList-edit/' . $id) . '">Resubmit</a></div>';
            } else {
                $edit = '<div class="settings-main-icon"><a  href="' . route('anemiaFinanceView', $id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
            }

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "dob" => $dob,
                "district" => $district,
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
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

    public function anemiaFinanceReturnListEdit(Request $request)
    {
        $data = Auth::user();
        $districts = District::get();
        $datas = AnemiaFinance::where('_id', $request->id)->first();
        //  dd($datas);
        return view('admin.anemia_finance_form_edit', compact('data', 'districts', 'datas'));
    }


    public function anemiaFinanceReturnListUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'age' => 'required',
                'email' => 'email',
                'phone' => 'required',
                'caste' => 'required',
                'caste_certificate' => 'required',
                'address' => 'required',
                'adhaar_number' => 'required',
                'adhaar_copy' => 'required',
                'bank_account_details' => 'required',
                'passbook_copy' => 'required',
                'submitted_district' => 'required',
                'submitted_teo' => 'required',
            ]

        );
        if ($request->input('is_medical_certificate_submitted') == 'Yes') {
            $validator->sometimes('medical_certificate', 'required', function ($input) {
                return true;
            });
        }
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('caste_certificate')) {

            $image = $request->caste_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/anemia_finance'), $imgfileName);

            $caste_certificate = $imgfileName;
        } else {
            $caste_certificate = '';
        }
        if ($request->hasfile('adhaar_copy')) {

            $adhar = $request->adhaar_copy;
            $imgfileName1 = time() . rand(100, 999) . '.' . $adhar->extension();

            $adhar->move(public_path('/applications/anemia_finance'), $imgfileName1);

            $adhaar_copy = $imgfileName1;
        } else {
            $adhaar_copy = '';
        }
        if ($request->hasfile('passbook_copy')) {

            $passbook = $request->passbook_copy;
            $imgfileName2 = time() . rand(100, 999) . '.' . $passbook->extension();

            $passbook->move(public_path('/applications/anemia_finance'), $imgfileName2);

            $passbook_copy = $imgfileName2;
        } else {
            $passbook_copy = '';
        }
        if ($request->hasfile('ration_card')) {

            $ration = $request->ration_card;
            $imgfileName3 = time() . rand(100, 999) . '.' . $ration->extension();

            $ration->move(public_path('/applications/anemia_finance'), $imgfileName3);

            $ration_card = $imgfileName3;
        } else {
            $ration_card = '';
        }

        if ($request->hasfile('medical_certificate')) {

            $medical = $request->medical_certificate;
            $imgfileName4 = time() . rand(100, 999) . '.' . $medical->extension();

            $medical->move(public_path('/applications/anemia_finance'), $imgfileName4);

            $medical_certificate = $imgfileName4;
        } else {
            $medical_certificate = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/anemia_finance'), $imgfileName);

            $signature = $imgfileName;
        } else {
            $signature = '';
        }

        if ($request->hasfile('applicant_photo')) {

            $applicant_photo = $request->applicant_photo;
            $imgfileName1 = time() . rand(100, 999) . '.' . $applicant_photo->extension();

            $applicant_photo->move(public_path('/applications/anemia_finance'), $imgfileName1);

            $applicant_photos = $imgfileName1;
        } else {
            $applicant_photos = '';
        }

        $data = $request->all();
        $datainsert =  AnemiaFinance::where('_id', $request->id)->first();
        // dd($request->id);
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');
        $datainsert->update([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'age' => $data['age'],
            'caste' => $data['caste'],
            'caste_certificate' => $data['caste_certificate'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'district' => @$data['district'],
            'taluk' => @$data['taluk'],
            'pincode' => @$data['pincode'],
            'email' => @$data['email'],
            'adhaar_number' => @$data['adhaar_number'],
            'adhaar_copy' => @$data['adhaar_copy'],
            'bank_account_details' => @$data['bank_account_details'],
            'passbook_copy' => @$data['passbook_copy'],
            'ration_card_type' => @$data['ration_card_type'],
            'ration_card' => $data['ration_card'],
            'is_medical_certificate_submitted' => @$data['is_medical_certificate_submitted'],
            'medical_certificate' => $data['medical_certificate'],
            'signature' => $data['signature'],
            'applicant_photo' => @$data['applicant_photo'],
            'date' => date('d-m-Y'),
            'place' => $data['place'],
            'user_id' => Auth::user()->id,
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'teo_return' => null,
            'return_status' => 1,
            "teo_view_status" => 1,
            // 'user_id' => Auth::user()->id,
            'status' => 0,
            "teo_status_date" => $date . ' ' . $currenttime,
            "teo_return_view_date" => $date . ' ' . $currenttime
        ]);


        return redirect()->route('anemiaFinanceList')->with('status', 'Application Submitted Successfully.');
    }


    public function anemiaFinanceView(Request $request, $id)
    {
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('h:i A');

        $formData = AnemiaFinance::find($id);
        if ($formData->teo_view_status == null && Auth::user()->role == 'TEO') {
            $formData->update([
                "teo_view_status" => 1,
                "teo_view_id" => Auth::user()->id,
                "teo_view_date" => $date . ' ' . $currenttime
            ]);
        }
        $formData = AnemiaFinance::where('_id', $id)->first();

        return view('admin.anemia_finance_view', compact('formData'));
    }
    public function anemiaFinanceTeoApprove(Request $request)
    {

        $reason = $request->reason;
        $data = AnemiaFinance::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'teo_status' => 1,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    }
    public function anemiaFinanceTeoReject(Request $request)
    {

        $reason = $request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = AnemiaFinance::where('_id', $request->id)->first();



        $data->update([
            'teo_status' => 2,
            'teo_status_date' => $currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application Rejected successfully.'
        ]);
    }
}
