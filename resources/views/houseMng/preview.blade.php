@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ                                     ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
                    ധനസഹായത്തിനുള്ള അപേക്ഷ </h4>
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
								<div class="mb-4 main-content-label">
                                    അപ്ലിക്കേഷൻ പ്രിവ്യൂ
                                    </div>
								
                                   
          <table border="1" class="table">
            <tr> <td>
 
                അപേക്ഷകന്റെ  പേര് </td><td><strong> {{ @$formData['name'] }} </strong></td>
             <td>
 
                മേൽവിലാസം </td><td> <strong> {{ @$formData['address'] }}</strong> 
 
            </td>
            </tr>
            <tr>
             <td >
 
                ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ </td><td colspan="3"> {{ @$formData['panchayath'] }}
 
                </td>
                    </tr>
                    <tr>
                        <td>
 
                            അപേക്ഷകന്റെ ജാതി   </td>
                            <td> {{ @$formData['caste'] }}  </td>
                     
                     </tr>
                <tr>
                    <td>
                        വാർഷിക വരുമാനം 
                    </td>
                    <td> 
                        {{ @$formData['anual_income'] }} 
                    </td>
                    <td>
                        ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും   </td><td> {{ @$formData['relation_with_applicant'] }}
                    </td>
                </tr>
                <tr>
                      <td>
 
                        പെൺകുട്ടിയുടെ ആദ്യവിവാഹമോ പുനർവിവാഹമോ? </td><td> {{ @$formData['marriage_count'] }}
 
                </td>
                <td>
                    ഗുണഭോക്താവ് വിധവയാണോ?
                    </td>
                    <td> 
                        {{ @$formData['is_widow'] }} 
                    </td>
               
             </tr><tr>
                      <td>
 
                        അച്ഛൻ/അമ്മ/ രക്ഷാകർത്താവിന്റെ തൊഴിൽ </td><td> {{ ucwords(@$formData['parent_occupation']) }}
 
                </td>
                     </tr><tr>
                      <td>
 
                        കുടുംബത്തിൽ എല്ലാ മാർഗത്തിൽ നിന്നുമുള്ള ആകെ വാർഷിക വരുമാനം (വില്ലേജ് ആഫീസറിൽ നിന്നും ലഭിച്ച സർട്ടിഫിക്കറ്റ് (അസൽ) ഹാജരാക്കണം ) </td><td> {{ ucwords(@$formData['gender']) }}
 
                </td>
                <td>
 
                    വാർഷിക വരുമാനം  -വില്ലേജ് ആഫീസറിൽ നിന്നും ലഭിച്ച സർട്ടിഫിക്കറ്റ് (അസൽ ) </td>
                     <td>
                        @if($formData['income_certificate'])
                        <iframe src="{{ asset('applications/marriage_grant_certificates/' . @$formData['income_certificate']) }}" width="400" height="200"></iframe>
                   @endif
                    </td></tr><tr>
                      <td>
 
                     നിശ്ചയിച്ചിരിക്കുന്ന വിവഹ സ്ഥലം  </td><td> {{ ucwords(@$formData['marriage_place']) }}
 
                </td>
                      <td>
 
                    നിശ്ചയിച്ചിരിക്കുന്ന വിവഹ തീയതി </td><td> {{ @$formData['marriage_date'] }}
 
                </td></tr>
                <tr>
                    <td colspan="3">
 
                        വിവാഹിതയാകാൻ പോകുന്ന പെൺകുട്ടിയുടെ മാതാവ് / പിതാവ് മരിച്ചുപോയിട്ടുടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ: </td>
                        <td> {{ @$formData['fiancee_family_details'] }}
 
                </td>
                   </tr><tr>
                    <td colspan="3">
 
                        മാതാപിതാക്കളിലാർക്കെങ്കിലും തൊഴിലിൽ ഏർപ്പെടാൻ  കഴിയാത്തവിധം അംഗവൈകല്യം സംഭവിച്ചിട്ടുണ്ടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ
                    </td><td>    {{ @$formData['disabled_parent_info'] }}
 
                </td>
            </tr>
                <tr>
                    <td colspan="3">
                    വിവാഹം കഴിക്കുന്ന പെണ്കുട്ടിയോ മാതാപിതാക്കളോ അടിമപ്പണിയിൽ നിന്നും വിമുക്തരാക്കപ്പെട്ടവരാണെങ്കിൽ ആയതിന്റെ വിശദവിവരം
                    </td>
                    <td> {{ @$formData['freedmen_parent_details'] }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
 
                        വിവാഹിതയാകുന്ന പെൺക്കുട്ടിയോ മാതാപിതാക്കളോ പട്ടികവർഗക്കാരല്ലാത്തവരുടെ അതിക്രമങ്ങൾക്കിരയായിട്ടുള്ളവരാണെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ
                       </td>    <td>  {{ @$formData['violence_by_non_scheduled_tribes_info'] }}
 
                </td>
                     </tr><tr>
                        <td colspan="3">
 
                        വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെയോ ഭൂമി അന്യാധീനപ്പെട്ട് നിർദ്ധനരായിട്ടുള്ളപക്ഷം ആയതിന്റെ വിവരങ്ങൾ </td>
                        <td> {{ @$formData['land_alienated_details'] }}
 
                </td></tr><tr>
                      
                    <td colspan="3">
 
                        വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ സമുദായഭ്രഷ്ടരാണെങ്കിൽ ആയതിന്റെ പൂർണവിവരം </td>
                     <td> {{ @$formData['outcast_parent_details'] }}
 
                </td></tr><tr>
                    <td colspan="3">
 
                        വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ പുനർവിവാഹം ചെയ്ത് ജീവിക്കുന്നുവെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ  </td>
                        <td> {{ @$formData['remarried_parent_details'] }}
 
                </td>
                    </tr><tr>
 
                        <td colspan="3">
 
                        വരന്റെ പേരും മേൽവിലാസവും </td>
                        <td> {{ @$formData['groom_name_and_address'] }}
 
                </td></tr><tr>
                    <td colspan="3">
 
                        വരന്റെ അച്ഛന്റെ / അമ്മയുടെ /രക്ഷാകർത്താവിന്റെ പേരും മേൽവിലാസവും </td>
                        <td> {{ @$formData['name_and_address_groom_parent'] }}
 
                </td>
                     </tr><tr>
               
                        <td colspan="3">
 
                    ഈ ആവശ്യത്തിന് സർക്കാരിൽനിന്നോ സംഘടനകളിൽനിന്നോ ഏജൻസികളിൽനിന്നോ ധനസഹായം ലഭിച്ചിട്ടുണ്ടെങ്കിൽ ആയതിന്റെ പൂർണവിവരം </td>
                    <td> {{ @$formData['financial_assistance_details'] }}
 
                </td></tr>
                <tr>
                    <td>
                        സ്ഥലം
                    </td>
                    <td> 
                        {{ @$formData['place'] }} 
                    </td>
                    <td>
                        തീയതി  </td><td> @if($formData['date'])
                            {{ date('d-m-Y', strtotime(@$formData['date'])) }}
                        @endif
                    </td>
                 
                </tr>
                <tr>
               
                    <td>
                        അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം   </td><td>
                            @if($formData['signature'])
                            <iframe src="{{ asset('applications/marriage_grant_certificates/' . @$formData['signature']) }}" width="400" height="200"></iframe>
                            @endif
                        </td>
                    </tr>
      
             
               
           </table>
                                
                                <form action="{{ url('marriageGrantStoreDetails') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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
            window.history.back();
        }
        return
    }
</script>
@endsection