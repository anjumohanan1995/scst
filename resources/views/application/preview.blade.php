@extends('layouts.app_register')
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
								
									<div class="mb-4 main-content-label">User Details</div>
                                    <table id="example" class="" style="width:100%">
                                        <tr>


                                            <td><label class="form-control">Name: <b>{{ @$formData['name'] }} </b>
                                                </label></td>
                                            <td><label class="form-control"> Name once Again: <b>{{ @$formData['name_confirmation'] }}</b></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control">Date of Birth: <b>{{ \Carbon\Carbon::parse(@$formData['dob'])->format('d-m-Y') }}</b>
                                            </td>
                                            <td><label class="form-control">Date of Birth once Again: <b>{{ \Carbon\Carbon::parse(@$formData['dob1'])->format('d-m-Y') }}</b>
                                                </label></td>
                                        </tr>

                                        <tr>
                                            <td><label class="form-control">Gender: <b>{{ @$formData['gender'] }} </b>
                                            </td>
                                            <td><label class="form-control">Mobile Number: <b>{{ @$formData['mobile'] }}</b>
                                                </label></td>
                                        </tr>

                                        <tr>
                                            <td><label class="form-control">Father's Name: <b>{{ @$formData['father_name'] }} </b>
                                            </td>
                                            <td><label class="form-control">Mother's Name: <b>{{ @$formData['mother_name'] }}</b>
                                                </label></td>
                                        </tr>

                                        <tr>
                                            <td><label class="form-control">Caste: <b>{{ @$formData['caste'] }} </b>
                                            </td>
                                            <td><label class="form-control">Aadhar Number: <b>{{ @$formData['aadhar_number'] }}</b>
                                                </label></td>
                                        </tr>

                                        <tr>
                                            <td><label class="form-control">Id Proof: <b>{{ @$formData['id_proof'] }} </b>
                                            </td>
                                            <td><label class="form-control">Id Proof Details: <b>{{ @$formData['id_proof_details'] }}</b>
                                                </label></td>
                                        </tr>

                                        <tr>
                                            <td><label class="form-control">Email: <b>{{ @$formData['email'] }} </b>
                                            </td>
                                           
                                        </tr>
                                    </table>
                                

                                <div class="row">
                                    <div class="col-md-3"> 

                                        <form action="{{ url('user-registration/save') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="formData" value="{{ json_encode($formData) }}">

                                            <button type="submit" class="btn-block  btn btn-success"
                                                onclick="return confirm('Do you want to continue?')">Submit</button>
                                        </form><br>
                                    </div>
                                    <div class="col-md-3">

                                        {{-- edit button using to go back to form and edit  --}}
                                        <div class="btn_wrapper">
                                            <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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