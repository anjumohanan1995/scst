<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Validate login fields
    $credentials = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    // dd($credentials);

    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        // Redirect to the intended route after successful login
        return redirect()->intended('/home');
    }

    // If login fails, redirect back with an error
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    // Send OTP to the user's mobile number
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
        ]);

        $user = User::where('role', 'User')
        ->where('user_mobile', $request->input('mobile'))
        ->first();

        if (!$user) {
            // If user does not exist, create a new one
            $user = User::create([
                'user_mobile' => $request->input('mobile'),
                'role' => 'User', // Set default role
            ]);
        }

        $otp = rand(100000, 999999);

        // dd($otp);

        // Update user's OTP field and save
        $user->otp = $otp;

        // dd($user->otp);
        $user->save();




        // Store OTP and mobile in the session
        Session::put('otp', $otp);
        Session::put('user_mobile', $request->input('mobile'));

        // Call the method to send OTP
        // $this->sendOtpToUser($user->mobile, $otp);

        // Send OTP to the user's email
        Mail::to('sasaravind2013@gmail.com')->send(new OtpMail($otp));

        Session::put('otp', $otp);
        Session::put('user_mobile', $request->input('mobile'));


        return redirect()->route('otp.verify')->with('success', 'OTP sent to your mobile number.');
    }

    // Show OTP verification form
    public function showOtpForm()
    {
        return view('auth.verify_otp');
    }

    // Verify OTP and log the user in
    public function verifyOtp(Request $request)
    {
        // dd(Session::get('otp'));
        // Validate the OTP input
        $request->validate([
            'otp' => 'required|digits:6',
        ]);
    
        // Check if the OTP matches the one stored in the session
        if ($request->input('otp') == Session::get('otp')) {
            // dd("hi");
            // Retrieve the user based on the mobile number stored in the session
            $user = User::where('role', 'User')
                ->where('user_mobile', Session::get('user_mobile'))
                ->first(); // Retrieve the actual user instance
    
            // Check if user exists
            if ($user) {
                // Log in the user
                Auth::guard('web')->login($user);
    
                // Clear the session data
                Session::forget('otp');
                Session::forget('user_mobile');
                // Redirect the user to the intended page after login
                return redirect()->intended('/home');
            } else {
                return back()->with('error', 'User not found.');
            }
        } else {
            // Return error if OTP is invalid
            return back()->with('error', 'Invalid OTP.');
        }
    }
    
    protected function sendOtpToUser($mobile, $otp)
    {
        // Integrate with SMS provider to send OTP
        // Example: Using Twilio to send the OTP

        // Twilio credentials
        $sid = 'your_twilio_account_sid';
        $token = 'your_twilio_auth_token';
        $twilio = new \Twilio\Rest\Client($sid, $token);

        // OTP message
        $message = "Your OTP code is: $otp";

        try {
            $twilio->messages->create(
                $mobile,
                [
                    'from' => 'your_twilio_phone_number',
                    'body' => $message
                ]
            );
        } catch (\Exception $e) {
            // Handle error (e.g., log it)
            \Log::error('Failed to send OTP: ' . $e->getMessage());
        }
    }
}
