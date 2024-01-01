@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-3">
				<h4 class="content-title mb-2"> User Profile</h4>
				{{-- <nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Dashboard
						</li>
					</ol>
				</nav> --}}
			</div>

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
                </div>
            @endif
		</div>
		<!-- /breadcrumb -->

	</div>
	<div class="main-content-body">
		
		   <table id="example" class="" style="width:100%">
                                        <tr>


                                            <td><label class="form-control">Name: <b>{{ @$formData['name'] }} </b>
                                                </label></td>
                                            <td><label class="form-control">Date of Birth: <b>{{ @$formData['dob'] }} </b>
                                            </td>
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
                                         <tr>
                                         </tr>
                                    </table>
	</div>
</div>
<script>


	$(document).ready(function() {
     	$('#example').DataTable();
	});
  </script>
<!-- main-content-body -->
@endsection
