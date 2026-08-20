@if ($faqs->count())

    <!-- rts faq area start -->
    <section class="rts-faq-area area-4 rts-section-gap">

        <div class="container">

            <div class="title-center-wrapper">

                <h2 class="title rts-text-anime-style-1">

                    {{ app()->getLocale() === 'vi'
                        ? 'Câu Hỏi Thường Gặp'
                        : 'Frequently Asked Questions'
                    }}

                </h2>

            </div>

            <div class="section-inner mt--60">

                <div class="accordion" id="accordionExample">

                    @foreach ($faqs as $index => $faq)

                        <div class="accordion-item">

                            <h2 class="accordion-header"
                                id="heading{{ $faq->id }}">

                                <button
                                    class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $faq->id }}"
                                >

                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}.

                                    {{ $faq->title }}

                                </button>

                            </h2>

                            <div
                                id="collapse{{ $faq->id }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $faq->id }}"
                                data-bs-parent="#accordionExample"
                            >

                                <div class="accordion-body">

                                    {!! $faq->short_description !!}

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