
@extends('layouts.app')
@section('content')

	<script>
	$(document).ready( function() {
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear();
		if (month < 10) month = "0" + month;
		if (day < 10) day = "0" + day;
		var today = year + "-" + month + "-" + day;
		document.getElementById('datePicker').value = today;
		var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
		document.getElementById("timePicker").value = current_time;
		$('#patient').on('change', function () {

			var idCountry = this.value;
			$("#mobile").val('');
			$.ajax({
				url: "{{url('miscellaneous/fetch-details')}}",
				type: "POST",
				data: {
					name: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					$.each(result.mobile, function (key, value) {
						//alert(value.abha_num);
						$('#mobile').val(value.mobile);
						$('#abha').val(value.abha_num);

					});

				}
			});
		});

	});
	</script>

	<div class="main-content app-content">
					<!-- container -->
		<div class="main-container container-fluid">
						<!-- breadcrumb -->
			<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
				<div class="col-xl-9">
					<h4 class="content-title mb-2">View Profile</h4>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Profile</li>
						</ol>
					</nav>
				</div>
				<div class="col-xl-3">
				</div>
			</div>
						<!-- /breadcrumb -->
						<!-- main-content-body -->
			<div class="main-content-body">

				<div class="row row-sm mt-4 mouse">
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
						<div class="card">
							<div class="card-body">
								 <div id="success_message" class="ajax_response" style="display: none;"></div>
                                 <div class="main">
                                    <h2>Profile Details</h2>
                                    <div class="card" >
                                        <div class="card-body" width="500px">
                                           <center> <table >
                                                <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>:</td>
                                                        <td>{{$user->name}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Role</td>
                                                        <td>:</td>
                                                        <td>{{$user->role}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td>:</td>
                                                        <td>{{$user->mobile}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td>{{$user->email}}</td>
                                                    </tr>
                                                    @if($user->role == "Data Entry")
                                                    <tr>
                                                        <td>Hospital Name</td>
                                                        <td>:</td>
                                                        <td>{{$user->hospital_name}}</td>
                                                    </tr>
                                                    @endif

                                                </tbody>
                                            </table></center>
                                        </div>
                                    </div>
                                </div>
								</div>
							</div>
						</div>
					</div>
				</div>
						<!-- /row -->
						<div class="main-content-body">

                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 {{ session('success') }}
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                    </button> -->
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 {{ session('error') }}
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                    </button> -->
                            </div>
                        @endif

				<div class="row row-sm mt-4 mouse">
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
						<div class="card">
							<div class="card-body">
								 <div id="success_message" class="ajax_response" style="display: none;"></div>
                                 <div class="main">
                                 <div class="mb-4 main-content-label">Change Password</div>
                                    <div class="card" >
                                        <div class="card-body" >

                                           <form class="validatedForm" name="userForm" id="userForm" method="post" action="{{ route('change_password')}}" >
													@csrf


													<div class="form-group" >
													<div class="row">

																<div class="col-md-6 mb-6">
																	<label class="form-label">Current Password</label>
																	<input type="password" class="form-control" placeholder="Current Password" name="current_password" id="current_password"/>
																	@error('current_password')
																	   <span class="text-danger">{{$message}}</span>
																	@enderror
																</div>
															</div>
														<div class="row">

															<div class="col-md-6 mb-6">
																<label class="form-label">New Password</label>
																<input type="password" class="form-control" placeholder="Password" name="password" id="password"/>
																@error('email')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
                                                        </div>
                                                        <div class="row">
																<input type="hidden" class="form-control" placeholder="Name" name="user_id" value="{{ \Auth::user()->id}}" />
															<div class="col-md-6 mb-6">
																<label class="form-label">Confirm Password</label>
																<input type="password" class="form-control" placeholder="Confirm Password" name="c_password" id="c_password"/>
																@error('password')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>

                                                        </div>

														<br>
                                                        <button type="submit" id="submit" class="btn btn-info waves-effect waves-light" onclick="matchPassword()"style="float:center">Update</button>

														</div>
													</div>
                                                    </div>

												</form>

                                        </div>
                                    </div>
                                </div>
								</div>
							</div>
						</div>
					</div>
				</div>
						<!-- /row -->
		</div>
		</div>

					<!-- /container -->
				</div>
				<!-- /main-content -->

<script>
jQuery('.validatedForm').validate({
			rules : {
				password : {
					minlength : 5
				},
				c_password : {
					minlength : 5,
					equalTo : "#password"
				}
			}
		});

$('button').click(function(){
    //console.log($('.validatedForm').valid());
    var id = $('#password').val();
    var id1 = $('#c_password').val();
	var id2 = $('#current_password').val();
    if((id == id1) && (id != '') && (id1 != '')){
   // window.location.href = "{{ url('change_password')}}"+"/"+id+"/"+id2;
    }
});
</script>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
@endsection
