@extends('layouts.app')
@section('title', 'About Us')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/button.min.css') }}">--}}
    @parent
@endsection
@section('content')
    <div class="wrapper">
        <!--responsive-menu end-->
        @include('frontend.partials.header')
        <section class="pager-section">
            <div class="container">
                <div class="pager-content text-center">
                    <h2>About Us</h2>
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
        <section class="about-page-content">
            <div class="container">
                <div class="abt-page-row">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="section-title">
                                <h2>{{ $home->school_welcome_header }}<br><span></span></h2>
                                <p class="mw-100">{{ $home->school_welcome_body }}</p><a href="{{ route('classes') }}" title="" class="btn-default">Classes <i
                                        class="fa fa-long-arrow-alt-right"></i></a>
                            </div>
                            <!--section-title end-->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="avt-img"><img src="{{ asset($home->about_image) }}" alt="{{ $home->school_welcome_header }}"></div>
                            <!--avt-img end-->
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="avt-img"><img src="{{ asset($home->mission_image) }}" alt="{{ $home->mission_header }}"></div>
                            <!--avt-img end-->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="act-inffo"><span>ABOUT US</span>
                                <h2>{{ $home->mission_header }}</h2>
                                {!! $home->mission_body !!}

                            </div>
                            <!--act-inffo end-->
                        </div>
                    </div>
                </div>
                <!--abt-page-row end-->
            </div>
        </section>
        <!--about-page-content end-->
        <section class="benifit-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title">
                            <h2>{{ $home->benefit_header }}</h2>
                            <p>{{ $home->benefit_body }}</p>
                            <a href="{{ route('contact') }}" title="" class="btn-default">Contacts <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                        </div>
                        <!--section-title end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="about-us-section p-0">
                            <div class="about-sec">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="abt-col"><img src="assets/img/icon5.png" alt="">
                                            <h3>{{ $home->teacher_support }}</h3>
                                            <p>{{ $home->teacher_support_body }}</p>
                                        </div>
                                        <!--abt-col end-->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="abt-col"><img src="assets/img/icon7.png" alt="">
                                            <h3>{{ $home->certificate_acceptance }}</h3>
                                            <p>{{ $home->certificate_acceptance_body }}</p>
                                        </div>
                                        <!--abt-col end-->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="abt-col"><img src="assets/img/icon9.png" alt="">
                                            <h3>{{ $home->program }}</h3>
                                            <p>{{ $home->program_body }}</p>
                                        </div>
                                        <!--abt-col end-->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="abt-col"><img src="assets/img/icon8.png" alt="">
                                            <h3>{{ $home->support }}</h3>
                                            <p>{{ $home->support_body }}</p>
                                        </div>
                                        <!--abt-col end-->
                                    </div>
                                </div>
                            </div>
                            <!--about-rw end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--benifit-section end-->
        <section class="classes-section">
            <div class="container">
                <div class="sec-title">
                    <h2 class="no-bg">{{ $home->school_class_header }}</h2>
                    <p>{{ $home->school_class_body }}</p>
                </div>
                <div class="classes-sec">
                    <div class="row classes-carousel">
                        @forelse($courses as $course)
                            <div class="col-lg-3">

                                <div class="classes-col">
                                    <div class="class-thumb"><img src="{{ asset($course->photo) }}" alt="" class="w-100">
                                        {{--                                        <a href="#" title="" class="crt-btn"><img src="assets/img/icon10.png" alt=""></a>--}}
                                    </div>
                                    <div class="class-info">
                                        <h3><a href="{{ route('courses.show', $course->id) }}" title="">{{ $course->name }}</a></h3>
                                        @forelse($course->schedules as $schedule)
                                            <span>{{ Str::ucfirst($schedule->day) }}</span> <span>{{ $schedule->start . ' - ' . $schedule->end }}</span>
                                        @empty
                                            <span>No Time Table</span>
                                        @endforelse
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="posted-by"><img style="width: 1.5rem;" src="{{ asset($course->teacher->first()->photo) }}" alt="{{ $course->teacher->first()->fullname }}"> <a href="{{ route('teachers.show', $course->teacher->first()->username) }}" title="">{{ $course->teacher->first()->fullname }}</a>
                                                {{--                                            </div><strong class="price">$45</strong>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <!--classes-col end-->
                                </div>
                            </div>
                        @empty
                            <p>No data</p>
                        @endforelse
                    </div>
                    <div class="lnk-dv text-center"><a href="{{ route('courses.index') }}" title="" class="btn-default">Classes <i
                                class="fa fa-long-arrow-alt-right"></i></a></div>
                </div>
                <!--classes-sec end-->
            </div>
        </section>
        <!--classes-section end-->
        @include('components.contactform')
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

