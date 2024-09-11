@extends('layouts.app_login')

@section('content')
<div class="my-auto page page-h"> 
    <div class="main-signin-wrapper"> 
        <div class="main-card-signin d-md-flex wd-100p"> 
            <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-black"> 
                <div class="my-auto authentication-pages"> 
                    <div>  
                        <img src="{{ asset('images_new/logo.png') }}" alt="logo" class="main-logo">
                    </div> 
                </div> 
            </div> 

            
            <div class="p-5 wd-md-50p"> 
                <div class="main-signin-header"> 
                    <h3 style="font-size: 18px;">OTP Verification</h3> 
                    <h4>Please enter the OTP sent to your mobile number</h4> 
                    <form method="POST" action="{{ route('otp.verify.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label>OTP</label>
                            <input type="text" name="otp" class="form-control" required autofocus>
    
                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Verify OTP</button>
                    </form>
                </div>
            </div> 
        </div> 
    </div> 
</div> 
@endsection
