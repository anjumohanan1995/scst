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


<meta name="csrf-token" content="{{ csrf_token() }}" />

<script type="text/javascript">





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

			       	"url": "{{route('getVerifiedMoreinfo')}}",
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

                 "url": "{{route('getVerifiedPharmacy')}}",
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

             "url": "{{route('getVerifiedLabs')}}",
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
