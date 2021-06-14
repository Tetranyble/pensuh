@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')
@section('title', 'Register')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css') }}">
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/button.min.css') }}">--}}
    @parent
@endsection
@section('content')
    <div class="wrapper">
        <div class="main-section">
            @include('frontend.partials.header')
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
                 style="background:url('{{asset('assets/images/big/auth-bg.jpg')}}') no-repeat center center;padding: 60px 20px 60px 20px">
                <div class="auth-box row">
                    <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url('{{ asset('assets/images/big/pensuh_login.png') }}');">
                    </div>
                    <div class="col-lg-5 col-md-7 bg-white">
                        <div class="p-3">
                            <div class="text-center">
                                <img src="{{ asset('../assets/images/big/icon.png') }}" alt="wrapkit">
                            </div>
                            <h2 class="mt-3 text-center" style="font-size: 1.875rem;">{{ __('Sign Up') }}</h2>
                            <p class="text-center">Enter your email address and password to access admin panel.</p>
                            <form class="mt-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="email">Email
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                            </label>
                                            <input name="email" class="form-control" id="email" type="text"
                                                   placeholder="enter your username">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="form-group {{($errors->has('firstname')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="firstname">Email
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('firstname')}}</span></span>
                                            </label>
                                            <input name="firstname" class="form-control" id="firstname" type="text"
                                                   placeholder="enter your first name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="form-group {{($errors->has('lastname')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="lastname">Email
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('lastname')}}</span></span>
                                            </label>
                                            <input name="lastname" class="form-control" id="lastname" type="text"
                                                   placeholder="enter your lastname">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group {{($errors->has('firstname')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="firstname">Password
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('firstname')}}</span></span>
                                            </label>
                                            <input id="password" type="text"
                                                   class="form-control" placeholder="enter your password"
                                                   name="firstname" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-block btn-dark">{{ __('Sign In') }}</button>
                                    </div>
                                    <div class="col-lg-12 text-center mt-5">
                                        Forgot Your Password?
                                        @if (Route::has('password.request'))
                                            <a class="text-danger" href="{{ route('password.request') }}">
                                                {{ __('Recover') }}
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.partials.footer')
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/js/bundle.min.js') }}"></script>

    @parent
@endsection
