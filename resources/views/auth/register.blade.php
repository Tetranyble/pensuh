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
{{--            @include('frontend.partials.header')--}}
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
                            <h2 class="mt-3 text-center" style="font-size: 1.875rem;">{{ __('Register') }}</h2>
                            <p class="text-center">First step to setting up your school in cloud</p>
                            <form class="mt-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="email">Email
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                            </label>
                                            <input name="email" class="form-control" id="email" type="text"
                                                   autocomplete="email" value="{{ old('email') }}"
                                                   placeholder="enter your email address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="name">Name
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                   autocomplete="name" value="{{ old('name') }}"
                                                   placeholder="firstname lastname">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group {{($errors->has('password')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="password">Password
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('password')}}</span></span>
                                            </label>
                                            <input id="password" type="password"
                                                   class="form-control" placeholder="enter your password"
                                                   name="password" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group {{($errors->has('password')) ? 'has-error' : ''}}">
                                            <label class="text-dark" for="password">{{ __('Confirm Password') }}
                                                <span class="required"><span  class="text-danger h6">{{$errors->first('password')}}</span></span>
                                            </label>
                                            <input id="password_confirmation" type="password"
                                                   class="form-control" placeholder=""
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class=" col-lg-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="vendor"
                                                       {{ old('vendor') ? 'checked' : '' }} data-toggle="tooltip" data-placement="top" title="Only check this box if you're a reseller">

                                                <label class="form-check-label" for="vendor">
                                                    {{ __('I\'m a vendor.') }} <small class="text-warning" style="font-size: .8rem;">Only check this box if you're a reseller</small>
                                                </label>
                                                <p>By creating an account, you agree with our <a class="text-danger" href="{{ route('legal') }}">Terms of Service.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-block btn-dark">{{ __('Sign Up') }}</button>
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
