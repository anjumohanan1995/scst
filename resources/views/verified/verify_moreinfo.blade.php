@extends('layouts.app')
@section('content')
	<!-- main-content -->
				<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
							<div class="col-xl-3">
								<h4 class="content-title mb-2">{{ $hospital_name }} - More Info</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">

										<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - More Info


</li>
									</ol>
								</nav>
							</div>

						</div>
						<!-- /breadcrumb -->
						<!-- main-content-body -->
						<div class="main-content-body">
                        <input type="hidden" id="hospital_id" value="{{ $hospital_id }}" >
                        <input type="hidden" id="fdate" value="{{ $fdate }}" >
                        <input type="hidden" id="tdate" value="{{ $tdate }}" >
							<!-- row -->

							<!-- /row -->
							<!-- row -->
							<div class="row row-sm">
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
									<div class="card"><div class="card-body  table-new">
                                        <h4 class="content-title mb-2">Miscellaneous</h4>
                                        <div id="success_message" class="ajax_response" style="display: none;"></div>
										<input type="hidden" class="form-control" placeholder="Name" name="role" id="role" value="{{ \Auth::user()->role}}" />
										<input type="hidden" class="form-control" placeholder="Name" name="hospital_name" id="hospital_name" value="{{ \Auth::user()->hospital_name}}" />

										<table id="example" class="table table-striped table-bordered" style="width:100%">
       											<thead>
													<tr>
                                                        <th>Patient ID </th>
														<th>Patient </th>
                                                        <th>Scheme ID </th>
														<th>Abha No.</th>
														<th>Miscellaneous Name</th>
														<th>Quantity </th>
														<th>Amount </th>
														<th>Date</th>
														<th>Time</th>
                                                        <th>Attachment</th>
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

                            <div class="row row-sm">
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
									<div class="card"><div class="card-body  table-new">
                                        <h4 class="content-title mb-2">Pharmacy List</h4>



										<input type="hidden" class="form-control" placeholder="Name" name="role" id="role" value="{{ \Auth::user()->role}}" />
										<input type="hidden" class="form-control" placeholder="Name" name="hospital_name" id="hospital_name" value="{{ \Auth::user()->hospital_name}}" />

    										<table id="example1" class="table table-striped table-bordered" style="width:100%">
       											<thead>
													<tr>
														<th>Patient </th>
														<th>Abha No.</th>
														<th>Medicine Name</th>
														<th>Amount </th>
														<th>Date</th>
														<th>Time</th>
                                                        <th>Attachment</th>
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
							<div class="row row-sm">
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
									<div class="card"><div class="card-body  table-new">
                                        <h4 class="content-title mb-2">Laboratory</h4>
										<input type="hidden" class="form-control" placeholder="Name" name="role" id="role" value="{{ \Auth::user()->role}}" />
										<input type="hidden" class="form-control" placeholder="Name" name="hospital_name" id="hospital_name" value="{{ \Auth::user()->hospital_name}}" />


										<table id="example2" class="table table-striped table-bordered" style="width:100%">
       											<thead>
													<tr>
														<th>Patient </th>
                                                        <th>Age </th>
														<th>Abha No.</th>
														<th>Test Name</th>
														<th>Amount </th>
														<th>Date</th>
														<th>Time</th>
                                                        <th>Attachment</th>
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


						</div>
						<!-- /row -->
					</div>
					<!-- /container -->
				</div>
				<!-- /main-content -->



	<div class="modal fade" id="confirmation-popup">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
                    <div class="text-center">
                        <h4>Are you sure to delete this Miscellaneous?</h4>
                    </div>
                    <form id="ownForm">
                        @csrf
                    <input type="hidden" id="requestId" name="requestId" value="" />
                    <div class="text-center">
                        <button type="button" onclick="ownRequest()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                        <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<div class="modal fade" id="approve-popup">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
                    <div class="text-center">
                        <h4>Are you sure to verify this Miscellaneous?</h4>
                    </div>
                    <form id="ownForm">

                        @csrf
                    <input type="hidden" id="requestId" name="requestId" value="" />
                    <div class="text-center">
                        <button type="button" onclick="approve()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                        <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="approve-pharmacy">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
                    <div class="text-center">
                        <h4>Are you sure to verify this Pharmacy?</h4>
                    </div>
                    <form id="ownForm">

                        @csrf
                    <input type="hidden" id="requestId_pharmacy" name="requestId_pharmacy" value="" />
                    <div class="text-center">
                        <button type="button" onclick="approvePharmacy()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                        <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="approve-lab">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
                    <div class="text-center">
                        <h4>Are you sure to verify this Lab?</h4>
                    </div>
                    <form id="ownForm">

                        @csrf
                    <input type="hidden" id="requestId_lab" name="requestId_lab" value="" />
                    <div class="text-center">
                        <button type="button" onclick="approveLab()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                        <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


	<div class="modal fade" id="rejection-popup">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure to reject this Miscellaneous?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
					<form id="ownForm">
                        @csrf
                    <div class="text-center">
                        <h5>Reason for Rejection</h5>
						<textarea class="form-control" name="reason_miscellaneous" id="reason_miscellaneous" requred></textarea>
						<span id="rejection"></span>
					</div>

                    <input type="hidden" id="requestId_miscellaneous" name="requestId_miscellaneous" value="" />
                    <div class="text-center">
                        <button type="button" onclick="reject()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                        <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rejection-pharmacy">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure to reject this Pharmacy?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
					<form id="ownForm">
                        @csrf
                    <div class="text-center">
                        <h5>Reason for Rejection</h5>
						<textarea class="form-control" name="reason_pharmacy" id="reason_pharmacy" requred></textarea>
						<span id="rejection"></span>
					</div>

                    <input type="hidden" id="requestId_rejectPharmacy" name="requestId_rejectPharmacy" value="" />
                    <div class="text-center">
                        <button type="button" onclick="rejectPharmacy()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                        <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rejection-lab">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure to reject this Laboratory?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
					<form id="ownForm">
                        @csrf
                    <div class="text-center">
                        <h5>Reason for Rejection</h5>
						<textarea class="form-control" name="reason_lab" id="reason_lab" requred></textarea>
						<span id="rejection"></span>
					</div>

                    <input type="hidden" id="requestId_rejectLab" name="requestId_rejectLab" value="" />
                    <div class="text-center">
                        <button type="button" onclick="rejectLab()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                        <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script type="text/javascript">

$(document).on("click",".deleteItem",function() {

     var id =$(this).attr('data-id');
     $('#requestId').val($(this).attr('data-id') );
     $('#confirmation-popup').modal('show');
});
$(document).on("click",".rejectItem",function() {

     var id =$(this).attr('data-id');
     $('#requestId_miscellaneous').val($(this).attr('data-id') );
     $('#rejection-popup').modal('show');
});
$(document).on("click",".rejectPharmacy",function() {

    var id =$(this).attr('data-id');
    $('#requestId_rejectPharmacy').val($(this).attr('data-id') );
    $('#rejection-pharmacy').modal('show');
});
$(document).on("click",".rejectLab",function() {

    var id =$(this).attr('data-id');
    $('#requestId_rejectLab').val($(this).attr('data-id') );
    $('#rejection-lab').modal('show');
});

$(document).on("click",".approveItem",function() {

     var id =$(this).attr('data-id');
     $('#requestId').val($(this).attr('data-id') );
     $('#approve-popup').modal('show');
});
$(document).on("click",".approvePharmacy",function() {

    var id =$(this).attr('data-id');
    $('#requestId_pharmacy').val($(this).attr('data-id') );
    $('#approve-pharmacy').modal('show');
});
$(document).on("click",".approveLab",function() {

    var id =$(this).attr('data-id');
    $('#requestId_lab').val($(this).attr('data-id') );
    $('#approve-lab').modal('show');
});

  /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });*/
         function ownRequest() {

            var reqId = $('#requestId').val();
            console.log(reqId);
            $.ajax({
            	headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: '{{ url("miscellaneous/delete") }}'+'/'+reqId,
                method: 'get',
                data: 1,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response.success);

                        $('#confirmation-popup').modal('hide');
                        $('#success_message').fadeIn().html(response.success);
							setTimeout(function() {
								$('#success_message').fadeOut("slow");
							}, 2000 );

                        $('#example').DataTable().ajax.reload();



                }
            })
        }
		function approve() {

		   var reqId = $('#requestId').val();
		   $.ajax({
			   headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
			   url: '{{ url("miscellaneous/approve") }}'+'/'+reqId,
			  // type: 'PATCH',
			   method: 'get',
               data : { status : '1', _token : '{{ csrf_token() }}' },
			   contentType: false,
			   processData: false,
			   success: function(response) {
				   console.log(response.success);

					   $('#approve-popup').modal('hide');
					   $('#success_message').fadeIn().html(response.success);
						   setTimeout(function() {
							   $('#success_message').fadeOut("slow");
						   }, 2000 );

					   $('#example').DataTable().ajax.reload();



			   }
		   })
	   }
       function approvePharmacy() {

        var reqId = $('#requestId_pharmacy').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url: '{{ url("pharmacy/approve") }}'+'/'+reqId,
           // type: 'PATCH',
            method: 'get',
            data : { status : '1', _token : '{{ csrf_token() }}' },
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response.success);

                    $('#approve-pharmacy').modal('hide');
                    $('#success_message').fadeIn().html(response.success);
                        setTimeout(function() {
                            $('#success_message').fadeOut("slow");
                        }, 2000 );

                    $('#example1').DataTable().ajax.reload();



            }
        })
    }
    function approveLab() {

        var reqId = $('#requestId_lab').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url: '{{ url("laboratory/approve") }}'+'/'+reqId,
           // type: 'PATCH',
            method: 'get',
            data : { status : '1', _token : '{{ csrf_token() }}' },
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response.success);

                    $('#approve-lab').modal('hide');
                    $('#success_message').fadeIn().html(response.success);
                        setTimeout(function() {
                            $('#success_message').fadeOut("slow");
                        }, 2000 );

                    $('#example2').DataTable().ajax.reload();



            }
        })
    }


		function reject() {
			var reason = $('#reason_miscellaneous').val();
			if($('#reason_miscellaneous').val() == ""){
				rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for rejection</span>";
			}
			else{
				rejection.innerHTML ="";
				var reqId = $('#requestId_miscellaneous').val();
            console.log(reqId);
            $.ajax({
            	headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: '{{ url("miscellaneous/reject") }}'+'/'+reqId+'/'+reason,
                method: 'get',
                data : { status : '1', reason : reason },
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response.success);

                        $('#rejection-popup').modal('hide');
                        $('#success_message').fadeIn().html(response.success);
							setTimeout(function() {
								$('#success_message').fadeOut("slow");
							}, 2000 );

                        $('#example').DataTable().ajax.reload();



                }
            })

			}
		}
        function rejectPharmacy() {
			var reason = $('#reason_pharmacy').val();
			if($('#reason_pharmacy').val() == ""){
				rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for rejection</span>";
			}
			else{
				rejection.innerHTML ="";
				var reqId = $('#requestId_rejectPharmacy').val();
            console.log(reqId);
            $.ajax({
            	headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: '{{ url("pharmacy/reject") }}'+'/'+reqId+'/'+reason,
                method: 'get',
                data : { status : '1', reason : reason },
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response.success);

                        $('#rejection-pharmacy').modal('hide');
                        $('#success_message').fadeIn().html(response.success);
							setTimeout(function() {
								$('#success_message').fadeOut("slow");
							}, 2000 );

                        $('#example1').DataTable().ajax.reload();



                }
            })

			}
		}
        function rejectLab() {
			var reason = $('#reason_lab').val();
			if($('#reason_lab').val() == ""){
				rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for rejection</span>";
			}
			else{
				rejection.innerHTML ="";
				var reqId = $('#requestId_rejectLab').val();
            console.log(reqId);
            $.ajax({
            	headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: '{{ url("laboratory/reject") }}'+'/'+reqId+'/'+reason,
                method: 'get',
                data : { status : '1', reason : reason },
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response.success);

                        $('#rejection-lab').modal('hide');
                        $('#success_message').fadeIn().html(response.success);
							setTimeout(function() {
								$('#success_message').fadeOut("slow");
							}, 2000 );

                        $('#example2').DataTable().ajax.reload();



                }
            })

			}
		}



     $(document).ready(function(){
		$('#rejection_list').val(4);
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

			       	"url": "{{route('getVerifyMoreinfo')}}",
			       	 //"data": { patient: $("#patient").val()}
					"type":"get",
			       	"data": function ( d ) {
			        	return $.extend( {}, d, {
				            "hospital_id": $("#hospital_id").val(),
                            "fdate": $("#fdate").val(),
                            "tdate": $("#tdate").val(),
                            "patient": $("#patient").val(),
							"abha": $("#abha").val(),
				            "role": $("#role").val(),
							"hospital_name": $("#hospital_name").val(),
				            "delete_ctm": $("#delete_ctm").val(),
				            "rejection_list": $("#rejection_list").val(),
							"to_date": $("#to_datepicker").val(),
				            "from_date": $("#datepicker").val(),

			          	});
       				}
       			},

             columns: [
                { data: 'patient_id' },
				{ data: 'name' },
                { data: 'sc_id' },

				{ data: 'abha' },
                { data: 'miscellaneous_name' },
				{ data: 'quantity' },
                { data: 'amount' },
                { data: 'date' },
                { data: 'time' },
                { data: 'attachment' },
				{ data: 'edit' },


			],
			columnDefs: [
				{

					"targets": 4,
					"className": "text-right",
			    }
 			]

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



      $('#rejection_list').val(4);
      var table = $('#example1').DataTable({
      processing: true,
      serverSide: true,

      buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
      ],
       "ajax": {

                 "url": "{{route('getVerifyPharmacy')}}",
                 // "data": { mobile: $("#mobile").val()}
                 "data": function ( d ) {
                  return $.extend( {}, d, {
                    "hospital_id": $("#hospital_id").val(),
                    "fdate": $("#fdate").val(),
                    "tdate": $("#tdate").val(),
                      "patient": $("#patient").val(),
                      "abha": $("#abha").val(),
                      "role": $("#role").val(),
                       "abha": $("#abha").val(),
                      "delete_ctm": $("#delete_ctm").val(),
                      "rejection_list": $("#rejection_list").val(),
                      "hospital_name": $("#hospital_name").val(),
                      "to_date": $("#to_datepicker").val(),
                      "from_date": $("#datepicker").val(),


                    });
                 }
             },

       columns: [
          { data: 'name' },
          { data: 'abha' },
          { data: 'medicine_name' },
          { data: 'amount' },
          { data: 'date' },
          { data: 'time' },
          { data: 'attachment' },
          { data: 'edit' },


      ],
      columnDefs: [
          {

              "targets": 3,
              "className": "text-right",
          }
       ]

   });



     table.draw();

    $('#submit').click(function(){

      table.draw();
  });
  $('#refresh').click(function(){
        $("#delete_ctm").val('');
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



  $('#delete').click(function(){
      $("#delete_ctm").val(1);
      table.draw();
  });

  $('#rejection_list').val(4);
  var table = $('#example2').DataTable({
  processing: true,
  serverSide: true,

  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ],
   "ajax": {

             "url": "{{route('getVerifyLabs')}}",
             // "data": { mobile: $("#mobile").val()}
             "data": function ( d ) {
              return $.extend( {}, d, {
                "hospital_id": $("#hospital_id").val(),
                "fdate": $("#fdate").val(),
                "tdate": $("#tdate").val(),
                  "patient": $("#patient").val(),
                  "abha": $("#abha").val(),
                  "role": $("#role").val(),
                  "abha": $("#abha").val(),
                  "sc_id": $("#sc_id").val(),
                  "to_date": $("#to_datepicker").val(),
                  "from_date": $("#datepicker").val(),
                  "delete_ctm": $("#delete_ctm").val(),
                  "rejection_list": $("#rejection_list").val(),
                  "hospital_name": $("#hospital_name").val(),

                });
             }
         },

   columns: [
      { data: 'name' },
      { data: 'age' },
      { data: 'abha' },
      { data: 'diagonosis_name' },
      { data: 'amount' },
      { data: 'date' },
      { data: 'time' },
      { data: 'attachment' },
      { data: 'edit' },


  ],
  columnDefs: [
      {

          "targets": 3,
          "className": "text-right",
      }
   ]

});



 table.draw();

$('#submit').click(function(){

  table.draw();
});
$('#refresh').click(function(){
    $("#delete_ctm").val('');
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



$('#delete').click(function(){
  $("#delete_ctm").val(1);
  table.draw();
});

$('#rejection_list').val(4);
var table = $('#example3').DataTable({
processing: true,
serverSide: true,

buttons: [
    'copyHtml5',
    'excelHtml5',
    'csvHtml5',
    'pdfHtml5'
],
 "ajax": {

           "url": "{{route('getVerifyDiagnosis')}}",
           // "data": { mobile: $("#mobile").val()}
           "data": function ( d ) {
            return $.extend( {}, d, {
                "hospital_id": $("#hospital_id").val(),
                "fdate": $("#fdate").val(),
                "tdate": $("#tdate").val(),
                "patient": $("#patient").val(),
                "abha": $("#abha").val(),
                "role": $("#role").val(),
                "sc_id": $("#sc_id").val(),
                "to_date": $("#to_datepicker").val(),
                "from_date": $("#datepicker").val(),
                "delete_ctm": $("#delete_ctm").val(),
                "rejection_list": $("#rejection_list").val(),
                "hospital_name": $("#hospital_name").val(),

              });
           }
       },

 columns: [
    { data: 'name' },
    { data: 'abha' },
    { data: 'diagonosis_name' },
    { data: 'amount' },
    { data: 'date' },
    { data: 'time' },
    { data: 'attachment' },
    { data: 'edit' },


],
columnDefs: [
    {

        "targets": 3,
        "className": "text-right",
    }
 ]

});



table.draw();

$('#submit').click(function(){

table.draw();
});
$('#refresh').click(function(){
  $("#delete_ctm").val('');
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



$('#delete').click(function(){
$("#delete_ctm").val(1);
table.draw();
});

});
      </script>
<style>
	.text-right{
		float:right;
	}
</style>
@endsection
