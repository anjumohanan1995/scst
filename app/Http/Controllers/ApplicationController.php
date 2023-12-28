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

        $captchaText = Str::random(4); // Generate a random string for captcha text
        Session::put('captcha_text', $captchaText);
        return view('application.create',compact('captchaText'));
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
        return redirect()->back()->with('success','Registration Completed Successfully');




        
    }

    

    public function filterAndCountWords($input)
    {

        // Example usage:
         $input= "lorem ipsum dolor sit amet bcd";

        $words = str_word_count($input, 1);
        $charSet = ['e', 'a', 'r'];
        $result = [];
    
        foreach ($words as $word) {
            $wordLower = strtolower($word); // Convert to lowercase for case-insensitive matching
            if (strpbrk($wordLower, implode('', $charSet)) !== false) {
                $result[$word] = isset($result[$word]) ? $result[$word] + 1 : 1;
            }
        }
    
        
        return $result;

    
        
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
