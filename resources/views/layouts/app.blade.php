<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Digix – A modern and responsive HTML template for It Solution">

    <link rel="shortcut icon"
          type="image/x-icon"
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

</body>
@php
    $callPhone = preg_replace('/[^0-9+]/', '', setting('phone') ?? '');
@endphp

@if ($callPhone)
    <a
        href="tel:{{ $callPhone }}"
        class="mobile-call-button"
        aria-label="{{ app()->getLocale() === 'vi'
            ? 'Gọi Senverse'
            : 'Call Senverse' }}"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="26"
            height="26"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
            focusable="false"
        >
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                19.79 19.79 0 0 1-8.63-3.07
                19.5 19.5 0 0 1-6-6
                19.79 19.79 0 0 1-3.07-8.67
                A2 2 0 0 1 4.11 2h3
                a2 2 0 0 1 2 1.72
                c.12.96.35 1.9.69 2.79
                a2 2 0 0 1-.45 2.11L8.09 9.89
                a16 16 0 0 0 6 6l1.27-1.27
                a2 2 0 0 1 2.11-.45
                c.89.34 1.83.57 2.79.69
                A2 2 0 0 1 22 16.92z"/>
        </svg>
    </a>
    <style>
      .mobile-call-button {
    display: none;
}

@media (max-width: 767.98px) {
    .mobile-call-button {
        position: fixed;
        left: calc(20px + env(safe-area-inset-left, 0px));
        bottom: calc(24px + env(safe-area-inset-bottom, 0px));
        z-index: 990;

        display: flex;
        align-items: center;
        justify-content: center;

        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #1b365d;
        color: #fff;
        text-decoration: none;
        box-shadow: 0 4px 16px rgba(27, 54, 93, 0.3);
    }

    .mobile-call-button:hover,
    .mobile-call-button:focus {
        background: #264b80;
        color: #fff;
    }

    .mobile-call-button:focus-visible {
        outline: 3px solid #6689cc;
        outline-offset: 4px;
    }

    .mobile-call-button svg {
        flex-shrink: 0;
    }
}
    </style>
@endif
</html>