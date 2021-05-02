@extends('layouts.app')
@section('title', 'Courses')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/button.min.css') }}">--}}
    @parent
@endsection
@section('content')
    <div class="wrapper">
        @include('frontend.partials.header')
        <section class="pager-section">
            <div class="container">
                <div class="pager-content text-center">
                    <h2>Classes</h2>
                    <ul>
                        <li><a href="{{ route('home') }}" title="">Home</a></li>
                        <li><span>Classes</span></li>
                    </ul>
                </div>
                <!--pager-content end-->
                <h2 class="page-titlee">{{ $home->school_name_code }}</h2>
            </div>
        </section>
        <!--pager-section end-->
        <!-- "classes-page" add this class here -->
        <section class="classes-page" style="padding: 0 0;">
            <div class="container">
{{--                <div  class="classes-banner" style="background-image: url({{ '"'.asset($home->course_banner. '"') }});"><span>Try now</span>--}}
{{--                    <h2>Start Investing in You</h2><a href="classes.html" title="" class="btn-default">Classes <i--}}
{{--                            class="fa fa-long-arrow-alt-right"></i></a>--}}
{{--                </div>--}}
                <!--classes-banner end-->
                <div class="classes-section">
                    <div class="classes-sec">
                        <div class="row">
                            @forelse($courses as $course)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="classes-col">
                                        <div class="class-thumb"><img src="{{ asset($course->photo) }}" alt="" class="w-100">
                                            {{--                                        <a href="#" title="" class="crt-btn"><img src="assets/img/icon10.png" alt=""></a>--}}
                                        </div>
                                        <div class="class-info">
                                            <h3><a href="{{ route('courses.show', $course->id) }}" title="{{ $course->name }}">{{ $course->name }}</a></h3>
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
                    </div>
                    <!--classes-sec end-->
                    <div class="mdp-pagiation">
                       {{ $courses->links() }}
                    </div>
                    <!--pagination-end-->
                </div>
            </div>
        </section>
        <!--classes-page end-->
        <!--page-content end-->
    @include('components.contactform')
    @include('frontend.partials.footer')
    <!--footer end-->
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

