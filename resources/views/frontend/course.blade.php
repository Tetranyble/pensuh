

@extends('layouts.app')
@section('title', $course->name)
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/button.min.css') }}">--}}
    @parent
@endsection
@section('content')
    <div class="wrapper">
        @include('frontend.partials.header')
        <section class="class-single-banner"><img src="{{ asset('storage/'.$course->banner) }}" alt="{{ $course->name }}" class="w-100"></section>
        <!--class-single-banner end-->
        <section class="page-content style2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="class-single-content">
                            <h2>{{ $course->name }}</h2>
                            <ul class="meta-box">
                                <li><a href="{{ route('home') }}" title="">Home</a></li>
                                <li><span>Course</span></li>
                            </ul>

                            <div class="class-gallery">
                                <div class="class-gallery-img"><a href="{{ asset('storage/'.$course->photo) }}" title="{{ $course->name }}" class="html5lightbox" data-group="set1"><img src="{{ asset('storage/'.$course->photo) }}" alt="{{ $course->name }}"></a></div>
                            </div>
                            <!--class-gallery end-->
                                <p> {!! $course->body !!}</p>
                                <a href="{{ route('admissions.create') }}" title="" class="btn-default">Enroll Now <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                        </div>
                        <!--class-single-content end-->
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="sidebar class-sidebar">
                            <div class="widget widget-information">
                                <h3 class="widget-title">Class Information</h3>
                                <ul>
                                    <li>
                                        @forelse($course->schedules as $schedule)
                                            <h4>{{ Str::ucfirst($schedule->day) }}</h4>
                                            <span>{{ $schedule->start . ' - ' . $schedule->end }}</span>
                                        @empty
                                            <span>No Time Table</span>
                                        @endforelse
                                    </li>
                                    <li>
                                        <h4>Age</h4><span>{{ $course->section->classes->age }}</span>
                                    </li>
                                    <li>
                                        <h4>Class Size</h4><span>{{ $course->section->capacity }}</span>
                                    </li>
                                    <li>
                                        <h4>Coures Duration</h4><span>{{ $course->duration }}</span>
                                    </li>
                                </ul>
                                <div class="tech-info">
                                    <div class="tech-tble"><img style="width: 3rem" src="{{ asset('storage/'.$course->teacher->first()->photo) }}" alt="">
                                        <div class="tch-info">
                                            <h3><a href="{{ route('teachers.show', $course->teacher->first()->username) }}">{{ $course->teacher->first()->fullname }}</a></h3><span></span>
                                        </div>
                                    </div><a href="{{ route('admissions.create') }}" title="" class="btn-default">Enroll Now <i
                                            class="fa fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <!--widget-information end-->
                            <div class="widget widget-class">
                                <div class="wd-class-post">
                                    <div class="wd-class-thumb"><img src="{{ asset('assets/img/ci1.png') }}" alt="{{ $course->section->classes->syllabus->name }}"></div>
                                    <div class="wd-class-info">
                                        <h3>Class Syllabus</h3><span><a href="{{ route('syllabi.show', $course->section->classes->syllabus->slug) }}">View Syllabus</a></span>
                                    </div>
                                </div>
                                <!--wd-class-post end-->
                            </div>
                            <!--widget-class end-->
                            <div class="widget widget-classes-carousel">
                                <h3 class="widget-title">Other Classes</h3>
                                <div class="classes-section classes-widget-slider">
                                    @forelse($courses as $course)
                                    <div class="classes-col">
                                        <div class="class-thumb"><img src="{{ asset('storage/'.$course->photo) }}" alt="{{ $course->name }}" class="w-100"> <a
                                                href="{{ route('courses.show', $course->id) }}" title="" class="crt-btn"><img src="assets/img/icon10.png" alt=""></a></div>
                                        <div class="class-info">
                                            <h3>{{ $course->name }}</h3>
                                            @forelse($course->schedules as $schedule)
                                                <span>{{ Str::ucfirst($schedule->day) }}</span> <span>{{ $schedule->start . ' - ' . $schedule->end }}</span>
                                            @empty
                                                <span>No Time Table</span>
                                            @endforelse
                                            <div class="d-flex flex-wrap align-items-center">
                                                <div class="posted-by"><img style="width: 1.5rem;" src="{{ asset('storage/'.$course->teacher->first()->photo) }}" alt="{{$course->teacher->first()->fullname }}"> <a href="{{ route('teachers.show', $course->teacher->first()->username) }}" title="{{ $course->teacher->first()->fullname }}">{{ $course->teacher->first()->fullname }}
                                                        </a></div><strong class="price"></strong>
                                            </div>
                                        </div>
                                    </div>
                                        @empty
                                        <p>No other Courses</p>
                                    @endforelse
                                </div>
                                <!--classes-section end-->
                            </div>
                            <!--widget-classes-carousel end-->
                            <div class="widget widget-contact-dp mdp-contact">
                                <div class="mdp-our-contacts">
                                    <h3>Our Contacts</h3>
                                    <ul>
                                        <li>
                                            <div class="d-flex flex-wrap">
                                                <div class="icon-v"><img src="{{ asset('assets/img/icon15.png') }}" alt="{{ $home->contact_phone }}"></div>
                                                <div class="dd-cont">
                                                    <h4>Call</h4><span><a href="tel:{{ $home->contact_phone }}">{{ $home->contact_phone }}</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex flex-wrap">
                                                <div class="icon-v"><img src="{{ asset('assets/img/icon16.png') }}" alt="{{ $home->work_time }}"></div>
                                                <div class="dd-cont">
                                                    <h4>Work Time</h4><span>{{ $home->work_time }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex flex-wrap">
                                                <div class="icon-v"><img src="{{ asset('assets/img/icon17.png') }}" alt="{{ $home->address }}"></div>
                                                <div class="dd-cont">
                                                    <h4>Address</h4><span>{{ $home->address }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--widget-contact-dp end-->
                        </div>
                        <!--sidebar end-->
                    </div>
                </div>
            </div>
        </section>
        <!--page-content end-->
        @include('components.contactform')
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


