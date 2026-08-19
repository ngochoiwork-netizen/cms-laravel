    <header class="header-one header-relative header--sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-wrapper-main">
                        <div class="logo-area">
                            <a href="index-four.html">
                                <img src="{{ asset('assets/frontend/images/logo/03.svg') }}" alt="logo">
                            </a>
                        </div>
                        <div class="nav-area">
                            <ul class="">
                                    @foreach ($headerCategories as $category)

                                    @php
                                        $translation = $category->translations->first();
                                    @endphp

                                    @if ($category->children->count() > 0)

                                        <li class="main-nav has-dropdown project-a-after">

                                            <a href="{{ url($translation?->slug ?? $category->slug) }}">
                                                {{ $translation?->name ?? $category->name }}
                                            </a>

                                            <ul class="submenu parent-nav new">

                                                @foreach ($category->children as $child)

                                                    @php
                                                        $childTranslation = $child->translations->first();
                                                    @endphp

                                                    <li>
                                                        <a href="{{ url($childTranslation?->slug ?? $child->slug) }}">
                                                            {{ $childTranslation?->name ?? $child->name }}
                                                        </a>
                                                    </li>

                                                @endforeach

                                            </ul>

                                        </li>

                                    @else

                                        <li class="main-nav">

                                            <a href="{{ url($translation?->slug ?? $category->slug) }}">
                                                {{ $translation?->name ?? $category->name }}
                                            </a>

                                        </li>

                                    @endif

                                @endforeach
                            </ul>
                        </div>
                        <div class="button-wrapper-flex">
                            <div class="select-area language">
                                <ul>
                                    <li class="main-nav has-dropdown project-a-after">

                                        <img src="{{ asset('assets/frontend/images/header/01.svg') }}" alt="">

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
                            <a href="contact-software-company.html" class="rts-btn btn-primary">Get Start</a>
                            <div class="menu-btn-toggle white">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                    <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                    <rect width="20" height="2" fill="#1F1F25"></rect>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>