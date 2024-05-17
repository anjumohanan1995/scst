@extends('layouts.app_login')

@section('content')


<div class="my-auto page page-h"> 
    <div class="main-signin-wrapper"> 
        <div class="main-card-signin d-md-flex wd-100p"> 
            <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-black"> 
                <div class="my-auto authentication-pages"> 
                    <div>  <br><br><br><br>
                    <img src="{{ asset('images_new/logo.png')}}" alt="logo"  class="main-logo">
                        {{-- <img src="imgages_new/logo.png" class="main-logo" alt="logo">  --}}
                    </div> 
                </div> 
            </div> 
            
                <div class="p-5 wd-md-50p"> 
                    <div class="main-signin-header"> 
                        <h3 style="font-size: 18px;">Welcome to SC/ST</h3> 
                        <h4>Please sign in to continue</h4> 
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group"> 
                                <label>Email</label>
                                <input  type="text" class="form-control"  name="email" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-group"> 
                                <label>Password</label> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                            </button>
                        </form> 
                    </div>

                    
                </div> 
            
        </div> 
    </div> 
</div> 





<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
