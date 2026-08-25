{{-- =========================================================
    MOBILE SIDEBAR
========================================================= --}}

<div id="side-bar" class="side-bar header-two">

    <div class="mobile-menu-main d-block d-xl-none">

        {{-- Logo --}}
        <div class="logo-area">

            <a
                class="logo"
                href="{{ localized_route('home') }}"
            >
                <img
                    src="{{ setting_media('logo') }}"
                    alt="{{ setting('site_name', null, 'Senverse') }}"
                >
            </a>

            <button
                class="close-icon-menu"
                aria-label="Close Menu"
                type="button"
            >
                <i class="far fa-times"></i>
            </button>

        </div>


        {{-- Mobile Navigation --}}
        <nav class="nav-main mainmenu-nav mt--30">

            <ul
                class="mainmenu metismenu"
                id="mobile-menu-active"
            >

                {{-- Home --}}
                <li>
                    <a
                        href="{{ localized_route('home') }}"
                        class="main"
                    >
                        {{ app()->getLocale() === 'vi'
                            ? 'Trang Chủ'
                            : 'Home'
                        }}
                    </a>
                </li>


                {{-- Dynamic Menu --}}
                @foreach ($headerCategories as $category)

                    @php
                        /*
                        |--------------------------------------------------------------------------
                        | Parent URL
                        |--------------------------------------------------------------------------
                        */

                        $parentUrl = '#';

                        if (in_array($category->slug, [
                            'pos-system',
                            'merchant-services',
                        ])) {

                            $parentUrl = localized_route(
                                'solutions.show',
                                [
                                    'slug' => $category->slug,
                                ]
                            );

                        }

                        elseif ($category->slug === 'about-us') {

                            $parentUrl = localized_route('about');

                        }

                        elseif (in_array($category->slug, [
                            'resource',
                            'growth-services',
                        ])) {

                            $parentUrl = '#';

                        }
                    @endphp


                    {{-- Có menu con --}}
                    @if ($category->children->where('is_active', true)->count() > 0)

                        <li class="has-droupdown">

                            <a
                                href="{{ $parentUrl }}"
                                class="main"
                            >
                                {{ $category->name }}
                            </a>


                            <ul class="submenu mm-collapse">

                                @foreach ($category->children as $child)

                                    @if ($child->is_active)

                                        @php
                                            /*
                                            |--------------------------------------------------------------------------
                                            | Child URL
                                            |--------------------------------------------------------------------------
                                            */

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


                    {{-- Không có menu con --}}
                    @else

                        <li>

                            <a
                                href="{{ $parentUrl }}"
                                class="main"
                            >
                                {{ $category->name }}
                            </a>

                        </li>

                    @endif

                @endforeach


                {{-- Contact --}}
                <li>

                    <a
                        href="{{ localized_route('contact') }}"
                        class="main"
                    >
                        {{ app()->getLocale() === 'vi'
                            ? 'Liên Hệ'
                            : 'Contact'
                        }}
                    </a>

                </li>

            </ul>

        </nav>


        {{-- Language --}}
        <div class="mobile-language-switcher mt--30">

            <div class="mobile-language-title">

                {{ app()->getLocale() === 'vi'
                    ? 'Ngôn Ngữ'
                    : 'Language'
                }}

            </div>

            <div class="mobile-language-list">

                <a
                    href="{{ route('frontend.language.switch', 'en') }}"
                    class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"
                >
                    EN
                </a>

                <span>/</span>

                <a
                    href="{{ route('frontend.language.switch', 'vi') }}"
                    class="{{ app()->getLocale() === 'vi' ? 'active' : '' }}"
                >
                    VI
                </a>

            </div>

        </div>


        {{-- CTA --}}
        <div class="mobile-menu-cta mt--30">

            <a
                href="{{ localized_route('contact') }}"
                class="rts-btn btn-primary"
            >
                {{ app()->getLocale() === 'vi'
                    ? 'Bắt Đầu'
                    : 'Get Started'
                }}
            </a>

        </div>

    </div>

</div>