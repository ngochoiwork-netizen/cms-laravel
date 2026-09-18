@if ($paymentManagementSection)
    @php
        $paymentManagementData = $paymentManagementSection->data_json ?? [];

        $paymentManagementFeatures =
            $paymentManagementData['features'] ?? [];

        $isVietnamese = app()->getLocale() === 'vi';

        $sectionLabel = $isVietnamese
            ? 'Các tính năng quản lý thanh toán'
            : 'Payment management features';

        $imageAlt = $isVietnamese
            ? 'Bảng điều khiển Senverse hiển thị báo cáo giao dịch thanh toán của tiệm nail'
            : 'Senverse dashboard showing nail salon payment transaction reports';
    @endphp

    <section
        id="merchant-payment-management"
        class="why-chooseus-area merchant-payment-methods merchant-payment-management rts-section-gap bg-light-2"
        @if ($paymentManagementSection->title)
            aria-labelledby="merchant-payment-management-title"
        @else
            aria-label="{{ $sectionLabel }}"
        @endif
    >
        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    @if ($paymentManagementSection->image)
                        <div class="why-choose-iamge-two merchant-payment-image">
                            <img
                                src="{{ asset('storage/' . $paymentManagementSection->image->file_path) }}"
                                alt="{{ $imageAlt }}"
                                class="one"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                    @endif

                </div>

                <div class="offset-lg-1 col-lg-5">

                    <div class="why-choose-left-content">

                        <div class="title-left-wrapper">

                            @if ($paymentManagementSection->subtitle)
                                <span class="pre">
                                    {{ $paymentManagementSection->subtitle }}
                                </span>
                            @endif

                            @if ($paymentManagementSection->title)
                                <h2
                                    id="merchant-payment-management-title"
                                    class="title rts-text-anime-style-1"
                                >
                                    {{ $paymentManagementSection->title }}
                                </h2>
                            @endif

                        </div>

                        @if ($paymentManagementSection->content)
                            <div class="disc merchant-payment-management-intro">
                                {!! $paymentManagementSection->content !!}
                            </div>
                        @endif

                        @if (!empty($paymentManagementFeatures))
                            <div
                                class="reason-wrapper"
                                aria-label="{{ $sectionLabel }}"
                            >
                                @foreach ($paymentManagementFeatures as $item)
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
                                            <h3 class="title merchant-payment-management-feature-title">
                                                {{ $item['title'] }}
                                            </h3>
                                        @endif

                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>
    </section>
@endif