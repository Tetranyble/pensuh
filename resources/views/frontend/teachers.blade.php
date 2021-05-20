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
                    <h2>Teachers</h2>
                    <ul>
                        <li><a href="{{ route('home') }}" title="home">Home</a></li>
                        <li><span>Teachers</span></li>
                    </ul>
                </div>
                <!--pager-content end-->
                <h2 class="page-titlee">{{ $home->school_name_code }}</h2>
            </div>
        </section>
        <!--pager-section end-->
        <section class="page-content">
            <div class="container">
                <div class="teachers-section p-0">
                    <div class="teachers">
                        <div class="row">
                            @forelse($teachers as $teacher)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 full-wdth">
                                <div class="teacher" >
                                    <div class="teacher-img"><img style="max-width: 430px; max-height: 645px" src="{{ asset('storage/'.$teacher->photo) }}" alt="{{ $teacher->name }}" class="w-100">
                                        <div class="sc-div">
                                            <ul>
                                                <li><a href="{{ $teacher->instagram }}" title=""><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="{{ $teacher->linkedin }}" title=""><i class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="{{ $teacher->facebook }}" title=""><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{ $teacher->twitter }}" title=""><i class="fab fa-twitter"></i></a></li>
                                            </ul><span><img src="{{ asset('assets/img/plus.png') }}" alt=""></span>
                                        </div>
                                    </div>
                                    <div class="teacher-info">
                                        <h3><a href="{{ route('teachers.show', $teacher) }}" title="{{ $teacher->fullname }}">{{ $teacher->fullname }}</a></h3>
                                            @if($teacher->courses->first())
                                                <span><a href="{{ route('courses.show', $teacher->courses->first()->id) }}" title="{{ $teacher->courses->first()->name ? $teacher->courses->first()->name : '' }}">{{ $teacher->courses->first()->name ? $teacher->courses->first()->name : '' }}</a></span>
                                            @endif
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
                <!--teachers-section end-->
                <div class="mdp-pagiation">
                    {{ $teachers->links() }}
                </div>
                <!--pagination-end-->
            </div>
        </section>
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

