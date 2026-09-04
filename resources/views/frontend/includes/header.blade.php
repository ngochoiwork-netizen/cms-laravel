<header class="header-one header--sticky senverse-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-wrapper-main">
                    {{-- Logo --}}
                    <div class="logo-area">
                        <a href="{{ localized_route('home') }}">
                            <img
                                src="{{ setting_media('logo') }}"
                                alt="{{ setting('site_name', null, 'Senverse') }}"
                            >
                        </a>
                    </div>
                    {{-- Menu --}}
                    <div class="nav-area">
                        <ul>

                            @foreach ($headerCategories as $category)

                                @php
                                    $parentUrl = '#';

                                    if (in_array($category->slug, [
                                        'pos-system',
                                        'merchant-services',
                                    ])) {
                                        $parentUrl = localized_route('solutions.show', [
                                            'slug' => $category->slug,
                                        ]);
                                    }

                                    elseif ($category->slug === 'about-us') {
                                        $parentUrl = localized_route('about');
                                    }

                                    elseif ($category->slug === 'resource') {
                                        $parentUrl = '#';
                                    }

                                    elseif ($category->slug === 'growth-services') {
                                        $parentUrl = '#';
                                    }
                                @endphp


                                @if ($category->children->count() > 0)

                                    <li class="main-nav has-dropdown project-a-after">

                                        <a href="{{ $parentUrl }}">
                                            {{ $category->name }}
                                        </a>

                                        <ul class="submenu parent-nav new">

                                            @foreach ($category->children as $child)

                                                @if ($child->is_active)

                                                    @php
                                                        $childUrl = '#';

                                                        if ($category->slug === 'growth-services') {

                                                            $childUrl = localized_route(
                                                                'solutions.show',
                                                                [
                                                                    'slug' => $child->slug,
                                                                ]
                                                            );

                                                        }

                                                        elseif ($category->slug === 'resource') {

                                                            $childUrl = localized_route(
                                                                'resources.category',
                                                                [
                                                                    'categorySlug' => $child->slug,
                                                                ]
                                                            );

                                                        }
                                                    @endphp

                                                    <li>
                                                        <a href="{{ $childUrl }}">
                                                            {{ $child->name }}
                                                        </a>
                                                    </li>

                                                @endif

                                            @endforeach

                                        </ul>
                                    </li>

                                @else

                                    <li class="main-nav">
                                        <a href="{{ $parentUrl }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>

                                @endif

                            @endforeach

                        </ul>
                    </div>


                    <div class="button-wrapper-flex">

                        {{-- Language --}}
                        <div class="select-area language">
                            <ul>
                                <li class="main-nav has-dropdown project-a-after">

                                    <img
                                        src="{{ asset('assets/frontend/images/header/01.svg') }}"
                                        alt=""
                                    >

                                    <a href="#">
                                        {{ strtoupper(app()->getLocale()) }}
                                    </a>

                                    <ul class="submenu parent-nav">

                                        <li>
                                            <a href="{{ route('frontend.language.switch', 'en') }}">
                                                EN
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('frontend.language.switch', 'vi') }}">
                                                VI
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>


                        {{-- Contact --}}
                        <a
                            href="{{ localized_route('contact') }}"
                            class="rts-btn btn-primary"
                        >
                            Get Start
                        </a>


                        <button
                            type="button"
                            class="menu-btn-toggle white"
                            aria-label="{{ app()->getLocale() === 'vi'
                                ? 'Mở menu điều hướng'
                                : 'Open navigation menu' }}"
                            aria-controls="side-bar"
                        >
                            <svg
                                width="20"
                                height="16"
                                viewBox="0 0 20 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                focusable="false"
                            >
                                <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                <rect width="20" height="2" fill="#1F1F25"></rect>
                            </svg>
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</header>