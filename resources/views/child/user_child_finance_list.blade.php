@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
		<!-- container -->
		<div class="main-container container-fluid">
		    <!-- breadcrumb -->
			<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
				<div class="col-xl-6">
					<h4 class="content-title mb-2">അനാധകർക്ക്പ്രതിമാസം 1500 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ് </h4>
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
                                            <th>Name</th>
                                            <th>Age </th>
                                            <th> Address </th>
                                            <th>Caste</th>
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
                <!-- /row -->
			</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    <!-- /main-content -->
<meta name="csrf_token" content="{{ csrf_token() }}" />
<script type="text/javascript">



        


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

			       	"url": "{{route('getUserchildFinanceList')}}",
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
                { data: 'name' },
                { data: 'age' },
				{ data: 'address' },
				{ data: 'caste' },
                { data: 'created_at', visible: false },

                { data: 'edit' }


			],
            "order": [1, 'desc'],
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
