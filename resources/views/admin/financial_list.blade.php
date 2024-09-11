@extends('layouts.app')
@section('content')
    <style>
        .tabs-menu1 ul li a {
            padding: 10px 20px 11px 20px;
            display: block;
            color: #282f53;
        }
    </style>
    <!-- main-content -->
    <div class="main-content app-content">


        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-12">
                    <h4 class="content-title mb-2">മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക്
                        പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും സാമ്പത്തിക സഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷഫോറം</h4>
                </div>
            </div>


            <!-- /breadcrumb -->
            <!-- main-content-body -->
            <div class="main-content-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="fa fa-window-close"></i></button>
                        {{ $message }}
                    </div>
                @endif

                <!-- row -->
                <div class="row row-sm">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
                        <div class="card">
                            <div class="card-body  table-new">
                                <div id="success_message" class="ajax_response" style="display: none;"></div>
                                {{-- <div>
                                    <form id="filterForm">
                                        <div class="form-row">
                                            <!-- Date Filter -->
                                            <div class="form-group col-md-4">
                                                <label for="filterfromDate">From Date</label>
                                                <input type="date" class="form-control" id="filterfromDate" name="filterfromDate">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="filtertoDate">To Date</label>
                                                <input type="date" class="form-control" id="filtertoDate" name="filtertoDate">
                                            </div>
                                            <!-- Case Number Filter -->
                                            <div class="form-group col-md-4">
                                                <label for="filterCaseNumber">Case Number</label>
                                                <input type="text" class="form-control" id="filterCaseNumber" name="filterCaseNumber" placeholder="Enter Case Number">
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                                    </form>
                                </div> --}}
                                

                                <div class="panel panel-primary">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <ul class="nav panel-tabs">
                                                <li><a href="#tabNew" class="active" data-bs-toggle="tab"
                                                        data-bs-target="#tabNew">New</a></li>
                                                <li><a href="#tabReturned" data-bs-toggle="tab"
                                                        data-bs-target="#tabReturned" onclick="ownList();">Returned</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabNew">
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Case Number</th>
                                                                <th>Husband Name </th>
                                                                <th>Wife Name </th>
                                                                {{-- <th>Marriage Registration Details </th>
                                                            <th>Marriage Certification </th> --}}
                                                                <th>Husband Caste</th>
                                                                <th>Wife Caste</th>
                                                                <th>Date & Time</th>
                                                                <th>Applied Date</th>
                                                                <th>Action</th>



                                                            </tr>
                                                        </thead>

                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabReturned">
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-striped table-bordered"
                                                        cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Case Number</th>
                                                                <th>Husband Name </th>
                                                                <th>Wife Name </th>
                                                                <th>Husband Caste</th>
                                                                <th>Wife Caste</th>
                                                                <th>Date & Time</th>
                                                                <th>Applied Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
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
                                                <h6 class="modal-title">Are you sure?</h6><button aria-label="Close"
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
                                                <h6 class="modal-title">Are you sure to reject this Application?</h6><button
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
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <script src="{{ asset('js/toastr.js') }}"></script>

    <script type="text/javascript">
        $(document).on("click", ".approveItem", function() {
            var id = $(this).attr('data-id');
            $('#requestId').val($(this).attr('data-id'));
            $('#approve-popup').modal('show');


        });
        $(document).on("click", ".rejectItem", function() {
            $('#requestId2').val($(this).attr('data-id'));
            $('#rejection-popup').modal('show');
        });

        function approve() {
            var reason = $('#approve_reason').val();

            var reqId = $('#requestId').val();

            $.ajax({
                url: "{{ route('financial-teo.approve') }}",
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

                    url: "{{ route('financial-teo.reject') }}",
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

        $(document).on("click", ".deleteItem", function() {

            var id = $(this).attr('data-id');
            $('#requestId').val($(this).attr('data-id'));
            $('#confirmation-popup').modal('show');
        });


        function ownRequest() {

            var reqId = $('#requestId').val();
            console.log(reqId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: '{{ url('users/delete') }}' + '/' + reqId,
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
                    }, 2000);

                    $('#example').DataTable().ajax.reload();



                }
            })
        }



        $(document).ready(function() {

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

                    "url": "{{ route('getCoupleList') }}",
                    // "data": { mobile: $("#mobile").val()}
                    "data": function(d) {
                        return $.extend({}, d, {
                            "mobile": $("#mobile").val(),
                            "name": $("#name").val(),
                            "role": $("#role").val(),
                            //"from_date": $("#datepicker").val(),
                            "delete_ctm": $("#delete_ctm").val(),
                            // Pass the new filter values
                            // "filterfromDate": $("#filterfromDate").val(),
                            // "filtertoDate": $("#filtertoDate").val(),
                            // "filterCaseNumber": $("#filterCaseNumber").val(),


                        });
                    }
                },

                columns: [{
                        data: 'sl_no'
                    },
                    {
                        data: 'case_id'
                    },
                    {
                        data: 'husband_name'
                    },
                    {
                        data: 'wife_name'
                    },
                    //{ data: 'register_details' },
                    //{ data: 'certificate_details' },
                    {
                        data: 'husband_caste'
                    },
                    {
                        data: 'wife_caste'
                    },
                    {
                        data: 'created_at',
                        visible: false
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'edit'
                    }


                ],
                "order": [6, 'desc'],
                'ordering': true,
            });



            table.draw();

            // Handle filter form submission
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                table.ajax.reload(); // Reload the DataTable with new filter values
            });

            $('#submit').click(function() {

                table.draw();
            });
            $('#refresh').click(function() {
                $("#delete_ctm").val('');
                table.draw();
            });




            $('#delete').click(function() {
                $("#delete_ctm").val(1);
                table.draw();
            });





            // DataTable


        });


        $(document).ready(function() {

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

                    "url": "{{ route('getCoupleReturnList') }}",
                    // "data": { mobile: $("#mobile").val()}
                    "data": function(d) {
                        return $.extend({}, d, {
                            "mobile": $("#mobile").val(),
                            "name": $("#name").val(),
                            "role": $("#role").val(),
                            //"from_date": $("#datepicker").val(),
                            "delete_ctm": $("#delete_ctm").val(),
                        });
                    }
                },

                columns: [{
                        data: 'sl_no'
                    },
                    {
                        data: 'case_id'
                    },
                    {
                        data: 'husband_name'
                    },
                    {
                        data: 'wife_name'
                    },
                    //{ data: 'register_details' },
                    //{ data: 'certificate_details' },
                    {
                        data: 'husband_caste'
                    },
                    {
                        data: 'wife_caste'
                    },
                    {
                        data: 'created_at',
                        visible: false
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'edit'
                    }


                ],
                "order": [6, 'desc'],
                'ordering': true,
            });



            table.draw();

            $('#submit').click(function() {

                table.draw();
            });
            $('#refresh').click(function() {
                $("#delete_ctm").val('');
                table.draw();
            });




            $('#delete').click(function() {
                $("#delete_ctm").val(1);
                table.draw();
            });





            // DataTable


        });
    </script>
@endsection
