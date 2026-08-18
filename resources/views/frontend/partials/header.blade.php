@php
    use App\Models\Media;

    $logoLight = null;
    $logoDark = null;

    if (setting('site_logo_light')) {
        $media = Media::find(setting('site_logo_light'));
        $logoLight = $media?->path;
    }

    if (setting('site_logo')) {
        $media = Media::find(setting('site_logo'));
        $logoDark = $media?->path;
    }

    $logoLight = $logoLight ? asset('storage/' . $logoLight) : asset('assets/frontend/img/logo-light.png');
    $logoDark  = $logoDark ? asset('storage/' . $logoDark) : asset('assets/frontend/img/logo.png');

    $currentPath = request()->path();
@endphp

<!-- Header 
============================================= -->
<header>
    <nav class="navbar mobile-sidenav nav-border navbar-sticky navbar-default validnavs navbar-fixed white no-background">

        <div class="container d-flex justify-content-between align-items-center">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ $logoLight }}" class="logo logo-display" alt="{{ setting('site_name', 'Logo') }}">
                    <img src="{{ $logoDark }}" class="logo logo-scrolled" alt="{{ setting('site_name', 'Logo') }}">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">

                <div class="collapse-header">
                    <img src="{{ $logoDark }}" alt="{{ setting('site_name', 'Logo') }}">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                </div>

                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">

                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Trang chủ</a>
                    </li>

                    <li class="{{ request()->is('gioi-thieu') ? 'active' : '' }}">
                        <a href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
                    </li>

                    @foreach($headerCategories as $category)
                        @php
                            $hasChildren = $category->children->count() > 0;
                            $isActive = request()->is($category->slug) || request()->is($category->slug . '/*');
                        @endphp

                        <li class="{{ $hasChildren ? 'dropdown' : '' }} {{ $isActive ? 'active' : '' }}">
                            <a href="{{ url($category->slug) }}"
                               class="{{ $hasChildren ? 'dropdown-toggle' : '' }}"
                               @if($hasChildren) data-toggle="dropdown" @endif>
                                {{ $category->name }}
                            </a>

                            @if($hasChildren)
                                <ul class="dropdown-menu">
                                    @foreach($category->children as $child)
                                        <li>
                                            <a href="{{ url($child->slug) }}">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    <li class="{{ request()->is('san-pham') ? 'active' : '' }}">
                        <a href="{{ url('/san-pham') }}">Sản Phẩm</a>
                    </li>

                    <li class="{{ request()->is('lien-he') ? 'active' : '' }}">
                        <a href="{{ url('/lien-he') }}">Liên hệ</a>
                    </li>

                </ul>
            </div>

            <div class="attr-right">
                <div class="attr-nav">
                    <ul>
                        <li class="contact">
                            <div class="call">
                                <div class="icon">
                                    <i class="fas fa-comments-alt-dollar"></i>
                                </div>
                                <div class="info">
                                    <p>{{ setting('header_contact_text', 'Bạn cần hỗ trợ?') }}</p>
                                    <h5>
                                        <a href="mailto:{{ setting('site_email', 'sales@atenvn.com') }}">
                                            {{ setting('site_email', 'sales@atenvn.com') }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="overlay-screen"></div>
    </nav>
</header>
<!-- End Header -->