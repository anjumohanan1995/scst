@extends('layouts.app')
@section('content')

<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-9">
								<h4 class="content-title mb-2"> {{ $institution->id ? 'Update' : 'Create' }} Institution 
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> -  Institution 
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
												 <div id="success_message" class="ajax_response" style="display: none;"></div>
                                                 <form name="userForm" id="userForm" method="post"   action="@if($institution->id) {{ route('institution.update',$institution->id) }} @else {{route('institution.store')}} @endif">
													@csrf
                                                 @if($institution->id)
                                                     @method('patch')
                                                 @endif
												

													<div class="form-group">
														<div class="row">
															<div class="col-md-6 mb-6">
																<label class="form-label">Institution Name</label>
																<input type="text" class="form-control" placeholder="Institution Name" name="name" value="{{ old('name',$institution->name) }}" />
																@error('name')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
															<div class="col-md-6 mb-6">
																<label class="form-label">Address</label>
                                                                <textarea name="address" class="form-control" placeholder="Address">{{ old('address',$institution->address) }}</textarea>
																
																@error('address')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
														
															
                                                        </div><br>
                                                        <div class="row">
															<div class="col-md-6 mb-6">
																<label class="form-label">Email Id</label>
																<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email',$institution->email) }}" />
																@error('email')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
															<div class="col-md-6 mb-6">
																<label class="form-label">Contact Number</label>
                                                                <input type="tel" name="phone_no" class="form-control" placeholder="Contact Number" value="{{ old('phone_no',$institution->phone_no) }}">										
																@error('phone_no')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
														
															
                                                        </div><br>
                                                        @if ($institution->id === null)
    <!-- Your content goes here -->

                                                        <div class="row">
                                                            <div class="col-md-6 mb-6">
                                                                <label class="form-label">Password</label>
                                                                <input type="password" class="form-control" placeholder="Password" name="password" />
                                                                @error('password')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6 mb-6">
                                                                <label class="form-label">Confirm Password </label>
                                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                                                @error('password_confirmation')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <br>
                                                        @endif
                                                    </div>
                                                    <div class="row">
                                                       
                                                    <div class="col-md-4 mb-4"><br>
                                                        <button type="submit" id="submit" class="btn btn-warning waves-effect waves-light float-end">{{ $institution->id ? 'Update' : 'Save' }}</button>

                                                    </div>
														</div>
                                                    </div>
													</div>
                                                    </div>

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

$("#role").change(function () {
   var category= $('option:selected', this).text();// Here we can get the value of selected item
   //alert(category);
   if(category == "Verifier" || category == "Approver"){
    $('#hospital_div').hide();
	$("#hospital_name").removeAttr('required');
    }
       else{
        $('#hospital_div').show();
       }
});

</script>




@endsection
