<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CMS Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-icons/entypo/css/entypo.css') }}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/neon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/neon-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/neon-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">

    @yield('css')

    <script src="{{ asset('assets/admin/js/jquery-1.11.3.min.js') }}"></script>

    <style>
        .cke_notifications_area {
            display: none !important;
        }
    </style>
</head>

<body class="page-body">

<div class="page-container">

    <div class="sidebar-menu">
        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <strong style="color:#fff;font-size:20px;">CMS ADMIN</strong>
                    </a>
                </div>

                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon">
                        <i class="entypo-menu"></i>
                    </a>
                </div>

                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation">
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>

            <ul id="main-menu" class="main-menu">

    {{-- Dashboard --}}
    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}">
            <i class="entypo-gauge"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    {{-- Frontend --}}
    <li>
        <a href="{{ url('/') }}" target="_blank">
            <i class="entypo-monitor"></i>
            <span class="title">Xem website</span>
        </a>
    </li>

    {{-- Nội dung --}}
    <li class="has-sub {{
        request()->routeIs('admin.categories.*')
        || request()->routeIs('admin.posts.*')
        || request()->routeIs('admin.pages.*')
        || request()->routeIs('admin.page-sections.*')
        ? 'opened active' : ''
    }}">

        <a href="#">
            <i class="entypo-doc-text"></i>
            <span class="title">Quản lý nội dung</span>
        </a>

        <ul class="{{
            request()->routeIs('admin.categories.*')
            || request()->routeIs('admin.posts.*')
            || request()->routeIs('admin.pages.*')
            || request()->routeIs('admin.page-sections.*')
            ? 'visible' : ''
        }}">

            <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}">
                    <span class="title">Danh mục</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.index') }}">
                    <span class="title">Bài viết</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <a href="{{ route('admin.pages.index') }}">
                    <span class="title">Pages</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <a href="{{ route('admin.products.index') }}">
                    <span class="title">Sản phẩm</span>
                </a>
            </li>
        </ul>
    </li>

    {{-- Blog du lịch --}}
    <li class="has-sub {{
        request()->routeIs('admin.countries.*')
        || request()->routeIs('admin.provinces.*')
        || request()->routeIs('admin.destinations.*')
        || request()->routeIs('admin.hotels.*')
        || request()->routeIs('admin.restaurants.*')
        || request()->routeIs('admin.attractions.*')
        ? 'opened active' : ''
    }}">

        <a href="#">
            <i class="entypo-location"></i>
            <span class="title">Blog Du Lịch</span>
        </a>

        <ul class="{{
            request()->routeIs('admin.countries.*')
            || request()->routeIs('admin.provinces.*')
            || request()->routeIs('admin.destinations.*')
            || request()->routeIs('admin.hotels.*')
            || request()->routeIs('admin.restaurants.*')
            || request()->routeIs('admin.attractions.*')
            ? 'visible' : ''
        }}">

            <li class="{{ request()->routeIs('admin.countries.*') ? 'active' : '' }}">
                <a href="{{ route('admin.countries.index') }}">
                    <span class="title">Quốc gia</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.provinces.*') ? 'active' : '' }}">
                <a href="{{ route('admin.provinces.index') }}">
                    <span class="title">Tỉnh / Thành phố</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}">
                <a href="{{ route('admin.destinations.index') }}">
                    <span class="title">Điểm đến</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.hotels.*') ? 'active' : '' }}">
                <a href="{{ route('admin.hotels.index') }}">
                    <span class="title">Khách sạn</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.restaurants.*') ? 'active' : '' }}">
                <a href="{{ route('admin.restaurants.index') }}">
                    <span class="title">Nhà hàng</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.attractions.*') ? 'active' : '' }}">
                <a href="{{ route('admin.attractions.index') }}">
                    <span class="title">Điểm tham quan</span>
                </a>
            </li>

        </ul>
    </li>

    {{-- Media --}}
    <li class="has-sub {{
        request()->routeIs('admin.media.*')
        || request()->routeIs('admin.sliders.*')
        ? 'opened active' : ''
    }}">

        <a href="#">
            <i class="entypo-picture"></i>
            <span class="title">Media & Giao diện</span>
        </a>

        <ul class="{{
            request()->routeIs('admin.media.*')
            || request()->routeIs('admin.sliders.*')
            ? 'visible' : ''
        }}">

            <li class="{{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                <a href="{{ route('admin.media.index') }}">
                    <span class="title">Media Library</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                <a href="{{ route('admin.sliders.index') }}">
                    <span class="title">Sliders</span>
                </a>
            </li>

        </ul>
    </li>

    {{-- SEO --}}
    <li class="has-sub {{
        request()->routeIs('admin.settings.*')
        ? 'opened active' : ''
    }}">

        <a href="#">
            <i class="entypo-cog"></i>
            <span class="title">SEO & Cấu hình</span>
        </a>

        <ul class="{{
            request()->routeIs('admin.settings.*')
            ? 'visible' : ''
        }}">

            <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}">
                    <span class="title">Cài đặt website</span>
                </a>
            </li>

        </ul>
    </li>

    {{-- Users --}}
    <li class="has-sub {{
        request()->routeIs('admin.users.*')
        ? 'opened active' : ''
    }}">

        <a href="#">
            <i class="entypo-users"></i>
            <span class="title">Người dùng</span>
        </a>

        <ul class="{{
            request()->routeIs('admin.users.*')
            ? 'visible' : ''
        }}">

            <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <span class="title">Tài khoản</span>
                </a>
            </li>

        </ul>
    </li>

</ul>

        </div>
    </div>

    <div class="main-content">

        <div class="row">
            <div class="col-md-6 col-sm-6 clearfix">
                <ul class="user-info pull-left pull-none-xsm">
                    <li class="profile-info dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="entypo-user"></i>
                            {{ auth()->user()->name ?? 'Admin' }}
                        </a>

                        <ul class="dropdown-menu">
                            <li class="caret"></li>

                            <li>
                                <a href="{{ route('admin.users.index') }}">
                                    <i class="entypo-users"></i>
                                    Quản lý tài khoản
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-sm-6 clearfix hidden-xs">
                <ul class="list-inline links-list pull-right">
                    <li>
                        <a href="{{ url('/') }}" target="_blank">
                            Xem website <i class="entypo-monitor right"></i>
                        </a>
                    </li>

                    <li class="sep"></li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="border:0;background:none;padding:0;">
                                Đăng xuất <i class="entypo-logout right"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        @yield('content')

    </div>

</div>

<script src="{{ asset('assets/admin/js/gsap/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/js/joinable.js') }}"></script>
<script src="{{ asset('assets/admin/js/resizeable.js') }}"></script>
<script src="{{ asset('assets/admin/js/neon-api.js') }}"></script>
<script src="{{ asset('assets/admin/js/neon-custom.js') }}"></script>

@yield('js')

</body>
</html>