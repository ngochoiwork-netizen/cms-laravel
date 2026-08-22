@if ($serviceSection && $serviceSection->is_active)
    @php
        $services = $serviceSection?->data_json ?? [];
    @endphp

    <!-- merchant benefits area start -->
    <div class="rts-service-area rts-section-gap">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <div class="title-left-wrapper">

                            @if ($serviceSection?->subtitle)
                                <span class="pre">
                                    {{ $serviceSection->subtitle }}
                                </span>
                            @endif

                            @if ($serviceSection?->title)
                                <h2 class="title rts-text-anime-style-1">
                                    {!! nl2br(e($serviceSection->title)) !!}
                                </h2>
                            @endif

                        </div>

                        <div class="right-area">
                            <div class="swiper-navigation">

                                <div class="swiper-btn swiper-button-prev">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </div>

                                <div class="swiper-btn swiper-button-next">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </div>

                            </div>
                        </div>

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

                                            <div class="single-service-security">

                                                <div class="icon">
                                                    <i class="{{ $item['icon'] ?? 'fa-regular fa-circle-check' }} fa-2x"></i>
                                                </div>

                                                @if (!empty($item['title']))
                                                    <h5 class="title">
                                                        {{ $item['title'] }}
                                                    </h5>
                                                @endif

                                                @if (!empty($item['description']))
                                                    <p class="disc">
                                                        {{ $item['description'] }}
                                                    </p>
                                                @endif

                                            </div>

                                        </div>

                                    @endforeach

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- merchant benefits area end -->

@endif