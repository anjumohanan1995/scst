@extends('layouts.app')
@section('content')
<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-3">
								<h4 class="content-title mb-2">UnVerified Report
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										 
										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - UnVerified Report
</li>
									</ol>
								</nav>
							</div>
							<div class="d-flex my-auto col-xl-9 pe-0">
								 <div class="card">
            <div class="main-content-body main-content-body-mail card-body p-0">
                <div class="card-body pt-2 pb-2">
                     
                    <div class="row row-sm">
                        <div class="col-lg mg-t-10 mg-lg-t-0"><input class="form-control" placeholder="Phone Number" type="text"></div>
                        
                        <div class="col-lg mg-t-10 mg-lg-t-0">
						<select name="ordstatus" class="form-control" id="edit-ordstatus"><option value="" selected="selected">Choose Scheme Id</option><option value="APPRV">Arogya kiranam		
</option><option value="CANC">Cancel</option><option value="COMP">JBSK</option><option value="CONF">RSSK</option><option value="DRF">Shalabam</option> </select>
						</div>
                    
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i></div>
                                <input type="text" id="datepicker" class="form-control" placeholder="From Date">
                            </div>
                        </div>
						  <div class="col-lg mg-t-10 mg-lg-t-0">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i></div>
                                <input type="text" id="datepicker" class="form-control" placeholder="To Date">
                            </div>
                        </div>
                        
                        <div class="col-lg mg-t-10 mg-lg-t-0"> <button class="btn ripple btn-success btn-block">Search</button></div>
                    </div>
                </div>
            </div>
        </div>
							</div>
						</div>
						<!-- /breadcrumb -->
						<!-- main-content-body -->
						<div class="main-content-body">
							 
							<!-- row -->
							 
							<!-- /row -->
							<!-- row -->
							<div class="row row-sm">
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
									<div class="card"><div class="card-body  table-new">
										 <div class="row mb-3"> 
											 <div class="col-md-1 col-6 text-center"> <div class="task-box primary mb-0"> <a href=""><p class="mb-0 tx-12">Download </p><h3 class="mb-0"><i class="fas fa-download"></i></h3></a> </div> </div> 
											 <div class="col-md-1 col-6 text-center"> <div class="task-box danger  mb-0"> <p class="mb-0 tx-12">Delete  </p><h3 class="mb-0"><i class="fa fa-recycle"></i></h3> </div> </div>
											 <div class="col-md-1 col-6 text-center"> <div class="task-box success  mb-0"> <p class="mb-0 tx-12">Refresh  </p><h3 class="mb-0"><i class="fa fa-spinner"></i></h3> </div> </div>
												
										</div>
										
											 <table id="example" class="table table-striped table-bordered" style="width:100%">
       							<thead>
														<tr>
															<th width="30"><div class="checkbox float-start me-1"><label class="check-box m-0">
																<label class="ckbox"></label><input type="checkbox"><span></span></label></div></th>
															<th>Hospital Name</th>
															<th>Hospital ID</th>
															<th>Amount</th>
															<th>From Date</th>
															<th>To Date</th>
															<th>Action</th>
														
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="checkbox"><label class="check-box">
																<label class="ckbox"></label><input checked="" type="checkbox"><span></span></label></div>
															</td>
															<td>
																<div class="project-contain">
																	<h6 class="mb-1 tx-13">Medical Collage</h6>
																</div>
															</td>
															<td>001</td>
															<td>2000</td>
															<td>01/01/22</td>
															<td> 31/01/22</td> 
															<td>PDF</td>
														</tr>
														<tr>
															<td><div class="checkbox"><label class="check-box">
																<label class="ckbox"></label><input type="checkbox"><span></span></label></div></td>
															<td>
																<div class="project-contain">
																	<h6 class="mb-1 tx-13">Sree Chithra</h6>
																</div>
															</td>
															<td>002</td>
															<td>2500</td>
															<td>01/02/22</td>
															<td> 28/02/22</td> 
															<td>PDF</td>
														</tr>
														<tr>
															<td>
																<div class="checkbox"><label class="check-box">
																<label class="ckbox"></label><input type="checkbox"><span></span></label></div>
															</td>
															<td>
																<div class="project-contain">
																	<h6 class="mb-1 tx-13">SK Hospital</h6>
																</div>
															</td>
															<td>003</td>
															<td>3000</td>
															<td>01/03/22</td>
															<td> 30/03/22</td> 
															<td>PDF</td>
														</tr>

														<tr>
															<td>
																<div class="checkbox"><label class="check-box">
																<label class="ckbox"></label><input type="checkbox"><span></span></label></div>
															</td>
															<td>
																<div class="project-contain">
																	<h6 class="mb-1 tx-13">KIMS Hospital</h6>
																</div>
															</td>
															<td>004</td>
															<td>3500</td>
															<td>01/04/22</td>
															<td> 31/04/22</td> 
															<td>PDF</td>
														</tr>
			 											 
													</tbody>
        
    </table>
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