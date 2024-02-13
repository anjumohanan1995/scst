@extends('layouts.app')
@section('content')
<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-9">
								<h4 class="content-title mb-2">Edit PO/TDO
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - PO/TDO
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
												<form name="patientForm" id="patientForm" method="post" action="{{url('po-tdo/update/'.$data->id)}}">
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
																@error('district_name')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
															<div class="col-md-4 mb-4">
																<label class="form-label">Type </label>
																<select class="form-control" name="type" required>
                                                                    <option value="PO" @if($data['type'] == 'PO') selected @endif >PO

                                                                    </option>
                                                                    <option value="TDO" @if($data['type'] == 'TDO') selected @endif >TDO

                                                                    </option>
                                                                </select>

																@error('type')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
														</div>
														<div class="row">
															<div class="col-md-4 mb-4">
																<label class="form-label">TDO Name</label>
																<input type="text" class="form-control" placeholder="TDO Name" name="name" value="{{ $data['name'] }}" />
																@error('name')
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




		
				
			   


@endsection
