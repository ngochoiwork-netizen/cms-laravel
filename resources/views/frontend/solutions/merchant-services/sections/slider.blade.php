<!-- banner area start two -->
<div class="banner-area-start banner-two-h rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content-two-style">

                    <div class="left-area-banner">

                        <h1 class="title">
                            {{ $slider?->title ?? 'Smarter Payments. Lower Costs.' }}

                            <span>
                                <img src="{{ asset('frontend/assets/images/banner/05.png') }}" alt="">
                            </span>
                        </h1>

                        <p class="disc">
                            {{ $slider?->description ?? 'Accept payments securely with transparent pricing, no hidden fees, and seamless integration with Senverse POS.' }}
                        </p>

                        <div class="stars-main-wrapper">

                            <div class="single-check">
                                <p>
                                    <i class="fa-regular fa-check"></i>
                                    No Hidden Fees
                                </p>
                            </div>

                            <div class="single-check">
                                <p>
                                    <i class="fa-regular fa-check"></i>
                                    Secure Payments
                                </p>
                            </div>

                            <div class="single-check">
                                <p>
                                    <i class="fa-regular fa-check"></i>
                                    POS Integrated
                                </p>
                            </div>

                        </div>

                        @if ($slider?->button_text && $slider?->link)
                            <a href="{{ localized_url($slider->link) }}" class="rts-btn btn-primary">
                                {{ $slider->button_text }}
                            </a>
                        @else
                            <a href="#" class="rts-btn btn-primary">
                                Get Started
                            </a>
                        @endif

                    </div>

                    <div class="banner-image-large">

                        @if ($slider?->image)
                            <img
                                src="{{ asset('storage/' . $slider->image->file_path) }}"
                                alt="{{ $slider->title ?? 'Senverse Merchant Services' }}"
                            >
                        @else
                            <img
                                src="{{ asset('frontend/assets/images/banner/02.webp') }}"
                                alt="Senverse Merchant Services"
                            >
                        @endif

                        <div class="circle-animation">
                            <a href="#">
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
                                            Senverse • Merchant Services • Payments
                                        </textPath>
                                    </text>

                                </svg>

                                <i class="fa-sharp fa-regular fa-arrow-down"></i>
                            </a>
                        </div>

                    </div>

                    <div class="right-top-area">

                        <div class="top">

                            <h5 class="title" style="font-size: 24px;">
                                SIMPLE & TRANSPARENT
                            </h5>
                        </div>

                        <div class="bottom-area">

                            <p>
                                {{ $slider?->subtitle ?? 'One connected solution for payments, checkout, tips, and transaction reporting.' }}
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