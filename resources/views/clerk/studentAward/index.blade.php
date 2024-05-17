@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
		<!-- container -->
		<div class="main-container container-fluid">
		    <!-- breadcrumb -->
			<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
				<div class="col-xl-6">
					<h4 class="content-title mb-2">മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo </h4>
                  
				</div>
				<div class="d-flex my-auto col-xl-6 pe-0">
					<div class="card">
                        <div class="main-content-body main-content-body-mail card-body p-0">
                            <div class="card-body pt-2 pb-2">
                                <div class="row row-sm">
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <input class="form-control" placeholder="Name" type="text" name="name" id="name">
                                    </div>
                                    

                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <button class="btn ripple btn-success btn-block" type="submit" id="submit" >Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<!-- /breadcrumb -->
			<!-- main-content-body -->
			<div class="main-content-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>
                        {{ $message }}
                    </div>

                @endif
                <!-- row -->
                <div class="row row-sm">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
                        <div class="card"><div class="card-body  table-new">
                                <div id="success_message" class="ajax_response" style="display: none;"></div>

                                <div class="panel panel-primary">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <ul class="nav panel-tabs">
                                                <li><a href="#tabNew" class="active" data-bs-toggle="tab" data-bs-target="#tabNew">New</a></li>
                                                <li><a href="#tabReturned" data-bs-toggle="tab" data-bs-target="#tabReturned" onclick="ownList();">Returned</a></li>
                                               </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabNew">
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>DOB </th>
                                                                <th>Address </th>
                                                                <th>District</th>
                                                                <th>Created Date</th>
                                                                <th >Action</th>
                    
                    
                    
                                                            </tr>
                                                        </thead>
                    
                                                        <tbody>
                    
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabReturned">
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>                                                           
                                                                <th>Name</th>
                                                                <th>DOB </th>
                                                                <th>Address </th>
                                                                <th>District</th>
                                                                <th>Created Date</th>
                                                                <th >Action</th>
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
                               


                                <div class="modal fade" id="approve-popup" style="display: none">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content country-select-modal border-0">
                                            <div class="modal-header offcanvas-header">
                                                <h6 class="modal-title">Are you sure to Approve this Application?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body p-5">
                                               
                                                <form id="ownForm">                            
                                                    @csrf
                                                    <div class="text-center">
                                                        <h5>Reason for Approval</h5>
                                                        <textarea class="form-control" name="approved_reason" id="approved_reason" requred></textarea>
                                                        <span id="approval"></span>
                                                    </div>
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
                                <div class="modal fade" id="rejection-popup">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content country-select-modal border-0">
                                            <div class="modal-header offcanvas-header">
                                                <h6 class="modal-title">Are you sure to reject this Application?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body p-5">
                                                <form id="ownForm">
                                                    @csrf
                                                <div class="text-center">
                                                    <h5>Reason for Rejection</h5>
                                                    <textarea class="form-control" name="reason" id="reason" requred></textarea>
                                                    <span id="rejection"></span>
                                                </div>
                            
                                                <input type="hidden" id="requestId2" name="requestId2" value="" />
                                                <div class="text-center">
                                                    <button type="button" onclick="reject()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                                                    <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
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
		<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    <!-- /main-content -->
<meta name="csrf_token" content="{{ csrf_token() }}" />
<script type="text/javascript">

    $(document).on("click", ".approveItem", function() {
        var id =$(this).attr('data-id');
            $('#requestId').val($(this).attr('data-id') );
            $('#approve-popup').modal('show');
              
          
            });
            $(document).on("click", ".rejectItem", function() {
                $('#requestId2').val($(this).attr('data-id') );
            $('#rejection-popup').modal('show');
            });

            function approve() {

                var reqId = $('#requestId').val();
                var reason = $('#approved_reason').val();
        
            $.ajax({
                        url: "{{ route('studentAward-clerk.approve') }}",
                        type: "POST",
                        data: {
                            "id": reqId,
                            "reason" :reason,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success(response.success, 'Success!')
                            $('#success').show();
                            $('#approve-popup').modal('hide');
                            $('#success_message').fadeIn().html(response.success);
                            setTimeout(function() {
                                $('#success_message').fadeOut("slow");
                            }, 2000);
        
                            $('#example').DataTable().ajax.reload();
        
                        }
                    });
        }
        function reject() {
                var reason = $('#reason').val();
              
                if($('#reason').val() == ""){
                    rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for rejection</span>";
                }
                else{
                    rejection.innerHTML ="";
                    var reqId = $('#requestId2').val();
                console.log(reqId);
                $.ajax({
                  
                    url: "{{ route('studentAward-clerk.reject') }}",
                    type: "POST",
                        data: {
                            "id": reqId,
                            "reason" :reason,
                            "_token": "{{ csrf_token() }}"
                        },
                    success: function(response) {
                        console.log(response.success);
                        toastr.success(response.success, 'Success!')
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

			       	"url": "{{route('getStudentAwardListClerk')}}",
			       	// "data": { mobile: $("#mobile").val()}
			       	"data": function ( d ) {
			        	return $.extend( {}, d, {
				          
				            "name": $("#name").val(),
				            //"from_date": $("#datepicker").val(),
				            "delete_ctm": $("#delete_ctm").val(),


			          	});
       				}
       			},

             columns: [
                { data: 'name' },
                { data: 'dob' },
				{ data: 'address' },
                { data: 'district' },
                { data: 'created_at' },

                { data: 'edit' }


			],
            "order": [4, 'desc'],
            'ordering': true,
         });



      	 table.draw();

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





         // DataTable


      });


     $(document).ready(function(){

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

           "url": "{{route('getStudentAwardListClerkReturned')}}",
           // "data": { mobile: $("#mobile").val()}
           "data": function ( d ) {
            return $.extend( {}, d, {
              
                "name": $("#name").val(),
                //"from_date": $("#datepicker").val(),
                "delete_ctm": $("#delete_ctm").val(),


              });
           }
       },

 columns: [
    { data: 'name' },
    { data: 'dob' },
    { data: 'address' },
    { data: 'district' },
    { data: 'created_at' },

    { data: 'edit' }


],
"order": [4, 'desc'],
'ordering': true,
});



table.draw();

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





// DataTable


});
      </script>


@endsection
