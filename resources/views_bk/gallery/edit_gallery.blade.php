@extends('layouts.adminLayout')
@section('content')
    <div class="main-content">
        <!-- container -->
        <div class="container-fluid">
            <div class="breadcrumb-header justify-content-between">
                <h4 class="content-title mb-2">Manage Gallery <a href="{{ route('gallery_category.index') }}"
                        class="btn btn-primary btn-sm">Back</a></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Gallery</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Gallery</li>
                    </ol>
                </nav>
            </div>
            <div class="main-content-body">
                <div class="row row-sm">
                    <div class="col-md-12 col-xl-12">
                        <div class="card overflow-hidden review-project">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            {{ $message }}
                                        </div>
                                    @endif
                                </div>
                                <form method="POST" action="{{ route('gallery.update', $gal->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <strong>{{ __('Gallery Category ') }}:</strong>
                                        <select name="slider_category_id" class="form-control">
                                            @foreach ($gal_cat as $gallery)
                                                <option value="{{ $gallery->id }}">{{ __($gallery->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ __('Name') }}:</strong>
                                        <input type="text" name="name" class="form-control contentDetail"
                                            value="{{ $gal->name }}">
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ __('Gallery Status') }}:</strong>
                                        <select name="gallery_status" class="form-control" value="{{ $gal->status }}">
                                            <option value="1">{{ __('Active') }}</option>
                                            <option value="0">{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ __('Image') }}[Prefered Size(1500px:720px )(for testimonial
                                            65px:65px)]:</strong>
                                        <input type="file" name="image" class="form-control"
                                            value="{{ $gal->file }}" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        tinymce.init({
                            selector: '.contentDetail'
                        });
                    </script>
                @endsection
