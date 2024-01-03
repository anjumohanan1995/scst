@extends('layouts.app_login')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">Registration</h4>
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
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
					<div class="card">
						<div class="card-body">
							    <div id="success_message" class="ajax_response" style="display: none;"></div>
								
									<div class="mb-4 main-content-label">Application Details</div>
                                    <table id="example" class="" style="width:100%">
                                        <tr>
                                            <td colspan="2">
                                                അപേക്ഷകന്റെ പേരും പൂർണ്ണ മേൽ വിലാസവും
                                            </td>
                                        </tr>
                                        <tr>

                                           
                                            <td><label class="form-control">Husband / ഭർത്താവ്: <b>{{ @$formData['husband_address'] }} </b>
                                                </label></td>
                                            <td><label class="form-control"> Wife / ഭാര്യ: <b>{{ @$formData['wife_address'] }}</b></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം 
                                            </td>
                                        </tr>
                                        <tr>
                                         
                                            <td><label class="form-control">Husband / ഭർത്താവ്: <b>{{ @$formData['husband_address_old'] }} </b>
                                            </td>
                                            <td><label class="form-control">Wife / ഭാര്യ: <b>{{ @$formData['wife_address_old'] }}</b>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                 സമുദായം
                                            </td>
                                        </tr>

                                        <tr>
                                        
                                            <td><label class="form-control">Husband / ഭർത്താവ്: <b>{{ @$formData['husband_caste'] }} </b>
                                            </td>
                                            <td><label class="form-control">Wife / ഭാര്യ: <b>{{ @$formData['wife_caste'] }}</b>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                  വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും 
                                            </td>
                                        </tr>

                                        <tr>
                                        
                                            <td><label class="form-control">Husband / ഭർത്താവ് : <b>{{ @$formData['hus_work_before_marriage'] }} </b>
                                            </td>
                                            <td><label class="form-control">Wife / ഭാര്യ: <b>{{ @$formData['wife_work_before_marriage'] }}</b>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                   അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസാവരുമാനവും 
                                            </td>
                                        </tr>

                                        <tr>
                                       
                                            <td><label class="form-control">Husband / ഭർത്താവ് :<b>{{ @$formData['hus_work_after_marriage'] }} </b>
                                            </td>
                                            <td><label class="form-control">Wife / ഭാര്യ: <b>{{ @$formData['wife_work_after_marriage'] }}</b>
                                                </label></td>
                                        </tr>
                                         <tr>
                                            <td colspan="2">
                                                  വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                 എ)വിവാഹ സമയത്തെ പ്രായം 
                                            </td>
                                        </tr>

                                        <tr>
                                         <br>
                                        
                                            <td><label class="form-control">Husband / ഭർത്താവ് : <b>{{ @$formData['husband_age'] }} </b>
                                            </td>
                                            <td><label class="form-control">Wife / ഭാര്യ: <b>{{ @$formData['wife_age'] }}</b>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                  ബി)രജിസ്റ്റർ വിവാഹം ആയിരുന്നുവോ എങ്കിൽ രെജിസ്റ്ററേഷൻ നമ്പരും തിയതിയും, റെജിസ്റ്ററോഫീസിന്റെ പേരും 
                                            </td>
                                        </tr>

                                        <tr>
                                           
                                            <td><label class="form-control">Details: <b>{{ @$formData['register_details'] }} </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                 സി)വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിയിട്ടുണ്ടെങ്കിൽ അതിന്റെ വിവരം 
                                            </td>
                                        </tr>
                                        <tr>
                                           
                                            <td><label class="form-control">Details: <b>{{ @$formData['certificate_details'] }} </b>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                 വിവാഹത്തിനുശേഷം ദമ്പതികൾ ഏതെങ്കിലും കാലയളവിൽ വേർപിരിഞ്ഞ് താമസിച്ചിട്ടുണ്ടോ? {{ @$formData['apart_for_any_period'] }}
                                            </td>
                                        </tr>

                                        <tr>
                                             
                                         
                                            @if(@$formData['apart_for_any_period'] == 'Yes') 
                                                വേർപിരിഞ്ഞ് താമസിച്ച കാലയളവ് 
                                                <td><label class="form-control">Duration: <b>{{ @$formData['duration'] }} </b>
                                                </td>

                                                വേർപിരിഞ്ഞ് താമസിക്കാനുണ്ടായ കാരണം
                                                <td><label class="form-control">Reason: <b>{{ @$formData['reason'] }} </b>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                  ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു കാര്യത്തിനുവേണ്ടി ചെലവഴിക്കാനാണ് ഉദ്ദേശിക്കുന്നത്  
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label class="form-control">Details: <b>{{ @$formData['financial_assistance'] }} </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                  മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക് അനുഭവിക്കേണ്ടി വന്നിട്ടുള്ള കഷ്ടതകളും പ്രയാസങ്ങളും എന്തെല്ലാം  
                                            </td>
                                        </tr>
                                        <tr>

                                           
                                                <td><label class="form-control">Details: <b>{{ @$formData['difficulties'] }} </b>
                                                </td>
                                          
                                        </tr>

                                        
                                    </table>
                                
                                <form action="{{ url('financialHelpStoreDetails') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-6 mb-6">
												<label class="form-label">Husband's Sign/ഭർത്താവിന്റെ ഒപ്പ് </label>
												<input type="file" class="form-control"  name="husband_sign" required />
												@error('husband_sign')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">Wife's Sign/ ഭാര്യയുടെ ഒപ്പ് </label>
												<input type="file" class="form-control"  name="wife_sign" required />
												@error('wife_sign')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-1 mb-1">
                                            <input type="checkbox" id="wifeCheckbox" name="agree" value="Yes" required>
                                        </div>
                                        <div class="col-md-11 mb-11">
                                            ശ്രീമാൻ <input type="text" class="form-control"  name="husband_name" required />ശ്രീമതി 
                                             <input type="text" class="form-control"  name="wife_name" required />
                                            എന്നിവരായ ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ പ്രതിജ്ഞ ചെയ്തുകൊള്ളുന്നു.
                                        </div>
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-md-3">

                                            <input type="hidden" name="formData" value="{{ json_encode($formData) }}">

                                            <button type="submit" class="btn-block  btn btn-success"
                                                    onclick="return confirm('Do you want to continue?')">Submit</button>
                                            
                                        </div>
                                        <div class="col-md-3">

                                          
                                            <div class="btn_wrapper">
                                                <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
                                            </div>
                                        </div>
                                    </div> --}}

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
            window.history.back();
        }
        return
    }
</script>
@endsection