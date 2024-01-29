@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
		<!-- container -->
		<div class="main-container container-fluid">
		    <!-- breadcrumb -->
			<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
				<div class="col-xl-6">
					<h4 class="content-title mb-2">മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ പട്ടികജാതി വിദ്യാർത്ഥികൾക്ക് പ്രാരംഭചെലവുകൾക്ക് ധനസഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷ 

  </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Application List</li>
                        </ol>
                    </nav>
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
                                <div class="row mb-3">
                            
                                <div class="col-md-1 col-6 text-center" id="refresh">
                                    <div class="task-box success  mb-0">
                                            <p class="mb-0 tx-12">Refresh  </p>
                                            <h3 class="mb-0"><i class="fa fa-spinner"></i></h3>
                                    </div>
                                </div>
                                


                            </div>




                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Applicant's Name / അപേക്ഷകന്റെ പേര് </th>
                                            <th>Address / മേൽവിലാസം 
                                            </th>
                                            <th>Course Name / കോഴ്‌സിന്റെ പേര് 
                                            </th>
                                            <th>Applicant's Income / അപേക്ഷകന്റെ വരുമാനം 
                                            </th>
                                            <th>Caste/Religion / ജാതി/ മതം 
                                            </th>
                                            <th>Date / തീയതി   </th>
                                            <th >Action / ആക്ഷൻ</th>



                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="modal fade" id="approve-popup" style="display: none">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content country-select-modal border-0">
                                            <div class="modal-header offcanvas-header">
                                                <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body p-5">
                                                <div class="text-center">
                                                    <h4>Are you sure to Approve this Application?</h4>
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
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

<script src="{{ asset('js/toastr.js') }}"></script>

@if (session('status'))
<script>
    toastr.success('{{ session("status") }}', 'Success!')
</script>
@endif
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

    $.ajax({
                url: "{{ route('studentFund-teo.approve') }}",
                type: "POST",
                data: {
                    "id": reqId,
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
          
            url: "{{ route('studentFund-teo.reject') }}",
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
$(document).on("click",".deleteItem",function() {

     var id =$(this).attr('data-id');
     $('#requestId').val($(this).attr('data-id') );
     $('#confirmation-popup').modal('show');
});


         function ownRequest() {

            var reqId = $('#requestId').val();
            console.log(reqId);
            $.ajax({
            	headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: '{{ url("users/delete") }}'+'/'+reqId,
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",

                    },
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

			       	"url": "{{route('getAdminStudentFundList')}}",
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
				{ data: 'course_name' },
                { data: 'income' },
				{ data: 'caste' },
                
                { data: 'date'},

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
