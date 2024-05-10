@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0">
         <h4 class="content-title mb-2"> ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം <br>
         </h4>
         @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
               class="fa fa-window-close"></i></button> {{ $message }}
         </div>
         @endif
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
               <div class="card">
                  <div class="card-body  table-new">
                     <div id="success_message" class="ajax_response" style="display: none;"></div>
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                           <tr>
                              <th>Sl No</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Age/DOB </th>
                              <th>Community / Caste </th>
                              <th>Village</th>
                              <th>Created Date</th>
                              <th >Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                     <div class="modal fade" id="approve-popup" style="display: none">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content country-select-modal border-0">
                              <div class="modal-header offcanvas-header">
                                 <h6 class="modal-title">Are you sure?</h6>
                                 <button aria-label="Close"
                                    class="btn-close" data-bs-dismiss="modal" type="button"><span
                                    aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body p-5">
                                 <div class="text-center">
                                    <h4>Are you sure to Approve this Application?</h4>
                                 </div>
                                 <form id="ownForm">
                                    @csrf
                                    <div class="text-center">
                                       <h5>Reason for Approve</h5>
                                       <textarea class="form-control" name="approve_reason" id="approve_reason" requred></textarea>
                                       <span id="rejection"></span>
                                    </div>
                                    <input type="hidden" id="requestId" name="requestId" value="" />
                                    <div class="text-center">
                                       <button type="button" onclick="approve()"
                                          class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                                       <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal"
                                          type="button">No</button>
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
                                 <h6 class="modal-title">Are you sure to reject this Application?</h6>
                                 <button
                                    aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                    type="button"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body p-5">
                                 <form id="ownForm">
                                    @csrf
                                    <div class="text-center">
                                       <h5>Reason for Rejection</h5>
                                       <textarea class="form-control" name="reason" id="reason" requred></textarea>
                                       <span id="rejection"></span>
                                    </div>
                                    <input type="hidden" id="requestId2" name="requestId2"
                                       value="" />
                                    <div class="text-center">
                                       <button type="button" onclick="reject()"
                                          class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                                       <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal"
                                          type="button">No</button>
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
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<script src="{{ asset('js/toastr.js') }}"></script>
<meta name="csrf_token" content="{{ csrf_token() }}" />
<script type="text/javascript">
   $(document).on("click",".approveItem",function() {
        var id =$(this).attr('data-id');
        $('#requestId').val($(this).attr('data-id') );
        $('#approve-popup').modal('show');
       });
       $(document).on("click",".rejectItem",function() {
   
        var id =$(this).attr('data-id');
        $('#requestId2').val($(this).attr('data-id') );
        $('#rejection-popup').modal('show');
       });

       function approve() {
            var reason = $('#approve_reason').val();
            var reqId = $('#requestId').val();

            $.ajax({
                url: "{{ route('motherChildScheme.officer.approve') }}",
                type: "POST",
                data: {
                    "id": reqId,
                    "reason": reason,
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

            if ($('#reason').val() == "") {
                rejection.innerHTML = "<span style='color: red;'>" + "Please enter the reason for rejection</span>";
            } else {
                rejection.innerHTML = "";
                var reqId = $('#requestId2').val();
                console.log(reqId);
                $.ajax({

                    url: "{{ route('motherChildScheme.officer.reject') }}",
                    type: "POST",
                    data: {
                        "id": reqId,
                        "reason": reason,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response.success);
                        toastr.success(response.success, 'Success!')
                        $('#rejection-popup').modal('hide');
                        $('#success_message').fadeIn().html(response.success);
                        setTimeout(function() {
                            $('#success_message').fadeOut("slow");
                        }, 2000);

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
   
   		       	"url": "{{route('getmotherChildSchemeListOfficer')}}",
   		       	// "data": { mobile: $("#mobile").val()}
   		       	"data": function ( d ) {
   		        	return $.extend( {}, d, {
   			            "mobile": $("#mobile").val(),
   			            "name": $("#name").val(),
   			            "role": $("#role").val(),
   			            //"from_date": $("#datepicker").val(),
   			            "delete_ctm": $("#delete_ctm").val(),
   
   
   		          	});
         				}
         			},
   
               columns: [
                  { data: 'sl_no' },
                  { data: 'name' },
                  { data: 'address' },
   			{ data: 'dob' },
   			{ data: 'caste' },
                  { data: 'village' },
                  { data: 'created_at'},
   
                  { data: 'edit' }
   
   
   		],
              "order": [6, 'desc'],
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