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
                    <h2>{{ $teacher->firstname . ' ' . $teacher->middlename . ' ' . $teacher->lastname}}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}" title="home">Home</a></li>
                        <li><a href="{{ route('courses.index') }}" title="Courses">Courses</a></li>
                        <li><span><a href="{{ route('events.index') }}" title="Events">Events</a></span></li>
                    </ul>
                </div>
                <!--pager-content end-->
                <h2 class="page-titlee">{{ $home->school_name_code }}</h2>
            </div>
        </section>
        <!--pager-section end-->
        <section class="page-content">
            <div class="container">
                <div class="teacher-single-page">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="teacher-coly"><img src="{{ asset('storage/'.$teacher->photo) }}" alt="">
                                <ul class="social-icons">
                                    <li><a href="{{ $teacher->facebook }}" title="Facebook Handle"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $teacher->twitter }}" title="Twitter Handle"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $teacher->linkedin }}" title="LinkedIn Handle"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!--teacher-coly end-->
                        </div>
                        <div class="col-lg-8">
                            <div class="teacher-content">
                                <h3>{{ $teacher->roles->first()->name }}</h3>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="rol-z"><img src="{{ asset('assets/img/ro1.png') }}" alt="">
                                            <div class="rol-info">
                                                <h3>Phone</h3><span>[hidden]</span>
                                            </div>
                                        </div>
                                        <!--rol-z end-->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="rol-z"><img src="{{ asset('assets/img/ro2.png') }}" alt="">
                                            <div class="rol-info">
                                                <h3>Email</h3><span><a href="mailto:{{ $teacher->email }}" class="__cf_email__"
                                                                       data-cfemail="402e212d2500242f2d21292e6e232f2d">{{ $teacher->email }}</a></span>
                                            </div>
                                        </div>
                                        <!--rol-z end-->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="rol-z style2"><img src="{{ asset('assets/img/ro3.png') }}" alt="">
                                            <div class="rol-info">
                                                <h3><a href="tel:{{ $teacher->phone }}" title="">Call Teacher<br>Now</a></h3>
                                            </div>
                                        </div>
                                        <!--rol-z end-->
                                    </div>
                                </div>
                                <p>{{ $teacher->about }}</p>
                                <ul class="tech-detils">
                                    <li>
                                        <h3>DOB</h3><span>[hidden]</span>
                                    </li>
                                    <li>
                                        <h3>Education</h3><span>{{ $teacher->teacherQualification->education }}</span>
                                    </li>
                                    <li>
                                        <h3>Experience</h3><span>{{ $teacher->teacherQualification->experience }}</span>
                                    </li>
                                </ul>
                                <!--tech-detils end-->
                                <div class="skills-tech">
                                    <h3>Personal Skills</h3>
                                    <div class="progess-row">
                                        <h3>Teaching</h3>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft bg-clr1" data-wow-duration="1000ms" role="progressbar"
                                                 style="width: {{ $teacher->teacherQualification->teaching }}%" aria-valuenow="{{ $teacher->teacherQualification->teaching }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><span>{{ $teacher->teacherQualification->teaching }}%</span>
                                    </div>
                                    <div class="progess-row">
                                        <h3>Speaking</h3>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft bg-clr2" role="progressbar" style="width: {{ $teacher->teacherQualification->speaking }}%"
                                                 aria-valuenow="{{ $teacher->teacherQualification->speaking }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><span>{{ $teacher->teacherQualification->speaking }}%</span>
                                    </div>
                                    <div class="progess-row">
                                        <h3>Family Support</h3>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft bg-clr3" role="progressbar" style="width: {{ $teacher->teacherQualification->family_support }}%"
                                                 aria-valuenow="{{ $teacher->teacherQualification->family_support }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><span>{{ $teacher->teacherQualification->family_support }}%</span>
                                    </div>
                                    <div class="progess-row">
                                        <h3>Children's Well-being</h3>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft bg-clr4" role="progressbar" style="width: {{ $teacher->teacherQualification->children_well_being }}%"
                                                 aria-valuenow="{{ $teacher->teacherQualification->children_well_being }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><span>{{ $teacher->teacherQualification->children_well_being }}%</span>
                                    </div>
                                </div>
                                <!--skills-tech end-->
                                {{ $teacher->teacherQualification->description }}
                            </div>
                            <!--teacher-content end-->
                        </div>
                    </div>
                </div>
                <!--teacher-single-page end-->
                <div class="teachers-section teacher-page">
                    <div class="section-title text-center">
                        <h2>Other Teachers</h2>
                    </div>
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
                                            <h3><a href="{{ route('teachers.show', $teacher) }}" title="{{ $teacher->fullname }}">{{ $teacher->fullname }}</a></h3><span>{{ !empty($teacher->courses->first()) ? $teacher->courses->first()->name : ''  }}</span>
                                        </div>
                                    </div>
                                    <!--teacher end-->
                                </div>
                            @empty
                                <p>There are no teachers to display</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

