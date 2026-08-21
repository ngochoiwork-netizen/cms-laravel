@if ($paymentManagementSection)

    @php
        $paymentManagementData = $paymentManagementSection->data_json ?? [];
        $paymentManagementFeatures = $paymentManagementData['features'] ?? [];
    @endphp

    <div class="why-chooseus-area merchant-payment-methods rts-section-gap bg-light-2">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">

                    @if ($paymentManagementSection->image)

                        <div class="why-choose-iamge-two merchant-payment-image">

                            <img
                                src="{{ asset('storage/' . $paymentManagementSection->image->file_path) }}"
                                alt="{{ $paymentManagementSection->title ?? 'Payment Management' }}"
                                class="one"
                            >

                        </div>

                    @endif

                </div>


                <div class="offset-lg-1 col-lg-5">

                    <div class="why-choose-left-content">

                        <div class="title-left-wrapper">

                            @if ($paymentManagementSection->subtitle)
                                <span class="pre">
                                    {{ $paymentManagementSection->subtitle }}
                                </span>
                            @endif

                            @if ($paymentManagementSection->title)
                                <h2 class="title rts-text-anime-style-1">
                                    {{ $paymentManagementSection->title }}
                                </h2>
                            @endif

                        </div>

                        @if ($paymentManagementSection->content)
                            <p class="disc">
                                {!! $paymentManagementSection->content !!}
                            </p>
                        @endif


                        @if (!empty($paymentManagementFeatures))

                            <div class="reason-wrapper">

                                @foreach ($paymentManagementFeatures as $item)

                                    <div class="single-reason">

                                        @if (!empty($item['icon']))
                                            <div class="icon">
                                                <i class="{{ $item['icon'] }}"></i>
                                            </div>
                                        @endif

                                        @if (!empty($item['title']))
                                            <h5 class="title">
                                                {{ $item['title'] }}
                                            </h5>
                                        @endif

                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>

@endif