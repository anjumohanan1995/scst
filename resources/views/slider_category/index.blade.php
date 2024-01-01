@extends('layouts.app')

@section('content')

<div class="main-content">
    <!-- container -->
    <div class="container-fluid">

        <div class="breadcrumb-header justify-content-between">
            <div style="margin-top: 50px;">
                <h4 class="content-title mb-2">Slider Category  <a href="{{ route('slidercategories.create') }}" class="btn btn-primary btn-sm">Create</a></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a  href="javascript: void(0);">Sliders</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Slider Category</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="main-content-body">

            <div class="row row-sm">

                <div class="col-md-12 col-xl-12">

                    <div class="card overflow-hidden review-project">

                        <div class="card-body">
                            @if ($message = Session::get('success'))

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      {{ $message }}
                                </div>

                            @endif 
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_position}}</td>
                                            <td>@if($category->category_status==1)
                                            <span class="badge badge-pill badge-success badge-sm" style="color:black">{{__('Active')}}</span>
                                                @else
                                            <span class="badge badge-pill badge-danger badge-sm" style="color:black">{{__('Inactive')}}</span>
                                                @endif
                                            </td>
                                            <td>

                                                   <a class="btn btn-success" href="{{ route('slidercategories.edit',$category->id) }}">Manage Category</a>

                                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['slidercategories.destroy', $category->id],'style'=>'display:none']) !!}

                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                                    {!! Form::close() !!} --}}
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
