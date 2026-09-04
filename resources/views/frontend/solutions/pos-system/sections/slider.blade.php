<!-- banner area start two -->
<div class="banner-area-start banner-two-h rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content-two-style">
                    <div class="left-area-banner">
                        <h1 class="title">
                            {{ $slider?->title ?? 'Innovative IT Solutions Power Your Business' }}

                            <span>
                                <img src="{{ asset('frontend/assets/images/banner/05.png') }}" alt="">
                            </span>
                        </h1>

                        <p class="disc">
                            {{ $slider?->description ?? 'we provide tailored technology solutions designed to Unique streamline operations, enhance security, and drive business growth. Whether you need cloud computing, cybersecurity, or custom software development.' }}
                        </p>
                        <div class="stars-main-wrapper">
                                <div class="single-check">
                                    <p><i class="fa-regular fa-check"></i> Smart Appointments & Check-in </p>
                                </div>
                                <div class="single-check">
                                    <p><i class="fa-regular fa-check"></i> Technician & Turn Management </p>
                                </div>
                                <div class="single-check">
                                    <p> <i class="fa-regular fa-check"></i> Payments & Customer Management </p>
                                </div>
                                <div class="single-check">
                                    <p> <i class="fa-regular fa-check"></i> Payroll & Offline Mode </p>
                                </div>
                                <div class="single-check">
                                    <p> <i class="fa-regular fa-check"></i> Report & SMS Marketing </p>
                                </div>
                        </div>
                        @if ($slider?->button_text && $slider?->link)
                            <a href="{{ localized_url($slider->link) }}" class="rts-btn btn-primary">
                                {{ $slider->button_text }}
                            </a>
                        @else
                            <a href="{{ localized_route('contact') }}" class="rts-btn btn-primary">
                                Book a Free Demo
                            </a>
                        @endif

                    </div>

                    <div class="banner-image-large">

                        @if ($slider?->image)
                            <img
                                src="{{ asset('storage/' . $slider->image->file_path) }}"
                                alt="{{ $slider->title ?? '' }}"
                            >
                        @else
                            <img src="{{ asset('frontend/assets/images/banner/02.webp') }}" alt="">
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

                            <h2 class="title">
                               ALL-IN-ONE
                            </h2>

                            <span class="info">
                                Salon Management Platform
                            </span>

                        </div>

                        <div class="bottom-area">

                            <p>
                                {{ $slider?->subtitle ?? 'we provide tailored technology solutions designed to Unique streamline operations, enhance security, and drive business growth. Whether you need cloud computing, cybersecurity, or custom software development.' }}
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