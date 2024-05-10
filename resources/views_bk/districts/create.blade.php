@extends('layouts.app')
@section('content')

<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-9">
								<h4 class="content-title mb-2">Add District
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - District
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

												<form name="userForm" id="userForm" method="post" action="{{route('districts.store')}}">
													@csrf

													<div class="form-group">
														<div class="row">
															<div class="col-md-6 mb-6">
																<label class="form-label">District Name</label>
																<input type="text" class="form-control" placeholder="Name" name="name" />
																@error('name')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>

															<div class="col-md-1 mb-1"><br>
																<button type="submit" id="submit" class="btn btn-warning waves-effect waves-light float-end">Save</button>

															</div>
                                                        </div><br>
         
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
