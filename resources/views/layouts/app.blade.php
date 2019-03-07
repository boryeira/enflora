<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'enFlora') }}</title>

    <!-- theme -->
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('js/metisMenu.min.js') }}" defer></script>
    <script src="{{ asset('js/main.min.js') }}" defer></script>



    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="page-wrapper">
      @include('layouts.header')
      @include('layouts.sidebar')
        <div class="contant-wrapper">
          <div class="page-content">
            @yield('content')
          </div>

        </main>
    </div>
</body>
</html>
