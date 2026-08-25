@if ($valuesSection)

    <!-- rts company values area start -->
    <div class="rts-company-values-area rts-section-gapBottom">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="title-center-wrapper">

                        @if ($valuesSection->subtitle)
                            <span class="pre">
                                {{ $valuesSection->subtitle }}
                            </span>
                        @endif

                        @if ($valuesSection->title)
                            <h2 class="title rts-text-anime-style-1">
                                {{ $valuesSection->title }}
                            </h2>
                        @endif

                    </div>

                </div>

            </div>

            <div class="row g-5 mt--10 justify-content-center">

                {{-- Innovation --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-company-value-area">

                        <div class="icon">
                            <img
                                src="{{ asset('assets/frontend/images/about/icons/01.svg') }}"
                                alt="Innovation"
                            >
                        </div>

                        <div class="content">

                            <h3 class="title">
                                Innovation
                            </h3>

                            <p class="disc">
                                We continuously explore better ways to use technology,
                                automation, and AI to make salon management smarter
                                and more efficient.
                            </p>

                        </div>

                    </div>
                </div>


                {{-- Salon-Focused --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-company-value-area">

                        <div class="icon">
                            <img
                                src="{{ asset('assets/frontend/images/about/icons/02.svg') }}"
                                alt="Salon-Focused"
                            >
                        </div>

                        <div class="content">

                            <h3 class="title">
                                Salon-Focused
                            </h3>

                            <p class="disc">
                                Everything we build starts with the real needs of salon
                                owners, technicians, staff, and their customers.
                            </p>

                        </div>

                    </div>
                </div>


                {{-- Simplicity --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-company-value-area">

                        <div class="icon">
                            <img
                                src="{{ asset('assets/frontend/images/about/icons/03.svg') }}"
                                alt="Simplicity"
                            >
                        </div>

                        <div class="content">

                            <h3 class="title">
                                Simplicity
                            </h3>

                            <p class="disc">
                                Powerful technology should feel simple. We design tools
                                that are easy to understand, use, and integrate into
                                everyday salon operations.
                            </p>

                        </div>

                    </div>
                </div>


                {{-- Reliability --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-company-value-area">

                        <div class="icon">
                            <img
                                src="{{ asset('assets/frontend/images/about/icons/04.svg') }}"
                                alt="Reliability"
                            >
                        </div>

                        <div class="content">

                            <h3 class="title">
                                Reliability
                            </h3>

                            <p class="disc">
                                Salon owners depend on their technology every day.
                                We focus on stable solutions and dependable support
                                they can count on.
                            </p>

                        </div>

                    </div>
                </div>


                {{-- Growth --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-company-value-area">

                        <div class="icon">
                            <img
                                src="{{ asset('assets/frontend/images/about/icons/05.svg') }}"
                                alt="Growth"
                            >
                        </div>

                        <div class="content">

                            <h3 class="title">
                                Growth
                            </h3>

                            <p class="disc">
                                We go beyond daily operations by giving salons the
                                tools to attract customers, build loyalty, and grow
                                their business over time.
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- rts company values area end -->

@endif