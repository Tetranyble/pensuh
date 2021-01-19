<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->

@extends('dashboard.layouts.dashboard')

@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
         style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
        <div class="auth-box row">
            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../assets/images/big/3.jpg);">
            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <div class="text-center">
                        <img src="../assets/images/big/icon.png" alt="pensuh image">
                    </div>
                    <h2 class="mt-3 text-center">{{ __('Sign In ') }}</h2>
                    <p class="text-center">please sign in with your credentials</p>
                    <form class="mt-4" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="uname">{{ __('Username/Email') }}</label>
                                    <input id="uname" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="enter your username">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="pwd">{{ __('Password') }}</label>
                                    <input id="pwd" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="enter your password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                            </div>
                            <div class="col-lg-12 text-center mt-5">
                                Don't have an account? <a href="#" class="text-danger">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
