@if ($paymentMethodSection)
    @php
        $paymentData = $paymentMethodSection->data_json ?? [];
        $paymentMethods = $paymentData['features'] ?? [];
    @endphp
    <div class="why-chooseus-area merchant-payment-methods rts-section-gap bg-light-2">
        <div class="container">
            <div class="row">

                <div class="col-lg-5">
                    <div class="why-choose-left-content">

                        <div class="title-left-wrapper">

                            @if ($paymentMethodSection->subtitle)
                                <span class="pre">
                                    {{ $paymentMethodSection->subtitle }}
                                </span>
                            @endif

                            @if ($paymentMethodSection->title)
                                <h2 class="title rts-text-anime-style-1">
                                    {{ $paymentMethodSection->title }}
                                </h2>
                            @endif

                        </div>

                        @if ($paymentMethodSection->content)
                            <p class="disc">
                                {!! $paymentMethodSection->content !!}
                            </p>
                        @endif

                        @if (!empty($paymentMethods))

                            <div class="reason-wrapper">

                                @foreach ($paymentMethods as $item)

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

                <div class="offset-lg-1 col-lg-6">

                    @if ($paymentMethodSection->image)

                        <div class="why-choose-iamge-two merchant-payment-image">

                            <img
                                src="{{ asset('storage/' . $paymentMethodSection->image->file_path) }}"
                                alt="{{ $paymentMethodSection->title ?? 'Payment Methods' }}"
                                class="one"
                            >

                        </div>

                    @endif

                </div>

            </div>
        </div>
    </div>

@endif