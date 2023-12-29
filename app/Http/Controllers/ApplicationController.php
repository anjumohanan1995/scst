<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\UTCDateTime;

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
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function userStore(Request $request)
    {   
        $validator = Validator::make($request->all(), [
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
            'captcha' => 'required|captcha'],[
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
            'father_name' => $data['father_name'],
            'mother_name' => $data['mother_name'],
            'aadhar_number' => $data['aadhar_number'],
            'password' => Hash::make($data['password']),
            'id_proof' => $data['id_proof'],
            'id_proof_details' => $data['id_proof_details'],
            'role' =>'User'
            
            
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
        $applicationNumber ='STDD002023122820';

        $Count = User::where('application_number', $applicationNumber)->count();
        //dd($user);
        if($Count > 0){
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
        }else{
            $applicationNo = $applicationNumber;
        }

        $update = User::where('_id',$user->id)->update(['application_number' => $applicationNo]);

        //dd($applicationNumber);

        return redirect()->route('userRegistration')->with('success','Registration Completed Successfully,Application Number is '.$applicationNo);


    //return redirect()->back()->with('success','Registration Completed Successfully,Application Number is '.$applicationNo);


    }

    

    

    public function filterAndCountWords()
    {

        // Example usage:
        $input= "loreme ipsum dolor sit amet bcd  loremerr ipsum dolore sit ametr bcd";
        $words =explode(" ",$input);
        
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
        if($exists){
            $message ="true";
        }else{
            $message ="false";
        }

        return response()->json(['message' => $message]);
    }
    
   

   





    












}
