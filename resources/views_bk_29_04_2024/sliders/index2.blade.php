@extends('layouts.adminLayout')


@section('content')



<div class="row">
<div class="col-sm-12">
<div class="card-box table-responsive">


@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif                                

 <h4 class="header-title" style="width:100%"><b>Slider Category</b>  <a href="{{ route('slidercategories.create') }}" class="btn btn-icon waves-effect waves-light btn-info pull-right" style="float: right;"> <i class=" ion ion-md-add-circle-outline" ></i> </a>
</h4>
                               
                              
                                <p class="sub-header">
                                  
                                </p>

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
                                                {{__('Active')}}
                                                @else
                                                {{__('Inactive')}}
                                                @endif
                                            </td>
<td>

       <a class="btn btn-success" href="{{ route('slidercategories.edit',$category->id) }}">Manage Category</a>

        {!! Form::open(['method' => 'DELETE','route' => ['slidercategories.destroy', $category->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}
</td>
                                            
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>













<p class="text-center text-primary"></p>

@endsection