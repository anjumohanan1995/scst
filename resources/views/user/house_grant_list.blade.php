@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-6">
                    <h4 class="content-title mb-2"> From the Scheduled Tribes Development Department for renovation of houses
                        and provision and completion of additional facilities
                        Application for financial assistance (പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും
                        അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും പൂർത്തീകരിക്കുന്നതിനുമുള്ള
                        ധനസഹായത്തിനുള്ള അപേക്ഷ)
                    </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> -
                                Application List</li>
                        </ol>
                    </nav>
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
                                <div class="row mb-3">

                                    {{-- <div class="col-md-1 col-6 text-center" id="refresh">
                                        <a href="/houseGrant/create">
                                            <div class="task-box primary  mb-0">
                                                <p class="mb-0 tx-12">Add </p>
                                                <h3 class="mb-0"><i class="fa fa-plus"></i></h3>
                                            </div>
                                        </a>
                                    </div> --}}

                                    <div class="col-md-1 col-6 text-center" id="refresh">
                                        <div class="task-box success  mb-0">
                                            <p class="mb-0 tx-12">Refresh </p>
                                            <h3 class="mb-0"><i class="fa fa-spinner"></i></h3>
                                        </div>
                                    </div>



                                </div>




                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>അപേക്ഷകന്റെ പേര് </th>
                                            <th>മേൽവിലാസം
                                            </th>
                                            <th>ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ
                                            </th>
                                            <th>ജാതി </th>
                                            <th>സ്ഥലം </th>
                                            <th>തീയതി </th>
                                            <th>സമയം</th>
                                            <th>ആക്ഷൻ</th>



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

    <script src="{{ asset('js/toastr.js') }}"></script>

    @if (session('status'))
        <script>
            toastr.success('{{ session('status') }}', 'Success!')
        </script>
    @endif
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

                    "url": "{{ route('getUserHouseGrantList') }}",
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
                        data: 'name'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'panchayath'
                    },
                    {
                        data: 'caste'
                    },
                    {
                        data: 'place'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'time'
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



        });
    </script>
@endsection
