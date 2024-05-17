@extends('layouts.app')
@section('content')

    <div class="main-content">
        <!-- container -->
        <div class="container-fluid">
            <div class="breadcrumb-header justify-content-between">
                <div>
                    <h4 class="content-title mb-2">Edit News</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">News</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit News</li>
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
                                <form class="needs-validation" id="registrationForm" method="POST"
                                    action="{{ route('newslist.update', $news->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">Title</div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Title" name="title"
                                            value="{{ $news->title }}" required>
                                    </div>
                                    <div class="form-group">Content</div>
                                    <div class="form-group">
                                        <textarea id="contentDetail" class="form-control ckeditor" style="height: 900px" name="content">{{ $news->content }}</textarea>
                                    </div>
                                    <div class="form-group">Image</div>
                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="form-group">Date</div>
                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control" id="validationCustom01"
                                            placeholder="Date" value="{{ $news->date }}">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
