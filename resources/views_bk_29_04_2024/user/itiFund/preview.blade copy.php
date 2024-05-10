@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്
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
 
                കോഴ്‌സിന്റെ പേര് </td><td><strong> {{ @$formData['course_name'] }} </strong></td>
             <td>
 
                നടപ്പ് അദ്ധ്യയന വർഷം ക്ലാസ് ആരംഭിച്ച തീയതി </td><td> <strong> {{ @$formData['class_start_date'] }}</strong> 
 
            </td>
            </tr>
           
                 
                <tr>
                    <td>
                        അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത് 
 
                    </td>
                    <td> 
                        @if(@$formData['admission_type'] == 'merit') 
                        
                        മെരിറ്റ്
                        @elseif(@$formData['nature_payment'] == 'innovation') 
                        സംവരണം
                        @elseif(@$formData['nature_payment'] == 'management') 
                        മാനേജ്‌മന്റ്
                        @elseif(@$formData['nature_payment'] == 'others') 
                        മറ്റുള്ളവ
                        @endif
                     
                    </td>
                    <td>
                        അപേക്ഷകന്റെ ജാതി/ മതം 
   </td><td> {{ @$formData['caste'] }}
                    </td>
                </tr>
                <tr>
                      <td>
 
                        ജാതി/ മതം സർട്ടിഫിക്കറ്റ് </td><td>  @if($formData['caste_certificate'])
                            <iframe src="{{ asset('itiStudentFund/' . @$formData['caste_certificate']) }}" width="400" height="200"></iframe>
                            @endif
 
                </td>
                <td>
                    അപേക്ഷകന്റെ വരുമാനം
                    </td>
                    <td> 
                        {{ @$formData['income'] }} 
                    </td>
               
             </tr><tr>
                      <td>
 
                        വരുമാന സർട്ടിഫിക്കറ്റ് </td>
                    <td>
                        @if($formData['income_certificate'])
                        <iframe src="{{ asset('itiStudentFund/' . @$formData['income_certificate']) }}" width="400" height="200"></iframe>
                        @endif
                        
                      
                       
 
                </td>
                <td>
 
                    വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടെങ്കിൽ ബാങ്ക് ശാഖ /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം</td><td> {{ @$formData['account_details'] }}

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
                            <iframe src="{{ asset('itiStudentFund/' . @$formData['signature']) }}" width="400" height="200"></iframe>
                            @endif
                    </td>
                  
                </tr>
               
                <tr>
                   
                    <td>
                        രക്ഷാകർത്താവിന്റെ പേര്  </td><td>  {{ @$formData['parent_name'] }}
                    </td>
                    <td>
                        രക്ഷാകർത്താവിന്റെ ഒപ്പ്/വിരലടയാളം </td><td>  @if($formData['parent_signature'])
                            <iframe src="{{ asset('itiStudentFund/' . @$formData['parent_signature']) }}" width="400" height="200"></iframe>
                            @endif
                    </td>
                  
                </tr>
                <tr>

                    <td>
                        Instituition </td><td>  {{ @$formData['institution_name'] }}
                    </td>

                </tr>
             
               
           </table>
                                
                                <form action="{{ route('itiFundStore') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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