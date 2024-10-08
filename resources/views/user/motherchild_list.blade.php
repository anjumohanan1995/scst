@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-6">
                    <h4 class="content-title mb-2">ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം
                    </h4>

                </div>
                <div class="d-flex my-auto col-xl-6 pe-0">
                    <div class="card">
                        <div class="main-content-body main-content-body-mail card-body p-0">
                            <div class="card-body pt-2 pb-2">
                                <div class="row row-sm">
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <input class="form-control" placeholder="Name" type="text" name="name"
                                            id="name">
                                    </div>


                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <button class="btn ripple btn-success btn-block" type="submit"
                                            id="submit">Search</button>
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





                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Case Number</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Age/DOB </th>
                                            <th>Community / Caste </th>
                                            <th>Village</th>
                                            <th>Created Date</th>
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
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-content -->
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    {{-- <script src="{{ asset('js/toastr.js') }}"></script> --}}

    {{-- toster script starts here  --}}
    @if (session('status'))
        <script>
            toastr.success('{{ session('status') }}', 'Success!')
        </script>
    @endif
    {{-- toster script ends here  --}}

    <script type="text/javascript">
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

                    "url": "{{ route('getUserMotherChildList') }}",
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

                columns: [
                    {
                        data: 'sl_no'
                    },
                    { data: 'case_id' },
                    {
                        data: 'name'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'dob'
                    },
                    {
                        data: 'caste'
                    },
                    {
                        data: 'village'
                    },
                    {
                        data: 'created_at'
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
