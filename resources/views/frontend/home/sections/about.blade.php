<!-- rts about area start -->
@if ($aboutSection)
    <div class="rts-section-gap" style="padding:60px 0px"></div>
    <div class="rts-about-area area-4 rts-section-gapBottom">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">

                    <div class="about-area-inner-four">

                        <div class="left-logo-content">

                            <div class="top">


                                @php
                                    $aboutData = $aboutSection->data_json ?? [];
                                @endphp

                                <div class="counter-area">

                                    <h3 class="title">

                                        @if (!empty($aboutData['number']))
                                            <span class="odometer"
                                                  data-count="{{ preg_replace('/[^0-9]/', '', $aboutData['number']) }}">
                                            </span>

                                            {{ preg_replace('/[0-9]/', '', $aboutData['number']) }}
                                        @endif

                                    </h3>

                                    @if (!empty($aboutData['label']))
                                        <span class="done">
                                            {{ $aboutData['label'] }}
                                        </span>
                                    @endif

                                </div>

                                <div class="shape-area">
                                    <img
                                        src="{{ asset('assets/frontend/images/about/shape-01.svg') }}"
                                        alt=""
                                    >
                                </div>

                            </div>

                            @if (!empty($aboutData['features']))

                                <ul>

                                    @foreach ($aboutData['features'] as $feature)

                                        <li>
                                            <a href="#">
                                                {{ $feature }}
                                            </a>
                                        </li>

                                    @endforeach

                                </ul>

                            @endif

                        </div>

                        @if ($aboutSection->image)

                            <div class="image-area">

                                <img
                                    src="{{ asset('storage/' . $aboutSection->image->file_path) }}"
                                    width="348"
                                    alt="{{ $aboutSection->title }}"
                                >

                            </div>

                        @endif

                    </div>

                </div>


                <div class="col-xl-6 pl--50 pl_lg--20 pl_md--10 pl_sm--10">

                    <div class="about-content-style-four">

                        @if ($aboutSection->title)

                            <div class="title-left-wrapper">

                                <h2 class="title rts-text-anime-style-1">

                                    {{ $aboutSection->title }}

                                </h2>

                            </div>

                        @endif


                        @if ($aboutSection->content)

                            <p class="disc">

                                {!! $aboutSection->content !!}

                            </p>

                        @endif


                        @if (!empty($aboutData['trust_title']) || !empty($aboutData['trust_text']))

                            <div class="author-area">

                                <div class="stars-main-wrapper">

                                    @if (!empty($aboutData['trust_title']))
                                        <div class="wrapper">
                                           
                                        </div>
                                    @endif

                                    @if (!empty($aboutData['trust_text']))
                                        <p class="disc1">
                                            
                                        </p>
                                    @endif

                                </div>

                            </div>

                        @endif


                        @if ($aboutSection->button_text && $aboutSection->button_link)

                            <a
                                href="{{ $aboutSection->button_link }}"
                                class="about-btn"
                            >

                                {{ $aboutSection->button_text }}

                                <span class="round-btn">
                                    <i class="fa-light fa-arrow-right"></i>
                                </span>

                            </a>

                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>

@endif
<!-- rts about area end -->