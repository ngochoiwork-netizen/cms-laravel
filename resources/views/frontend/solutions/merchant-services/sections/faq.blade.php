@if ($faqSection)

    @php
        $faqData = $faqSection->data_json ?? [];
        $faqs = $faqData['faqs'] ?? [];
    @endphp

    @if (!empty($faqs))

        <!-- rts faq area start -->
        <section class="rts-faq-area area-4 rts-section-gap">

            <div class="container">

                <div class="title-center-wrapper">

                    @if ($faqSection->subtitle)
                        <span class="pre">
                            {{ $faqSection->subtitle }}
                        </span>
                    @endif

                    @if ($faqSection->title)
                        <h2 class="title rts-text-anime-style-1">
                            {{ $faqSection->title }}
                        </h2>
                    @endif

                </div>


                <div class="section-inner mt--60">

                    <div
                        class="accordion"
                        id="merchantFaqAccordion"
                    >

                        @foreach ($faqs as $index => $faq)

                            @php
                                $faqId = 'merchantFaq' . $index;
                            @endphp

                            <div class="accordion-item">

                                <h2
                                    class="accordion-header"
                                    id="heading{{ $faqId }}"
                                >

                                    <button
                                        class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faqId }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $faqId }}"
                                    >

                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}.

                                        {{ $faq['question'] ?? '' }}

                                    </button>

                                </h2>


                                <div
                                    id="collapse{{ $faqId }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $faqId }}"
                                    data-bs-parent="#merchantFaqAccordion"
                                >

                                    <div class="accordion-body">

                                        {!! $faq['answer'] ?? '' !!}

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </section>
        <!-- rts faq area end -->

    @endif

@endif