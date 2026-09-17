<!-- banner area start two -->
 @php
    $isVietnamese = app()->getLocale() === 'vi';

    $heroBenefits = $isVietnamese
        ? [
            'Quản lý lịch hẹn và check-in',
            'Quản lý kỹ thuật viên và lượt khách',
            'Thanh toán và quản lý khách hàng',
            'Tính lương và chế độ ngoại tuyến',
            'Báo cáo và SMS Marketing',
        ]
        : [
            'Smart Appointments & Check-In',
            'Technician & Turn Management',
            'Payments & Customer Management',
            'Payroll & Offline Mode',
            'Reports & SMS Marketing',
        ];
@endphp

<div class="banner-area-start banner-two-h rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content-two-style">
                    <div class="left-area-banner">
                        <h1 class="title">
                            {{ $slider?->title
                                ?? ($isVietnamese
                                    ? 'Quản lý tiệm nail thông minh với Senverse POS'
                                    : 'Run Your Nail Salon Smarter With Senverse POS System')
                            }}

                            <span>
                                <img
                                    src="{{ asset('frontend/assets/images/banner/05.png') }}"
                                    alt=""
                                >
                            </span>
                        </h1>

                        <p class="disc">
                            {{ $slider?->description
                                ?? ($isVietnamese
                                    ? 'Senverse là hệ thống POS giúp chủ tiệm nail quản lý lịch hẹn, check-in, thanh toán, kỹ thuật viên, khách hàng, báo cáo và hoạt động liên lạc trong một quy trình kết nối.'
                                    : 'Senverse is a POS system for nail salon owners to manage appointments, check-ins, payments, technicians, customers, reports, and communication in one connected workflow.')
                            }}
                        </p>
                        <div class="stars-main-wrapper">
                            @foreach ($heroBenefits as $benefit)
                                <div class="single-check">
                                    <p>
                                        <i class="fa-regular fa-check"></i>
                                        {{ $benefit }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        @if ($slider?->button_text && $slider?->link)
                            <a
                                href="{{ localized_url($slider->link) }}"
                                class="rts-btn btn-primary"
                            >
                                {{ $slider->button_text }}
                            </a>
                        @else
                            <a
                                href="{{ localized_route('contact') }}"
                                class="rts-btn btn-primary"
                            >
                                {{ $isVietnamese ? 'Đặt lịch Demo' : 'Book a Demo' }}
                            </a>
                        @endif

                    </div>

                    <div class="banner-image-large">

                        @if ($slider?->image)
                            <img
                                src="{{ asset('storage/' . $slider->image->file_path) }}"
                                alt="{{ $isVietnamese
                                    ? 'Hệ thống Senverse POS với màn hình quản lý và thiết bị thanh toán cho tiệm nail'
                                    : 'Senverse nail salon POS system with management screen and payment devices'
                                }}"
                            >
                        @else
                            <img
                                src="{{ asset('frontend/assets/images/banner/02.webp') }}"
                                alt="{{ $isVietnamese
                                    ? 'Hệ thống Senverse POS dành cho tiệm nail'
                                    : 'Senverse POS system for nail salon management'
                                }}"
                            >
                        @endif

                        <div class="circle-animation">
                            <a class="" href="#">
                                <svg class="uni-circle-text-path uk-text-secondary uni-animation-spin"
                                     viewBox="0 0 100 100"
                                     width="154"
                                     height="154">

                                    <defs>
                                        <path id="circle"
                                              d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0">
                                        </path>
                                    </defs>

                                    <text>
                                        <textPath xlink:href="#circle">
                                            Senverse POS • Nail Salon Software
                                        </textPath>
                                    </text>

                                </svg>

                                <i class="fa-sharp fa-regular fa-arrow-down"></i>
                            </a>
                        </div>

                    </div>

                    <div class="right-top-area">

                        <div class="top">

                            <div class="title h2">
                                ALL-IN-ONE
                            </div>

                            <span class="info">
                                {{ $isVietnamese
                                    ? 'Nền tảng quản lý tiệm nail'
                                    : 'Nail Salon Management Platform'
                                }}
                            </span>

                        </div>

                        <div class="bottom-area">

                            <p>
                                {{ $slider?->subtitle
                                    ?? ($isVietnamese
                                        ? 'Một nền tảng kết nối cho hoạt động quản lý tiệm nail hằng ngày.'
                                        : 'One connected platform for daily nail salon management.')
                                }}
                            </p>

                            <a href="#" class="radious-btn">
                                <i class="fa-sharp fa-light fa-arrow-up"></i>
                            </a>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner area start two end -->