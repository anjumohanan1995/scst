@extends('layouts.app')


@section('content')

<div class="row">






<div class="col-sm-12">
   <div class="card-box table-responsive">
        <h4 class="header-title" style="width:100%">
        <b>Create New Slider Category</b>  <a href="{{ route('slidercategories.index') }}" class="btn btn-icon waves-effect waves-light btn-info pull-right" style="float: right;"> <i class="ion ion-md-arrow-back " ></i> </a>
        </h4>
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

        <div class="form-group">

            <strong>{{__('Category Name')}}:</strong>

           <input type="text" name="category_name" class="form-control" placeholder="Title For Slider">

        </div>
        <div class="form-group">

            <strong>{{__('Position')}}:</strong>

            <select name="category_position" class="form-control">
                <option value="">{{__('Select A Position')}}</option>
                <option value="top">{{__('Top')}}</option>
                <option value="bottom">{{__('Bottom')}}</option>
                <option value="middle">{{__('Middle')}}</option>
            </select>

        </div>
        
      

        <div class="form-group">

            <strong>{{__('Category Status')}}:</strong>

            <select name="category_status" class="form-control">
                <option value="1">{{__('Active')}}</option>
                <option value="0">{{__('Inactive')}}</option>
            </select>

        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">+ Create Slider Category</button>

        </div>

  </div>
 </div>
</div>

@endsection