@if ($faqSection)
    @php
        $faqData = $faqSection->data_json ?? [];
        $faqs = $faqData['faqs'] ?? [];

        $isVietnamese = app()->getLocale() === 'vi';

        $sectionLabel = $isVietnamese
            ? 'Câu hỏi về social media cho tiệm nail'
            : 'Questions about nail salon social media';
    @endphp

    @if (!empty($faqs))

        <!-- Social media FAQ start -->
        <section
            class="rts-faq-area area-4 rts-section-gap"
            @if ($faqSection->title)
                aria-labelledby="social-media-faq-title"
            @else
                aria-label="{{ $sectionLabel }}"
            @endif
        >
            <div class="container">

                <div class="title-center-wrapper">

                    @if ($faqSection->subtitle)
                        <span class="pre">
                            {{ $faqSection->subtitle }}
                        </span>
                    @endif

                    @if ($faqSection->title)
                        <h2
                            id="social-media-faq-title"
                            class="title rts-text-anime-style-1"
                        >
                            {{ $faqSection->title }}
                        </h2>
                    @endif

                </div>

                <div class="section-inner mt--60">

                    <div
                        class="accordion"
                        id="socialMediaFaqAccordion"
                    >
                        @foreach ($faqs as $index => $faq)
                            @php
                                $faqId = 'socialMediaFaq' . $index;
                                $headingId = 'heading' . $faqId;
                                $collapseId = 'collapse' . $faqId;
                            @endphp

                            <div class="accordion-item">

                                <h3
                                    class="accordion-header"
                                    id="{{ $headingId }}"
                                >
                                    <button
                                        class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $collapseId }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="{{ $collapseId }}"
                                    >
                                        <span aria-hidden="true">
                                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}.
                                        </span>

                                        {{ $faq['question'] ?? '' }}
                                    </button>
                                </h3>

                                <div
                                    id="{{ $collapseId }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="{{ $headingId }}"
                                    data-bs-parent="#socialMediaFaqAccordion"
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
        <!-- Social media FAQ end -->

    @endif
@endif