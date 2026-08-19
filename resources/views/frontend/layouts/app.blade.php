<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Digix – A modern and responsive HTML template for It Solution">

    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/frontend/images/fav.png') }}">

    <title>Digix - It Service HTML Template</title>

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

</head>

<body class="demo-software-company">

    @include('frontend.includes.header')

    @yield('content')


    @include('frontend.includes.footer')

    @include('frontend.includes.sidebar')

    @include('frontend.includes.anywhere-home')

    @include('frontend.includes.scripts')

</body>

</html>