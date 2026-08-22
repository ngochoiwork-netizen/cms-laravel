@if ($contactSection)

    <!-- rts service-details-breadcrumb-area-start -->
    <div class="rts-service-details-breadcrumb-area">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="breadcrumb-area">

                        @if ($contactSection->title)

                            <h1 class="title rts-text-anime-style-1">
                                {{ $contactSection->title }}
                            </h1>

                        @endif

                        @if ($contactSection->subtitle)

                            <p
                                class="disc"
                                style="max-width: 384px; margin: auto; margin-top: 25px;"
                            >
                                {{ $contactSection->subtitle }}
                            </p>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- rts service-details-breadcrumb-area-end -->

@endif