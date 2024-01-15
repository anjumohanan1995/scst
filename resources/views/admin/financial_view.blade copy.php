@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2"></h4>
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
                                        <td><label class="form-control"> അപേക്ഷകന്റെ പേര് (Husband / ഭർത്താവ്): <b>{{ @$formData['husband_name'] }} </b>
                                            </label>
                                        </td>
                                        <td><label class="form-control"> അപേക്ഷകന്റെ പേര് (Wife / ഭാര്യ ): <b>{{ @$formData['wife_name'] }}</b></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-control">അപേക്ഷകന്റെ പൂർണ്ണമേൽവിലാസം (Husband / ഭർത്താവ്): <b>{{ @$formData['husband_address'] }} </b>
                                            </label>
                                        </td>
                                        <td><label class="form-control"> അപേക്ഷകന്റെ പൂർണ്ണമേൽവിലാസം (Wife / ഭാര്യ):  <b>{{ @$formData['wife_address'] }}</b></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-control">
                                                വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം (Husband / ഭർത്താവ് ):<b>{{ @$formData['husband_address_old'] }} </b>
                                        </td>
                                        <td><label class="form-control">വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം(Wife / ഭാര്യ):<b>{{ @$formData['wife_address_old'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <td>District, Taluk, Pincode<label class="form-control"> <b>{{ @$formData['hus_district_name'] }} {{ @$formData['hus_taluk_name'] }} {{ @$formData['hus_pincode'] }} </b>
                                            </label>
                                        </td>
                                        <td>District, Taluk, Pincode<label class="form-control"> <b>{{ @$formData['wife_district_name'] }} {{ @$formData['wife_taluk_name'] }} {{ @$formData['wife_pincode'] }} </b></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-control">
                                                Community / സമുദായം(Husband / ഭർത്താവ്): <b>{{ @$formData['husband_caste'] }} </b>
                                        </td>
                                        <td><label class="form-control">Community / സമുദായം(Wife / ഭാര്യ) : <b>{{ @$formData['wife_caste'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-control">
                                                വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ /Employment before marriage (Husband / ഭർത്താവ് ) : <b>{{ @$formData['hus_work_before_marriage'] }} </b>
                                        </td>
                                        <td><label class="form-control">വിവാഹത്തിനുമുമ്പുള്ള  മാസവരുമാനം/Monthly income before marriage (Husband / ഭർത്താവ് ) <b>{{ @$formData['hus_income_before_marriage'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-control">
                                                വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ /Employment before marriage (Wife / ഭാര്യ) : <b>{{ @$formData['wife_work_before_marriage'] }} </b>
                                        </td>
                                        <td><label class="form-control">വിവാഹത്തിനുമുമ്പുള്ള മാസവരുമാനം/Monthly income before marriage (Wife / ഭാര്യ): <b>{{ @$formData['wife_income_before_marriage'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-control">
                                                Employment at the time of application/അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ (Husband / ഭർത്താവ്) :<b>{{ @$formData['hus_work_after_marriage'] }} </b>
                                        </td>
                                        <td><label class="form-control">Monthly income at the time of application/ അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം (Husband / ഭർത്താവ്): <b>{{ @$formData['hus_income_after_marriage'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-control">
                                                Employment at the time of application/അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ (Wife / ഭാര്യ) :<b>{{ @$formData['wife_work_after_marriage'] }} </b>
                                        </td>
                                        <td><label class="form-control">Monthly income at the time of application/അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം (Wife / ഭാര്യ): <b>{{ @$formData['wife_income_after_marriage'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ
                                        </td>
                                    </tr>
                                    <tr>
                                        <br>
                                        <td>
                                            <label class="form-control">
                                                Age at Marriage/വിവാഹ സമയത്തെ പ്രായം (Husband / ഭർത്താവ് ): <b>{{ @$formData['husband_age'] }} </b>
                                        </td>
                                        <td><label class="form-control">Age at Marriage/വിവാഹ സമയത്തെ പ്രായം (Wife / ഭാര്യ ): <b>{{ @$formData['wife_age'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <br>
                                        <td>
                                            <label class="form-control">
                                                Was it a registered marriage/രജിസ്റ്റർ വിവാഹം ആയിരുന്നുവോ? <b>{{ @$formData['register_marriage'] }} </b>
                                        </td>
                                        <td><label class="form-control">Register Number/രെജിസ്റ്ററേഷൻ നമ്പർ : <b>{{ @$formData['register_details'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <br>
                                        <td>
                                            <label class="form-control">
                                                Date/തീയതി : <b>{{ @$formData['register_date'] }} </b>
                                        </td>
                                        <td><label class="form-control">Name of the Registrar's Office/റെജിസ്റ്ററോഫീസിന്റെ പേര് : <b>{{ @$formData['register_office_name'] }}</b>
                                        </label></td>
                                    </tr>
                                    <tr>
                                        <br>
                                        <td>
                                            <label class="form-control">
                                                Information on the document, if any, has been produced to prove the possibility of marriage/വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിയിട്ടുണ്ടെങ്കിൽ അതിന്റെ വിവരം: <b>{{ @$formData['certificate_details'] }} </b>
                                        </td>
                                        <td><label class="form-control">Document to prove the possibility of marriage/വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ: <b>
                                        @if($formData['marriage_certificate'])
                                        <iframe src="{{ asset('marriage_certificate/' . @$formData['marriage_certificate']) }}" width="400" height="200"></iframe>
                                        @endif</b>
                                        </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-control">  Has the couple lived apart for any period after marriage?/
                                            വിവാഹത്തിനുശേഷം ദമ്പതികൾ ഏതെങ്കിലും കാലയളവിൽ വേർപിരിഞ്ഞ് താമസിച്ചിട്ടുണ്ടോ? : <b>{{ @$formData['apart_for_any_period'] }} </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        @if(@$formData['apart_for_any_period'] == 'Yes') 
                                        <td><label class="form-control"> Period of separation/വേർപിരിഞ്ഞ് താമസിച്ച കാലയളവ്  <b>{{ @$formData['duration'] }} </b>
                                        </td>
                                        Reason for separation/വേർപിരിഞ്ഞ് താമസിക്കാനുണ്ടായ കാരണം
                                        <td><label class="form-control">Reason: <b>{{ @$formData['reason'] }} </b>
                                        </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><label class="form-control">If the financial assistance is received, for what purpose it is intended to be spent/
                                            ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു കാര്യത്തിനുവേണ്ടി ചെലവഴിക്കാനാണ് ഉദ്ദേശിക്കുന്നത് : <b>{{ @$formData['financial_assistance'] }} </b>
                                        </td>
                                        <td><label class="form-control"> What are the hardships and hardships couples have to face due to intermarriage/
                                            മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക് അനുഭവിക്കേണ്ടി വന്നിട്ടുള്ള കഷ്ടതകളും പ്രയാസങ്ങളും എന്തെല്ലാം: <b>{{ @$formData['difficulties'] }} </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Husband's Sign/ഭർത്താവിന്റെ ഒപ്പ് 
                                            @if($formData['husband_sign'])
                                            <iframe src="{{ asset('sign/huband/' . @$formData['husband_sign']) }}" width="400" height="200"></iframe>
                                            @endif
                                        </td>
                                        <td>
                                            Wife's Sign/ ഭാര്യയുടെ ഒപ്പ്
                                            @if($formData['wife_sign'])
                                            <iframe src="{{ asset('sign/wife/' . @$formData['wife_sign']) }}" width="400" height="200"></iframe>
                                            @endif
                                        </td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td>ശ്രീമാൻ: 
                                            <label class="form-control"><b>{{ @$formData['husband_name'] }} </b>
                                        </td>
                                        <td>ശ്രീമതി: 
                                            <label class="form-control"><b>{{ @$formData['wife_name'] }} </b>
                                        </td>
                                    </tr>
                                </table>
                               
                                
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