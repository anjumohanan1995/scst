<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\District;
use App\Models\Taluk;
use App\Models\SingleIncomeEarner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            'applicant_name' => 'required',
            'caste_certificate' => 'nullable|file|mimes:jpg,pdf|max:2048',
            'adhaar_copy' => 'nullable|file|mimes:jpg,pdf|max:2048',
            'passbook_copy' => 'nullable|file|mimes:jpg,pdf|max:2048',
            'death_certificate' => 'nullable|file|mimes:jpg,pdf|max:2048',
            'ration_card' => 'nullable|file|mimes:jpg,pdf|max:2048',
            'income_certificate' => 'nullable|file|mimes:jpg,pdf|max:2048',
            'signature' => 'nullable|file|mimes:jpg|max:2048',
            'past_job_document' => 'nullable|file|mimes:jpg,pdf|max:2048'
            ]
           
        );
        if ($validator->fails()) {
            // Captcha validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        if ($request->hasfile('applicant_image')) {

            $image = $request->applicant_image;
            $applicant_img = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/applications/single_earner'), $applicant_img);

            $applicant_image = $applicant_img;

        }else{
            $applicant_image = '';
        }
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
        if ($request->hasfile('past_job_document')) {

            $image = $request->past_job_document;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('applications/single_earner'), $imgfileName);

            $past_job_document = $imgfileName;

        }else{
            $past_job_document = '';
        }

        $formData = $data;
        $formData['applicant_image']= $applicant_image;
        $formData['caste_certificate']= $caste_certificate;
        $formData['adhaar_copy']= $adhaar_copy;
        $formData['passbook_copy']= $passbook_copy;
        $formData['ration_card']= $ration_card;
        $formData['income_certificate']= $income_certificate;
        $formData['signature']= $signature;
        $formData['past_job_document']= $past_job_document;
        $formData['death_certificate']= $death_certificate;

        



        return view('application.single_income_earner_preview', compact('formData'));


    }


    public function singleEarnerStore(Request $request)
    {

    

        $data = json_decode($request->input('formData'), true);
       
      

        $datainsert = SingleIncomeEarner::create([
            'applicant_name' => @$data['applicant_name'],
            'applicant_email' => @$data['applicant_email'],
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
            'applicant_image' => @$data['applicant_image'],
            'signature' => @$data['signature'],
            'income_certificate' => @$data['income_certificate'],
            'income_source' => @$data['income_source'],
            'user_id' =>Auth::user()->id, 
            'submitted_district' => $data['submitted_district'],
            'submitted_teo' => $data['submitted_teo'],
            'date'=> date("Y-m-d"),
            'time'=> date("H:i:s"),
            'status' =>0
        ]);

        return redirect('userSingleEarnerList')->with('status','Application Submitted Successfully.');
    }

    public function singleEarnerList(Request $request)
    {
        return view('admin.single_earner_list');
    }
    public function getSingleEarnerList(Request $request)
    {
        
        $name = $request->name;
        $user_id=Auth::user()->id;
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
             $totalRecord = SingleIncomeEarner::where('deleted_at',null);
           
             if($name != ""){
                 $totalRecord->where('applicant_name','like',"%".$name."%");
             }
             if($role == "TEO"){
                $totalRecord->where('submitted_teo',$teo);
            }

             $totalRecords = $totalRecord->select('count(*) as allcount')->count();


             $totalRecordswithFilte = SingleIncomeEarner::where('deleted_at',null);

          
             if($name != ""){
                $totalRecordswithFilte->where('applicant_name','like',"%".$name."%");
            }
           
            if($role == "TEO"){
                $totalRecordswithFilte->where('submitted_teo',$teo);
            }

             $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

             // Fetch records
             $items = SingleIncomeEarner::where('deleted_at',null)->orderBy($columnName,$columnSortOrder);
            
             if($name != ""){
                $items->where('applicant_name','like',"%".$name."%");
            }
            if($role == "TEO"){
                $items->where('submitted_teo',$teo);
            }

             $records = $items->skip($start)->take($rowperpage)->get();
         



         $data_arr = array();

         foreach($records as $record){
             $id = $record->id;
             $name = $record->applicant_name;
             $address = $record->address;
             $applicant_caste = $record->applicant_caste;
             $district = @$record->districtRelation->name;
              $created_at =  $record->created_at;
              $edit ='';
              if(Auth::user()->role== "TEO"){
                if($record->teo_status== 1){
                    $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-success">Approved</div></div>';
                }
                else if($record->teo_status ==2){
                    $teo_status_reason = Str::limit($record->teo_status_reason, 10);
                    $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>&nbsp;&nbsp;<span>'.$teo_status_reason.'</span></div>';
              
                }
                else if($record->teo_status ==null){
                    $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a>&nbsp;&nbsp;<a class="approveItem" data-id="'.$id.'"><i class="fa fa-check bg-success me-1"></i></a>&nbsp;&nbsp;<a class="rejectItem" data-id="'.$id.'"><i class="fa fa-ban bg-danger "></i></a></div>';
                }
               
              }
              else{
                $edit='<div class="settings-main-icon"><a  href="' . route('singleEarnerView',$id) . '"><i class="fa fa-eye bg-info me-1"></i></a></div>';
             
              }
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "address" => $address,
                "caste" => $applicant_caste,
                "district" => $district,
                "created_at" => $created_at,                  
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

    public function singleEarnerView(Request $request, $id)
    {       
        $currentTime = Carbon::now();

        $date = $currentTime->format('d-m-Y');
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
      $currenttime = $currentTimeInKerala->format('h:i A');
     
      $formData=SingleIncomeEarner::find($id);
        if($formData->teo_view_status==null && Auth::user()->role=='TEO'){
            $formData->update([
            "teo_view_status"=>1,
            "teo_view_id" =>Auth::user()->id,
            "teo_view_date" =>$date .' ' .$currenttime
            ]);
        }  
       
        return view('admin.single_earner_view', compact('formData'));

    }
    public function singleEarnerTeoApprove(Request $request){
     
        $reason =$request->reason;
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');

        $data->update([
            'teo_status' => 1,
            'teo_status_date' =>$currenttime,
            'teo_status_id' => Auth::user()->id,
            'teo_status_reason' => $reason,
        ]);


        return response()->json([
            'success' => 'Application approved successfully.'
        ]);
    
    }
    public function singleEarnerTeoReject(Request $request){
       
        $reason =$request->reason;
        $currentTimeInKerala = now()->timezone('Asia/Kolkata');
        $currenttime = $currentTimeInKerala->format('d-m-Y h:i a');
        $data = SingleIncomeEarner::where('_id', $request->id)->first();

      

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
