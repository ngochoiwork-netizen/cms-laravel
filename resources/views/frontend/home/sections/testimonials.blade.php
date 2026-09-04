@if (!empty($testimonials) && $testimonials->count())
    <!-- rts testimonials area start -->
    <div class="rts-testimonials-style-three area-4 rts-section-gap">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="title-center-wrapper">

                        <h2 class="title rts-text-anime-style-1">
                            {{ app()->getLocale() === 'vi'
                                ? 'Chủ Salon Nói Gì Về Senverse?'
                                : 'What Salon Owners Say About Senverse?'
                            }}
                        </h2>

                    </div>

                </div>


                <div class="col-lg-12 pt--60">

                    <div class="testimominas-single-wrapper-three">

                        <div class="swiper mySwiper-testimonials-three">

                            <div class="swiper-wrapper">

                                @foreach ($testimonials as $testimonial)

                                    @php
                                        $testimonialData = $testimonial->data_json ?? [];

                                        $owner = $testimonialData['owner'] ?? null;
                                        $position = $testimonialData['position'] ?? null;
                                    @endphp

                                    <div class="swiper-slide">

                                        <div class="single-testimonails-three">

                                            <div class="left-thumbnmail">

                                                @if ($testimonial->thumbnail)

                                                    <img
                                                        src="{{ asset('storage/' . $testimonial->thumbnail->file_path) }}"
                                                        alt="{{ $testimonial->title }}"
                                                    >

                                                @endif


                                                <div class="small-image">

                                                    <img
                                                        src="{{ asset('assets/frontend/images/testimonials/13.svg') }}"
                                                        alt="testimonial"
                                                    >

                                                </div>

                                            </div>


                                            <div class="right-content">

                                                <div class="top">




                                                    <div class="content">

                                                        @if ($testimonial->short_description)

                                                            <p class="disc">
                                                                "{{ $testimonial->short_description }}"
                                                            </p>

                                                        @endif

                                                    </div>

                                                </div>


                                                <div class="bottom">

                             
                                                        <h5 class="title">
                                                           {{ $testimonial->title }}
                                                        </h5>

    


                                                 

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>


                            <div class="swiper-button-next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>

                            <div class="swiper-button-prev">
                                <i class="fa-solid fa-chevron-left"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- rts testimonials area end -->

@endif