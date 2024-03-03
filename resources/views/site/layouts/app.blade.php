<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | شركة مكين@yield('title')</title>
    <meta name="theme-color" content="">
    <meta name="msapplication-navbutton-color" content="">
    <meta name="apple-mobile-web-app-status-bar-style" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="">
    <link rel="shortcut icon" href="{{ asset('site/images/logo.png') }}">

    @include('site.layouts.partials.style')
</head>

<body>
<div class="website">


    @yield('content')

    @include('site.layouts.partials.footer')
</div>

@include('site.layouts.partials.script')
</body>
