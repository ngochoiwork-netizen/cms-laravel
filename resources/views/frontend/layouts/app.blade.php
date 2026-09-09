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


    @php
    $callNowPhone = preg_replace(
            '/[^0-9+]/',
            '',
            8887903968 ?? ''
        );
    @endphp

    @if ($callNowPhone)
        <a
            href="tel:8887903968"
            class="mobile-call-now"
            aria-label="{{ app()->getLocale() === 'vi'
                ? 'Gọi ngay cho Senverse'
                : 'Call Senverse now' }}"
        >
            <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
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
                    A2 2 0 0 1 22 16.92z">
                </path>
            </svg>

            <span>
                {{ app()->getLocale() === 'vi' ? 'Gọi Ngay' : 'Call Now' }}
            </span>
        </a>
    @endif

    <style>
        .mobile-call-now {
    display: none;
}

@media (max-width: 767.98px) {
    .mobile-call-now {
        position: fixed;
        left: calc(16px + env(safe-area-inset-left, 0px));
        bottom: calc(20px + env(safe-area-inset-bottom, 0px));
        z-index: 999;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;

        min-height: 52px;
        padding: 0 20px;
        border-radius: 30px;

        color: #ffffff;
        background: #1b365d;
        box-shadow: 0 6px 20px rgba(27, 54, 93, 0.3);

        font-size: 15px;
        font-weight: 600;
        line-height: 1;
        text-decoration: none;
        white-space: nowrap;
    }

    .mobile-call-now:hover,
    .mobile-call-now:active,
    .mobile-call-now:focus {
        color: #ffffff;
        background: #6689cc;
        text-decoration: none;
    }

    .mobile-call-now:focus-visible {
        outline: 3px solid #6689cc;
        outline-offset: 3px;
    }

    .mobile-call-now svg {
        flex: 0 0 auto;
    }
}
    </style>
</body>

</html>