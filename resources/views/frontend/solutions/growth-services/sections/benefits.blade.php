@if ($benefitSection)
    @php
        $benefitData = $benefitSection->data_json ?? [];
        $benefits = $benefitData['features'] ?? [];
    @endphp

    <div class="why-chooseus-area merchant-payment-methods rts-section-gap bg-light-2">
        <div class="container">
            <div class="row">

                <div class="col-lg-5">
                    <div class="why-choose-left-content">

                        <div class="title-left-wrapper">

                            @if ($benefitSection->subtitle)
                                <span class="pre">
                                    {{ $benefitSection->subtitle }}
                                </span>
                            @endif

                            @if ($benefitSection->title)
                                <h2 class="title rts-text-anime-style-1">
                                    {{ $benefitSection->title }}
                                </h2>
                            @endif

                        </div>

                        @if ($benefitSection->content)
                            <p class="disc">
                                {!! $benefitSection->content !!}
                            </p>
                        @endif

                        @if (!empty($benefits))

                            <div class="reason-wrapper">

                                @foreach ($benefits as $item)

                                    <div class="single-reason">

                                        @if (!empty($item['icon']))
                                            <div class="icon">
                                                <i class="{{ $item['icon'] }}"></i>
                                            </div>
                                        @endif

                                        @if (!empty($item['title']))
                                            <h5 class="title">
                                                {{ $item['title'] }}
                                            </h5>
                                        @endif

                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>
                </div>

                <div class="offset-lg-1 col-lg-6">

                    @if ($benefitSection->image)

                        <div class="why-choose-iamge-two merchant-payment-image">

                            <img
                                src="{{ asset('storage/' . $benefitSection->image->file_path) }}"
                                alt="{{ $benefitSection->title ?? 'Benefits' }}"
                                class="one"
                            >

                        </div>

                    @endif

                </div>

            </div>
        </div>
    </div>

@endif