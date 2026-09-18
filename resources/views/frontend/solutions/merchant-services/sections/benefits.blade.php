@if ($benefitSection && $benefitSection->is_active)
    @php
        $benefits = $benefitSection->data_json ?? [];
        $isVietnamese = app()->getLocale() === 'vi';

        $previousLabel = $isVietnamese
            ? 'Xem lợi ích trước'
            : 'View previous benefit';

        $nextLabel = $isVietnamese
            ? 'Xem lợi ích tiếp theo'
            : 'View next benefit';

        $sectionLabel = $isVietnamese
            ? 'Lợi ích của Senverse Merchant Services'
            : 'Benefits of Senverse Merchant Services';
    @endphp

    <!-- Merchant benefits area start -->
    <section
        id="merchant-benefits"
        class="rts-service-area rts-section-gap"
        @if ($benefitSection->title)
            aria-labelledby="merchant-benefits-title"
        @else
            aria-label="{{ $sectionLabel }}"
        @endif
    >
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <div class="title-area-between">

                        <div class="title-left-wrapper">

                            @if ($benefitSection->subtitle)
                                <span class="pre">
                                    {{ $benefitSection->subtitle }}
                                </span>
                            @endif

                            @if ($benefitSection->title)
                                <h2
                                    id="merchant-benefits-title"
                                    class="title rts-text-anime-style-1"
                                >
                                    {!! nl2br(e($benefitSection->title)) !!}
                                </h2>
                            @endif

                            @if ($benefitSection->content)
                                <div class="disc merchant-benefits-intro">
                                    {!! $benefitSection->content !!}
                                </div>
                            @endif

                        </div>

                        @if (count($benefits) > 1)
                            <div class="right-area">

                                <div
                                    class="swiper-navigation"
                                    aria-label="{{ $isVietnamese
                                        ? 'Điều hướng danh sách lợi ích'
                                        : 'Benefits navigation' }}"
                                >
                                    <button
                                        type="button"
                                        class="swiper-btn swiper-button-prev"
                                        aria-label="{{ $previousLabel }}"
                                        aria-controls="merchant-benefits-slider"
                                    >
                                        <i
                                            class="fa-solid fa-chevron-left"
                                            aria-hidden="true"
                                        ></i>
                                    </button>

                                    <button
                                        type="button"
                                        class="swiper-btn swiper-button-next"
                                        aria-label="{{ $nextLabel }}"
                                        aria-controls="merchant-benefits-slider"
                                    >
                                        <i
                                            class="fa-solid fa-chevron-right"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </div>

                            </div>
                        @endif

                    </div>

                </div>
            </div>

            @if (!empty($benefits))
                <div class="row mt--40">
                    <div class="col-lg-12">

                        <div class="float-div-right">

                            <div
                                id="merchant-benefits-slider"
                                class="swiper mySwiper-service-main"
                                role="region"
                                aria-roledescription="carousel"
                                aria-label="{{ $sectionLabel }}"
                            >
                                <div class="swiper-wrapper">

                                    @foreach ($benefits as $item)
                                        <div class="swiper-slide">

                                            <article class="single-service-security">

                                                <div
                                                    class="icon"
                                                    aria-hidden="true"
                                                >
                                                    <i
                                                        class="{{ $item['icon'] ?? 'fa-regular fa-circle-check' }} fa-2x"
                                                    ></i>
                                                </div>

                                                @if (!empty($item['title']))
                                                    <h3 class="title merchant-benefit-title">
                                                        {{ $item['title'] }}
                                                    </h3>
                                                @endif

                                                @if (!empty($item['description']))
                                                    <p class="disc">
                                                        {{ $item['description'] }}
                                                    </p>
                                                @endif

                                            </article>

                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endif

        </div>
    </section>
    <!-- Merchant benefits area end -->
@endif