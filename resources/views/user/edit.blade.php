@extends('layouts.app')
@section('content')
<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-9">
								<h4 class="content-title mb-2">Edit User
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Patient
</li>
									</ol>
								</nav>
							</div><div class="col-xl-3">

							</div>

						</div>
						<!-- /breadcrumb -->
						<!-- main-content-body -->
						<div class="main-content-body">

							<!-- row -->

							<!-- /row -->
							<!-- row -->
							<div class="row row-sm mt-4">
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">

									<div class="card">

										<div class="card-body">
												<form name="patientForm" id="patientForm" method="post" action="{{route('update-user',$patient['id'])}}">
										        @csrf
										        <!-- @method('PUT')   -->
													<!--<div class="form-group">
														<div class="row">
															<div class="col-md-3"><label class="form-label">Category</label></div>
															<div class="col-md-9">
																<select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
																	<option>Us English</option>
																	<option>Arabic</option>
																	<option>Korean</option>
																</select>

															</div>
														</div>
													</div>-->

													<div class="mb-4 main-content-label">User Details</div>
													<div class="form-group">
													<div class="row">
																<input type="hidden" class="form-control" placeholder="Name" name="user_id" value="{{ \Auth::user()->id}}" />
															<div class="col-md-6 mb-6">
																<label class="form-label">Name</label>
																<input type="text" class="form-control" placeholder="Name" name="name" value="{{$patient['name']}}" />
																@error('name')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>

															<div class="col-md-6 mb-6">
																<label class="form-label">Email</label>
																<input type="email" class="form-control" placeholder="Email Id" name="email" value="{{$patient['email']}}" />
																@error('email')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
                                                        </div>
                                                        <div class="row">
																{{-- <input type="hidden" class="form-control" placeholder="Name" name="user_id" value="{{ \Auth::user()->id}}" />
															<div class="col-md-6 mb-6">
																<label class="form-label">Password (<strong>8 numbers, 1 uppercase,1 lowercase,1 symbol and 1 number</strong> )</label>
																<input type="password" class="form-control" placeholder="Password" name="password" id="password"/>
																@error('password')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div> --}}

															<div class="col-md-6 mb-6">
																<label class="form-label">Mobile</label>
																<input type="number" class="form-control" placeholder="Mobile No." name="mobile" id="mobile" value="{{$patient['mobile']}}" required />
																@error('mobile')
																   <span class="text-danger" id="wrong_pass_alert">{{$message}}</span>
																@enderror
															</div>
                                                        </div>
                                                        <div class="row">
																<input type="hidden" class="form-control" placeholder="Name" name="user_id" value="{{ \Auth::user()->id}}" />

                                                                <div class="col-md-6 mb-6"  >
																<label class="form-label">Role</label>
																<select class="form-control" placeholder="Choose Role" name="role" id="role">
																	@foreach ($role as $key => $roles)
                                                        			<option value="{{ $roles->name }}" {{$patient['role']== $roles->name  ? 'selected' : ''}}> {{ @$roles->name }}


                                                            		</option>
                                                    			    @endforeach
																
																
                                                                </select>
																@error('role')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>

                                                        </div>
                                                        

												 <button type="submit" class="btn btn-warning waves-effect waves-light float-end" id="submit">Save</button>
</div></div>
												</form>
											</div>



									</div>
								</div>



							</div>
							<!-- /row -->
							<!-- row -->

							<!-- /row -->
							<!-- row -->
						</div>
						<!-- /row -->
					</div>
					<!-- /container -->
				</div>
				<!-- /main-content -->
<script src="{{ asset('js/jquery.validate.min.js')}}"></script>
<script>
if ($("#patientForm").length > 0) {
$("#patientForm").validate({
	rules: {
		name: {
		required: true,
		maxlength: 50
		},
		/*email: {
		required: true,
		maxlength: 50,
		email: true,
		},
		mobile: {
		required: true
		}, */
		email: {
		required: true
		},
		password: {
		required: true
		},
        mobile: {
		required: true
		},
	},
	messages: {
		name: {
		required: "Please enter name",
		maxlength: "Your name maxlength should be 50 characters long."
		},
		email: {
		required: "Please enter email"

		},
		password: {
		required: "Please select Password"

		},
        mobile: {
		required: "Please enter Mobile No."


		},
		/*email: {
		required: "Please enter valid email",
		email: "Please enter valid email",
		maxlength: "The email name should less than or equal to 50 characters",
		},
		mobile: {
		required: "Please enter mobile"

		},
		adhar: {
		required: "Please enter Aadhar No",
		minlength: "Your Aadhar no  minlength must be 10 digits."

		},*/
	},

})
}
$( document ).ready(function() {
var category= $('#role option:selected').val();// Here we can get the value of selected item
//alert(category);
if(category == "Verifier" || category == "Approver"){
 $('#hospital_div').hide();
 $("#hospital_name").removeAttr('required');
 }
    else{
     $('#hospital_div').show();
    }
});
$("#role").change(function () {
   var category= $('option:selected', this).text();// Here we can get the value of selected item
   //alert(category);
   if(category == "Verifier"){
    $('#hospital_div').hide();
	//$('#hospital_name').val()=null;
       }
       else{
        $('#hospital_div').show();
       }
});

    var val = document.getElementById("dist").value;
    //$('#hospital').find('option').remove();
    //alert(val);
    $.ajax({
                url: "{{url('district/fetch-hospital')}}",
                type: "POST",
                data: {
                    name: val,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                  //  alert(result);
                  var user =  {{ Js::from($patient['hospital_id']) }};
                    $("#hospital").find('option').remove();
                      $("#hospital").append('<option value="" >Choose Hospital</option>');
                    $.each(result.mobile, function (key, value) {
                        if(value._id == user)
                        $('#hospital').append('<option value="'+value._id+'" selected>'+ value.name +'</option>');
                        else
                        $('#hospital').append('<option value="'+value._id+'">'+ value.name +'</option>');
                    });

                }
            });

$('#dist').change(function(){
    var val = document.getElementById("dist").value;
    //$('#hospital').find('option').remove();
    //alert(val);
    $.ajax({
                url: "{{url('district/fetch-hospital')}}",
                type: "POST",
                data: {
                    name: val,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                  //  alert(result);
                    $("#hospital").find('option').remove();
                      $("#hospital").append('<option value="" selected>Choose Hospital</option>');
                    $.each(result.mobile, function (key, value) {
                        var $opt = $('<option>');
                        $opt.val(value._id).text(value.name);
                        $opt.appendTo('#hospital');

                    });

                }
            });

});
</script>




@endsection
