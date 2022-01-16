<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>سایت رسمی رادیو پیک زوریخ</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/clean-blog.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css?h=c2a3618fc145edb3ca7fb92db4b9f32b') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand" href="{{ url('/') }}">رادیو پیک زوریخ</a><button
                    data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="fa fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">صفحه اصلی</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/episodes') }}">قسمت ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">درباره ما</a></li>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
