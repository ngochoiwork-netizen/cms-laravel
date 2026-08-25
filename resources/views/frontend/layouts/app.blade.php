<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link rel="icon"
      href="{{ setting_media('favicon') }}"
      type="image/x-icon">

    

    @include('frontend.includes.tracking-head')

    @include('frontend.includes.seo')

    @include('frontend.includes.schema')
    <link rel="stylesheet preload"
        href="{{ asset('assets/frontend/css/plugins/fontawesome.css') }}"
        as="style">

    <link rel="stylesheet preload"
        href="{{ asset('assets/frontend/css/plugins/swiper.css') }}"
        as="style">

    <link rel="stylesheet preload"
        href="{{ asset('assets/frontend/css/plugins/metismenu.css') }}"
        as="style">

    <link rel="stylesheet preload"
        href="{{ asset('assets/frontend/css/plugins/magnifying-popup.css') }}"
        as="style">

    <link rel="stylesheet preload"
        href="{{ asset('assets/frontend/css/plugins/odometer.css') }}"
        as="style">

    <link rel="stylesheet preload"
        href="{{ asset('assets/frontend/css/vendor/bootstrap.min.css') }}"
        as="style">

    <link rel="stylesheet preload"
        href="{{ asset('assets/frontend/css/style.css') }}"
        as="style">

    <link rel="stylesheet"
        href="{{ asset('assets/frontend/css/senverse-theme.css') }}">

</head>

<body class="demo-software-company">

    @include('frontend.includes.header')

    @yield('content')


    @include('frontend.includes.footer')

    @include('frontend.includes.sidebar')

    @include('frontend.includes.anywhere-home')

    @include('frontend.includes.scripts')

    @include('frontend.includes.tracking-head')

</body>

</html>