<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    @yield('styles')

{{--    webcrawler script and social media spider crawling data--}}
{{--    <link rel="shortcut icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">--}}
{{--    <meta name="title" content="{{ config('app.name') }} - @yield('title')">--}}
{{--    <meta name="description" content="{{ config('app.name') }} - cryptocurrency, forex and stock investment platform">--}}
{{--    <meta name="keywords" content="cryptocurrency, forex, stock, investment, platform, earn money online,">--}}

{{--    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/images/logo/apple-touch-icon.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/images/logo/favicon-32x32.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/logo/favicon-16x16.png') }}">--}}
{{--    <link rel="mask-icon" href="{{ asset('asset/images/logo/safari-pinned-tab.svg') }}" color="#5bbad5">--}}
{{--    <meta name="msapplication-TileColor" content="#ffffff">--}}
{{--    <meta name="theme-color" content="#053E76">--}}

{{--    <meta name="apple-mobile-web-app-capable" content="yes">--}}
{{--    <meta name="apple-mobile-web-app-status-bar-style" content="#053E76">--}}
{{--    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }} - @yield('title')">--}}
{{--    <meta itemprop="name" content="{{ config('app.name') }} - @yield('title')">--}}
{{--    <meta itemprop="description" content="{{ config('app.name') }} - cryptocurrency, forex and stock investment platform">--}}
{{--    <meta itemprop="image" content="{{ asset('asset/images/logo/moneora.png') }}">--}}
{{--    <meta property="og:type" content="website">--}}
{{--    <meta property="og:title" content="{{ config('app.name') }} - @yield('title')">--}}
{{--    <meta property="og:description" content="{{ config('app.name') }} - cryptocurrency, forex and stock investment platform'">--}}
{{--    <meta property="og:image" content="{{ asset('asset/images/logo/moneora.png') }}">--}}
{{--    <meta property="og:image:type" content="image/png">--}}
{{--    <meta property="og:image:width" content="600">--}}
{{--    <meta property="og:image:height" content="315">--}}
{{--    <meta property="og:url" content="{{ config('app.url') }}">--}}
{{--    <meta property="twitter:card" content="summary_large_image">--}}
</head>
<body id="app">
   @yield('content')
   @yield('javascript')
    @yield('script')
</body>
</html>
