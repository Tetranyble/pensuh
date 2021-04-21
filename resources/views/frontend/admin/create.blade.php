@extends('layouts.app')
@section('title', 'Admin Registration')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css') }}">
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/button.min.css') }}">--}}
    @parent
@endsection
@section('content')
    <div class="wrapper" style="background-color: #f2f7fd;">
        <!--responsive-menu end-->
        @include('frontend.partials.header')
        <section class="pager-section">
            <div class="container">
                <div class="pager-content text-center">
                    <h2>Administrator Registration</h2>
                    <ul>
                        <li><a href="{{ route('home') }}" title="">Home</a></li>
                        <li><span>About</span></li>
                    </ul>
                </div>
                <!--pager-content end-->
                <h2 class="page-titlee">{{ $home->school_name }}</h2>
            </div>
        </section>
        <!--pager-section end-->
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Let's Meet You</h2>

                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('firstname')) ? 'has-error' : ''}}">
                                                <label for="firstname">First Name
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('firstname')}}</span></span>
                                                </label>
                                                <input name="firstname" class="form-control" id="firstname" type="text"
                                                       placeholder="enter your firstname" value="{{ old('firstname') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('middlename')) ? 'has-error' : ''}}">
                                                <label for="middlename">Middle Name
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('middlename')}}</span></span>
                                                </label>
                                                <input name="middlename" class="form-control" id="middlename" type="text"
                                                       placeholder="enter your middle name" value="{{ old('middlename') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('lastname')) ? 'has-error' : ''}}">
                                                <label for="lastname">Last Name
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('lastname')}}</span></span>
                                                </label>
                                                <input name="lastname" class="form-control" id="lastname" type="text"
                                                       placeholder="enter your lastname" value="{{ old('lastname') }}">
                                            </div>
                                        </div>
{{--                                        added for brevity--}}
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                                <label for="email">Email
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                                </label>
                                                <input name="email" class="form-control" id="email" type="text"
                                                       placeholder="enter your school email" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('nationality_id')) ? 'has-error' : ''}}">
                                                <label for="nationality">Nationality
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('nationality_id')}}</span></span>
                                                </label>
                                                <select name="nationality_id" class="form-control" id="nationality_id" type="text">
                                                    <option>Nationality</option>
                                                    @forelse($nationalities as $nationality)
                                                        <option {{ old('nationality_id') == $nationality->id ? "selected" : "" }} value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                                    @empty
                                                        <option>No data</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('blood_group_id')) ? 'has-error' : ''}}">
                                                <label for="blood_group_id">Blood Group
                                                    <span class="text-danger"><span  class="text-danger h6">{{$errors->first('blood_group_id')}}</span></span>
                                                </label>
                                                <select name="blood_group_id" class="form-control" id="blood_group_id" type="text">
                                                    <option>Blood Group</option>
                                                    @forelse($bloods as $blood)
                                                        <option {{ old('blood_group_id') == $blood->id ? "selected" : "" }} value="{{ $blood->id }}">{{ $blood->name }}</option>
                                                        @empty
                                                        <option>No data</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('gender_id')) ? 'has-error' : ''}}">
                                                <label for="gender_id">Blood Group
                                                    <span class="text-danger"><span  class="text-danger h6">{{$errors->first('gender_id')}}</span></span>
                                                </label>
                                                <select name="gender_id" class="form-control" id="gender_id" type="text">
                                                    @forelse($genders as $gender)
                                                    <option {{ old('gender_id') == $gender->id ? "selected" : "" }} value="{{ $gender->id }}">{{ $gender->name }}</option>
                                                    @empty
                                                        <option>No data</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('phone')) ? 'has-error' : ''}}">
                                                <label for="phone">Phone
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('phone')}}</span></span>
                                                </label>
                                                <input name="phone" class="form-control" id="phone" type="text"
                                                       placeholder="enter your mobile number" value="{{ old('phone') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('date_of_birth')) ? 'has-error' : ''}}">
                                                <label for="date_of_birth">Date of Birth
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('date_of_birth')}}</span></span>
                                                </label>
                                                <input name="date_of_birth" class="form-control" id="date_of_birth" type="date"
                                                       placeholder="enter your date of birth" value="{{ old('date_of_birth') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('about')) ? 'has-error' : ''}}">
                                                <label for="about">Your Headline
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('about')}}</span></span>
                                                </label>
                                                <input name="about" class="form-control" id="about" type="text"
                                                       placeholder="tell us about yourself" value="{{ old('about') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('address')) ? 'has-error' : ''}}">
                                                <label for="address">Address
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('address')}}</span></span>
                                                </label>
                                                <input name="address" class="form-control" id="address" type="text"
                                                       placeholder="enter where you address" value="{{ old('about') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Your profile photo
                                                    <span class="text-danger"><span  class="text-danger h6">{{$errors->first('photo')}}</span></span>
                                                </label>
                                                <div class="input-group mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="photo" id="photo">
                                                        <label class="custom-file-label" for="photo"></label>
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
        </section>
            <br>
            <section class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">We're Social Too. Let's Connect</h2>

                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('twitter')) ? 'has-error' : ''}}">
                                                <label for="twitter">Twitter
                                                    <span class="text-danger"><span  class="text-danger h6">{{$errors->first('twitter')}}</span></span>
                                                </label>
                                                <input name="twitter" class="form-control" id="twitter" type="text"
                                                       placeholder="enter your twitter handle" value="{{ old('twitter') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('facebook')) ? 'has-error' : ''}}">
                                                <label for="facebook">Facebook
                                                    <span class="text-danger"><span  class="text-danger h6">{{$errors->first('facebook')}}</span></span>
                                                </label>
                                                <input name="facebook" class="form-control" id="facebook" type="text"
                                                       placeholder="enter your facebook handle" value="{{ old('facebook') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('linkedin')) ? 'has-error' : ''}}">
                                                <label for="linkedin">LinkedIn
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('linkedin')}}</span></span>
                                                </label>
                                                <input name="linkedin" class="form-control" id="linkedin" type="text"
                                                       placeholder="enter your linkedin handle" value="{{ old('linkedin') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('instagram')) ? 'has-error' : ''}}">
                                                <label for="instagram">Instagram
                                                    <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('instagram')}}</span></span>
                                                </label>
                                                <input name="instagram" class="form-control" id="instagram" type="text"
                                                       placeholder="enter your instagram handle" value="{{ old('instagram') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
            <section class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-danger">Ok. Lets get serious.</h2>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('password')) ? 'has-error' : ''}}">
                                                <label for="password">Password
                                                    <span class="text-danger"><span  class="text-danger h6">{{$errors->first('password')}}</span></span>
                                                </label>
                                                <input placeholder="enter password" id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for="password-confirm">Confirm Password
                                                    <span class="text-danger"><span  class="text-danger h6">{{$errors->first('facebook')}}</span></span>
                                                </label>
                                                <input placeholder="confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    @include('frontend.partials.footer')
    <!--newsletter-sec end-->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/js/bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/button.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{--    <script async src="http://www.googletagmanager.com/gtag/js2c98?id=UA-180910402-1"></script>--}}
    {{--    <script>window.dataLayer = window.dataLayer || [];--}}
    {{--        function gtag() { dataLayer.push(arguments); }--}}
    {{--        gtag('js', new Date());--}}
    {{--        gtag('config', 'UA-180910402-1');</script>--}}
    @parent
@endsection

