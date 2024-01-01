@extends('layouts.app')

@section('content')


<div class="main-content">
  <!-- container -->
  <div class="container-fluid">
    <div class="breadcrumb-header justify-content-between">
      <h4 class="content-title mb-2">Manage Slider Category  <a href="{{ route('slidercategories.index') }}" class="btn btn-primary btn-sm">Back</a></h4>
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
                  <a  href="javascript: void(0);">Sliders</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create Sliders</li>
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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ $message }}
                  </div>
                @endif 
              </div>
    <form method="POST" action="{{route('sliders.store',['id' =>  Request::get('id') ])}}" enctype="multipart/form-data">
    @csrf
<input type="hidden" name="sid" value="@php echo $id; @endphp">
        <div class="form-group">

            <strong>{{__('Title')}}:</strong>

           <input type="text" name="title" class="form-control contentDetail" placeholder="Title For Slider" >

        </div>
        <div class="form-group">
            <strong>{{__('Description')}}:</strong>

            <textarea name="description" class="form-control contentDetail"></textarea>
        </div>
        <div class="form-group">

            <strong>{{__('Slider Type')}}:</strong>

            <select name="slider_type" class="form-control">
                <option value="">{{__('Select A slider Type')}}</option>
                <option value="top">{{__('Top')}}</option>
                <option value="bottom">{{__('Bottom')}}</option>
            </select>

        </div>
      
        <div class="form-group">

            <strong>{{__('Button Text')}}:</strong>

            <input type="text" name="button_text" class="form-control" placeholder="Button Text For Slider">

        </div>
        <div class="form-group">

            <strong>{{__('Button Url')}}:</strong>

            <input type="text" name="button_url" class="form-control" placeholder="Button Url For Slider">

        </div>
         <div class="form-group">

            <strong>{{__('Slider Style')}}:</strong>

            <select name="slider_style" class="form-control">
                <option value="normal">{{__('Normal')}}</option>
            </select>

        </div>

        <div class="form-group">

            <strong>{{__('Slider Status')}}:</strong>

            <select name="slider_status" class="form-control">
                <option value="1">{{__('Active')}}</option>
                <option value="0">{{__('Inactive')}}</option>
            </select>

        </div>

          <div class="form-group">

            <strong>{{__('Image')}}[Prefered Size(1500px:720px )(for testimonial 65px:65px)]:</strong>

            <input type="file" name="image" class="form-control" required>

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