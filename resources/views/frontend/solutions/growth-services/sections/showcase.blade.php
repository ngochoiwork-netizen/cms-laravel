@if ($showcaseSection && $showcaseSection->is_active && $showcasePosts->isNotEmpty())

    <!-- rts case area start -->
    <div class="rts-case-area rts-section-gap bg_light">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">

                        <div class="title-left-wrapper">

                            @if ($showcaseSection->subtitle)
                                <span class="pre">
                                    {{ $showcaseSection->subtitle }}
                                </span>
                            @endif

                            @if ($showcaseSection->title)
                                <h2 class="title rts-text-anime-style-1">
                                    {!! nl2br(e($showcaseSection->title)) !!}
                                </h2>
                            @endif

                        </div>

                        <div class="right-area">

                            @if ($showcaseSection->content)
                                <div class="disc">
                                    {!! $showcaseSection->content !!}
                                </div>
                            @endif

                            @if ($showcaseSection->button_text && $showcaseSection->button_link)
                                <a
                                    href="{{ localized_url($showcaseSection->button_link) }}"
                                    class="btn-line"
                                >
                                    <span>
                                        {{ $showcaseSection->button_text }}
                                    </span>

                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

            <div class="row g-5 mt--10">
                <div class="col-lg-12">

                    <div class="swiper mySwiper-case-one">
                        <div class="swiper-wrapper">

                            @foreach ($showcasePosts as $post)

                                <div class="swiper-slide">
                                    <div class="single-case-style-one">

                                        @if ($post->thumbnail)
                                            <a
                                                href="{{ localized_route('resources.show', [
                                                    'categorySlug' => $post->category->slug,
                                                    'postSlug' => $post->slug,
                                                ]) }}"
                                                class="thumbnail-case"
                                            >
                                                <img
                                                    src="{{ asset('storage/' . $post->thumbnail->file_path) }}"
                                                    alt="{{ $post->thumbnail->alt_text ?: $post->title }}"
                                                >
                                            </a>
                                        @endif

                                        <a
                                            href="{{ localized_route('resources.show', [
                                                'categorySlug' => $post->category->slug,
                                                'postSlug' => $post->slug,
                                            ]) }}"
                                            class="inner-content"
                                        >
                                            <span>
                                                {{ $post->category->name }}
                                            </span>

                                            <h5 class="title">
                                                {{ $post->title }}
                                            </h5>
                                        </a>

                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- rts case area end -->

@endif