

              <h4 class="header-title" >
                <b>Add Sliders to {{$gal->name}}</b> 
                <button type="button" class="btn btn-info btn-sm waves-effect waves-light pull-right" data-toggle="modal" data-target="#exampleModal">
                    Add
                </button>
                <!-- <button type="button" class="btn btn-info btn-sm waves-effect waves-light pull-right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-id="20" >Add </button> -->
              </h4>
            
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
