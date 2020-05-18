<!doctype html>
<html dir="{{ app()->getLocale() == "ar" ? "rtl " : "ltr"}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/assets/js/jquery.min.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(app()->getLocale() == 'ar' && \Request::path() != 'ar/login' &&\Request::path() !=  'ar/register')
        <link rel="stylesheet" href="/css/main-bootstrap-rtl.css">
    @endif
</head>
<body>
<div id="app">
    <div>
        @yield('content')
    </div>
</div>
</body>
</html>
