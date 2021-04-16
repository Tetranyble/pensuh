@extends('layouts.app')
@section('title', 'Home')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/button.min.css') }}">--}}
@parent
@endsection
@section('content')
    <div class="wrapper">
        <div class="main-section">
           @include('frontend.partials.header')
            <!--responsive-menu end-->
            <section class="main-banner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-7">
                            <div class="banner-text wow fadeInLeft" data-wow-duration="1000ms">
                                <h2>{{ $home->school_excerpt_header }} <span></span></h2>
                                <p>{{ $home->school_excerpt }}</p>
                                <form method="GET" action="{{ route('courses.index') }}" class="search-form">
                                    <input type="text" name="q" placeholder="Search Class">
                                    <button><i
                                            class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="banner-img wow zoomIn" data-wow-duration="1000ms"><img src="{{ asset($home->banner_image) }}" alt="">
                            </div>
                            <!--banner-img end-->
                            <div class="elements-bg wow zoomIn" data-wow-duration="1000ms"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!--main-banner end-->
            <h2 class="main-title">{{ $home->school_name }}</h2>
        </div>
        <!--main-section end-->
        <section class="about-us-section">
            <div class="container">
                <div class="section-title text-center">
                    <h2>{{ $home->school_welcome_header }}<span></span></h2>
                    <p>{{ $home->school_welcome_body }}
                    </p>
                </div>
                <!--section-title end-->
                <div class="about-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="abt-col wow fadeInUp" data-wow-duration="1000ms"><img src="assets/img/icon5.png" alt="">
                                    <h3>{{ $home->teacher_support }}</h3>
                                    <p>{{ $home->teacher_support_body }}</p>
                                </div>
                                <!--abt-col end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="abt-col wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="200ms"><img
                                        src="assets/img/icon7.png" alt="">
                                    <h3>{{ $home->certificate_acceptance }}</h3>
                                    <p>{{ $home->certificate_acceptance_body }}</p>
                                </div>
                                <!--abt-col end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="abt-col wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms"><img
                                        src="assets/img/icon8.png" alt="">
                                    <h3>{{ $home->program }}</h3>
                                    <p>{{ $home->program_body }}</p>
                                </div>
                                <!--abt-col end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="abt-col wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms"><img
                                        src="assets/img/icon9.png" alt="">
                                    <h3>{{ $home->support }}</h3>
                                    <p>{{ $home->support_body }}</p>
                                </div>
                                <!--abt-col end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--about-rw end-->
                <div class="abt-img">
                    <ul class="masonary">
                        @forelse($home->galleries as $key => $gallery)
                        <li class="{{ 'width'.($key+1) }} wow zoomIn" data-wow-duration="1000ms"><a href="{{ asset($gallery->photo) }}" data-group="set1"
                                                                                    title="{{ $gallery->name }}" class="html5lightbox"><img src="{{ asset($gallery->photo) }}" alt="{{ $home->name }}"></a></li>
                        @empty
                            'no data to show'
                        @endforelse

                    </ul>
                </div><!-- abt-img end-->
            </div>
        </section>
        <!--about-us-section end-->
        <section class="classes-section">
            <div class="container">
                <div class="sec-title">
                    <h2>{{ $home->school_class_header }}</h2>
                    <p>{{ $home->school_class_body }}</p>
                </div>
                <!--sec-title end-->
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
                                            <div class="posted-by"><img style="width: 1.5rem;" src="{{ asset($course->teacher->first()->photo) }}" alt=""> <a href="#" title="">{{ $course->teacher->first()->firstname . ' ' . $course->teacher->first()->lastname }}</a>
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
        <section class="teachers-section">
            <div class="container">
                <div class="section-title text-center">
                    <h2>{{ $home->school_teacher_header }}</h2>
                    <p>{{ $home->school_teacher_body }}</p>
                </div>
                <!--section-title end-->
                <div class="teachers">
                    <div class="row">
                        @forelse($teachers as $teacher)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 full-wdth">
                                <div class="teacher" >
                                    <div class="teacher-img"><img style="max-width: 430px; max-height: 645px" src="{{ asset($teacher->photo) }}" alt="{{ $teacher->name }}" class="w-100">
                                        <div class="sc-div">
                                            <ul>
                                                <li><a href="{{ $teacher->instagram }}" title=""><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="{{ $teacher->linkedin }}" title=""><i class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="{{ $teacher->facebook }}" title=""><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{ $teacher->twitter }}" title=""><i class="fab fa-twitter"></i></a></li>
                                            </ul><span><img src="assets/img/plus.png" alt=""></span>
                                        </div>
                                    </div>
                                    <div class="teacher-info">
                                        <h3><a href="{{ route('teachers.show', $teacher) }}" title="{{ $teacher->firstname. ' ' .$teacher->lastname }}">{{ $teacher->firstname. ' ' .$teacher->lastname }}</a></h3><span>{{ $teacher->courses->first()->name ? $teacher->courses->first()->name : ''  }}</span>
                                    </div>
                                </div>
                                <!--teacher end-->
                            </div>
                        @empty
                            <p>There are no teachers to display</p>
                        @endforelse
                    </div>
                </div>
                <!--teachers end-->
            </div>
        </section>
        <section class="course-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="find-course">
                            <div class="sec-title">
                                <h2>{{ $home->school_event_header }}</h2>
                                <p>{{ $home->school_event_body }}</p>
                                <h3><img src="assets/img/icon11.png" alt="">Call: <strong><a href="tel:{{ $home->contact_phone }}">{{ $home->contact_phone }}</a></strong></h3>
                            </div>
                            <!--sec-title end-->
                            <div class="course-img"><img src="{{ asset($home->event_image) }}" alt=""></div>
                            <!--course-img end-->
                        </div>
                        <!--find-course end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="courses-list">
                            @forelse($events as $key => $event)
                                <div class="course-card wow fadeInLeft" data-wow-duration="{{$key === 0 ? '1000ms' : '400ms'}}">
                                <div class="d-flex flex-wrap align-items-center">
                                    <ul class="course-meta">
                                        <li><img src="assets/img/icon12.png" alt="">{{ $event->start_date }}</li>
                                        <li>{{ getTimeFromDate($event->start_date) }} to {{ getTimeFromDate($event->end_date) }}</li>
                                    </ul><span>{{ $event->price ? money($event->price) : 'FREE' }}</span>
                                </div>
                                <h3><a href="{{ route('events.show', $event->slug) }}" title="">{{ $event->name }}</a></h3>
                                <div class="d-flex flex-wrap">
                                    <div  class="posted-by"><img style="max-width: 26px;" src="{{ asset($event->host->photo) }}" alt=""> <a href="#" title="">{{ $event->host->name }}</a>
                                    </div><span class="locat"><img src="assets/img/loct.png" alt="">{{ $event->location }}</span>
                                </div>
                            </div>
                            @empty
                                <p>no data to display</p>
                             @endforelse
                        </div>
                        <!--courses-list end--> <a href="{{ route('events.index') }}" title="" class="all-btn">All Events <i
                                class="fa fa-long-arrow-alt-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--course-section end-->
        <section class="blog-section">
            <div class="container">
                <div class="section-title text-center">
                    <h2>{{ $home->school_news_header }}</h2>
                    <p>{{ $home->school_news_body }}</p>
                </div>
                <!--section-title end-->
                <div class="blog-posts">
                    <div class="row">


                        @forelse($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumbnail">
                                    <img src="{{ asset($blog->photo) }}" alt="{{ $blog->slug }}"  class="w-100">
                                    <span class="category">
                                        @foreach($blog->categories as $category)
                                            <a href="{{ route('news.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </span>
                                </div>
                                <div class="blog-info">
                                    <ul class="meta">
                                        <li><a href="#" title="{{ $blog->created_at }}">{{ $blog->created_at }}</a></li>
                                        <li><a href="#" title="{{ $blog->user->fullname }}">{{ $blog->user->fullname }}</a></li>
                                        <li><img src="{{ asset('assets/img/icon13.png') }}" alt="">
                                            @foreach($blog->tags as $tag)
                                                <a href="{{ route('news.index',['tag' => $tag->slug]) }}" title="{{ $tag->name }}">{{ $tag->name }}</a>
                                            @endforeach
                                        </li>
                                    </ul>
                                    <h3><a href="{{ route('news.show', $blog) }}" title="{{ $blog->name }}">{{ $blog->name }}</a></h3>
                                    <p>{{ $blog->excerpt }}</p>
                                    <a href="{{ route('news.show', $blog) }}" title="{{ $blog->name }}" class="read-more">Read <i class="fa fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <!--blog-post end-->
                        </div>
                            @empty
                            <p>no news data</p>
                        @endforelse
                    </div>
                </div>
                <!--blog-posts end-->
            </div>
        </section>
        <!--blog-section end-->

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

