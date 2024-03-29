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
            <div class="row row-sm w-100">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="card overflow-hidden" style="width: 113%;">
                        <div class="card-body pd-y-7">
                            <h1
                            style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;">
                            APPLICATION FOR SSLC/PLUS TWO/ DEGREE/PG AWARD 2023-24
                        </h1>

                        <div class="paper-1 pt-4">
                            <div class="w-100">
                               <div class="row w-100">
                                  <div class="col-12" style="text-align: right;">
                                     @if(@$formData['applicant_image'])
                                        <img src="{{ asset('applications/student_award/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                                     @endif
                                  </div>
                               </div>
                            </div>
                         </div>
                        
                                    <form action="#" method="post"
                                        style="font-weight: 500;font-size: 12px;padding: 90px;">
                                        
                                            <div class="paper-1">
                                    <div class="col-6">

                                        <label>1.	Name and address of Applicant </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['name'] }} <br> {{ @$formData['address'] }} <br>
                                            @if (@$formData['district_name'])
                                            {{ @$formData['district_name'] }}
                                        @endif
                                        @if (@$formData['taluk_name'])
                                            ,{{ @$formData['taluk_name'] }}
                                        @endif
                                        @if (@$formData['pincode'])
                                            ,{{ @$formData['pincode'] }}
                                        @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>2.	Examination Passed </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['examination_passed'] }} </label>
                                    </div>
                                </div> 

                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>3.	Name of the Guardian	</label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['guardian_name'] }}</label>
                                    </div>
                                </div> 

                               
                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>4.	Date of Birth </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : @if($formData['dob'])  {{ date("d-m-Y",strtotime(@$formData['dob'])) }} @endif</label>
                                    </div>
                                </div>       

                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>5.	Community	 </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['community'] }}</label>
                                    </div>
                                </div> 
                               
                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>6.	Name of Panchayath </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['panchayath_name'] }}</label>
                                    </div>
                                </div> 

                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>7.	Name of Institution </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['institution_name'] }}</label>
                                    </div>
                                </div> 

                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>9.	Percentage of Mark/grade	</label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['mark'] }} </label>
                                    </div>
                                </div> 
                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>10.	Syllabus	</label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['syllabus'] }} </label>
                                    </div>
                                </div> 
                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>11.	Syllabus certificate	</label>
                                    </div>

                                    <div class="col-6">
                                        <label> :  @if(@$formData['syllabus_certificate'] != '') 
                                        <a href="{{ asset('applications/student_award/' . @$formData['syllabus_certificate']) }}" target="_blank">View</a>
                                       @endif
                                    </label>
                                    </div>
                                </div> 
                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>12.	Month & Year of Pass	</label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['pass_month'] }} {{ @$formData['pass_year'] }} </label>
                                    </div>
                                </div> 


                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>13.	Phone No.	 </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['phone'] }}</label>
                                    </div>
                                </div> 


                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>14.	Account No.		 </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['account_number'] }}</label>
                                    </div>
                                </div> 


                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>15.	IFSC Code </label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['ifsc_code'] }} </label>
                                    </div>
                                </div> 

                                <div class="paper-1">
                                    <div class="col-6">

                                        <label>16.	Aadhar No</label>
                                    </div>

                                    <div class="col-6">
                                        <label> : {{ @$formData['aadhar_number'] }} </label>
                                    </div>
                                </div> 

                    <h2 style="text-align: center;">DECLARATION</h2>
                    <h5 style="text-align: center;">The above given Details are true according to my best knowledge </h5>


                    

                   
                   
                        <div>
                            <label>
                                {{ @$formData['name'] }}
                            </label>
                            <label  style="float: right;">  
                                @if($formData['signature'])
                                <img src="{{ asset('applications/student_award/' . @$formData['signature']) }}" style="width: 145px;height: 40px;" />
                           @endif
                           <br>
                           (Name and Signature)
                        
                        </label><br>
                         
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
                            <div class=" col-6 d-flex ">
                                <div class=" d-flex col-12">
                                    <div class="col-3">

                                        <label>District </label>
                                    </div>

                                    <div class="col-1">
                                        <label> : </label>
                                    </div>
                                    <div class="col-8">
                                        <label> {{ @$formData['dist_name'] }} </label>
                              

                                    </div>
                                </div>


                            </div>

                            <div class="col-6 d-flex">
                                <div class=" d-flex col-12">
                                    <div class="col-3">

                                        <label>TEO</label>
                                    </div>

                                    <div class="col-1">
                                        <label> : </label>
                                    </div>
                                    <div class="col-8">
                                        <label> {{ @$formData['teo_name'] }} </label>
                                    </div>
                                </div>
                            </div>
                        </div><br></br>

                        </form>
                          
                                <form action="{{ url('studentAwardStore') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                  
                               
                                    <div class="row justify-content-center">
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
        if (confirm('Are you sure? Do you want to edit this form?')) {
            window.location.href = "{{ url()->previous() }}";
            //window.history.back();
           
        }
    }
</script>
@endsection