<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="k9_GtS39bDe0uhv2mtzN7hp3jT7Jq_17lGwXs4zX0ws" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" class="page-wrapper">
      @auth
        @include('layouts.header')
        @yield('sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
      @endauth
      @guest
        <div class="">
            @yield('content')
        </div>
      @endguest

    </div>
</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/main.min.js') }}" defer></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}" defer></script>
<script src="{{ asset('js/jquery.validate.min.js') }}" defer></script>
<script src="{{ asset('js/metisMenu.min.js') }}" defer></script>


</html>
