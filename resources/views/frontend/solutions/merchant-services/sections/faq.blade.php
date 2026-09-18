@if ($faqSection)
    @php
        $faqData = $faqSection->data_json ?? [];

        $faqs = collect($faqData['faqs'] ?? [])
            ->filter(function ($faq) {
                return !empty($faq['question']);
            })
            ->values();

        $isVietnamese = app()->getLocale() === 'vi';

        $sectionLabel = $isVietnamese
            ? 'Câu hỏi thường gặp về xử lý thanh toán cho tiệm nail'
            : 'Frequently asked questions about nail salon payment processing';
    @endphp

    @if ($faqs->isNotEmpty())

        <!-- Merchant Services FAQ start -->
        <section
            id="merchant-services-faq"
            class="rts-faq-area area-4 rts-section-gap"
            @if ($faqSection->title)
                aria-labelledby="merchant-services-faq-title"
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
                            id="merchant-services-faq-title"
                            class="title rts-text-anime-style-1"
                        >
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
                                $faqNumber = $index + 1;
                                $faqId = 'merchant-faq-' . $faqNumber;
                                $headingId = $faqId . '-heading';
                                $collapseId = $faqId . '-answer';
                                $isFirstFaq = $index === 0;
                            @endphp

                            <div class="accordion-item">

                                <h3
                                    class="accordion-header"
                                    id="{{ $headingId }}"
                                >
                                    <button
                                        class="accordion-button {{ !$isFirstFaq ? 'collapsed' : '' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $collapseId }}"
                                        aria-expanded="{{ $isFirstFaq ? 'true' : 'false' }}"
                                        aria-controls="{{ $collapseId }}"
                                    >
                                        <span
                                            class="merchant-faq-number"
                                            aria-hidden="true"
                                        >
                                            {{ str_pad($faqNumber, 2, '0', STR_PAD_LEFT) }}.
                                        </span>

                                        <span class="merchant-faq-question">
                                            {{ $faq['question'] }}
                                        </span>
                                    </button>
                                </h3>

                                <div
                                    id="{{ $collapseId }}"
                                    class="accordion-collapse collapse {{ $isFirstFaq ? 'show' : '' }}"
                                    aria-labelledby="{{ $headingId }}"
                                    data-bs-parent="#merchantFaqAccordion"
                                >
                                    <div class="accordion-body">
                                        <p>
                                            {!! nl2br(e($faq['answer'] ?? '')) !!}
                                        </p>
                                    </div>
                                </div>

                            </div>

                        @endforeach
                    </div>

                </div>

            </div>
        </section>
        <!-- Merchant Services FAQ end -->

    @endif
@endif