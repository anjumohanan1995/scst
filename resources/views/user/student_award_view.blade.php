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
                <td> {{ @$formData['districtRelation']['name'] }} </td>
            </tr>                   
            <tr> 
                <td colspan=""> Taluk  </td>
                <td>  {{ @$formData['talukName']['taluk_name'] }}  </td>

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
         
         
                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   
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