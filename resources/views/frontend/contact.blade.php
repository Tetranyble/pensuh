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
        <!--main-section end-->
        <section class="pager-section">
            <div class="container">
                <div class="pager-content text-center">
                    <h2>Contacts</h2>
                    <ul>
                        <li><a href="{{ route('home') }}" title="Home">Home</a></li>
                        <li><span>Contacts</span></li>
                    </ul>
                </div>
                <!--pager-content end-->
                <h2 class="page-titlee">{{ $home->school_name }}</h2>
            </div>
        </section>
        <!--pager-section end-->
        <section class="page-content">
            <div class="container">
                <div class="mdp-map">
                    {!! $home->map !!}
                </div>
                <!--mdp-map end-->
                <div class="mdp-contact">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="comment-area">
                                <h3>Lets Meet</h3>
                                <form id="contact-form" method="post" action="#">
                                    <div class="response"></div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group"><input type="text" name="name" class="name" placeholder="Name" required>
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group"><input type="email" name="email" class="email" placeholder="Email"
                                                                           required></div>
                                            <!--form-group end-->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group"><input type="text" name="phone" class="phone" placeholder="phone" required>
                                            </div>
                                            <!--form-group end-->
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group"><textarea name="message" placeholder="Message"></textarea></div>
                                            <!--form-group end-->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit"><button type="button" id="submit" class="btn-default">Send Now <i
                                                        class="fa fa-long-arrow-alt-right"></i></button></div>
                                            <!--form-submit end-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--comment-area end-->
                        </div>
                        <div class="col-lg-4 col-md-5">
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
                            <!--mdp-our-contacts end-->
                        </div>
                    </div>
                </div>
                <!--mdp-contact end-->
            </div>
        </section>


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

