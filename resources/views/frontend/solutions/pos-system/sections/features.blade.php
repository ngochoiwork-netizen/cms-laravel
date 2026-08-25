<!-- rts feature area start -->
@if ($featureSection)
    <div id="features" class="rts-feature-area-three rts-section-gap">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="title-center-wrapper">

                        @if ($featureSection->subtitle)
                            <span class="pre">
                                {{ $featureSection->subtitle }}
                            </span>
                        @endif

                        @if ($featureSection->title)
                            <h2 class="title mb--0 rts-text-anime-style-1">
                                {!! $featureSection->title !!}
                            </h2>
                        @endif

                    </div>
                </div>
            </div>

            @php
                $features = $featureSection->data_json ?? [];
            @endphp

            @if (!empty($features))
                <div class="row g-5 mt--30">

                    @foreach ($features as $feature)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                            <div class="single-feature-area-four">

                                <div class="icon">
                                    @if (!empty($feature['icon']))
                                        <i class="{{ $feature['icon'] }} fa-2x"></i>
                                    @endif
                                </div>

                                <div class="content">

                                    @if (!empty($feature['name']))
                                        <h3 class="title">
                                            {{ $feature['name'] }}
                                        </h3>
                                    @endif

                                    @if (!empty($feature['description']))
                                        <p class="disc">
                                            {{ $feature['description'] }}
                                        </p>
                                    @endif

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </div>
@endif
<!-- rts feature area end -->