@extends('layouts.adminLayout')

@section('content')

<div class="main-content">
  <div class="container-fluid">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box">
              <div class="row">
                <div class="col-12">
                  <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Show User
                      <a href="{{ route('users.index') }}" class="btn btn-icon waves-effect waves-light btn-info btn-sm">Back</a>
                    </h4>
                    <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                          <li class="breadcrumb-item active">View User</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">  
                      <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>Name:</th>
                            <th>{{ $user->name }}</th>
                          </tr>
                          <tr>
                            <th>Email:</th>
                            <th> {{ $user->email }}</th>
                          </tr>
                          <tr>
                            <th>Roles</th>
                            <th>
                              @if(!empty($user->getRoleNames()))

                                @foreach($user->getRoleNames() as $v)

                                    <label class="badge bg-danger">{{ $v }}</label>

                                @endforeach 
                              @endif
                            </th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>                                
    </div>                                
  </div>                                
</div>                                
@endsection