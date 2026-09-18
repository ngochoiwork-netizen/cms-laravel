@php
    $isVietnamese = app()->getLocale() === 'vi';

    $heroTitle = $slider?->title
        ?? ($isVietnamese
            ? 'Xử lý thanh toán thẻ dành cho tiệm nail'
            : 'Credit Card Processing for Nail Salons');

    $heroDescription = $slider?->description
        ?? ($isVietnamese
            ? 'Chấp nhận thanh toán bằng thẻ và thanh toán không tiếp xúc, đồng thời kết nối quy trình tính tiền, tiền tip và báo cáo giao dịch với Senverse POS.'
            : 'Accept card and contactless payments while keeping checkout, tips, and transaction reporting connected with Senverse POS.');

    $heroSubtitle = $slider?->subtitle
        ?? ($isVietnamese
            ? 'Kết nối xử lý thanh toán, tính tiền, tiền tip và báo cáo trong một quy trình vận hành tiệm thống nhất.'
            : 'Connect payment processing with checkout, tips, and reporting in one streamlined salon workflow.');

    $heroBenefits = $isVietnamese
        ? [
            'Kết nối với Senverse POS',
            'Quy trình tính tiền và nhận tip đơn giản',
            'Báo cáo giao dịch tập trung',
        ]
        : [
            'Connected with Senverse POS',
            'Simple Checkout and Tip Flow',
            'Centralized Transaction Reporting',
        ];

    $heroButtonText = $slider?->button_text
        ?? ($isVietnamese ? 'Yêu cầu tư vấn' : 'Request a Consultation');

    $heroButtonLink = $slider?->link ?: '/contact';

    $heroLabel = $isVietnamese
        ? 'ĐƯỢC THIẾT KẾ CHO TIỆM NAIL'
        : 'BUILT FOR NAIL SALONS';

    $heroImageAlt = $isVietnamese
        ? 'Nhân viên tiệm nail tính tiền bằng giải pháp xử lý thanh toán thẻ Senverse'
        : 'Nail salon checkout using Senverse credit card processing';
@endphp

<!-- Merchant Services hero start -->
<section
    class="banner-area-start banner-two-h rts-section-gap"
    aria-labelledby="merchant-services-heading"
>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content-two-style">

                    <div class="left-area-banner">

                        <h1
                            id="merchant-services-heading"
                            class="title"
                        >
                            {{ $heroTitle }}
                        </h1>

                        <p class="disc">
                            {{ $heroDescription }}
                        </p>

                        <div
                            class="stars-main-wrapper"
                            aria-label="{{ $isVietnamese
                                ? 'Lợi ích chính'
                                : 'Key benefits' }}"
                        >
                            @foreach ($heroBenefits as $benefit)
                                <div class="single-check">
                                    <p>
                                        <i
                                            class="fa-regular fa-check"
                                            aria-hidden="true"
                                        ></i>

                                        {{ $benefit }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <a
                            href="{{ localized_url($heroButtonLink) }}"
                            class="rts-btn btn-primary"
                        >
                            {{ $heroButtonText }}
                        </a>

                    </div>

                    <div class="banner-image-large">

                        @if ($slider?->image)
                            <img
                                src="{{ asset('storage/' . $slider->image->file_path) }}"
                                alt="{{ $heroImageAlt }}"
                                width="960"
                                height="449"
                                fetchpriority="high"
                                decoding="async"
                            >
                        @else
                            <img
                                src="{{ asset('frontend/assets/images/banner/credit-card-processing-for-nail-salons-960x449.png') }}"
                                alt="{{ $heroImageAlt }}"
                                width="960"
                                height="449"
                                fetchpriority="high"
                                decoding="async"
                            >
                        @endif

                        <div
                            class="circle-animation"
                            aria-hidden="true"
                        >
                            <a
                                href="#merchant-benefits"
                                tabindex="-1"
                            >
                                <svg
                                    class="uni-circle-text-path uk-text-secondary uni-animation-spin"
                                    viewBox="0 0 100 100"
                                    width="154"
                                    height="154"
                                >
                                    <defs>
                                        <path
                                            id="merchant-services-circle"
                                            d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"
                                        ></path>
                                    </defs>

                                    <text>
                                        <textPath href="#merchant-services-circle">
                                            Senverse • Merchant Services • Payments
                                        </textPath>
                                    </text>
                                </svg>

                                <i
                                    class="fa-sharp fa-regular fa-arrow-down"
                                    aria-hidden="true"
                                ></i>
                            </a>
                        </div>

                    </div>

                    <div class="right-top-area">

                        <div class="top">
                            <p class="title merchant-hero-label">
                                {{ $heroLabel }}
                            </p>
                        </div>

                        <div class="bottom-area">
                            <p>
                                {{ $heroSubtitle }}
                            </p>

                            <a
                                href="#merchant-benefits"
                                class="radious-btn"
                                aria-label="{{ $isVietnamese
                                    ? 'Xem các lợi ích của Merchant Services'
                                    : 'Explore Merchant Services benefits' }}"
                            >
                                <i
                                    class="fa-sharp fa-light fa-arrow-down"
                                    aria-hidden="true"
                                ></i>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Merchant Services hero end -->