@extends('layouts.app')
@section('content')

	<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-2">
								<h4 class="content-title mb-2">Verfied List
</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Verified
</li>
									</ol>
								</nav>
							</div>
							<div class="d-flex my-auto col-xl-10 pe-0">
								 <div class="card">
            <div class="main-content-body main-content-body-mail card-body p-0">
                <div class="card-body pt-2 pb-2">
               <!--  <form name="searchForm" id="searchForm" method="post" action="javascript:void(0)">
					@csrf -->
                    <div class="row row-sm">
                        <div class="col-lg mg-t-10 mg-lg-t-0">

                            <select id="dist" name="district" class="form-control">
                                     <option value="">Choose District</option>
                                    <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                                    <option value="Kollam">Kollam</option>
                                    <option value="Pathanamthitta">Pathanamthitta</option>
                                    <option value="Alappuzha">Alappuzha</option>
                                    <option value="Kottayam">Kottayam</option>
                                    <option value="Idukki">Idukki</option>
                                    <option value="Ernakulam">Ernakulam</option>
                                    <option value="Thrissur">Thrissur</option>
                                    <option value="Palakkad">Palakkad</option>
                                    <option value="Malappuram">Malappuram</option>
                                    <option value="Kozhikode">Kozhikode</option>
                                    <option value="Wayanad">Wayanad</option>
                                    <option value="Kannur">Kannur</option>
                                    <option value="Kasaragod">Kasaragod</option>
                            </select>
                            </div>
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <select id="hospital" name="hospital" class="form-control">
                                <option value="">Choose Hospital</option>
                            </select>
                        </div>



                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                	<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                                <input type="text" id="datepicker" name="from_date"  class="form-control from_date" placeholder="From Date">
                            </div>
                        </div>
						  <div class="col-lg mg-t-10 mg-lg-t-0">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                	<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                                <input type="text" id="to_datepicker" name="to_date"class="form-control" placeholder="To Date">
                            </div>
                        </div>

                        <div class="col-lg mg-t-10 mg-lg-t-0">
                        	<button class="btn ripple btn-success btn-block" type="submit" id="submit" >Search</button>
                        </div>
                    </div>
                <!-- </form> -->
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
										 <div id="success_message" class="ajax_response" style="display: none;"></div>
										 <div class="row mb-3">
											<!-- <div class="col-md-1 col-6 text-center">
											 	<div class="task-box primary mb-0">
											 		<a href="{{route('patients.create')}}">
											 			<p class="mb-0 tx-12">Add </p>
											 			<h3 class="mb-0"><i class="fa fa-plus"></i></h3>
											 		</a>
											 	</div>
											</div>  -->
											<!--<div class="col-md-1 col-6 text-center" id="delete">
												 <input type="hidden" id="delete_ctm">

											 	<div class="task-box danger  mb-0">
											 			<p class="mb-0 tx-12">Delete  </p>
											 			<h3 class="mb-0"><i class="fa fa-recycle"></i></h3>
											 	</div>
											</div>
											<div class="col-md-1 col-6 text-center" id="refresh">
												<div class="task-box success  mb-0">
														<p class="mb-0 tx-12">Refresh  </p>
														<h3 class="mb-0"><i class="fa fa-spinner"></i></h3>
												</div>
											</div>-->
											<!-- <div class="col-md-1 col-6 text-center">
												<div class="task-box secondary  mb-0">
													<a href="{{route('patients.import')}}">
														<p class="mb-0 tx-12">Import  </p>
														<h3 class="mb-0"><i class="fas fa-download"></i></h3>
													</a>
												</div>
											</div>
											<div class="col-md-1 col-6 text-center">
												<div class="task-box secondary  mb-0">
													<a href="{{route('patients.export')}}">
														<p class="mb-0 tx-12">Export  </p>
														<h3 class="mb-0"><i class="fas fa-upload"></i></h3>
													</a>
												</div>
											</div> -->


										</div>


										<input type="hidden" class="form-control" placeholder="Name" name="role" id="role" value="{{ \Auth::user()->role}}" />
										<input type="hidden" class="form-control" placeholder="Name" name="hospital_name" id="hospital_name" value="{{ \Auth::user()->hospital_name}}" />


    										<table id="example" class="table table-striped table-bordered" style="width:100%">
       											<thead>
													<tr>
														<th>Hospital Name </th>
                                                        <th>Lab Amount </th>
                                                        <th>Pharmacy Amount </th>
                                                        <th>Miscellaneous Amount </th>
                                                        <th>Total </th>
                                                        <th>Action</th>


													</tr>
												</thead>

         										<tbody>

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

    </div>
    </div>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script type="text/javascript">
    $(document).on("click",".deleteItem",function() {

        var id =$(this).attr('data-id');
        $('#requestId').val($(this).attr('data-id') );
        $('#confirmation-popup').modal('show');
    });


    $(document).ready(function(){

     	   var table = $('#example').DataTable({
            processing: true,
            serverSide: true,

	        buttons: [
	            'copyHtml5',
	            'excelHtml5',
	            'csvHtml5',
	            'pdfHtml5'
	        ],
             "ajax": {

			       	"url": "{{route('getVerifiedList')}}",
			       	 //"data": { patient: $("#patient").val()}
					"type":"get",
			       	"data": function ( d ) {
			        	return $.extend( {}, d, {
							"hospital_name": $("#hospital").val(),
                            "to_date": $("#to_datepicker").val(),
				            "from_date": $("#datepicker").val(),
                            "district": $("#dist").val(),

			          	});
       				}
       			},

             columns: [
				{ data: 'name' },
                { data: 'lab' },
                { data: 'pharmacy' },
                { data: 'miscellaneous' },
                { data: 'final' },
                { data: 'edit' },

			],



         });



      	 table.draw();

		$('#example td.text-right').attr("style", "text-align:right");

      	$('#submit').click(function(){

        	table.draw();
    	});
    	$('#refresh').click(function(){
      		$("#delete_ctm").val('');
        	table.draw();
    	});


    	$('#delete').click(function(){
    		$("#delete_ctm").val(1);
        	table.draw();
    	});

    	$('#rejection_list').click(function(){
    		$('#rejection_list').val(2);
			table.draw();
    	});
		$('#appoved_list').click(function(){
    		$('#rejection_list').val(3);
			table.draw();
    	});
		$('#home').click(function(){
    		$('#rejection_list').val(4);
			table.draw();
    	});

      });
	$(document).on("click",".approveItem",function() {
     var id =$(this).attr('data-id');
     $('#requestId').val($(this).attr('data-id') );
     $('#approve-popup').modal('show');
	});

	$('#dist').change(function(){
        var val = document.getElementById("dist").value;
        //$('#hospital').find('option').remove();
        //alert("val");
        $.ajax({
                    url: "{{url('district/fetch-hospital')}}",
                    type: "POST",
                    data: {
                        name: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#hospital").find('option').remove();
                          $("#hospital").append('<option value="" selected>Choose Hospital</option>');
                        $.each(result.mobile, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.name);
                            $opt.appendTo('#hospital');
                            //$('#hospital').append('<option value=' + value.name + '>' + value.name + '</option>'); // return empty



                        });

                    }
                });

    });
      </script>
		<style>
			.text-right{
				float:right;
			}
		</style>

@endsection
