@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം</h4>
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
								
                                    <table id="example" class="" style="width:100%">
                                        <tr>
                                            <td >
                                                പേര്
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['name'] }} </b>
                                            </label></td>
                                        </tr>
                                 
                                        <tr>
                                            <td >
                                                മേൽവിലാസം (പിൻകോഡ് സഹിതം)
                                            </td>
                                            <td colspan=""><label class="form-control"><b>{{ @$formData['address'] }} </b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                ജില്ല
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['district_name'] }} </b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                താലൂക്ക്
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['taluk_name'] }} </b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                പിൻകോഡ്
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['pincode'] }} </b>
                                            </label></td>
                                        </tr>
                                 
                                        <tr>
                                            <td >
                                                വയസ്
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['age'] }} </b>
                                            </label></td>
                                        </tr>
                                 
                                        <tr>
                                            <td >
                                                ജനനതീയതി
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['dob'] }} </b>
                                            </label></td>
                                        </tr>
                                 
                                        <tr>
                                            <td >
                                                ഭർത്താവിന്റെ പേര്
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['hus_name'] }} </b>
                                            </label></td>
                                        </tr>
                                 
                                        <tr>
                                            <td >
                                                സമുദായം / ജാതി
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['caste'] }} </b>
                                            </label></td>
                                        </tr>
                                 
                                        <tr>
                                            <td >
                                                വില്ലേജ്
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['village'] }} </b>
                                            </label></td>
                                        </tr>
                                 
                                        <tr>
                                            <td >
                                                എത്രാമത്തെ പ്രസവം
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['births'] }} </b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['expected_date_of_delivery'] }} </b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ കേന്ദ്രം
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['dependent_hospital'] }} </b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                സ്ഥലം
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['place'] }} </b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                തിയതി
                                            </td>
                                            <td colspan=""><label class="form-control"> <b>{{ @$formData['date'] }}</b>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                അപേക്ഷകന്റെ ഒപ്പ് 
                                            </td>
                                            
                                            <td colspan=""><label class="form-control"><img src="{{ url('/') }}/applications/{{ $formData['signature'] }}" alt="Preview" width="300" height="200">
                                            </label></td>
                                        </tr>
                                 

                                        
                                    </table>
                                
                                <form action="{{ url('motherChildStoreDetails') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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