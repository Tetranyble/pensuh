@extends('layouts.app')
@section('title', 'Login')
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
                                    <img src="../assets/images/big/icon.png" alt="wrapkit">
                                </div>
                                <h2 class="mt-3 text-center" style="font-size: 1.875rem;">{{ __('Sign In') }}</h2>
                                <p class="text-center">Enter your email address and password to access admin panel.</p>
                                <form class="mt-4" method="POST" action="{{ route('login') }}">
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
                                            <div class="form-group {{($errors->has('password')) ? 'has-error' : ''}}">
                                                <label class="text-dark" for="pwd">Password
                                                    <span class="required"><span  class="text-danger h6">{{$errors->first('password')}}</span></span>
                                                </label>
                                                <input id="password" type="password"
                                                       class="form-control" placeholder="enter your password"
                                                       name="password" required autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class=" col-lg-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
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
    {{--    <script src="{{ asset('assets/js/button.min.js') }}"></script>--}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{--    <script async src="http://www.googletagmanager.com/gtag/js2c98?id=UA-180910402-1"></script>--}}
    {{--    <script>window.dataLayer = window.dataLayer || [];--}}
    {{--        function gtag() { dataLayer.push(arguments); }--}}
    {{--        gtag('js', new Date());--}}
    {{--        gtag('config', 'UA-180910402-1');</script>--}}
    @parent
@endsection
