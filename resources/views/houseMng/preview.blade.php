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
            <tr> <td>
 
                ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ </td><td><strong> {{ @$formData['panchayath'] }} </strong></td>
             <td>
 
                അപേക്ഷകന്റെ ജാതി </td><td> <strong> {{ @$formData['caste'] }}</strong> 
 
            </td>
            </tr>
           
                 
                <tr>
                    <td>
                        വാർഷിക വരുമാനം 
                    </td>
                    <td> 
                        {{ @$formData['anual_income'] }} 
                    </td>
                    <td>
                        ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും   </td><td> {{ @$formData['house_details'] }}
                    </td>
                </tr>
                <tr>
                      <td>
 
                        വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം </td><td> {{ @$formData['last_payment_year'] }}
 
                </td>
                <td>
                    കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                    അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                    വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                    വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                    അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ )
                    </td>
                    <td> 
                        {{ @$formData['family_details'] }} 
                    </td>
               
             </tr><tr>
                      <td>
 
                        ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                                        (നവീകരണം ,അധിക സൗകര്യം / പൂർത്തീകരണം ) </td>
                    <td>@if(@$formData['nature_payment'] == 'innovation') 
                        
                        നവീകരണം
                        @elseif(@$formData['nature_payment'] == 'Additional convenience') 
                        അധിക സൗകര്യം
                        @elseif(@$formData['nature_payment'] == 'Completion') 
                        പൂർത്തീകരണം
                        @endif
                       
 
                </td>
                <td>
 
                    നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                    ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                    ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ എന്നുള്ള  വിവരം  
                    (ഉണ്ടെങ്കിൽ എത്ര തുക ,ലഭിച്ച തീയതി )</td><td> {{ @$formData['payment_details'] }}

            </td>
                     </tr><tr>
                   
                <td>
 
                    മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള 
                    മറ്റു സംഗതികൾ </td>
                    
                        <td> {{ @$formData['prove_eligibility'] }}
                            @if($formData['prove_eligibility_file'])
                            <iframe src="{{ asset('homeMng/' . @$formData['prove_eligibility_file']) }}" width="400" height="200"></iframe>
                            @endif
                      
                    </td>
                    <td>
                        സ്ഥലം
                    </td>
                    <td> 
                        {{ @$formData['place'] }} 
                    </td>
                </tr>
             
               
              
                <tr>
                   
                    <td>
                        തീയതി  </td><td> @if($formData['date'])
                            {{ date('d-m-Y', strtotime(@$formData['date'])) }}
                        @endif
                    </td>
                    <td>
                        അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം </td><td>  @if($formData['signature'])
                            <iframe src="{{ asset('homeMng/' . @$formData['signature']) }}" width="400" height="200"></iframe>
                            @endif
                    </td>
                  
                </tr>
               
      
             
               
           </table>
                                
                                <form action="{{ url('HouseGrantStoreDetails') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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