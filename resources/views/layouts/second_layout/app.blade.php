<!DOCTYPE HTML >

<html dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="/css/bootstrap-rtl.css">
    @endif

    @yield('header')
</head>
<body class="subpage">

<!-- Header -->
@include('layouts.second_layout._navbar')
<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">

        @yield('content')
    </div>
</section>


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
