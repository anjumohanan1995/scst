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
		<div class="main-content-body main-content-body--margin">
			

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
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 ">
                    <div class="card"> 
						<div class="card-body">
                            <div class="mb-4 main-content-label"> Instructions</div>

                              <p>Already a user? Please <a href="{{ route('login') }}">login</a></p>
                        </div>
                    </div>
                </div>

				<div class="col-lg-8 col-xl-8 col-md-8 col-sm-8 ">
					<div class="card">
						<div class="card-body">
							<div id="success_message" class="ajax_response" style="display: none;"></div>
								<form name="userForm" id="userForm" method="post" action="{{route('userStore')}}">
									@csrf
									<div class="mb-4 main-content-label">User Details</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6 mb-6">
												<label class="form-label">പേര് / Name</label>
        										<input type="text" autocomplete="off"  value="{{ old('name') }}"  class="form-control" placeholder="Name" name="name" id="name" />
												@error('name')
													<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">ഒരിക്കൽ കൂടി പേര് /Name once Again</label>
        										<input type="text" autocomplete="off" value="{{ old('name_confirmation') }}" class="form-control" placeholder="Name" name="name_confirmation" id="name_confirmation" />
												<span id="nameError" ></span>
												@error('name_confirmation')
													<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											
										</div><br>
										<div class="row">
											<div class="col-md-6 mb-6">
												<label class="form-label">ജനനതീയതി / Date of Birth</label>
        										<input type="date" value="{{ old('dob') }}"  class="form-control" placeholder="Date of birth" name="dob" id="dob" max="{{ date('Y-m-d') }}" />
												@error('dob')
													<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">ഒരിക്കൽ കൂടി ജനനത്തീയതി / Date of Birth once Again</label>
												<input type="date"  value="{{ old('dob1') }}"  class="form-control" placeholder="Date of birth" name="dob1" id="dob1" max="{{ date('Y-m-d') }}"/>
												<span id="dobError"></span>	
												@error('dob1')
														<span class="text-danger">{{$message}}</span>
												@enderror										
											</div>

											
										</div><br>
										<div class="row">
											<div class="col-md-6 mb-6">
												<label class="form-label">ലിംഗഭേദം / Gender</label>
												<select class="form-control" name="gender" autocomplete="off" >
													<option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
													<option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
													<option value="Transgender" {{ old('gender') == 'Transgender' ? 'selected' : '' }}>Transgender</option>
											
												</select>
												@error('gender')
														<span class="text-danger">{{$message}}</span>
												@enderror
												
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">മൊബൈൽ നമ്പർ / Mobile Number</label>
												<input type="text" autocomplete="off" class="form-control" placeholder="Mobile Number" name="mobile" id="mobile" value="{{ old('mobile') }}" />
    											<span id="mobileError" class="text-danger"></span>
												@error('mobile')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											
										</div><br>
										<div class="row">
											<div class="col-md-6 mb-6">
												<label class="form-label">പിതാവിന്റെ പേര് / Father's Name</label>
												<input type="text" autocomplete="off" class="form-control" placeholder="Father's Name" name="father_name" value="{{ old('father_name') }}" />
												@error('father_name')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">അമ്മയുടെ പേര് / Mother's Name</label>
												<input type="text" autocomplete="off" class="form-control" placeholder="Mother's Name" name="mother_name" value="{{ old('mother_name') }}" />
												@error('mother_name')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											
										</div><br>
										<div class="row">
										

											<div class="col-md-6 mb-6">
												<label class="form-label">ജാതി / Caste</label>
												<select class="form-control" name="caste" autocomplete="off">
													<option value="SC" {{ old('caste') == 'SC' ? 'selected' : '' }}>SC</option>
													<option value="ST" {{ old('caste') == 'ST' ? 'selected' : '' }}>ST</option>
												
												</select>
												@error('caste')
														<span class="text-danger">{{$message}}</span>
												@enderror
												
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">ആധാർ നമ്പർ / Aadhar Number</label>
												<input type="text" autocomplete="off" class="form-control" placeholder="Aadhar Number" name="aadhar_number" id="aadhar_number" value="{{ old('aadhar_number') }}"  />
												<span id="aadharError" class="text-danger"></span>	
                                                @error('aadhar_number')
														<span class="text-danger">{{$message}}</span>
											    @enderror											
											</div>
											

											
										</div><br>
										<div class="row">
											<div class="col-md-6 mb-6">
												<label class="form-label">ഐഡി പ്രൂഫ് / Id Proof</label>
												<select class="form-control" name="id_proof" autocomplete="off" >
													<option value="AADHAR" {{ old('id_proof') == 'AADHAR' ? 'selected' : '' }}>AADHAR</option>
            										<option value="Account No of Nationalised/Scheduled Bank" {{ old('id_proof') == 'Account No of Nationalised/Scheduled Bank' ? 'selected' : '' }}>Account No of Nationalised/Scheduled Bank</option>
													<option value="Conductor Licence" {{ old('id_proof') == 'Conductor Licence' ? 'selected' : '' }}>Conductor Licence</option>
													<option value="Driving Licence" {{ old('id_proof') == 'Driving Licence' ? 'selected' : '' }}>Driving Licence</option>
													<option value="e-SHRAM Card" {{ old('id_proof') == 'e-SHRAM Card' ? 'selected' : '' }}>e-SHRAM Card</option>
													<option value="ID for Central Employees" {{ old('id_proof') == 'ID for Central Employees' ? 'selected' : '' }}>ID for Central Employees</option>
													<option value="ID for PH issued by SW Dept" {{ old('id_proof') == 'ID for PH issued by SW Dept' ? 'selected' : '' }}>ID for PH issued by SW Dept</option>
													<option value="ID for Uty instc etc" {{ old('id_proof') == 'ID for Uty instc etc' ? 'selected' : '' }}>ID for Uty instc etc</option>
													<option value="ID for BAR Council" {{ old('id_proof') == 'ID for BAR Council' ? 'selected' : '' }}>ID for BAR Council</option>
													<option value="ID for Ex-Servicemen" {{ old('id_proof') == 'ID for Ex-Servicemen' ? 'selected' : '' }}>ID for Ex-Servicemen</option>
													<option value="National Health Authority ID Card" {{ old('id_proof') == 'National Health Authority ID Card' ? 'selected' : '' }}>National Health Authority ID Card</option>
													<option value="PAN card" {{ old('id_proof') == 'PAN card' ? 'selected' : '' }}>PAN card</option>
													<option value="Passport" {{ old('id_proof') == 'Passport' ? 'selected' : '' }}>Passport</option>
													<option value="PEN for State Employees" {{ old('id_proof') == 'PEN for State Employees' ? 'selected' : '' }}>PEN for State Employees</option>
													<option value="Voters Identity Card" {{ old('id_proof') == 'Voters Identity Card' ? 'selected' : '' }}>Voters Identity Card</option>
													<option value="National Population Register/Multipurpose National Identity Card" {{ old('id_proof') == 'National Population Register/Multipurpose National Identity Card' ? 'selected' : '' }}>National Population Register/Multipurpose National Identity Card</option>
												</select>
												@error('id_proof')
														<span class="text-danger">{{$message}}</span>
												@enderror
												
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">ഐഡി പ്രൂഫ് നമ്പർ വിശദാംശങ്ങൾ / Id Proof Number Details</label>
												<input type="text" class="form-control" autocomplete="off" placeholder="Id Proof Details" name="id_proof_details"  value="{{ old('id_proof_details') }}"/>
												@error('id_proof_details')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											
										</div><br>
										<div class="row">
												<div class="col-md-6 mb-6">
												<label class="form-label">ഇമെയിൽ / Email</label>
												  	<input type="email" class="form-control" autocomplete="off"  value="{{ old('email') }}"  placeholder="Email" name="email" id="email"/>
													<span id="emailError" class="text-danger"></span>
													@error('email')
														<span class="text-danger">{{$message}}</span>
													@enderror
																								
												
											</div>
										</div><br><br>
										<div class="row">
											<div class="col-md-6 mb-6">
												<label class="form-label">Password (<strong>8 numbers, 1 uppercase,1 lowercase,1 symbol and 1 number</strong> )</label>
												<input value="{{ old('password') }}" autocomplete="off" type="password" class="form-control" placeholder="Password" name="password" id="password"/>
												<span class="text-danger" id="passwordError"></span>
												@error('password')
													<span class="text-danger">{{$message}}</span>
												@enderror
												
												
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label"> Confirm Password </label>
    											<input type="password" autocomplete="off"  value="{{ old('confirm_password') }}" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" />
												<span class="text-danger" id="confirmPasswordError"></span>
											</div>
											@error('confirm_password')
													<span class="text-danger">{{$message}}</span>
											@enderror

											
										</div><br>
										<div class="row">
											<div class="col-md-6 mb-6">
												<label for="captcha">ക്യാപ്ച നൽകുക / Enter the Captcha:</label>
												<div class="captcha">

												 	<span>{!! captcha_img() !!}</span>
												  	<button type="button" class="btn btn-danger" class="reload" id="reload">
														&#x21bb;
													</button>
												</div> 
											</div> 
											<div class="col-md-6 mb-6">
												<label class="form-label"></label>
												<input type="text" id="captcha" name="captcha" required>
												    @error('captcha')
														<span class="text-danger">{{ $message }}</span>
													@enderror
											</div> 

										</div><br>
									</div>
									<br><br><br>
                                    <button type="submit" id="submit" class="btn btn-warning waves-effect waves-light float-end">Save</button>
								</form>
						    </div>
						</div>
            		</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /row -->
</div>			
<!-- /main-content -->
<script src="{{ asset('js/jquery.validate.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
<script>

    $(document).ready(function () {
		$('#email').on('blur', function () {
            validateEmail();
        });

        function validateEmail() {
            var email = $('#email').val();

            // Email validation logic
            if (!isValidEmail(email)) {
                $('#emailError').text('Invalid email format.');
                $("#submit").prop("disabled", true);
            } else {
                $('#emailError').text('');
                $("#submit").prop("disabled", false);
            }
        }

        function isValidEmail(email) {
            // Simple email format validation using a regular expression
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }




        $('#name_confirmation').on('blur', function () {
			
            checkNameMatch();
        });

        function checkNameMatch() {
            var name = $('#name').val();
            var nameConfirmation = $('#name_confirmation').val();
			  if (name != nameConfirmation) {
				 $('#nameError').text('Names do not match.').css('color', 'red');
                 $("#submit").prop("disabled", true);
			  }else{

				$('#nameError').text('Names match.').css('color', 'green');
                $("#submit").prop("disabled", false);
			  }

           
        }

		$('#dob1').on('blur', function () {
            checkDobMatch();
        });

        function checkDobMatch() {
            var dob = $('#dob').val();
            var dob1 = $('#dob1').val();

            if (dob === dob1) {
                $('#dobError').text('Dates of birth match.').css('color', 'green');
                $("#submit").prop("disabled", false);
            } else {
                $('#dobError').text('Dates of birth do not match.').css('color', 'red');
                $("#submit").prop("disabled", true);
            }
        }
		$('#mobile').on('blur', function () {
            validateMobileNumber();
        });

        function validateMobileNumber() {
            var mobileNumber = $('#mobile').val();
            var mobileRegex = /^[0-9]{10}$/;

            if (mobileRegex.test(mobileNumber)) {
                $('#mobileError').text('');
                $("#submit").prop("disabled", false);
            } else {
                $('#mobileError').text('Invalid mobile number. Please enter a 10-digit number.');
                $("#submit").prop("disabled", true);
            }
        }

		$('#aadhar_number').on('blur', function () {
            validateAadharNumber();
        });

        function validateAadharNumber() {
            var aadharNumber = $('#aadhar_number').val();

            $.ajax({
                type: 'POST',
                url: '/check-aadhar-number',
                data: {
                    aadhar_number: aadharNumber,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.message == 'true') {
                        $('#aadharError').text('Aadhar number already exists.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#aadharError').text('');
                        $("#submit").prop("disabled", false);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

		  $('#id_proof').on('change', function () {
            validateIdProofDetails();
        });

        $('#id_proof_details').on('blur', function () {
            validateIdProofDetails();
        });

        function validateIdProofDetails() {
            var idProof = $('#id_proof').val();
            var idProofDetails = $('#id_proof_details').val();

            // Your validation logic based on the selected Id Proof
            // You can add more cases as needed

            switch (idProof) {
                case 'AADHAR':
                    // Example: Validate Aadhar Number
                    if (!isValidAadharNumber(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid Aadhar Number.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;

                case 'Account No of Nationalised/Scheduled Bank':
                    // Example: Validate Account Number for Bank
                    if (!isValidBankAccountNumber(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid Bank Account Number.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;

				case 'Conductor Licence':
                    // Example: Validate Conductor Licence
                    if (!isValidConductorLicence(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid Conductor Licence.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;
				case 'Driving Licence':
                    // Example: Validate Driving Licence
                    if (!isValidDrivingLicence(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid Driving Licence.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;
				case 'e-SHRAM Card':
                    // Example: Validate e-SHRAM Card
                    if (!isValidEShramCard(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid e-SHRAM Card.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                    }
                    break;

				case 'ID for Central Employee':
                    // Example: Validate ID for Central Employee
                    if (!isValidCentralEmployeeId(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid ID for Central Employee.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;

				case 'ID for PH issued by SW Dept':
                    // Example: Validate ID for PH issued by SW Dept
                    if (!isValidPHIdSWDept(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid ID for PH issued by SW Dept.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;

				case 'ID for Uty instc etc':
                    // Example: Validate ID for Uty instc etc
                    if (!isValidUtyInstcId(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid ID for Uty instc etc.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;

				case 'ID for BAR Council':
                    // Example: Validate ID for BAR Council
                    if (!isValidBARCouncilId(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid ID for BAR Council.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;
				case 'ID for Ex-Servicemen':
                    // Example: Validate ID for Ex-Servicemen
                    if (!isValidExServicemenId(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid ID for Ex-Servicemen.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;
				case 'National Health Authority ID Card':
                    // Example: Validate National Health Authority ID Card
                    if (!isValidNHAIdCard(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid National Health Authority ID Card.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;
				case 'PAN card':
                    // Example: Validate PAN card
                    if (!isValidPANCard(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid PAN card.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;
				case 'Passport':
                    // Example: Validate Passport
                    if (!isValidPassport(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid Passport.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;

                case 'PEN for State Employees':
                    // Example: Validate PEN for State Employees
                    if (!isValidPENForStateEmployees(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid PEN for State Employees.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;

                case 'Voters Identity Card':
                    // Example: Validate Voters Identity Card
                    if (!isValidVotersIdentityCard(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid Voters Identity Card.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;
				case 'National Population Register/Multipurpose National Identity Card':
                    // Example: Validate National Population Register/Multipurpose National Identity Card
                    if (!isValidNPRIdCard(idProofDetails)) {
                        $('#idProofDetailsError').text('Invalid NPR/Multipurpose ID Card.');
                        $("#submit").prop("disabled", true);
                    } else {
                        $('#idProofDetailsError').text('');
                        $("#submit").prop("disabled", false);
                    }
                    break;




                default:
                    // Default case, no specific validation
                    $('#idProofDetailsError').text('');
            }
        }

        function isValidAadharNumber(aadharNumber) {
            // Example: Add your Aadhar Number validation logic here
            return /^\d{12}$/.test(aadharNumber);
        }

		function isValidBankAccountNumber(accountNumber) {
            // Example: Add your Bank Account Number validation logic here
            // Modify this based on the actual validation requirements
            return /^\d{10,20}$/.test(accountNumber);
        }

		function isValidConductorLicence(licenceNumber) {
            // Example: Add your Conductor Licence validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{10}$/.test(licenceNumber);
        }

		 function isValidDrivingLicence(licenceNumber) {
            // Example: Add your Driving Licence validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{10,20}$/.test(licenceNumber);
        }
		function isValidEShramCard(eshramCardNumber) {
            // Example: Add your e-SHRAM Card validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{12}$/.test(eshramCardNumber);
		}

		function isValidPHIdSWDept(phId) {
            // Example: Add your ID for PH issued by SW Dept validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{8}$/.test(phId);
        }

		function isValidUtyInstcId(utyInstcId) {
            // Example: Add your ID for Uty instc etc validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{8}$/.test(utyInstcId);
        }

		function isValidBARCouncilId(barCouncilId) {
            // Example: Add your ID for BAR Council validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{8}$/.test(barCouncilId);
        }
		function isValidExServicemenId(exServicemenId) {
            // Example: Add your ID for Ex-Servicemen validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{8}$/.test(exServicemenId);
        }

		function isValidNHAIdCard(nhaIdCard) {
            // Example: Add your National Health Authority ID Card validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{10}$/.test(nhaIdCard);
        }
		function isValidPANCard(panCard) {
            // Example: Add your PAN card validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(panCard);
        }

		 function isValidPassport(passportNumber) {
            // Example: Add your Passport validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{8}$/.test(passportNumber);
        }

        function isValidPENForStateEmployees(penNumber) {
            // Example: Add your PEN for State Employees validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{10}$/.test(penNumber);
        }

        function isValidVotersIdentityCard(identityCardNumber) {
            // Example: Add your Voters Identity Card validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{10}$/.test(identityCardNumber);
        }

		function isValidNPRIdCard(nprIdCard) {
            // Example: Add your National Population Register/Multipurpose National Identity Card validation logic here
            // Modify this based on the actual validation requirements
            return /^[A-Z0-9]{10}$/.test(nprIdCard);
        }


		$('#password, #confirm_password').on('keyup', function () {
            validatePassword();
        });

        function validatePassword() {
            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();

            // Password validation criteria
            var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+])(?=.*\d).{8,}$/;

            // Check if the password meets the criteria
            if (!passwordRegex.test(password)) {
                $('#passwordError').text('Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 symbol, and 1 number.');
                $("#submit").prop("disabled", true);
            } else {
                $('#passwordError').text('');
                $("#submit").prop("disabled", false);
            }

            // Check if the confirm password matches the original password
            if (password !== confirm_password) {
                $('#confirmPasswordError').text('Passwords do not match.');
                $("#submit").prop("disabled", true);
            } else {
                $('#confirmPasswordError').text('');
                $("#submit").prop("disabled", false);
            }
        }






    });



</script>




@endsection
