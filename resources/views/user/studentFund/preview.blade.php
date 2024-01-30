@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				
			</div>
			<div class="col-xl-3">
			</div>
		</div>
		<!-- /breadcrumb -->
		<!-- main-content-body -->
		<div class="main-content-body">
			

			@if (session('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif  

			<!-- row -->
			<!-- row -->
			<div class="row row-sm mt-4">
				<div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 ">
					<div class="card">
						<div class="card-body p-5">
							    <div id="success_message" class="ajax_response" style="display: none;"></div>
								<div class="mb-4 main-content-label">
                                    <h4 class="medical__form--h1 text-center m-3">
                                        <b><u>മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ പട്ടികജാതി വിദ്യാർത്ഥികൾക്ക്
                                            പ്രാരംഭചെലവുകൾക്ക് ധനസഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷ</u></b>
                                    </h4>
                                    </div>
                                    <div class="paper-1 pt-4">
                                        <div class="w-100">
                                           <div class="row w-100">
                                              <div class="col-12" style="text-align: right;">
                                                 @if(@$formData['applicant_image'])
                                                    <img src="{{ asset('medEngStudentFund/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                                                 @endif
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                   <br>
                                    <table id="preview_student_fund">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>അപേക്ഷകന്റെ പേര് <br>
                                                    <br>
                                                    മേൽവിലാസം
                                                </td>
                                                <td>{{ @$formData['name'] }} <br> <br>{{ @$formData['address'] }} , {{ @$formData['current_taluk_name'] }}
                                                    , {{ @$formData['current_district_name'] }}  , {{ @$formData['current_pincode'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>കോഴ്‌സിന്റെ പേര്

                                                </td>
                                                <td>{{ @$formData['course_name'] }} </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>നടപ്പ് അദ്ധ്യയന വർഷം <br>ക്ലാസ് ആരംഭിച്ച തീയതി
                                                </td>
                                                <td> @if(@$formData['class_start_date']!=null) {{ \Carbon\Carbon::parse(@$formData['class_start_date'])->format('d-m-Y') }}@endif</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത്
                                                </td>
                                                <td> @if(@$formData['admission_type'] == 'merit') 
                        
                                                    മെരിറ്റ്
                                                    @elseif(@$formData['admission_type'] == 'innovation') 
                                                    സംവരണം
                                                    @elseif(@$formData['admission_type'] == 'management') 
                                                    മാനേജ്‌മന്റ്
                                                    @elseif(@$formData['admission_type'] == 'others') 
                                                    മറ്റുള്ളവ
                                                    @endif
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>അപേക്ഷകന്റെ ജാതി/ മതം <br>
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                                </td>
                                                <td>{{ @$formData['caste'] }} <br> @if($formData['caste_certificate'])
                                                    <a href="{{ asset('medEngStudentFund/' . @$formData['caste_certificate']) }}" target="_blank">View</a>
                                                    @endif</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>അപേക്ഷകന്റെ വരുമാനം <br>
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                                </td>
                                                <td> {{ @$formData['income'] }} <br> @if($formData['income_certificate'])
                                                    <a href="{{ asset('medEngStudentFund/' . @$formData['income_certificate']) }}"  target="_blank">View</a>
                                                    @endif</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് <br>നമ്പർ ഉണ്ടെങ്കിൽ
                                                    ബാങ്ക്
                                                    ശാഖ<br> /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം
                                                </td>
                                                <td>
                                                
                                                    @if(@$formData['account_details'] =='yes')Yes ,
                                                    @else 
                                                    No 
                                                    @endif 
                                                    @if(@$formData['account_details'] =='yes')
                                                    <br>Bank Branch  : {{ @$formData['bank_branch']  }}
                                                    <br>Account Number   : {{ @$formData['account_no']  }}
                                                    <br>IFSC Code : {{ @$formData['ifsc_code']  }}
                                                    @endif 
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <h1
                                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                    അപേക്ഷ സമർപ്പിക്കുന്നത് 
    
                                </h1>
                                        </div>
                                    </div>
                                    <div class="row ">
    
                                        <div class="col-6 d-flex">
                                            <span class="col-5"> ജില്ല
                                            </span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6"> {{ @$formData['dist_name'] }}  </span>
    
                                        </div>
    
                                        <div class="col-6 d-flex">
                                            <span class="col-5"> ടി .ഇ .ഓ</span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6">{{ @$formData['teo_name'] }} </span>
    
                                        </div>
                                       
    
                                    </div>
                                  
                                    <br><br>
                                    <div class="m-5">
                                        <h6 class="text-center"><u>സമ്മതപത്രം</u> </h6>
                                    </div>
                                    <div class="m-5 ">
                                        <p class="text-justify">&nbsp;&nbsp;&nbsp;അപേക്ഷയിൽ ഞാൻ എഴുതി
                                            തന്നിട്ടുള്ള
                                            വിവരങ്ങൾ എന്റെ അറിവിലും
                                            വിശ്വാസത്തിലും പൂർണവും സത്യസന്ധവുമാണ് .
                                            ഇവയിൽ ഏതെങ്കിലും ശരിയല്ലെന്ന് ബോദ്ധ്യമായാൽ ഇക്കാര്യത്തിൽ
                                            സർക്കാരിന്റെ തീരുമാനം അന്തിമവും ആയത് ഞാൻ അനുസരിക്കുന്നതുമാണ് .ഞാൻ
                                            കൈപറ്റിയിട്ടുള്ള സ്കോളർഷിപ് തുക മടക്കി അടയ്ക്കുന്നതുമാണ് .
                                        </p>
                                    </div>
                                    <div class="row ">

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> അപേക്ഷന്റെ ഒപ്പ്
                                            </span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6"> @if($formData['signature'])
                                                <img src="{{ asset('medEngStudentFund/' . @$formData['signature']) }}" width="120px" height="60px">
                                                @endif </span>

                                        </div>

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> അപേക്ഷന്റെ  പേര്</span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6">{{@$formData['name']}} </span>

                                        </div>

                                    </div>
                                    <hr>
                                    <div class="m-5">
                                        <p style="text-justify ;">അപേക്ഷയിൽ ചേർത്തിട്ടുള്ള വിവരങ്ങൾ എന്റെ
                                            അറിവോടും
                                            സമ്മതത്തോടും നൽകിയിട്ടുള്ളതാണ് .

                                        </p>
                                    </div>
                                    <div class="row ">

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> രക്ഷാകർത്താവിന്റെ ഒപ്പ്
                                            </span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6"> @if($formData['parent_signature'])
                                                <img src="{{ asset('medEngStudentFund/' . @$formData['parent_signature']) }}" width="120px" height="60px">
                                                @endif </span>

                                        </div>

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> രക്ഷാകർത്താവിന്റെ  പേര്</span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6">{{@$formData['parent_name']}} </span>

                                        </div>

                                    </div>
                                   
                                    <br><br>
                                <form action="{{ route('StudentFundStore') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                  
                               
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
                                            <button type="submit" class="btn-block btn btn-success" onclick="return confirm('Do you want to continue?')">Submit</button>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="btn_wrapper">
                                                <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        // Check if the required fields are filled
        var husbandSign = document.getElementsByName('husband_sign')[0].value;
        var wifeSign = document.getElementsByName('wife_sign')[0].value;
        var husbandName = document.getElementsByName('husband_name')[0].value;
        var wifeName = document.getElementsByName('wife_name')[0].value;

        if (husbandSign === '' || wifeSign === '' || husbandName === '' || wifeName === '') {
            alert('Please fill in all required fields.');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>

<script>
    // edit button function
    // function goback() {
    //     if (confirm('Are you sure ? Do you want to edit this form!. ')) {
    //         window.history.back();
    //     }
    //     return
    
    // }
    function goback() {
    if (confirm('Are you sure? Do you want to edit this form?')) {
        window.location.href = "{{ url()->previous() }}";
    }
}
</script>
@endsection