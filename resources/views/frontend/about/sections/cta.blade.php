@if ($ctaSection)

    <div class="rts-call-to-action-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-wrapper-three in-primary-bg marketing">
                        @if ($ctaSection->title)
                            <h3 class="title rts-text-anime-style-1">
                                {{ $ctaSection->title }}
                            </h3>
                        @endif
                        @if ($ctaSection->subtitle)
                            <p class="disc">
                                {{ $ctaSection->subtitle }}
                            </p>
                        @endif
                        @if ($ctaSection->button_text && $ctaSection->button_link)
                            <a
                                href="{{ localized_url($ctaSection->button_link) }}"
                                class="rts-btn btn-primary with-arrow btn-white"
                            >
                                {{ $ctaSection->button_text }}
                                <i class="fa-regular fa-arrow-up up-right"></i>
                            </a>
                        @endif
                        <div class="round one"></div>
                        <div class="round two"></div>
                        <div class="round three"></div>
                        <div class="bg-shape one">
                            <img
                                src="{{ asset('assets/frontend/images/cta/shape-01.svg') }}"
                                alt=""
                            >
                        </div>
                        <div class="bg-shape two">
                            <img
                                src="{{ asset('assets/frontend/images/cta/shape-02.svg') }}"
                                alt=""
                            >
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endif