@if (!empty($sliders) && $sliders->isNotEmpty())

    <!-- banner-swiper-main-wrapper -->
    <div class="banner-swiper-main-wrapper-one">

        <div class="swiper mySwiper-banner-one">
            <div class="swiper-wrapper">

                @foreach ($sliders as $slider)

                    <div class="swiper-slide">

                        <!-- rts banner arteas start -->
                        <div class="rts-banner-area-one two bg_image"
                            @if ($slider->image)
                                style="background-image: url('{{ asset('storage/' . $slider->image->file_path) }}');"
                            @endif
                        >

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <!-- banner style one start -->
                                        <div class="banner-style-one-wrapper-inner">

                                            @if ($slider->subtitle)
                                                <span class="pre-title">
                                                    {{ $slider->subtitle }}
                                                </span>
                                            @endif

                                            @if ($slider->title)
                                                <h1 class="title rts-text-anime-style-1">
                                                    {{ $slider->title }}
                                                </h1>
                                            @endif

                                            @if ($slider->description)
                                                <p class="disc">
                                                    {{ $slider->description }}
                                                </p>
                                            @endif

                                            <div class="button-wrapper">

                                                @if ($slider->button_text && $slider->link)

                                                    <a href="{{ $slider->link }}"
                                                       class="rts-btn btn-primary btn-white">

                                                        {{ $slider->button_text }}

                                                    </a>

                                                @endif

                                            </div>

                                        </div>
                                        <!-- banner style one end -->

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- rts banner arteas end -->

                    </div>

                @endforeach

            </div>

            <div class="swiper-button-next">
                <i class="fa-regular fa-chevron-right"></i>
            </div>

            <div class="swiper-button-prev">
                <i class="fa-regular fa-chevron-left"></i>
            </div>

        </div>

    </div>
    <!-- banner-swiper-main-wrapper end -->

@endif