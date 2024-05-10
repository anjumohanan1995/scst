@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">അനാധകർക്ക്പ്രതിമാസം 1500 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ് </h4>
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
                                 Application Preview
                                </div>
                                <table border="1" class="table">
                                    <tr>
                                        <td>
                                            കുട്ടിയുടെ പേര് 
                                        </td>
                                        <td><strong> {{ @$formData['name'] }} </strong></td>
                                        <td>
                                            കുട്ടിയുടെ വയസ്സ് 
                                        </td>
                                        <td> <strong> {{ @$formData['age'] }}</strong> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            കുട്ടിയുടെ ജനന തീയതി
                                        </td>
                                        <td> {{ @$formData['dob'] }}
                                        </td>
                                        <td>
                                            കുട്ടിയുടെ ജനന സർട്ടിഫിക്കറ്റ്  
                                        </td>
                                        <td> 
                                            @if($formData['birth_certificate'])
                                                <iframe src="{{ asset('child/birth_certificate/' . @$formData['birth_certificate']) }}" width="400" height="200"></iframe>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            അച്ഛന്റെ പേര്  
                                        </td>
                                        <td > {{ @$formData['father_name'] }}
                                        </td>
                                         <td>
                                            അമ്മയുടെ പേര്    
                                        </td>
                                        <td> {{ @$formData['mother_name'] }}  </td>
                                    </tr>
                                    <tr>
                                       
                                        <td>
                                            കുട്ടിയെ നിലവിൽ സംരക്ഷിക്കുന്ന രക്ഷിതാവിന്റെ പേര് 
                                        </td>
                                        <td>
                                           {{ @$formData['guardian_name'] }}
                                        </td>
                                         <td>
                                           രക്ഷിതാവിന്റെ മേൽവിലാസം
                                        </td>
                                        <td> 
                                            {{ @$formData['address'] }} 
                                        </td>
                                    </tr>
                                    <tr>
                                       
                                        <td>
                                           ജില്ല
                                        </td>
                                        <td> 
                                            {{ @$formData['current_district_name'] }} 
                                        </td>
                                        <td>
                                           താലൂക്ക്
                                        </td>
                                        <td> 
                                            {{ @$formData['current_taluk_name'] }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           പിൻകോഡ്
                                        </td>
                                        <td> 
                                            {{ @$formData['current_pincode'] }} 
                                        </td>
                                      
                                    </tr>
                                    <tr>
                                        <td>
                                            രക്ഷിതാവിന്റെ സമുദായം 
                                        </td>
                                        <td> {{ @$formData['caste'] }}
                                        </td>
                                        <td>
                                            ഫോൺ നമ്പർ 
                                        </td>
                                        <td> 
                                            {{ @$formData['mobile'] }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           രക്ഷിതാവിന്റെ ബാങ്ക് അക്കൗണ്ട് നമ്പർ 
                                        </td>
                                        <td> {{@$formData['account_number'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ആധാർ ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ 
                                        </td>
                                        <td> {{ @$formData['aadhar_number'] }}
                                        </td>
                                        <td>
                                            വോട്ടർ ഐ.ഡി. കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ 
                                        </td>
                                        <td>
                                            {{ @$formData['voter_id'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            റേഷൻ കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ 
                                        </td>
                                        <td> {{ @$formData['ration_card_number'] }}
                                        </td>
                                        <td>
                                            സ്ഥലം
                                        </td>
                                        <td> {{ @$formData['place'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം
                                        </td>
                                        <td>@if($formData['signature'])
                                                <iframe src="{{ asset('child/signature/' . @$formData['signature']) }}" width="400" height="200"></iframe>
                                            @endif
                                        </td>
                                    </tr>


                                    <tr>
                                        <td >
                                            കുട്ടിയുടെ ഫോട്ടോ
                                        </td>
                                        <td>@if($formData['child_signature'])
                                                <iframe src="{{ asset('child/child_signature/' . @$formData['child_signature']) }}" width="400" height="200"></iframe>
                                            @endif
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