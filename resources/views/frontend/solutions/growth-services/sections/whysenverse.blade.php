@if ($whySection)

    @php
        $whyData = $whySection->data_json ?? [];
        $features = $whyData['features'] ?? [];
    @endphp

    <!-- what we want to do -->
    <div class="rts-section-gap our-vission area-4 bg_dark ">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-xl-4">

                    <div class="our-vision-left-content">

                        <div class="title-left-wrapper">

                            @if ($whySection->subtitle)
                                <h2 class="title rts-text-anime-style-1">
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
                                        alt="{{ $whySection->title ?? 'Why Senverse' }}"
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

                                    <p class="disc">
                                        {!! $whySection->content !!}
                                    </p>

                                @endif

                                @if (!empty($features))

                                    <div class="check-main-wrapper">

                                        @foreach ($features as $feature)

                                            <div class="single-check">

                                                <i class="fa-regular fa-check"></i>

                                                <p>
                                                    {{ $feature }}
                                                </p>

                                            </div>

                                        @endforeach

                                    </div>

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

    </div>
    <!-- what we want to do end -->

@endif