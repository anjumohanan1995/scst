@extends('layouts.app')
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
                        <li class="breadcrumb-item active" aria-current="page">Create Gallery</li>
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
                                <form method="POST" action="{{ route('gallery_category.update', $gallery_category->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{ __('Gallery Name') }}:</strong>
                                                <input type="text" name="gallery_name" class="form-control"
                                                    value="{{ $gallery_category->name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{ __('GalleryStatus') }}:</strong>
                                                <select name="gallery_status" class="form-control">
                                                    <option value="1"
                                                        @if ($gallery_category->status == 1) selected @endif>
                                                        {{ __('Active') }}</option>
                                                    <option value="0"
                                                        @if ($gallery_category->status == 0) selected @endif>
                                                        {{ __('Inactive') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-primary">Update Gallery</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
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
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="cat_id" value="{{ $gallery_category->id }}">
                                <h4 class="header-title">
                                    <b>Add Gallery to {{ $gallery_category->name }}</b>
                                    <button type="button" class="btn btn-info btn-sm waves-effect waves-light pull-right"
                                        data-toggle="modal" data-target="#">
                                        <a href="{{ route('gallery.create', ['id' => $gallery_category->id]) }}">Add</a>
                                    </button>
                                    <!-- <button type="button" class="btn btn-info btn-sm waves-effect waves-light pull-right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-id="20" >Add </button> -->
                                </h4>
                                @if (count($gallery) == 0)
                                    <br>
                                    <div class="alert alert-warning text-white">
                                        <strong>{{ __('Whoops') }}!</strong>
                                        {{ __('No Gallery Added For this Category Yet') }}
                                    </div>
                                @else
                                    <div class="row">
                                        @foreach ($gallery as $galleries)
                                            <div class="col-xs-12 col-md-4">
                                                <input type="hidden" name="cid" class="form-control" id="title"
                                                    value="{{ $galleries->id }}">
                                                <!-- Card -->
                                                <article class="card animated fadeInLeft">
                                                    <img class="card-img-top img-responsive"
                                                        src="{{ url('/') }}/admin/uploads/gallery/{{ $galleries->file }}"
                                                        alt="seemindia" width="100%" />
                                                    <div class="card-block">
                                                        <h4 class="card-title">{!! $galleries->name !!}</h4>
                                                        <h6 class="text-muted">
                                                            @if ($galleries->status == 1)
                                                                <span
                                                                    class="badge badge-pill badge-success badge-sm">Active</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-pill badge-danger badge-sm">Inactive
                                                                </span>
                                                            @endif
                                                        </h6>
                                                        <a href="{{ route('gallery.edit', $galleries->id) }}"
                                                            class="btn btn-info btn-sm">View And Edit</a>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['gallery.destroy', $galleries->id],
                                                            'style' => 'display:inline',
                                                        ]) !!}

                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

                                                        {!! Form::close() !!}
                                                    </div>
                                                </article><!-- .end Card -->
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
