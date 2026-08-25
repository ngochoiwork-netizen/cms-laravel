@if ($heroSection)
    <!-- rts about-breadcrumb-area-start -->
    <div class="rts-about-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="rts-about-breadcrumb-content">
                        <ul>
                            <li>
                                <a href="{{ localized_route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                            </li>
                            <li class="active">
                                <a href="localized_route('about')">
                                    {{ $page->title ?? 'About' }}
                                </a>
                            </li>
                        </ul>
                        @if ($heroSection->title)
                            <h1 class="title rts-text-anime-style-1">
                                {{ $heroSection->title }}
                            </h1>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 pl--50 pl_md--10 pl_sm--10">
                    @if ($heroSection->image)
                        <div class="rts-about-breadcrumb-image">
                            <img
                                src="{{ asset('storage/' . $heroSection->image->file_path) }}"
                                alt="{{ $heroSection->title ?? $page->title ?? 'About Senverse' }}"
                            >
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>
    <!-- rts about-breadcrumb-area-end -->

@endif