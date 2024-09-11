@extends('layouts.app_login')

@section('content')
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional jQuery (required for Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="my-auto page page-h"> 
    <div class="main-signin-wrapper"> 
        <div class="main-card-signin d-md-flex wd-100p"> 
            <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-black"> 
                <div class="my-auto authentication-pages"> 
                    <div>  
                        <img src="{{ asset('images_new/logo.png') }}" alt="logo" class="main-logo" style="margin-top: 100px;">
                    </div> 
                </div> 
            </div> 
        
            
            <div class="p-5 wd-md-50p"> 
                <div class="main-signin-header"> 
                    <h3 style="font-size: 18px;">Welcome to SC/ST</h3> 
                    <h4>Please sign in to continue</h4> 
                    
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link @if($errors->has('mobile')) active @endif" id="userLogin-tab" data-toggle="tab" href="#userLogin" role="tab" aria-controls="userLogin" aria-selected="{{ $errors->has('mobile') ? 'true' : 'false' }}">User Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($errors->has('email') || $errors->has('password')) active @endif" id="adminLogin-tab" data-toggle="tab" href="#adminLogin" role="tab" aria-controls="adminLogin" aria-selected="{{ $errors->has('email') || $errors->has('password') ? 'true' : 'false' }}">Admin Login</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- OTP Login Form -->
                        <div id="userLogin" class="tab-pane fade @if($errors->has('mobile')) show active @endif" role="tabpanel" aria-labelledby="userLogin-tab">
                            <form method="POST" action="{{ route('otp.send') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" style="color: black;" required autofocus>
        
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Send OTP</button>
                            </form>
                        </div>
                        
                        <!-- Admin Login Form -->
                        <div id="adminLogin" class="tab-pane fade @if($errors->has('email') || $errors->has('password')) show active @endif" role="tabpanel" aria-labelledby="adminLogin-tab">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" style="color: black;" required>
                            
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" style="color: black;" required>
                            
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div> 
</div> 

<!-- Automatically Activate the Correct Tab Based on Errors -->
<script>
    $(document).ready(function() {
        var hasMobileError = "{{ $errors->has('mobile') }}";
        var hasEmailError = "{{ $errors->has('email') || $errors->has('password') }}";

        if (hasMobileError) {
            $('#userLogin-tab').tab('show');
        } else if (hasEmailError) {
            $('#adminLogin-tab').tab('show');
        }
    });
</script>
@endsection
