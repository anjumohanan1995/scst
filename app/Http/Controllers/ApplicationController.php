<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Taluk;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;
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


class ApplicationController extends Controller
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

    public function userRegistration()
    {


        return view('application.create');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function userStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'name_confirmation' => 'required|same:name',
                'dob' => 'required|date',
                'dob1' => 'required|date|same:dob',
                'gender' => 'required|in:Male,Female,Transgender',
                'mobile' => 'required|string|max:255',
                'father_name' => 'nullable|string|max:255',
                'mother_name' => 'nullable|string|max:255',
                'caste' => 'required|in:SC,ST',
                'aadhar_number' => 'required|string|max:255|unique:users,aadhar_number',
                'id_proof' => 'required|in:AADHAR,Account No of Nationalised/Scheduled Bank,Conductor Licence,Driving Licence,e-SHRAM Card,ID for Central Employees,ID for PH issued by SW Dept,ID for Uty instc etc,ID for BAR Council,ID for Ex-Servicemen,National Health Authority ID Card,PAN card,Passport,PEN for State Employees,Voters Identity Card,National Population Register/Multipurpose National Identity Card',
                'id_proof_details' => 'required|string|max:255',
                'password' => 'required|string|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+])(?=.*\d).{8,}$/',
                'confirm_password' => 'required|same:password',
                'captcha' => 'required|captcha'
            ],
            [
                'captcha.captcha' => 'Invalid captcha!',
            ]
        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = $request->all();

        $formData = $data;

        return view('application.preview', compact('formData'));
    }
    public function userRegisterSave(Request $request)
    {


        $data = json_decode($request->input('formData'), true);
        //dd( $data);

        $user = User::create([
            'name' => $data['name'],
            'email' => @$data['email'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'mobile' => $data['mobile'],
            'caste' => $data['mobile'],
            'father_name' => $data['father_name'],
            'mother_name' => $data['mother_name'],
            'aadhar_number' => $data['aadhar_number'],
            'password' => Hash::make($data['password']),
            'id_proof' => $data['id_proof'],
            'id_proof_details' => $data['id_proof_details'],
            'role' => 'User'


        ]);


        $currentDate = now();

        // Extract year, month, and day from the current date
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $currentDay = $currentDate->day;

        // Generate the application number format (STDD00YYYYMMDD)
        $applicationNumber = "STDD00" . $currentYear . str_pad($currentMonth, 2, '0', STR_PAD_LEFT) . str_pad($currentDay, 2, '0', STR_PAD_LEFT);

        // Get the count of existing applications for the current month
        $existingApplicationsCount = User::where('created_at', '>=', new UTCDateTime($currentDate->startOfMonth()->timestamp * 1000))
            ->where('created_at', '<', new UTCDateTime($currentDate->endOfMonth()->timestamp * 1000))
            ->count();

        //dd($existingApplicationsCount);

        // Increment the count to get the unique application number
        // $applicationNumber .= str_pad($existingApplicationsCount + 1, 2, '0', STR_PAD_LEFT);
        $applicationNumber = 'STDD002023122820';

        $Count = User::where('application_number', $applicationNumber)->count();
        //dd($user);
        if ($Count > 0) {
            $applicationNumber1 = "STDD00" . $currentYear . str_pad($currentMonth, 2, '0', STR_PAD_LEFT) . str_pad($currentDay, 2, '0', STR_PAD_LEFT);
            $existingApplicationsCount = User::where('created_at', '>=', new UTCDateTime($currentDate->startOfMonth()->timestamp * 1000))
                ->where('created_at', '<', new UTCDateTime($currentDate->endOfMonth()->timestamp * 1000))
                ->count();
            /// dd($existingApplicationsCount);

            // Increment the count to get the unique application number
            $incrementedCount = $existingApplicationsCount + 1;
            $applicationNumber1 .= str_pad($incrementedCount, 2, '0', STR_PAD_LEFT);

            $applicationNo =  $applicationNumber1;
            // dd($applicationNumber1);
        } else {
            $applicationNo = $applicationNumber;
        }

        $update = User::where('_id', $user->id)->update(['application_number' => $applicationNo]);

        //dd($applicationNumber);

        return redirect()->route('userRegistration')->with('success', 'Registration Completed Successfully,Application Number is ' . $applicationNo);


        //return redirect()->back()->with('success','Registration Completed Successfully,Application Number is '.$applicationNo);


    }
    public function userProfile(Request $request)
    {

        $formData = Auth::user();
        return view('user.profile', compact('formData'));
    }








    public function filterAndCountWords()
    {

        // Example usage:
        $input = "loreme ipsum dolor sit amet bcd  loremerr ipsum dolore sit ametr bcd";
        $words = explode(" ", $input);

        // Initialize variables to store selected words
        $selectedWords = [];

        foreach ($words as $word) {
            // Count occurrences of 'e', 'a', and 'r' in the word
            $countE = substr_count($word, 'e');
            $countA = substr_count($word, 'a');
            $countR = substr_count($word, 'r');

            // Calculate the total count
            $totalCount = $countE + $countA + $countR;

            // If the total count is greater than 0, include the word in the result
            if ($totalCount > 0) {
                $selectedWords[$word] = $totalCount;
            }
        }
        arsort($selectedWords);
        // Print or use the result array as needed
        print_r($selectedWords);
        exit;
        // print_r() "Count: " . count($selectedWords) . "\n";

        // $words = str_word_count($input, 1);
        // $charSet = ['e', 'a', 'r'];
        // $result = [];

        // foreach ($words as $word) {
        //     $wordLower = strtolower($word); // Convert to lowercase for case-insensitive matching
        //     if (strpbrk($wordLower, implode('', $charSet)) !== false) {
        //         $result[$word] = isset($result[$word]) ? $result[$word] + 1 : 1;
        //     }
        // }


        //return $result;



    }

    public function checkAadharNumber(Request $request)
    {
        $aadharNumber = $request->input('aadhar_number');

        // Perform a check in your database to see if the Aadhar number already exists
        // Replace this with your actual validation logic

        $exists = User::where('aadhar_number', $aadharNumber)->first();
        if ($exists) {
            $message = "true";
        } else {
            $message = "false";
        }

        return response()->json(['message' => $message]);
    }

    public function applicationForm2()
    {
        $districts = District::get();
        return view('application.form2', compact('districts'));
    }

    public function coupleFinancialHelp(Request $request)
    {

        $data = Auth::user();
        $districts = District::get();
        return view('application.financial-help', compact('data', 'districts'));
    }

    public function financialHelpStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'husband_name' => 'required',
                'submitted_district' => 'required',
                'submitted_teo' => 'required',
                'wife_name' => 'required',

            ]

        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('husband_sign')) {

            $image = $request->husband_sign;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/sign/huband'), $imgfileName);

            $husband_sign = $imgfileName;
        } else {
            $husband_sign = '';
        }


        if ($request->hasfile('wife_sign')) {

            $image = $request->wife_sign;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/sign/wife'), $imgfileName);

            $wife_sign = $imgfileName;
        } else {
            $wife_sign = '';
        }


        if ($request->hasfile('marriage_certificate')) {

            $image = $request->marriage_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/marriage_certificate'), $imgfileName);

            $marriage_certificate = $imgfileName;
        } else {
            $marriage_certificate = '';
        }




        $data = $request->all();
        $formData = $data;
        $formData['marriage_certificate'] = $marriage_certificate;
        $formData['husband_sign'] = $husband_sign;
        $formData['wife_sign'] = $wife_sign;

        $request->flash();

        return view('application.financial_preview', compact('formData'));
    }
    public function financialHelpStoreDetails(Request $request)
    {

        $data = json_decode($request->input('formData'), true);




        $datainsert = FinancialHelp::create([
            'husband_address' => $data['husband_address'],
            'hus_district' => @$data['hus_district'],
            'hus_taluk' => @$data['hus_taluk'],
            'hus_pincode' => @$data['hus_pincode'],
            'wife_address' => @$data['wife_address'],
            'wife_district' => @$data['wife_district'],
            'wife_taluk' => @$data['wife_taluk'],
            'wife_pincode' => @$data['wife_pincode'],
            'husband_address_old' => $data['husband_address_old'],
            'wife_address_old' => $data['wife_address_old'],
            'husband_caste' => $data['husband_caste'],
            'wife_caste' => $data['wife_caste'],
            'hus_work_before_marriage' => $data['hus_work_before_marriage'],
            'hus_work_after_marriage' => $data['hus_work_after_marriage'],
            'husband_age' => $data['husband_age'],
            'wife_age' => $data['wife_age'],
            'register_details' => $data['register_details'],
            'certificate_details' => $data['certificate_details'],
            'apart_for_any_period' => @$data['apart_for_any_period'],
            'duration' => $data['duration'],
            'reason' => $data['reason'],
            'financial_assistance' => $data['financial_assistance'],
            'difficulties' => $data['difficulties'],
            'user_id' => Auth::user()->id,
            'husband_name' => @$data['husband_name'],
            'wife_name' => @$data['wife_name'],
            'agree' => @$data['agree'],
            'wife_sign' => @$data['wife_sign'],
            'husband_sign' => @$data['husband_sign'],
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'hus_income_before_marriage' => $data['hus_income_before_marriage'],
            'wife_income_before_marriage' => $data['wife_income_before_marriage'],
            'hus_income_after_marriage' => $data['hus_income_after_marriage'],
            'wife_income_after_marriage' => $data['wife_income_after_marriage'],
            'register_marriage' => $data['register_marriage'],
            // 'register_number' => $data['register_number'],
            'register_date' => $data['register_date'],
            'register_office_name' => $data['register_office_name'],
            'marriage_certificate' => $data['marriage_certificate'],
            'place' => $data['place'],
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'status' => 0
        ]);

        return redirect()->route('home')->with('success', 'Application Submitted Successfully.');
    }

    public function couplefinancialList(Request $request)
    {
        $data  = FinancialHelp::with('User')->get();
        //dd($data);
        return view('admin.financial_list', compact('data'));
    }
    public function getCoupleList(Request $request)
    {
        $name = $request->name;
        $mobile = $request->mobile;

        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;

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
        $totalRecord = FinancialHelp::where('deleted_at', null);
        if ($mobile != "") {
            $totalRecord->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecord->where('submitted_teo', $teo);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = FinancialHelp::where('deleted_at', null);

        if ($mobile != "") {
            $totalRecordswithFilte->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = FinancialHelp::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
        if ($mobile != "") {
            $items->where('mobile', $mobile);
        }
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $items->where('submitted_teo', $teo);
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
                "date" => $date . '' . $time,
                "created_at" => $created_at,

                //  "more"=>'<button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#exampleModal'.$id.'" data-bs-whatever="@mdo">More Details</button><div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">'.$name.'('.$age.')  </h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="eva eva-close-outline header-icons"><g data-name="Layer 2"><g data-name="close"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect><path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path></g></g></svg></button></div><div class="modal-body"><table id="example" class="table table-striped table-bordered" style="width:100%"><tbody><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Name</h6></div></td><td><div class="image-grouped"> '.$name.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Name</h6></div></td><td><div class="image-grouped">'.$gname.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Guardian Relationship</h6></div></td><td><div class="image-grouped">'.$g_relation.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Age</h6></div></td><td><div class="image-grouped"> '.$age.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Gender</h6></div></td><td><div class="image-grouped">'.$gender.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Mobile Number</h6></div></td><td><div class="image-grouped"> '.$mobile.'</div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Adhar Number</h6></div></td><td><div class="image-grouped"> '.$adhar.'</div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Scheme Id</h6></div></td><td><div class="image-grouped">  '.$sc_id.' </div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Email Id</h6></div></td><td><div class="image-grouped"> '.$email.' </div></td><td><div class="project-contain"><h6 class="mb-1 tx-13">Abha Number</h6></div></td></tr><tr><td><div class="project-contain"><h6 class="mb-1 tx-13">Ration card Number</h6></div></td><td><div class="image-grouped"> '.$ration_card.' </div></td></tr></tbody></table></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div>',
                "edit" => '<div class="settings-main-icon"><a  href="' . url('couple-application/' . $id) . '"><i class="fe fe-eye bg-info me-1"></i></a></div>'

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
    public function coupleApplicationView($id)
    {

        $formData = FinancialHelp::where('_id', $id)->first();
        return view('admin.financial_view', compact('formData'));
    }


    public function examApplication(Request $request)
    {
        $districts = District::get();
        return view('application.exam_application', compact('districts'));
    }


    public function examApplicationPreview(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'student_name' => 'required',
                'submitted_district' => 'required',
                'submitted_teo' => 'required',
                'signature' => 'required|file|mimes:jpg,pdf|max:2048',
            ]

        );
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/signature'), $imgfileName);

            $signature = $imgfileName;
        } else {
            $signature = '';
        }
        $formData = $data;
        $formData['signature'] = $signature;
        $formData['district'] = District::where('_id', $formData['district'])->first();
        $formData['birth_district'] = District::where('_id', $formData['birth_district'])->first();
        $formData['submitted_district'] = District::where('_id', $formData['submitted_district'])->first();
        $formData['submitted_teo'] = District::where('_id', $formData['submitted_teo'])->first();
        $formData['taluk'] = Taluk::where('_id', $formData['taluk'])->first();


        $formData['signature'] = $signature;

        return view('application.exam_application_preview', compact('formData'));
    }
    public function examApplicationStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);





        $datainsert = ExamApplication::create([
            'school_name' => $data['school_name'],
            'student_name' => @$data['student_name'],
            'gender' => @$data['gender'],
            'district' => @$data['district'],
            'taluk' => @$data['taluk'],
            'pincode' => @$data['pincode'],
            'address' => @$data['address'],
            'relation' => @$data['relation'],
            'mother_name' => @$data['mother_name'],

            'birth_district' => $data['birth_district'],
            'age' => $data['age'],

            'annual_income' => $data['annual_income'],
            'occupation_parent' => $data['occupation_parent'],
            'dob' => $data['dob'],
            'caste' => $data['caste'],
            'other' => $data['other'],
            'school_address' => $data['school_address'],
            'birth_place' => $data['birth_place'],
            'mother_tonge' => $data['mother_tonge'],
            'date' => date('d-m-Y'),
            'place' => $data['place'],
            'user_id' => Auth::user()->id,
            'agree' => $request->input('agree'),
            'parent_name'  => @$data['parent_name'],
            'signature' => @$data['signature'],
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'status' => 0
        ]);

        return redirect()->route('home')->with('success', 'Application Submitted Successfully.');
    }

    public function examApplicationList(Request $request)
    {

        return view('admin.exam_application_list');
    }

    public function getExamList(Request $request)
    {
        $role =  Auth::user()->role;

        $teo =  Auth::user()->teo_name;

        $name = $request->name;
        $mobile = $request->mobile;

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
        $totalRecord = ExamApplication::where('deleted_at', null);
        if ($role == "TEO") {
            $totalRecord->where('submitted_teo', $teo);
        }
        if ($mobile != "") {
            $totalRecord->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }

        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = ExamApplication::where('deleted_at', null);
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }

        if ($mobile != "") {
            $totalRecordswithFilte->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }

        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = ExamApplication::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
        if ($role == "TEO") {
            $items->where('submitted_teo', $teo);
        }
        if ($mobile != "") {
            $items->where('mobile', $mobile);
        }
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
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
                "edit" => '<div class="settings-main-icon"><a  href="' . url('exam-application/' . $id) . '"><i class="fe fe-eye bg-info me-1"></i></a></div>'

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


    public function examApplicationView($id)
    {
        $formData = ExamApplication::where('_id', $id)->first();
        return view('admin.exam_application_view', compact('formData'));
    }










    public function motherChildProtectionSchemeStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'submitted_district' => 'required',
            'submitted_teo' => 'required',

            // Add more fields and their validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications'), $imgfileName);

            $signature = $imgfileName;
        } else {
            $signature = '';
        }

        $formData = $data;

        $formData['signature'] = $signature;
        return view('application.mother_child_preview', compact('formData'));
    }
    public function motherChildStoreDetails(Request $request)
    {

        $data = json_decode($request->input('formData'), true);


        $datainsert = MotherChildScheme::create([
            'name' => $data['name'],
            'district' => $data['district'],
            'taluk' => $data['taluk'],
            'pincode' => $data['pincode'],
            'address' => @$data['address'],
            'age' => $data['age'],
            'dob' => $data['dob'],
            'hus_name' => $data['hus_name'],
            'caste' => $data['caste'],
            'village' => $data['village'],
            'births' => $data['births'],
            'expected_date_of_delivery' => $data['expected_date_of_delivery'],
            'dependent_hospital' => $data['dependent_hospital'],
            'place' => $data['place'],
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'date' => date('d-m-Y'),
            'signature' => @$data['signature'],
            'user_id' => Auth::user()->id,
            'status' => 0
        ]);

        return redirect()->route('home')->with('success', 'Application Submitted Successfully.');
    }

    public function motherChildSchemeList(Request $request)
    {
        $data  = FinancialHelp::with('User')->get();
        //dd($data);
        return view('admin.motherchild_list', compact('data'));
    }
    public function getMotherChildList(Request $request)
    {

        $name = $request->name;
        $mobile = $request->mobile;

        $role =  Auth::user()->role;
        $teo =  Auth::user()->teo_name;

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
        $totalRecord = MotherChildScheme::where('deleted_at', null);
        if ($mobile != "") {
            $totalRecord->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecord->where('submitted_teo', $teo);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecord->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MotherChildScheme::where('deleted_at', null);

        if ($mobile != "") {
            $totalRecordswithFilte->where('mobile', $mobile);
        }
        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }
        if ($request->from_date != "1970-01-01" && $request->to_date != "1970-01-01" && $request->from_date != "" && $request->to_date != "") {
            //echo "khk";exit;
            $totalRecordswithFilte->whereBetween('created_at', [$stDate, $edDate]);
        }

        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = MotherChildScheme::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
        if ($mobile != "") {
            $items->where('mobile', $mobile);
        }
        if ($name != "") {
            $items->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $items->where('submitted_teo', $teo);
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
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
                "edit" => '<div class="settings-main-icon"><a  href="' . url('motherChildScheme/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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

    public function motherChildSchemeView(Request $request, $id)
    {

        $formData = MotherChildScheme::with('districtRelation')->where('_id', $id)->first();

        return view('application.application_view', compact('formData'));
    }
    public function marriageGrantForm()
    {
        $districts = District::get();
        return view('application.marriage_grant_form', compact('districts'));
    }
    public function marriageGrantFormStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'submitted_district' => 'required',
            'submitted_teo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        if ($request->hasfile('caste_certificate')) {

            $image = $request->caste_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/marriage_grant_certificates'), $imgfileName);

            $caste_certificate = $imgfileName;
        } else {
            $caste_certificate = '';
        }
        if ($request->hasfile('income_certificate')) {

            $image = $request->income_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/marriage_grant_certificates'), $imgfileName);

            $income_certificate = $imgfileName;
        } else {
            $income_certificate = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/marriage_grant_certificates'), $imgfileName);

            $signature = $imgfileName;
        } else {
            $signature = '';
        }

        $formData = $data;

        $formData['caste_certificate'] = $caste_certificate;
        $formData['income_certificate'] = $income_certificate;
        $formData['signature'] = $signature;
        return view('application.marriage_grant_preview', compact('formData'));
    }
    public function marriageGrantStoreDetails(Request $request)
    {

        $data = json_decode($request->input('formData'), true);


        $datainsert = MarriageGrant::create([
            'name' => $data['name'],
            'current_address' => @$data['current_address'],
            'current_district' => @$data['current_district'],
            'current_taluk' => @$data['current_taluk'],
            'current_pincode' => @$data['current_pincode'],
            'age' => $data['age'],
            'permanent_address' => $data['permanent_address'],
            'permanent_district' => @$data['permanent_district'],
            'permanent_taluk' => @$data['permanent_taluk'],
            'permanent_pincode' => @$data['permanent_pincode'],
            'family_details' => $data['family_details'],
            'caste' => $data['caste'],
            'caste_certificate' => $data['caste_certificate'],
            'fiancee_name' => @$data['fiancee_name'],
            'fiancee_address' => @$data['fiancee_address'],
            'fiancee_district' => @$data['fiancee_district'],
            'fiancee_taluk' => @$data['fiancee_taluk'],
            'fiancee_pincode' => @$data['fiancee_pincode'],
            'relation_with_applicant' => @$data['relation_with_applicant'],
            'marriage_type' => @$data['marriage_type'],
            'is_widow' => @$data['is_widow'],
            'parent_occupation' => $data['parent_occupation'],
            'annual_income' => $data['annual_income'],
            'income_certificate' => $data['income_certificate'],
            'marriage_place' => $data['marriage_place'],
            'marriage_date' => $data['marriage_date'],
            'fiancee_family_details' => $data['fiancee_family_details'],
            'disabled_parent_info' => $data['disabled_parent_info'],
            'freedmen_parent_details' => $data['freedmen_parent_details'],
            'violence_by_non_scheduled_tribes_info' => $data['violence_by_non_scheduled_tribes_info'],
            'land_alienated_details' => $data['land_alienated_details'],
            'outcast_parent_details' => $data['outcast_parent_details'],
            'remarried_parent_details' => $data['remarried_parent_details'],
            'groom_name' => @$data['groom_name'],
            'groom_address' => @$data['groom_address'],
            'groom_district' => @$data['groom_district'],
            'groom_taluk' => @$data['groom_taluk'],
            'groom_pincode' => @$data['groom_pincode'],
            'groom_parent_name' => @$data['groom_parent_name'],
            'groom_parent_address' => @$data['groom_parent_address'],
            'groom_parent_district' => @$data['groom_parent_district'],
            'groom_parent_taluk' => @$data['groom_parent_taluk'],
            'groom_parent_pincode' => @$data['groom_parent_pincode'],
            'financial_assistance_details' => $data['financial_assistance_details'],
            'place' => $data['place'],
            'date' => date('d-m-Y'),
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'signature' => @$data['signature'],
            'user_id' => Auth::user()->id,
            'status' => 0
        ]);

        return redirect()->route('home')->with('success', 'Application Submitted Successfully.');
    }
    public function marriageGrantList(Request $request)
    {
        return view('admin.marriage_grant_list');
    }
    public function getmarriageGrantList(Request $request)
    {

        $name = $request->name;
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
        $totalRecord = MarriageGrant::where('deleted_at', null);

        if ($name != "") {
            $totalRecord->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecord->where('submitted_teo', $teo);
        }

        $totalRecords = $totalRecord->select('count(*) as allcount')->count();


        $totalRecordswithFilte = MarriageGrant::where('deleted_at', null);


        if ($name != "") {
            $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
        }
        if ($role == "TEO") {
            $totalRecordswithFilte->where('submitted_teo', $teo);
        }


        $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

        // Fetch records
        $items = MarriageGrant::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);

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
                "created_at" => @$created_at->timezone('Asia/Kolkata')->format('d-m-Y H:i:s'),
                "edit" => '<div class="settings-main-icon"><a  href="' . url('marriageGrant/' . $id . '/view') . '"><i class="fa fa-eye bg-info me-1"></i></a></div>'

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
    public function marriageGrantView(Request $request, $id)
    {

        $formData = MarriageGrant::where('_id', $id)->first();

        return view('application.marriage_grant_view', compact('formData'));
    }
}
