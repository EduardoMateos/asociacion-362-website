<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Seo::getTitle() }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css?v=3') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app" class="container pt-3">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid">
        </div>
        @include('layouts.parts.menu') 

        @yield('content')

        @include('layouts.parts.footer') 
    </div>
    <script src="{{ asset('js/app.js?v=2') }}" defer></script>
</body>
</html>
