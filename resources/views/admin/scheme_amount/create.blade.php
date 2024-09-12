@extends('layouts.app')
@section('content')

<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-9">
								<h4 class="content-title mb-2"> {{ $scheme_amount->id ? 'Update' : 'Create' }} Scheme Amount 
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> -  Scheme Amount 
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
                                                 <form name="userForm" id="userForm" method="post"   action="@if($scheme_amount->id) {{ route('scheme_amount.update',$scheme_amount->id) }} @else {{route('scheme_amount.store')}} @endif">
													@csrf
                                                 @if($scheme_amount->id)
                                                     @method('patch')
                                                 @endif
												

													<div class="form-group">
														<div class="row">
                                                            <div class="col-md-6 mb-6">
                                                                <label class="form-label">Scheme Name</label>
                                                                <select class="form-control" name="scheme_name" @if($scheme_amount->id) disabled @endif>
                                                                    <option value="">Select Scheme Name</option>
                                                                    <option value="Couple Financial Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Couple Financial Applications' ? 'selected' : '' }}>
                                                                    Couple Financial Applications
                                                                    </option>
                                                                    <option value="Mother Child Protection Scheme Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Mother Child Protection Scheme Applications' ? 'selected' : '' }}>
                                                                    Mother Child Protection Scheme Applications
                                                                    </option>
                                                                    <option value="Exam Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Exam Applications' ? 'selected' : '' }}>
                                                                    Exam Applications
                                                                    </option>
                                                                    <option value="Marriage Grant Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Marriage Grant Applications' ? 'selected' : '' }}>
                                                                    Marriage Grant Applications
                                                                    </option>
                                                                    <option value="Child Finance Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Child Finance Applications' ? 'selected' : '' }}>
                                                                    Child Finance Applications
                                                                    </option>
                                                                    <option value="House Scheme Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'House Scheme Applications' ? 'selected' : '' }}>
                                                                    House Scheme Applications
                                                                    </option>
                                                                    <option value="Proving death of sole earner application"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Proving death of sole earner application' ? 'selected' : '' }}>
                                                                    Proving death of sole earner applications
                                                                    </option>
                                                                    <option value="Sickle-cell anemia patients finance applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Sickle-cell anemia patients finance applications' ? 'selected' : '' }}>
                                                                    Sickle-cell anemia patients finance applications
                                                                    </option>
                                                                    <option value="Medical /Engineering Student Fund Scheme Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Medical /Engineering Student Fund Scheme Applications' ? 'selected' : '' }}>
                                                                    Medical /Engineering Student Fund Scheme Applications
                                                                    </option>
                                                                    <option value="Student Award applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Student Award applications' ? 'selected' : '' }}>
                                                                    Student Award applications
                                                                    </option>
                                                                    <option value="Tuition Fee Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'Tuition Fee Applications' ? 'selected' : '' }}>
                                                                    Tuition Fee Applications
                                                                    </option>
                                                                    <option value="ITI Student Fund Scheme Applications"
                                                                    {{ old('scheme_name', $scheme_amount->scheme_name) == 'ITI Student Fund Scheme Applications' ? 'selected' : '' }}>
                                                                    ITI Student Fund Scheme Applications
                                                                    </option>
                                                                    <!-- Add more options as needed -->
                                                                </select>
                                                                @error('scheme_name')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror

                                                                <!-- Hidden input to pass the selected value -->
                                                                <input type="hidden" name="selected_scheme_name" value="{{ old('scheme_name', $scheme_amount->scheme_name) }}" />
                                                            </div>
                                                            
															<div class="col-md-6 mb-6">
																<label class="form-label">Scheme Amount</label>
                                                                <input type="number" class="form-control" placeholder="Scheme Amount" name="scheme_amount" value="{{ old('scheme_amount',$scheme_amount->scheme_amount) }}" />		
																@error('scheme_amount')
																   <span class="text-danger">{{$message}}</span>
																@enderror
															</div>
														
															
                                                        </div><br>
                                        
                                            
                                                    </div>
                                                    <div class="row">
                                                       
                                                    <div class="col-md-4 mb-4"><br>
                                                        <button type="submit" id="submit" class="btn btn-warning waves-effect waves-light float-end">{{ $scheme_amount->id ? 'Update' : 'Save' }}</button>

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




@endsection
