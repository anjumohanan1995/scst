<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SingleIncomeEarner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Make sure to include this line

class SingleIncomeEarnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $districts = District::get();
        return view('application.single_income_earner_application',compact('districts'));
    }
    public function singleIncomeEarnerPreview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'applicant_name' => 'required']
           
        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('caste_certificate')) {

            $image = $request->caste_certificate;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/single_earner'), $imgfileName);

            $caste_certificate = $imgfileName;

        }else{
            $caste_certificate = '';
        }
        if ($request->hasfile('adhaar_copy')) {

            $adhar = $request->adhaar_copy;
            $imgfileName1 = time() . rand(100, 999) . '.' . $adhar->extension();

            $adhar->move(public_path('/applications/single_earner'), $imgfileName1);

            $adhaar_copy = $imgfileName1;

        }else{
            $adhaar_copy = '';
        }
        if ($request->hasfile('passbook_copy')) {

            $passbook = $request->passbook_copy;
            $imgfileName2 = time() . rand(100, 999) . '.' . $passbook->extension();

            $passbook->move(public_path('/applications/single_earner'), $imgfileName2);

            $passbook_copy = $imgfileName2;

        }else{
            $passbook_copy = '';
        }
        if ($request->hasfile('death_certificate')) {

            $death = $request->death_certificate;
            $dc = time() . rand(100, 999) . '.' . $death->extension();

            $death->move(public_path('/applications/single_earner'), $dc);

            $death_certificate = $dc;

        }else{
            $death_certificate = '';
        }
        if ($request->hasfile('ration_card')) {

            $ration = $request->ration_card;
            $imgfileName3 = time() . rand(100, 999) . '.' . $ration->extension();

            $ration->move(public_path('/applications/single_earner'), $imgfileName3);

            $ration_card = $imgfileName3;

        }else{
            $ration_card = '';
        }

        if ($request->hasfile('income_certificate')) {

            $medical = $request->income_certificate;
            $imgfileName4 = time() . rand(100, 999) . '.' . $medical->extension();

            $medical->move(public_path('/applications/single_earner'), $imgfileName4);

            $income_certificate = $imgfileName4;

        }else{
            $income_certificate = '';
        }
        if ($request->hasfile('signature')) {

            $image = $request->signature;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/single_earner'), $imgfileName);

            $signature = $imgfileName;

        }else{
            $signature = '';
        }
        $formData = $data;
        $formData['caste_certificate']= $caste_certificate;
        $formData['adhaar_copy']= $adhaar_copy;
        $formData['passbook_copy']= $passbook_copy;
        $formData['ration_card']= $ration_card;
        $formData['income_certificate']= $income_certificate;
        $formData['signature']= $signature;

        return view('application.single_income_earner_preview', compact('formData'));


    }


    public function singleEarnerStore(Request $request)
    {
        $data = json_decode($request->input('formData'), true);
       
      

        $datainsert = SingleIncomeEarner::create([
            'applicant_name' => @$data['applicant_name'],
            'applicant_caste' => @$data['applicant_caste'],
            'caste_certificate' => @$data['caste_certificate'],
            'address' => @$data['address'],
            'district' => @$data['district'],
            'taluk' => @$data['taluk'],
            'pincode' => @$data['pincode'],
            'relation_with_person' => @$data['relation_with_person'],
            'applicant_aadhar_no' => @$data['applicant_aadhar_no'],
            'adhaar_copy' => @$data['adhaar_copy'],
            'applicant_phone' => @$data['applicant_phone'],
            'bank_account_no' => @$data['bank_account_no'],
            'bank_account_ifsc' => @$data['bank_account_ifsc'],
            'passbook_copy' => @$data['passbook_copy'],
            'deceased_person_name' => @$data['deceased_person_name'],
            'deceased_person_caste' => @$data['deceased_person_caste'],
            'date_of_birth' => @$data['date_of_birth'],
            'date_of_death' => @$data['date_of_death'],
            'deceased_person_age' => @$data['deceased_person_age'],
            'death_certificate' => @$data['death_certificate'],
            'cause_of_death' => @$data['cause_of_death'],
            'past_job' => @$data['past_job'],
            'total_members' => @$data['total_members'],
            'ration_card' => @$data['ration_card'],
            'name' => @$data['name'],
            'job' => @$data['job'],
            'salary' => @$data['salary'],
            'annual_income' => @$data['annual_income'],
            'income_certificate' => @$data['income_certificate'],
            'income_source' => @$data['income_source'],
            'date' => date('d-m-Y'),
            'user_id' =>Auth::user()->id, 
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'status' =>0
        ]);

        return redirect()->route('home')->with('success','Application Submitted Successfully.');
    }
   
}
