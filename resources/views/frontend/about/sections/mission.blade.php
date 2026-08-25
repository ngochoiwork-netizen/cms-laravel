@if ($missionSection)
    <!-- rts mission areas start -->
    <div class="rts-mission-area rts-section-gap">
        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="rts-mission-content-about-page">

                        {{-- Mission Content --}}
                        @if ($missionSection->content)

                            <div class="disc">
                                {!! $missionSection->content !!}
                            </div>

                        @endif


                        {{-- Mission Image --}}
                        @if ($missionSection->image)

                            <div class="large-image-mission">

                                <img
                                    src="{{ asset('storage/' . $missionSection->image->file_path) }}"
                                    alt="{{ $missionSection->title ?? 'Our Mission' }}"
                                >

                            </div>

                        @endif


                        {{-- Mission Label --}}
                        <div class="arrow-text-animation">

                            <div class="circle-animation">

                                <a href="#">

                                    <svg
                                        class="uni-circle-text-path uk-text-secondary uni-animation-spin"
                                        viewBox="0 0 100 100"
                                        width="154"
                                        height="154"
                                    >

                                        <defs>
                                            <path
                                                id="circle"
                                                d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"
                                            >
                                            </path>
                                        </defs>

                                        <text>
                                            <textPath xlink:href="#circle">
                                                Senverse • Salon Technology • Senverse •
                                            </textPath>
                                        </text>

                                    </svg>

                                    <i class="fa-sharp fa-regular fa-arrow-down"></i>

                                </a>

                            </div>

                            @if ($missionSection->title)

                                <p class="disc1">
                                    {{ $missionSection->title }}
                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- rts mission areas end -->

@endif