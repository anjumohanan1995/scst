@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2"> മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo</h4>
				<h4 class="content-title mb-2">APPLICATION FOR SSLC/PLUS TWO/ DEGREE/PG AWARD 2023-24</h4>
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
                <td >  Name </td>
                <td><strong> {{ @$formData['name'] }} </strong></td>

                <td colspan="">  Date of Birth  </td>                
                <td> <strong> {{ @$formData['dob'] }}</strong>  </td>              
            </tr>
            <tr>
                <td colspan="">  Address  </td>
                <td> {{ @$formData['address'] }}</td>

                <td colspan="">   District  </td>
                <td> {{ @$formData['district_name'] }} </td>
            </tr>                   
            <tr> 
                <td colspan=""> Taluk  </td>
                <td>  {{ @$formData['taluk_name'] }}  </td>

                <td>Pincode  </td>
                <td>  {{ @$formData['pincode'] }}  </td>
            </tr>
            <tr>
                <td colspan="">   Examination Passed   </td>
                <td> {{ @$formData['examination_passed'] }} </td>

                <td colspan=""> Name of the Guardian  </td>
                <td>  {{ @$formData['guardian_name'] }}  </td>
            </tr>
            <tr>       
                <td>Community  </td>
                <td>  {{ @$formData['community'] }}  </td>

                <td colspan="">  Name of the Panchayath </td>
                <td> {{ @$formData['panchayath_name'] }} </td>
            </tr>
            <tr>     
                <td colspan=""> Name of the Institution </td>
                <td>  {{ @$formData['institution_name'] }}  </td>

                <td>Month & Year of Pass  </td>
                <td>  {{ @$formData['pass_month'] }} {{ @$formData['pass_year'] }}  </td>
            </tr>
         
         
               
           </table>
           <h5 style="text-align: center;">DECLARATION</h5>
            <p style="text-align: center;">The above given Details are true according to my best knowledge</p>
            <div>
              <p style="float: left;">Name  &nbsp; &nbsp; <b>{{ @$formData['name'] }}</b></p>
            </div>
            <div>
              
                    <p style="float: right;">Signature<br>
                         @if($formData['signature'])
                    <img src="{{ asset('applications/student_award/' . @$formData['signature']) }}" style="width: 145px;height: 100px;" />
               @endif</p>
               <br>
            </div>
            <br>  <br>  <br>
         
                                
                                <form action="{{ url('studentAwardStore') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    @csrf
                                  
                               
                                    <div class="row">
                                        <div class="col-md-3 text-center">
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