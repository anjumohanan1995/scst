@extends('layouts.app')

@section('content')

  <div class="main-content">
    <!-- container -->
    <div class="container-fluid">
         <!-- main-conten<!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Create New Slider Category <a href="{{ route('slidercategories.index') }}" class="btn btn-primary btn-sm">Back</a></h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a  href="javascript: void(0);">Sliders</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Slider Category</li>
                </ol>
            </nav>
        </div>
                
      </div>
      <!-- /breadcrumb -->


    <!--   <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">  <a href="{{ route('slidercategories.index') }}" class="btn btn-primary btn-sm">Back</a>
            </h4>
                                    
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Sliders</a></li>
                  <li class="breadcrumb-item active">Create Slider Category</li>
              </ol>
            </div>
          </div>
        </div>
      </div> -->
      <div class="main-content-body">

        <div class="row row-sm">

          <div class="col-md-12 col-xl-12">

            <div class="card overflow-hidden review-project">

             <div class="card-body">

               
        
          
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
                    <form method="POST" action="{{route('slidercategories.store')}}">
                      @csrf


                        <div class="row">

                          <div class="col-md-6">

                            <div class="form-group">

                              <strong>{{__('Category Name')}}:</strong>

                              <input type="text" name="category_name" class="form-control" placeholder="Title For Slider">

                            </div>

                          </div>

                        </div>
                        <div class="row">

                          <div class="col-md-6">

                            <div class="form-group">

                              <strong>{{__('Position')}}:</strong>
                              <select name="category_position" class="form-control">
                                  <option value="">{{__('Select A Position')}}</option>
                                  <option value="top">{{__('Top')}}</option>
                                  <option value="bottom">{{__('Bottom')}}</option>
                                  <option value="initative">{{__('Initiative')}}</option>
                                  <option value="testimonial">{{__('Testimonial')}}</option>
                                  <option value="photos-and-videos">{{__('Photos & Videos')}}</option>
                              </select>

                              </div>

                          </div>

                        </div>
                        <div class="row">

                          <div class="col-md-6">

                            <div class="form-group">

                              <strong>{{__('Category Status')}}:</strong>
                              <select name="category_status" class="form-control">
                                <option value="1">{{__('Active')}}</option>
                                <option value="0">{{__('Inactive')}}</option>
                              </select>

                              </div>

                          </div>

                        </div>



                     
                     
                     
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">+ Create Slider Category</button>
                      </div>
                    </form>
                
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection