@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">
                </h4>
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
			<div class="row row-sm">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-body">
							    <div id="success_message" class="ajax_response" style="display: none;"></div>
								<div class="mb-4 main-content-label">
                                    <h4 class="medical__form--h1 text-center m-3">
                                        <b><u>ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്</u></b>
                                    </h4>
                                    </div>
                                    <div class="paper-1 pt-4">
                                        <div class="w-100">
                                           <div class="row w-100">
                                              <div class="col-12" style="text-align: right;">
                                                 @if(@$formData['applicant_image'])
                                                    <img src="{{ asset('itiStudentFund/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
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
                                                <td>{{ @$formData['name'] }} <br> <br>{{ @$formData['address'] }}, {{ @$formData['current_taluk_name'] }}
                                                    , {{ @$formData['current_district_name'] }}  , {{ @$formData['current_pincode'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>പഞ്ചായത്തിൻ്റെ പേര്

                                                </td>
                                                <td>{{ @$formData['panchayath'] }} </td>
                                            </tr>
                                            <tr>
                                            
                                            <tr>
                                                <td>3</td>
                                                <td>കോഴ്‌സിന്റെ പേര്

                                                </td>
                                                <td>{{ @$formData['course_name'] }} </td>
                                            </tr>
                                            <tr>
                                            <td>4</td>
                                            <td>മെട്രിക് അല്ലെങ്കിൽ നോൺ മെട്രിക് ?

                                            </td>
                                            <td>{{ @$formData['metric_type'] }} </td>
                                        </tr>
                                        <tr>
                                        <td>5</td>
                                        <td>കോഴ്‌സിൻ്റെ ദൈർഘ്യം 

                                        </td>
                                        <td>{{ @$formData['course_duration'] }} </td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>പ്രവേശന തീയതി
                                        </td>
                                        <td>@if(@$formData['admission_date']!=null) {{ \Carbon\Carbon::parse(@$formData['admission_date'])->format('d-m-Y') }}@endif</td>
                                    </tr>
                                    

                                            <tr>
                                                <td>7</td>
                                                <td>നടപ്പ് അദ്ധ്യയന വർഷം <br>ക്ലാസ് ആരംഭിച്ച തീയതി
                                                </td>
                                                <td>@if(@$formData['class_start_date']!=null) {{ \Carbon\Carbon::parse(@$formData['class_start_date'])->format('d-m-Y') }}@endif</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
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
                                                <td>9</td>
                                                <td>അപേക്ഷകന്റെ ജാതി/ മതം <br>
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                                </td>
                                                <td>{{ @$formData['caste'] }} <br> @if($formData['caste_certificate'])
                                                    <a href="{{ asset('itiStudentFund/' . @$formData['caste_certificate']) }}" target="_blank">View</a>
                                                    @endif</td>
                                            </tr>
                                            {{-- <tr>
                                                <td>6</td>
                                                <td>അപേക്ഷകന്റെ വരുമാനം <br>
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                                </td>
                                                <td> {{ @$formData['income'] }} <br> @if($formData['income_certificate'])
                                                    <a href="{{ asset('itiStudentFund/' . @$formData['income_certificate']) }}" target="_blank">View</a>
                                                    @endif</td>
                                            </tr> --}}
                                            <tr>
                                                <td>10</td>
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
                                            <tr>
                                                <td>11</td>
                                                <td>മാതാപിതാക്കളുടെ അക്കൗണ്ട് വിശദാംശങ്ങൾ
                                                </td>
                                                <td>
                                                
                                                  
                                                    <br>Bank Branch  : {{ @$formData['parent_bank_branch']  }}
                                                    <br>Account Number   : {{ @$formData['parent_account_no']  }}
                                                    <br>IFSC Code : {{ @$formData['parent_ifsc_code']  }}
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>പ്രിൻസിപ്പൽ  അക്കൗണ്ട് വിശദാംശങ്ങൾ
                                                </td>
                                                <td>
                                                
                                                  
                                                    <br>Bank Branch  : {{ @$formData['principal_bank_branch']  }}
                                                    <br>Account Number   : {{ @$formData['principal_account_no']  }}
                                                    <br>IFSC Code : {{ @$formData['principal_ifsc_code']  }}
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>ഹാജർ വിശദാംശങ്ങൾ 
                                                </td>
                                                <td>
                                                
                                                  
                                                    @if($formData['attendance_doc'])
                                                    <a href="{{ asset('itiStudentFund/' . @$formData['attendance_doc']) }}" target="_blank"> View </a>
                                                    @endif 
                                                    
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    
                                </div>

                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h1
                                style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                അപേക്ഷ സമർപ്പിക്കുന്നത് 

                            </h1>
                                    </div>
                                </div>
                                <div class="row ">

                                    <div class="col-4 d-flex">
                                        <span class="col-5"> ജില്ല
                                        </span>
                                        <span class="col-1"> :</span>
                                        <span class="col-6"> {{ @$formData['dist_name'] }}  </span>

                                    </div>

                                    <div class="col-4 d-flex">
                                        <span class="col-5"> ടി .ഇ .ഓ</span>
                                        <span class="col-1"> :</span>
                                        <span class="col-6">{{ @$formData['teo_name'] }} </span>

                                    </div>
                                    <div class="col-4 d-flex">
                                        <span class="col-5"> സ്ഥാപനം</span>
                                        <span class="col-1"> :</span>
                                        <span class="col-6">{{ @$formData['institution_name'] }} </span>

                                    </div>

                                </div>
                              
                                <br><br>
                                    <div class="m-5">
                                        <h1
                                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 5px;line-height: 32px;font-weight: 600;">
                                       <u>സമ്മതപത്രം</u> </h1>
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
                                                <img src="{{ asset('itiStudentFund/' . @$formData['signature']) }}" width="120px" height="60px">
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

                                        {{-- <div class="col-6 d-flex">
                                            <span class="col-5"> രക്ഷാകർത്താവിന്റെ ഒപ്പ്
                                            </span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6"> @if($formData['parent_signature'])
                                                <img src="{{ asset('itiStudentFund/' . @$formData['parent_signature']) }}" width="120px" height="60px">
                                                @endif </span>

                                        </div> --}}

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> രക്ഷാകർത്താവിന്റെ  പേര്</span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6">{{@$formData['parent_name']}} </span>

                                        </div>

                                    </div>
                                   
                                    <br><br>
                                <form action="{{ route('itiFundStore') }}" method="POST" enctype="multipart/form-data" >
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
    function goback() {
        if (confirm('Are you sure ? Do you want to edit this form!. ')) {
            // window.history.back();
            window.location.href = "{{ url()->previous() }}";
        }
        return
    
    }
</script>
@endsection