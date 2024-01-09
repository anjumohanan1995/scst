@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ്  സ്‌കീം  പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ</h4>
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
								
									<div class="mb-4 main-content-label">Application Details</div>
                                    <table id="example" class="" style="width:100%">
                                        
                                        <tr>

                                           
                                            <td><label class="form-control">School Name / സ്ക്കൂളിന്റെ പേര് : <b>{{ @$formData['school_name'] }} </b>
                                                </label></td>
                                            <td><label class="form-control">Student Name/വിദ്യാർത്ഥിയുടെ പേര് : <b>{{ @$formData['student_name'] }}</b></label>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                         
                                            <td><label class="form-control">Gender / ആൺകുട്ടിയോ/ പെൺകുട്ടിയോ : <b>{{ @$formData['gender'] }} </b>
                                            </td>
                                            <td><label class="form-control">Parent Name : <b>{{ @$formData['parent_name'] }}</b>
                                                </label></td>
                                        </tr>
                                        <tr>
                                        
                                            <td><label class="form-control">Parent Address : <b>{{ @$formData['address'] }} </b>
                                            </td>
                                            <td><label class="form-control">District/Taluk/Pincode: <b>{{ @$formData['district'] }} {{ @$formData['taluk'] }}{{ @$formData['pincode'] }}</b>
                                                </label></td>
                                        </tr>

                                        <tr>
                                        
                                            <td><label class="form-control">Relation / രക്ഷിതാവിനു കുട്ടിയുമായുള്ള ബന്ധം : <b>{{ @$formData['relation'] }} </b>
                                            </td>
                                            <td><label class="form-control">Mother's Name / മാതാവിന്റെ പേര്  : <b>{{ @$formData['mother_name'] }}</b>
                                                </label></td>
                                        </tr>
                                        

                                        <tr>
                                        
                                            <td><label class="form-control">Annual Income / കുടുംബ വാർഷിക വരുമാനം : <b>{{ @$formData['annual_income'] }} </b>
                                            </td>
                                            <td><label class="form-control">Occupation of Parent  / രക്ഷിതാവിന്റെ തൊഴിൽ : <b>{{ @$formData['occupation_parent'] }}</b>
                                                </label></td>
                                        </tr>
                                       

                                        <tr>
                                       
                                            <td><label class="form-control">Date of Birth & Age / വിദ്യാർത്ഥിയുടെ ജനനതിയതിയും പൂർത്തിയായ വയസ്സും :<b>{{ @$formData['dob'] }} </b>
                                            </td>
                                            <td><label class="form-control">Religion & Caste / ജാതിയും മതവും : <b>{{ @$formData['caste'] }}</b>
                                                </label>
                                            </td>
                                        </tr>
                                        
                                      

                                        <tr>
                                        
                                        
                                            <td><label class="form-control">പട്ടികജാതി/ പട്ടികവർഗ/ മറ്റിതര സമുദായം  ഇവയിൽ ഏത്  : <b>{{ @$formData['other'] }} </b>
                                            </td>
                                            <td><label class="form-control">Class,School Name and Address  / പഠിക്കുന്ന ക്ലാസും ,സ്കൂളിന്റെ പേരും വിലാസവും: <b>{{ @$formData['school_address'] }}</b>
                                                </label>
                                            </td>
                                        </tr>
                                       

                                        <tr>
                                           
                                            <td><label class="form-control">Birth Place and District /ജനനസ്ഥലവും ,ജില്ലയും : <b>{{ @$formData['birth_place'] }} </b>
                                            </td>
                                             <td><label class="form-control">Mother Tounge/വിദ്യാർത്ഥിയുടെ മാതൃഭാഷ : <b>{{ @$formData['mother_tonge'] }} </b>
                                            </td>
                                        </tr>
                                        
                                        

                                         <tr>
                                           
                                            <td><label class="form-control">Place/സ്ഥലം : <b>{{ @$formData['place'] }} </b>
                                            </td>
                                            <td>
                                                Parent's Sign/രക്ഷിതാവിന്റെ ഒപ്പും
                                                    @if($formData['signature'])
                                                    <iframe src="{{ asset('signature/' . @$formData['signature']) }}" width="400" height="200"></iframe>
                                                    @endif
                                                </td>
                                           
                                        </tr>
                                    

                                       
                                        

                                        
                                    </table>
                                
                                <form action="{{ url('examApplicationStore') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    @csrf
                                   
                                    <br>
                                    <div class="row">
                                       <div class="col-md-1 mb-1">
                                            <input type="checkbox" id="wifeCheckbox" name="agree" value="Yes" required>
                                        </div>
                                        <div class="col-md-11 mb-11">
                                        മുകളിൽ പറഞ്ഞിട്ടുള്ള വിവരങ്ങൾ എല്ലാം എന്റെ അറിവിൽപെട്ടിടത്തോളം  സത്യവും ശരിയുമെന്നെന്നും ഇതിനാൽ ബോധിപ്പിച്ചുകൊള്ളുന്നു.
                                              മുകളിൽ പറഞ്ഞിട്ടുള്ള സ്കൂളിൽ എന്റെ മകൻ/മകൾ <input type="text" class="form-control" value="{{ @$formData['student_name'] }}"  name="student_name" required /> പ്രവേശനം ലഭിക്കുന്ന പക്ഷം പഠനം പൂർത്തിയാക്കുന്നതിനു മുൻപായി എന്റെ സ്വന്തം താല്പര്യപ്രകാരം പഠിത്തം നിർത്തുകയോ കുട്ടിയെ പിന്വലിക്കുകയോ ചെയ്യുകയില്ല  എന്നു ഇതിനാൽ ഉറപ്പുതന്നുകുള്ളുന്നു.

                                        </div>
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-md-3">

                                            <input type="hidden" name="formData" value="{{ json_encode($formData) }}">

                                            <button type="submit" class="btn-block  btn btn-success"
                                                    onclick="return confirm('Do you want to continue?')">Submit</button>
                                            
                                        </div>
                                        <div class="col-md-3">

                                          
                                            <div class="btn_wrapper">
                                                <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
                                            </div>
                                        </div>
                                    </div> --}}

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
        var parent_name = document.getElementsByName('parent_name')[0].value;
        var signature = document.getElementsByName('signature')[0].value;
        var student_name = document.getElementsByName('student_name')[0].value;
        var agree = document.getElementsByName('agree')[0].value;

        if (parent_name === '' || signature === '' || student_name === '' || agree === '') {
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