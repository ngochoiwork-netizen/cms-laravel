@if ($paymentMethodSection)
    @php
        $paymentData = $paymentMethodSection->data_json ?? [];
        $paymentMethods = $paymentData['features'] ?? [];
        $isVietnamese = app()->getLocale() === 'vi';

        $sectionLabel = $isVietnamese
            ? 'Các phương thức thanh toán được hỗ trợ'
            : 'Supported payment methods';

        $imageAlt = $isVietnamese
            ? 'Khách hàng thanh toán tại quầy của tiệm nail'
            : 'Client making a payment at a nail salon checkout counter';
    @endphp

    <section
        id="merchant-payment-options"
        class="why-chooseus-area merchant-payment-methods rts-section-gap bg-light-2"
        @if ($paymentMethodSection->title)
            aria-labelledby="merchant-payment-options-title"
        @else
            aria-label="{{ $sectionLabel }}"
        @endif
    >
        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-5">

                    <div class="why-choose-left-content">

                        <div class="title-left-wrapper">

                            @if ($paymentMethodSection->subtitle)
                                <span class="pre">
                                    {{ $paymentMethodSection->subtitle }}
                                </span>
                            @endif

                            @if ($paymentMethodSection->title)
                                <h2
                                    id="merchant-payment-options-title"
                                    class="title rts-text-anime-style-1"
                                >
                                    {{ $paymentMethodSection->title }}
                                </h2>
                            @endif

                        </div>

                        @if ($paymentMethodSection->content)
                            <div class="disc merchant-payment-intro">
                                {!! $paymentMethodSection->content !!}
                            </div>
                        @endif

                        @if (!empty($paymentMethods))
                            <div
                                class="reason-wrapper"
                                aria-label="{{ $sectionLabel }}"
                            >
                                @foreach ($paymentMethods as $item)
                                    <div class="single-reason">

                                        @if (!empty($item['icon']))
                                            <div
                                                class="icon"
                                                aria-hidden="true"
                                            >
                                                <i class="{{ $item['icon'] }}"></i>
                                            </div>
                                        @endif

                                        @if (!empty($item['title']))
                                            <h3 class="title merchant-payment-option-title">
                                                {{ $item['title'] }}
                                            </h3>
                                        @endif

                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

                <div class="offset-lg-1 col-lg-6">

                    @if ($paymentMethodSection->image)
                        <div class="why-choose-iamge-two merchant-payment-image">
                            <img
                                src="{{ asset('storage/' . $paymentMethodSection->image->file_path) }}"
                                alt="{{ $imageAlt }}"
                                class="one"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                    @endif

                </div>

            </div>

        </div>
    </section>
@endif