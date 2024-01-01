@extends('layouts.app')
@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <div class="main-content">
        <!-- container -->
        <div class="container-fluid">
            <div class="breadcrumb-header justify-content-between">
                <div>
                    <h4 class="content-title mb-2">News List</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">News</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">News List</li>
                        </ol>
                    </nav>
                </div>
                {{-- @if (Auth::user()->hasRole('admin')) --}}
                <a href="{{ route('newslist.create') }}"
                    class="float-right btn btn-icon waves-effect waves-light btn-warning btn-sm" data-toggle="tooltip"
                    data-placement="top" title="Create News"><i class="side-menu__icon fe fe-plus"> </i></a>
                {{-- @endif --}}
            </div>
            <div class="main-content-body">
                <div class="row row-sm">
                    <div class="col-md-12 col-xl-12">
                        <div class="card overflow-hidden review-project">
                            <div class="card-body">
                                @if (count($errors) > 0)
                                    <br>
                                    <div class="alert alert-danger">
                                        <strong>{{ __('Whoops') }}!</strong>
                                        {{ __('There were some problems with your input') }}.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        {{ $message }}
                                    </div>
                                @endif
                                <table id="instituteMembers" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Title</th>

                                            <th>PDF</th>
                                            <th>Date</th>
                                            {{-- @if (Auth::user()->hasRole('admin')) --}}
                                            <th>Order Change</th>
                                            <th>Action</th>
                                            <th>Featured</th>
                                            <th>Share</th>
                                            {{-- @endif --}}
                                            <!--  <th>Status</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($data as $key => $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>@php
                                                    $title = str_replace('_', ' ', @$user->title);
                                                    $title1 = strtoupper($title);
                                                @endphp

                                                    {{ @$title1 }}</td>

                                                <td>
                                                    <a href="{{ url('/') }}/admin/uploads/newslist/{{ @$user->image }}"
                                                        target="_blank" class=""><i
                                                            class="fa fa-file-pdf float-end"></i></a>
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime(@$user->date)) }}
                                                </td>
                                                {{-- @if (Auth::user()->hasRole('admin')) --}}
                                                <td><input type="number" name="order" id="order"
                                                        value="{{ @$user->display_order }}" class="form-control order">
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-wrap gap-2 clubbtn" style="width: 110px;">
                                                        <a href="{{ route('newslist.edit', $user->id) }}"><button
                                                                class="btn btn-primary btn-sm"> <i
                                                                    class="fas fa-edit"></i></button></a>
                                                        <!-- <a  href="{{ route('users.show', $user->id) }}">
                                        <button class="btn btn-primary btn-sm btn-icon"> <i class="fas fa-eye"></i></button>
                                      </a> -->
                                                        <form method="POST"
                                                            action="{{ route('newslist.destroy', $user->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit"
                                                                onclick="return confirm('Do you want to Continue?')"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input data-id="{{ $user->id }}" name="toggle-class"
                                                        id="toggle-class" class="toggle-class" type="checkbox"
                                                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                        data-on="Yes" data-off="No" {{ $user->status ? 'checked' : '' }}>
                                                </td>
                                                <td>
                                                    <a href="/sharenewsmail/{{ @$user->id }}"> <button type="submit"
                                                            onclick="return confirm('Do you want to share?')"
                                                            class="btn btn-primary btn-sm" value="Enroll">Share</button></a>
                                                </td>
                                                {{-- @endif --}}
                                                <!-- <td>
                                      <div class="form-check form-switch form-switch-sm" dir="ltr">

                                        <input  data-id="{{ $user->id }}"  class="form-check-input" type="checkbox" id="SwitchCheckSizesm" {{ $user->status ? 'checked' : '' }}>
                                      </div>

                                  </td> -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // code to read selected table row cell data (values).
            //$(document).on('','.order',function(){
            $(".toggle-class").change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/featured_status',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {

                        console.log(data.success)
                    }
                });
            });
            $(".order").change(function() {
                // get the current row
                //alert("hai");
                var currentRow = $(this).closest("tr");
                var new_id = currentRow.find("td:eq(0)").text(); // get current row 1st TD value
                var order_no = currentRow.find("td:eq(6) input[name='order']").val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/orderchange',
                    data: {
                        'new_id': new_id,
                        'order_no': order_no
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            // code to read selected table row cell data (values).
            //$(document).on('','.order',function(){
        });
    </script>
    </head>
@endsection
