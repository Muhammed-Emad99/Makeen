@php
    use
    App\Helpers\Image,
    App\Helpers\SiteSetting,
    App\Models\Setting;
    $favicon = Setting::where('type','file')->where('key','favicon')->first();
    $logo = Setting::where('type','file')->where('key','logo')->first();
@endphp

    <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> {{ SiteSetting::getSetting('site_name_ar')->value }} | @yield('title') </title>
    <link rel="icon" type="image/png" href="{{ \App\Helpers\Image::getImage('uploads/',$favicon->value) }}">

    @include('dashboard.layouts.style')
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-modern content-detached-right-sidebar navbar-floating footer-static"
      data-open="click" data-menu="vertical-menu-modern" data-col="content-detached-right-sidebar">

@include('dashboard.layouts.navbar')
@include('dashboard.layouts.sidebar')
{{--{{$setting->type}}--}}

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->


<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

@include('dashboard.layouts.footer')

@include('dashboard.layouts.script')
</body>
<!-- END: Body-->

</html>
