@extends('layouts.app')
@section('content')
    <div class="main-content">
        <!-- container -->
        <div class="container-fluid">
            <div class="breadcrumb-header justify-content-between">
                <div>
                    <h4 class="content-title mb-2">Create News</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">News</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add News</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('newslist.index') }}"
                    class="float-right btn btn-icon waves-effect waves-light btn-warning btn-sm" data-toggle="tooltip"
                    data-placement="top" title="News list"> <i class="side-menu__icon fe fe-corner-down-left"> </i></a>
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
                                <div class="card-body">
                                    <form class="needs-validation" id="registrationForm"method="POST"
                                        action="{{ route('newslist.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">Title</div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Title" name="title" required>
                                        </div>
                                        <div class="form-group">Content</div>
                                        <div class="form-group">
                                            <textarea id="contentDetail" class="form-control ckeditor" style="height: 900px" name="content"></textarea>
                                        </div>
                                        <div class="form-group">Image</div>
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">Date</div>
                                        <div class="form-group">
                                            <input type="date" name="date" class="form-control"
                                                id="validationCustom01" placeholder="Date">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button class="btn btn-primary" type="submit">Create</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#phone").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $('.character_rmr').bind('keypress keyup blur', function() {
            var charReg = /^[a-zA-Z]+$/;
            var inputVal = $(this).val();
            var node = $(this);
            if (!charReg.test(inputVal)) {
                this.value = this.value.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/0-9]/g, '');
            } else {
                node.parent().parent().find(".special_charecter_warning").hide();
            }
        });
    </script>
@endsection
