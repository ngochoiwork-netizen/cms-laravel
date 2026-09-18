@if ($benefitSection)
    @php
        $benefitData = $benefitSection->data_json ?? [];
        $benefits = $benefitData['features'] ?? [];
    @endphp

    <section
        class="why-chooseus-area merchant-payment-methods rts-section-gap bg-light-2"
        aria-labelledby="social-media-benefits-title"
    >
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
                                <h2
                                    id="social-media-benefits-title"
                                    class="title rts-text-anime-style-1"
                                >
                                    {{ $benefitSection->title }}
                                </h2>
                            @endif

                        </div>

                        @if ($benefitSection->content)
                            <div class="disc">
                                {!! $benefitSection->content !!}
                            </div>
                        @endif

                        @if (!empty($benefits))
                            <div class="reason-wrapper">

                                @foreach ($benefits as $item)
                                    <article class="single-reason">

                                        @if (!empty($item['icon']))
                                            <div class="icon" aria-hidden="true">
                                                <i class="{{ $item['icon'] }}"></i>
                                            </div>
                                        @endif

                                        @if (!empty($item['title']))
                                            <h3 class="title">
                                                {{ $item['title'] }}
                                            </h3>
                                        @endif

                                    </article>
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
                                alt="{{ $benefitSection->title ?? 'Social media benefits for nail salons' }}"
                                class="one"
                            >
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </section>
@endif