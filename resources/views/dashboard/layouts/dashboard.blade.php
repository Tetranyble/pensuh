@extends('layouts.app')
@section('styles')
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">--}}
    <!-- Custom CSS -->
    <link href="{{ asset('../assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('../dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @parent
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('dashboard.partials.header')
        @include('dashboard.partials.side-navigation')
        <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-7 align-self-center">
                            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hello {{ auth()->user()->fullname }}!</h3>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0">
{{--                                        , "Teacher Code - {$courses->teacher->first()->code} Name - {{$courses->teacher->first()->fullname}}"--}}
                                        <li class="breadcrumb-item"><a href="index.html"> @yield('title') </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-5 align-self-center">
                            <div class="customize-input float-right">
                                <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                    <option selected>{{ \Carbon\Carbon::now()->format('F j, Y') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @yield('dashboard')
                @include('dashboard.partials.footer')
            </div>
    </div>
@endsection
@section('javascript')
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('../assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('../assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('../dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('../dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('../dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('../dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('../assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('../assets/extra-libs/c3/c3.min.js') }}"></script>



    @parent
@endsection
