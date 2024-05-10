@extends('layouts.app')
@section('content')
<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-9">
								<h4 class="content-title mb-2">Edit TEO
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - TEO
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
												<form name="patientForm" id="patientForm" method="post" action="{{url('teo/update/'.$data->id)}}">
										        @csrf
										     
													<div class="form-group">
														<div class="row">
															<div class="col-md-4 mb-4">
																<label class="form-label">District Name</label>
																<select id="district_id" name="district_id" class="form-control" >
																	<option value="" disabled>Select</option>
																		@foreach($districts as $district)
																			<option value="{{$district->id}}" @if($data['district_id'] == $district->id) selected @endif  >{{$district->name}}</option>
																		@endforeach
																</select>
																@error('district_id')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
															<div class="col-md-4 mb-4">
																<label class="form-label">PO /TDO  Name</label>
																<select id="tdo_id" name="tdo_id" class="form-control" >
																	
																</select>
																@error('tdo_id')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
														</div>
														<div class="row">
															<div class="col-md-4 mb-4">
																<label class="form-label">TEO Name</label>
																<input type="text" class="form-control" placeholder="TEO Name" name="teo_name" value="{{ $data['teo_name'] }}" />
																@error('teo_name')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
															
															<div class="col-md-1 mb-1"><br>
																<button type="submit" id="submit" class="btn btn-warning waves-effect waves-light float-end">Save</button>

															</div>
                                                        </div>

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
	 $('#district_id').change(function(){


fetchTdo();
});

$(document).ready(function() {

fetchTdo();
//  fetchDistrict();
//fetchWifeDistrict();
});

function fetchTdo() {
var val1 = $("#district_id").val();




$.ajax({
	url: "{{ route('district.fetch-po-tdo') }}",
	type: "POST",
	data: {
		district_id: val1,
		_token: '{{ csrf_token() }}'
	},
	dataType: 'json',
	success: function(result) {
		$("#tdo_id").find('option').remove();
		$("#tdo_id").append('<option value="" selected>Choose TEO</option>');

		$.each(result.tdo, function(key, value) {
			var $opt = $('<option>');
				$opt.val(value._id).text(value.name + ' (' + value.type + ')');


			// Set the selected attribute based on the old submitted value
			var oldTdoId = '{{ old('tdo_id')  }}';
            if (oldTdoId == value._id) {
                $opt.prop('selected', true);
            }
			var TdoId = '{{ $data->po_or_tdo }}';
            if (TdoId == value._id) {
                $opt.prop('selected', true);
            }

            $opt.appendTo('#tdo_id');

			
		});
	}
});
}

		
				
			   
</script>	

@endsection
