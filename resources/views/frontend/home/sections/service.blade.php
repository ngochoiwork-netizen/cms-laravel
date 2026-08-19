@if ($serviceSection)

    @php
        $serviceData = $serviceSection->data_json ?? [];
        $services = $serviceData['services'] ?? [];
    @endphp

    <!-- rts service area start -->
    <div class="rts-service-area-four rts-section-gap">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="title-area-between">

                        <div class="title-left-wrapper">

                            @if ($serviceSection->subtitle)
                                <span class="pre-title">
                                    {{ $serviceSection->subtitle }}
                                </span>
                            @endif

                            @if ($serviceSection->title)
                                <h2 class="title rts-text-anime-style-1">
                                    {{ $serviceSection->title }}
                                </h2>
                            @endif

                        </div>

                        @if ($serviceSection->button_text && $serviceSection->button_link)

                            <div class="right-area">

                                <a href="{{ url($serviceSection->button_link) }}">

                                    <span>
                                        {{ $serviceSection->button_text }}
                                    </span>

                                    <i class="fa-light fa-arrow-right"></i>

                                </a>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

            @if (!empty($services))

                <div class="row g-5 mt--10">

                    @foreach ($services as $service)

                        <div class="col-lg-4 col-md-6 col-sm-6">

                            <div class="single-service-style-four">

                                <div class="icon">

                                    @if (!empty($service['icon']))

                                        <i class="{{ $service['icon'] }} fa-2x"></i>

                                    @endif

                                    <a href="{{ url($service['link'] ?? '#') }}"
                                        class="round-btn">

                                        <i class="fa-light fa-arrow-right"></i>

                                    </a>

                                </div>

                                <h5 class="title">

                                    <a href="{{ url($service['link'] ?? '#') }}">

                                        {{ $service['title'] ?? '' }}

                                    </a>

                                </h5>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>
    <!-- rts service area end -->

@endif