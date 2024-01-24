<?php

namespace App\Http\Controllers;
use App\Models\ItiFund;
use App\Models\AnemiaFinance;
use App\Models\ExamApplication;
use App\Models\FinancialHelp;
use App\Models\MarriageGrant;
use App\Models\MotherChildScheme;

use App\Models\SingleIncomeEarner;
use App\Models\StudentAward;

use App\Models\MedEngStudentFund;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\ChildFinance;
use App\Count;
use Carbon\Carbon;
use App\Hospital;
use App\Models\HouseManagement;
use App\Models\TuitionFee;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Make sure to include this line

class HomeController extends Controller

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


       if (auth()->user()->role =='User'){
        $user_id=Auth::user()->id;
        $data['coupleFinanceCount'] = FinancialHelp::where('user_id',$user_id)->count();
        $data['examCount'] = ExamApplication::where('user_id',$user_id)->count();
        $data['motherChildCount'] = MotherChildScheme::where('user_id',$user_id)->count();
        $data['marriageGrantCount'] = MarriageGrant::where('user_id',$user_id)->count();
        $data['houseGrantCount'] = HouseManagement::where('user_id',$user_id)->count();
        $data['itiFundCount'] = ItiFund::where('user_id',$user_id)->count();

        $data['studentAwardCount'] = StudentAward::where('user_id',$user_id)->count();
        $data['anemiaFinanceCount'] = AnemiaFinance::where('user_id',$user_id)->count();
        $data['singleEarnerCount'] = SingleIncomeEarner::where('user_id',$user_id)->count();

        $data['studentFundCount'] = MedEngStudentFund::where('user_id',$user_id)->count();
        $data['childFinanceCount'] = ChildFinance::where('user_id', $user_id)->count();
        $data['tuitionFeeCount'] = TuitionFee::where('user_id', $user_id)->count();

            return view('user.dashboard',compact('data'));
       }else{
        if (auth()->user()->role =='TEO'){
            $teo=Auth::user()->teo_name;
            $data['coupleFinanceCount'] = FinancialHelp::where('submitted_teo',$teo)->where('status',0)->count();
      //    dd($data['coupleFinanceCount']);
            $data['examCount'] = ExamApplication::where('submitted_teo',$teo)->where('status',0)->count();
            $data['motherChildCount'] = MotherChildScheme::where('submitted_teo',$teo)->where('status',0)->count();
            $data['marriageGrantCount'] = MarriageGrant::where('submitted_teo',$teo)->where('status',0)->count();
            $data['houseGrantCount'] = HouseManagement::where('submitted_teo',$teo)->where('status',0)->count();
            $data['itiFundCount'] = ItiFund::where('submitted_teo',$teo)->where('status',0)->count();    
            $data['studentAwardCount'] = StudentAward::where('submitted_teo',$teo)->where('status',0)->count();
            $data['anemiaFinanceCount'] = AnemiaFinance::where('submitted_teo',$teo)->where('status',0)->count();
            $data['singleEarnerCount'] = SingleIncomeEarner::where('submitted_teo',$teo)->where('status',0)->count();    
            $data['studentFundCount'] = MedEngStudentFund::where('submitted_teo',$teo)->where('status',0)->count();
            $data['childFinanceCount'] = ChildFinance::where('submitted_teo',$teo)->where('status',0)->count();
            $data['tuitionFeeCount'] = TuitionFee::where('submitted_teo',$teo)->where('status',0)->count();

            $data['approvedCoupleFinanceCount'] = FinancialHelp::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedExamCount'] = ExamApplication::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedMotherChildCount'] = MotherChildScheme::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedMarriageGrantCount'] = MarriageGrant::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedHouseGrantCount'] = HouseManagement::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedItiFundCount'] = ItiFund::where('submitted_teo',$teo)->where('status',1)->count();    
            $data['approvedStudentAwardCount'] = StudentAward::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedAnemiaFinanceCount'] = AnemiaFinance::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedSingleEarnerCount'] = SingleIncomeEarner::where('submitted_teo',$teo)->where('status',1)->count();    
            $data['approvedStudentFundCount'] = MedEngStudentFund::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedChildFinanceCount'] = ChildFinance::where('submitted_teo',$teo)->where('status',1)->count();
            $data['approvedTuitionFeeCount'] = TuitionFee::where('submitted_teo',$teo)->where('status',1)->count();
            
            $data['rejectedCoupleFinanceCount'] = FinancialHelp::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedExamCount'] = ExamApplication::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedMotherChildCount'] = MotherChildScheme::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedMarriageGrantCount'] = MarriageGrant::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedHouseGrantCount'] = HouseManagement::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedItiFundCount'] = ItiFund::where('submitted_teo',$teo)->where('status',2)->count();    
            $data['rejectedStudentAwardCount'] = StudentAward::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedAnemiaFinanceCount'] = AnemiaFinance::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedSingleEarnerCount'] = SingleIncomeEarner::where('submitted_teo',$teo)->where('status',2)->count();    
            $data['rejectedStudentFundCount'] = MedEngStudentFund::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedChildFinanceCount'] = ChildFinance::where('submitted_teo',$teo)->where('status',2)->count();
            $data['rejectedTuitionFeeCount'] = TuitionFee::where('submitted_teo',$teo)->where('status',2)->count();
            return view('admin.dashboard',compact('data'));
        }
   
            return view('admin.dashboard');
        }
    }
    public function applicationForms()
    {
        return view('application.form');
    }



    public function profile()
    {
        $user = User::where('_id', auth()->user()->id)->where('deleted_at', null)->first();
        return view('profile.view_profile', compact('user'));
    }
    public function password()
    {
        $user = User::where('_id', auth()->user()->id)->where('deleted_at', null)->first();
        return view('profile.edit_profile', compact('user'));
    }
    public function changePassword(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'password' => [
                    'required', Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),
                ],
            ]
        );
        if ($validate->fails()) {
            $messages = $validate->getMessageBag();
            return redirect()->back()->withErrors($validate);
        }
        $id = $request->password;
        $pass = $request->current_password;
        $user = User::where('_id', auth()->user()->id)->where('deleted_at', null)->first();

        if (strcmp($request->current_password, $request->password) == 0) {
            return redirect()->back()->with('error', 'New Password cannot be same as your current password. Please choose a different password..');
        }

        if ($request->password != $request->c_password) {
            return redirect()->back()->with('error', 'Retype Password Mismatch,Try Again');
        }

        if (Hash::check($pass, auth()->user()->password)) {
            $user->update([
                'password' =>  Hash::make($id),
            ]);
            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }
    }
    public function changeStatus(Request $request)
    {
        // $request =Request::all();
        //dd($request['status']);
        $status = "aone";
        if ($request['status']) {
            $status = $request['status'];
        }
        session()->put('style_status', $status);
        return redirect()->back();
    }
    public function query()
    {

        $datas = Patient::get();
        //  dd($datas);
        $pid = 'P0001';
        foreach ($datas as $collect) {
            $score = Patient::find($collect['_id']);
            $score->update([
                'patient_id' => $pid++
            ]);
        }
        //     DB::table('users')
        // ->whereNotNull('deleted_at') // Specify the condition: deleted_at is not null
        // ->delete();
        // User::where('email','sruthi@kawikatechnologies.com')->delete();
        // $users = User::where('role','Data Entry')->delete();
        // $users = User::where('email','cheruvadichcqq@gmail.com')->first();
        // $users = User::get();
        //  dd($users);
        // Patient::where('name',null)->delete();

        // Hospital::truncate();
        // Patient::truncate();
        // Pharmacy::truncate();
        // Miscellaneous::truncate();
        // Laboratory::truncate();

    }
    public function ajaxList(Request $request)
    {
        // Simulated data (replace with your actual data retrieval logic)
        $term = $request['q'];
        $patients = Patient::orderBy('id', 'desc')
            ->where(function ($query) use ($term) {
                $query->orWhere('name', 'like', '%' . $term . '%')
                    ->orWhere('patient_id', 'like', '%' . $term . '%')
                    ->orWhere('mobile', 'like', '%' . $term . '%');
            })->limit(20)->get();



        $array = [];

        // Iterate through the data using a foreach loop
        foreach ($patients as $patient) {
            // Insert each row into the associative array with a custom key
            $array =
                ['value' => $patient->id, 'text' => $patient->name . '-' . $patient->patient_id . '-' . $patient->mobile];
            // Add more fields as needed
            $data[] = $array;
        }


        $results = [];

        foreach ($data as $item) {

            if (stripos($item['text'], $term) !== false) {
                $results[] = $item;
            }
        }

        echo json_encode($results);
    }
    public function userData(){
        $id=Auth::user()->id;
        $data="";
        if(Auth::user()->role=='User'){
            $user=User::find($id);
            if($user->bank_name== null && $user->bank_name== null && $user->passbook == null ){
                return response()->json([
                    'user' => 'user', "data" =>"not-exist","user_data" =>$user
                ]);
            }
            else{
                return response()->json([
                    'user' => 'user', "data" =>"exist","user_data" =>$user
                ]);
            }
        }
        else{
            return response()->json([
                'user' => 'not-user'
            ]);
        }
    }

    public function bankDetailsUpdate(Request $request){
      
        $user=User::where('_id',$request->id)->first();
       // $input=$request->all();
        $passbook = '';
        if ($request->hasfile('passbook')) {

            $image = $request->passbook;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/user'), $imgfileName);

            $passbook = $imgfileName;

        }else{
            $passbook = '';
        }
        $user->update([
            "passbook" =>$passbook,
            "bank_name" =>$request->bank_name,
            "account_no" =>$request->account_no,
            "ifsc_code" =>$request->ifsc_code,


        ]);
        return response()->json(['success' => 'Bank Details Updated Successfully']);
       
    
    }
}
