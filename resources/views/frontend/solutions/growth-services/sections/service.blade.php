@if ($serviceSection && $serviceSection->is_active)
    @php
        $services = $serviceSection->data_json ?? [];
        $isVietnamese = app()->getLocale() === 'vi';
    @endphp

    <!-- Social media services start -->
    <section
        class="rts-service-area rts-section-gap"
        aria-labelledby="service-section-title"
    >
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">

                        <div class="title-left-wrapper">

                            @if ($serviceSection->subtitle)
                                <span class="pre">
                                    {{ $serviceSection->subtitle }}
                                </span>
                            @endif

                            @if ($serviceSection->title)
                                <h2
                                    id="service-section-title"
                                    class="title rts-text-anime-style-1"
                                >
                                    {!! nl2br(e($serviceSection->title)) !!}
                                </h2>
                            @endif

                            @if ($serviceSection->content)
                                <div class="disc">
                                    {!! $serviceSection->content !!}
                                </div>
                            @endif

                        </div>

                        @if (count($services) > 1)
                            <div class="right-area">
                                <div class="swiper-navigation">

                                    <button
                                        type="button"
                                        class="swiper-btn swiper-button-prev"
                                        aria-label="{{ $isVietnamese ? 'Xem dịch vụ trước' : 'View previous service' }}"
                                    >
                                        <i
                                            class="fa-solid fa-chevron-left"
                                            aria-hidden="true"
                                        ></i>
                                    </button>

                                    <button
                                        type="button"
                                        class="swiper-btn swiper-button-next"
                                        aria-label="{{ $isVietnamese ? 'Xem dịch vụ tiếp theo' : 'View next service' }}"
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

            @if (!empty($services))
                <div class="row mt--40">
                    <div class="col-lg-12">

                        <div class="float-div-right">
                            <div class="swiper mySwiper-service-main">
                                <div class="swiper-wrapper">

                                    @foreach ($services as $item)
                                        <div class="swiper-slide">

                                            <article class="single-service-security">

                                                <div class="icon" aria-hidden="true">
                                                    <i class="{{ $item['icon'] ?? 'fa-regular fa-circle-check' }} fa-2x"></i>
                                                </div>

                                                @if (!empty($item['title']))
                                                    <h3 class="title">
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
    <!-- Social media services end -->
@endif