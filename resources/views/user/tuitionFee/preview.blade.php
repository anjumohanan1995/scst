@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12  ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ 
 
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
 
                ഫോൺ നമ്പർ 
            </td><td><strong> {{ @$formData['mobile'] }} </strong></td>
             <td>
 
                ജാതി /മതം  </td><td> <strong> {{ @$formData['caste'] }}</strong> 
 
            </td>
            </tr>
           
                 
                <tr>
                    <td>
                        വരുമാനം 
 
                    </td>
                    <td> <strong> {{ @$formData['annual_income'] }}</strong> 
 
                    </td>
                    <td>
                        വിദ്യാർത്ഥിയുടെ പേര് 

   </td><td> {{ @$formData['student_name'] }}
                    </td>
                </tr>
                <tr>
                      <td>
 
                        അപേക്ഷകനുമായുള്ള ബന്ധം </td><td>  {{ @$formData['relation'] }}
                </td>
                <td>
                    പഠിക്കുന്ന സ്‌കൂളിന്റെ പേര് 

                    </td>
                    <td> 
                        {{ @$formData['school_name'] }} 
                    </td>
               
             </tr><tr>
                      <td>
 
                        ക്ലാസ് </td>
                        <td> 
                            {{ @$formData['class_number'] }} 
                        </td>
                <td>
 
                    ട്യുഷൻ സെന്ററിന്റെ പേര് </td><td> {{ @$formData['tuition_center'] }}

            </td>
                     </tr>
             
                     <tr>
                   
                        <td>
                            സ്ഥലം   </td><td> @if($formData['date'])
                                {{ date('d-m-Y', strtotime(@$formData['date'])) }}
                            @endif
                        </td>
                        <td>
                            തീയതി  </td><td> @if($formData['date'])
                                {{ date('d-m-Y', strtotime(@$formData['date'])) }}
                            @endif
                        </td>
                       
                      
                    </tr>
              
                <tr>
                   
                   
                    <td>
                        അപേക്ഷകന്റെ ഒപ്പ് </td><td>  @if($formData['signature'])
                            <iframe src="{{ asset('tuition/' . @$formData['signature']) }}" width="400" height="200"></iframe>
                            @endif
                    </td>
                  
                </tr>
               
           
             
               
           </table>
                                
                                <form action="{{ route('TuitionFeeStore') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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