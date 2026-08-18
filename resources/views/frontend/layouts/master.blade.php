<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('frontend.partials.meta')

    <link rel="icon" href="{{ media_url(setting('favicon'), asset('assets/frontend/img/favicon.png')) }}">

    {{-- CSS --}}
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/flaticon-set.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/validnavs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    {{-- Schema toàn site --}}
    @if(site_schema())
    <script type="application/ld+json">
    {!! site_schema() !!}
    </script>
    @endif

    {{-- Schema từng trang --}}
    @if(!request()->routeIs('home'))
    @php
        $schemaModel = $post ?? $product ?? $category ?? $page ?? null;

        $schemaType = isset($post)
            ? 'Article'
            : (isset($product)
                ? 'Product'
                : (isset($category)
                    ? 'CollectionPage'
                    : 'WebPage'));
    @endphp

    @if($schemaModel)
        <script type="application/ld+json">
        {!! page_schema($schemaModel, $schemaType) !!}
        </script>
    @endif
@endif
</head>

<body>

    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')

    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.appear.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/progress-bar.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/count-to.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/YTPlayer.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/validnavs.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>
</html>