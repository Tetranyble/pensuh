
@extends('layouts.app')
@section('title', 'Events')
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
                    <h2>{{ $event->name }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}" title="Events">Home</a></li>
                        <li><a href="{{ route('events.index') }}" title="Events">Events</a></li>
                        <li><span>Events</span></li>
                    </ul>
                </div>
                <!--pager-content end-->
                <h2 class="page-titlee">{{ $home->school_name_code }}</h2>
            </div>
        </section>
        <!--pager-section end-->
        <section class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="event-single">
                            <div class="event-gallery-sec">
                                <div class="event-gallery">
                                    <a href="{{ asset('storage/'.$event->photo) }}" title="{{ $event->name }}" class="html5lightbox"
                                                              data-group="set1"><img src="{{ asset('storage/'.$event->photo) }}" alt="{{ $event->slug }}"> </a><span
                                        class="price">{{ money($event->price) }}</span>
                                </div>
                                <!--event-gallery end-->
                            </div>
                            <!--event-gallery-sec end-->
                            {!! $event->body !!}
                            <div class="mdp-map">
                               {!! $event->map !!}
                            </div>
                            <!--mdp-map end-->
                        </div>
                        <!--event-single end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar class-sidebar position-static">
                            <div class="widget widget-information">
                                <ul class="clt">
                                    <li><img src="{{ asset('assets/img/cir3.png') }}" alt="">
                                        <div class="clt-info">
                                            <h3>{{ $event->location }}</h3>
                                        </div>
                                    </li>
                                    <li><img src="{{ asset('assets/img/cir4.png') }}" alt="">
                                        <div class="clt-info">
                                            <h3>{{ $event->start_date }} <span>{{ getTimeFromDate($event->start_date) }} to {{ getTimeFromDate($event->end_date) }}</span></h3>
                                        </div>
                                    </li>
                                </ul>
                                <div class="tech-info">
                                    <div class="tech-tble"><img src="{{ asset('assets/img/thumb1.png') }}" alt="">
                                        <div class="tch-info">
                                            <h3>{{ $event->host->name }}</h3><span>Convener</span>
                                        </div>
                                    </div><a href="{{ route('contact') }}" title="conacts" class="btn-default">Sign up <i
                                            class="fa fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <!--widget-information end-->
                            <div class="widget widget-contact-dp mdp-contact">
                                <div class="mdp-our-contacts">
                                    <h3>Our Contacts</h3>
                                    <ul>
                                        <li>
                                            <div class="d-flex flex-wrap">
                                                <div class="icon-v"><img src="{{ asset('assets/img/icon15.png') }}" alt=""></div>
                                                <div class="dd-cont">
                                                    <h4>Call</h4><span>{{ $home->contact_phone }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex flex-wrap">
                                                <div class="icon-v"><img src="{{ asset('assets/img/icon16.png') }}" alt=""></div>
                                                <div class="dd-cont">
                                                    <h4>Work Time</h4><span>{{ $home->work_time }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex flex-wrap">
                                                <div class="icon-v"><img src="{{ asset('assets/img/icon17.png') }}" alt=""></div>
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

