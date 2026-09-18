@if ($whySection)
    @php
        $whyData = $whySection->data_json ?? [];
        $features = $whyData['features'] ?? [];
        $isVietnamese = app()->getLocale() === 'vi';

        $sectionLabel = $isVietnamese
            ? 'Vì sao chọn Senverse'
            : 'Why choose Senverse';
    @endphp

    <!-- Why choose Senverse start -->
    <section
        class="rts-section-gap our-vission area-4 bg_dark"
        @if ($whySection->subtitle)
            aria-labelledby="why-senverse-heading"
        @else
            aria-label="{{ $sectionLabel }}"
        @endif
    >
        <div class="container">

            <div class="row align-items-center">

                <div class="col-xl-4">
                    <div class="our-vision-left-content">

                        <div class="title-left-wrapper">

                            @if ($whySection->subtitle)
                                <h2
                                    id="why-senverse-heading"
                                    class="title rts-text-anime-style-1"
                                >
                                    {{ $whySection->subtitle }}
                                </h2>
                            @endif

                        </div>

                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="floating-div">

                        <div class="our-vision-right-content">

                            @if ($whySection->image)
                                <div class="image-area">
                                    <img
                                        src="{{ $whySection->image->url ?? '' }}"
                                        width="520"
                                        alt="{{ $whySection->title ?? $sectionLabel }}"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </div>
                            @endif

                            <div class="content-area">

                                <div class="title-left-wrapper">

                                    @if ($whySection->title)
                                        <h3 class="title rts-text-anime-style-1">
                                            {{ $whySection->title }}
                                        </h3>
                                    @endif

                                </div>

                                @if ($whySection->content)
                                    <div class="disc">
                                        {!! $whySection->content !!}
                                    </div>
                                @endif

                                @if (!empty($features))
                                    <ul class="check-main-wrapper">

                                        @foreach ($features as $feature)
                                            <li class="single-check">

                                                <i
                                                    class="fa-regular fa-check"
                                                    aria-hidden="true"
                                                ></i>

                                                <span>
                                                    {{ $feature }}
                                                </span>

                                            </li>
                                        @endforeach

                                    </ul>
                                @endif

                                @if ($whySection->button_text && $whySection->button_link)
                                    <a
                                        href="{{ localized_url($whySection->button_link) }}"
                                        class="rts-btn btn-primary"
                                    >
                                        {{ $whySection->button_text }}
                                    </a>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Why choose Senverse end -->
@endif