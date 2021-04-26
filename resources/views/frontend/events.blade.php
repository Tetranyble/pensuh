@extends('layouts.app')
@section('title', 'Events')
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
                    <h2>Events</h2>
                    <ul>
                        <li><a href="{{ route('home') }}" title="">Home</a></li>
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
                <div class="course-section">
                    <div class="courses-list">
                        <div class="row">
                            @forelse($events as $event)
                            <div class="col-lg-6">
                                <div class="course-card">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <ul class="course-meta">
                                            <li><img src="{{ asset('assets/img/icon12.png') }}" alt="">{{ $event->start_date }}</li>
                                            <li>{{ getTimeFromDate($event->start_date) }} to {{ getTimeFromDate($event->end_date) }}</li>
                                        </ul><span>{{ $event->price ? money($event->price) : 'FREE' }}</span>
                                    </div>
                                    <h3><a href="{{ route('events.show', $event->slug) }}" title="">{{ $event->name }}</a></h3>
                                    <div class="d-flex flex-wrap">
                                        <div class="posted-by"><img style="max-width: 26px;" src="{{ asset($event->host->photo) }}" alt=""> <a href="#" title="">{{ $event->host->name }}</a>
                                        </div><span class="locat"><img src="{{ asset('assets/img/loct.png') }}" alt="">{{ $event->location }}</span>
                                    </div>
                                </div>
                                <!--course-card end-->
                            </div>
                                @empty
                                <p>no data to display</p>
                            @endforelse

                        </div>
                    </div>
                    <!--courses-list end-->
                </div>
                <div class="mdp-pagiation">
                    {{ $events->links() }}
{{--                    <nav aria-label="Page navigation example">--}}
{{--                        <ul class="pagination">--}}
{{--                            <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item"><a class="page-link active" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">...</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">15</a></li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
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

