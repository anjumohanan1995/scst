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
              <li class="breadcrumb-item active" aria-current="page">Create Slider Category</li>
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
              <form method="POST" action="{{ route('slidercategories.update',$category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <strong>{{__('Category Name')}}:</strong>
                      <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <strong>{{__('Position')}}:</strong>
                      <select name="category_postion" class="form-control">
                          <option value="top" @if($category->category_position=='top') selected @endif>{{__('Top')}}</option>
                          <option value="bottom" @if($category->category_position=='bottom') selected @endif>{{__('Bottom')}}</option>
                          <option value="initiative" @if($category->category_position=='initiative') selected @endif>{{__('Initiative')}}</option>
                          <option value="testimonial" @if($category->category_position=='testimonial') selected @endif>{{__('Testimonial')}}</option>
                          <option value="photos-and-videos" @if($category->category_position=='photos-and-videos') selected @endif>{{__('Photos & Videos')}}</option>
                      </select>

                    </div>
                  </div>
                </div>
      
    
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <strong>{{__('Category Status')}}:</strong>
                      <select name="category_status" class="form-control">
                          <option value="1" @if($category->category_status==1) selected @endif>{{__('Active')}}</option>
                          <option value="0" @if($category->category_status==0) selected @endif>{{__('Inactive')}}</option>
                      </select>
                    </div>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Update Slider Category</button>
                  </div>
                </div>
              </form>

              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  @if (count($errors) > 0)
                    <br>
                    <div class="alert alert-danger">

                      <strong>{{__('Whoops')}}!</strong> {{__('There were some problems with your input')}}.<br><br>

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
              <h4 class="header-title" >
                <b>Add Sliders to {{$category->category_name}}</b> 
                <button type="button" class="btn btn-info btn-sm waves-effect waves-light pull-right" data-toggle="modal" data-target="#exampleModal">
                <a href="{{ route('slider.createSlider',['id' => $category->id]) }}">Add</a>
                </button>
                <!-- <button type="button" class="btn btn-info btn-sm waves-effect waves-light pull-right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-id="20" >Add </button> -->
              </h4>
              <form method="post" action="{{route('sliders.store')}}" id="form" enctype="multipart/form-data">
              @csrf
                <!-- Modal -->
               <!--  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> -->
              <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    	<div class="alert alert-danger" style="display:none"></div>
                      <div class="modal-header">
                        <h5 class="modal-title">Add Slider</h5>
                         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                          </button>
                       <!--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                      </div>
                      <div class="modal-body">
                        <div class="mb-12 row">
                         

                              <strong>{{__('Title')}}:</strong>

                             <input type="text" name="title" class="form-control contentDetail" id="title" value=" @if($category->category_position=='testimonial') <h6>[Name Of Person]<span>[Designation]</span></h6>@endif @if($category->category_position=='photos-and-videos') <h2>Enter Title For Photos And Videos</h2>@endif">
                             <input type="hidden" name="cid" class="form-control" id="title" value="{{$category->id}}">
                             <input type="hidden" name="cposition" class="form-control" id="title" value="{{$category->category_position}}">
                             
                        
                        </div>
                        <div class="mb-12 row">
                          
                              <strong>{{__('Description')}}:</strong>

                              <textarea name="description" class="form-control contentDetail" id="description">
                              @if($category->category_position=='testimonial')
                              <h5>Hi,Demo content for testimonial description</h5>
                              @endif
                              @if($category->category_position=='photos-and-videos')
                              <p>Enter Deatils For Photos and Videos</p>
                              @endif
                              </textarea>
                          
                        </div>
                        <div class="mb-12 row">
                       

                              <strong>{{__('Button Text')}}:</strong>

                              <input type="text" name="button_text" class="form-control" placeholder="Button Text For Slider">

                         
                        </div>
                        <div class="mb-12 row">
                         

                              <strong>{{__('Button Url')}}:</strong>

                              <input type="text" name="button_url" class="form-control" placeholder="Button Url For Slider" id="button_url">

                         
                        </div>
                        <div class="mb-12 row">
                         

                              <strong>{{__('Button Two Text')}}:</strong>

                              <input type="text" name="button_one_text" class="form-control" placeholder="Button Text For Slider">

                         
                        </div>
                        <div class="mb-12 row">
                         

                              <strong>{{__('Button Two Url')}}:</strong>

                              <input type="text" name="button_one_url" class="form-control" placeholder="Button Url For Slider" id="button_url">

                          
                        </div>
                        <div class="mb-12 row">
                         

                            <strong>{{__('Slider Style')}}:</strong>

                            <select name="slider_style" class="form-control" id="slider_style">
                                <option value="normal">{{__('Normal')}}</option>
                            </select>

                          
                        </div>
                        <div class="mb-12 row">
                          

                              <strong>{{__('Slider Status')}}:</strong>

                              <select name="slider_status" class="form-control" id="slider_status">
                                  <option value="1">{{__('Active')}}</option>
                                  <option value="0">{{__('Inactive')}}</option>
                              </select>

                         
                        </div>
                        <div class="mb-12 row">
                          

                              <strong>{{__('Slider Background Color')}}:</strong>

                              <input type="color" name="color" class="form-control"  id="color">

                         
                        </div>
                        <div class="mb-12 row">

                            <strong>{{__('Image')}}[Prefered Size(1500px:720px)(for testimonial 65px:65px)]:</strong>

                            <input type="file" name="image" class="form-control" required>

                        </div>
                      </div>
                      <div class="modal-footer">
                      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-success" id="ajaxSubmit">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              @if(count($sliders)==0)
              <br>
              <div class="alert alert-warning text-white">
              <strong>{{__('Whoops')}}!</strong> {{__('No Sliders Added For this Category Yet')}}
              </div>
              @else
              <div class="row">
                  @foreach($sliders as $slider)
                  <div class="col-xs-12 col-md-4">
                    <!-- Card -->
                    <article class="card animated fadeInLeft">
                      <img class="card-img-top img-responsive" src="{{url('/')}}/admin/uploads/thumbnails/{{$slider->image}}" alt="SPD" width="100%" />
                      <div class="card-block">
                        <h4 class="card-title">{!! $slider->title !!}</h4>
                        <h6 class="text-muted">@if($slider->slider_status==1) <span class="badge badge-pill badge-success badge-sm">Active</span> @else <span class="badge badge-pill badge-danger badge-sm">Inactive </span>@endif</h6>
                        <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-info btn-sm">View And Edit</a>

                      {!! Form::open(['method' => 'DELETE','route' => ['sliders.destroy', $slider->id],'style'=>'display:inline']) !!}

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