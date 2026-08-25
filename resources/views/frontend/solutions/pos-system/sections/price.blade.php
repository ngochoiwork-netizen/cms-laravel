@if ($pricingSection && $pricingSection->is_active)

    @php
        $pricingData = $pricingSection->data_json ?? [];
        $plans = $pricingData['plans'] ?? [];
    @endphp

    <section class="rts-pricing-area inner rts-section-gap">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="title-center-wrapper mb--30">

                        @if ($pricingSection->subtitle)

                            <span class="pre">

                                <svg
                                    width="17"
                                    height="20"
                                    viewBox="0 0 17 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M16.3149 5.08515L8.81494 0.710149C8.71935 0.654384 8.61067 0.625 8.5 0.625C8.38933 0.625 8.28065 0.654384 8.18506 0.710149L0.685062 5.08515C0.590708 5.14019 0.512428 5.21901 0.458025 5.31373C0.403622 5.40846 0.374996 5.51579 0.375 5.62502V14.375C0.374996 14.4843 0.403622 14.5916 0.458025 14.6863C0.512428 14.781 0.590708 14.8599 0.685062 14.9149L8.18506 19.2899C8.28065 19.3457 8.38933 19.375 8.5 19.375C8.61067 19.375 8.71935 19.3457 8.81494 19.2899L16.3149 14.9149C16.4093 14.8599 16.4876 14.781 16.542 14.6863C16.5964 14.5916 16.625 14.4843 16.625 14.375V5.62502C16.625 5.51579 16.5964 5.40846 16.542 5.31373C16.4876 5.21901 16.4093 5.14019 16.3149 5.08515ZM8.5 1.97359L14.7598 5.62502L8.5 9.27646L2.24025 5.62502L8.5 1.97359ZM1.625 6.71327L7.875 10.3589V17.6618L1.625 14.0162V6.71327ZM9.125 17.6618V10.3589L15.375 6.71327V14.0162L9.125 17.6618Z"
                                        fill="#615EFC"
                                    />
                                </svg>

                                {{ $pricingSection->subtitle }}

                            </span>

                        @endif


                        @if ($pricingSection->title)

                            <h2 class="title mb--0 rts-text-anime-style-1">
                                {{ $pricingSection->title }}
                            </h2>

                        @endif


                        @if ($pricingSection->content)

                            <div class="desc">
                                {!! $pricingSection->content !!}
                            </div>

                        @endif

                    </div>

                </div>

            </div>


            @if (!empty($plans))

                <div class="row g-5 mt--10 justify-content-center">

                    @foreach ($plans as $plan)

                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">

                            <div
                                class="pricing-wrapper-four {{ !empty($plan['active']) ? 'active' : '' }}"
                            >

                                <div class="pricing-top-area">

                                    <div class="top">

                                        <div class="tag">
                                            {{ $plan['name'] ?? '' }}
                                        </div>

                                        <div class="icon">

                                            <svg
                                                width="22"
                                                height="20"
                                                viewBox="0 0 22 20"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M13.6114 0.343074L21.1114 4.46807C21.2291 4.53278 21.3272 4.62788 21.3955 4.74344C21.4639 4.85901 21.5 4.99081 21.5 5.12507V14.8751C21.5 15.0093 21.4639 15.1411 21.3955 15.2567C21.3272 15.3723 21.2291 15.4674 21.1114 15.5321L13.6114 19.6571C13.5007 19.7181 13.3764 19.7501 13.25 19.7501C13.1236 19.7501 12.9993 19.7181 12.8886 19.6571L9.5 17.7935L10.2229 16.4795L12.5 17.7315V9.69355L5.38858 5.78207C5.27099 5.71733 5.17293 5.62221 5.10463 5.50665C5.03634 5.39109 5.00031 5.25931 5.00031 5.12507C5.00031 4.99084 5.03634 4.85906 5.10463 4.7435C5.17293 4.62793 5.27099 4.53282 5.38858 4.46807L12.8886 0.343074C12.9993 0.282176 13.1236 0.250244 13.25 0.250244C13.3764 0.250244 13.5007 0.282176 13.6114 0.343074ZM19.1936 5.12507L13.25 1.85627L7.3064 5.12507L13.25 8.39387L19.1936 5.12507ZM14 17.7316L20 14.4316V6.39355L14 9.69355V17.7316ZM6.5 10.0001H0.5V8.50006H6.5V10.0001ZM2 16.0001H8V14.5001H2V16.0001ZM9.5 13.0001H3.5V11.5001H9.5V13.0001Z"
                                                    fill="#614CE1"
                                                />
                                            </svg>

                                        </div>

                                    </div>


                                    <div class="bottom">

                                        @if (!empty($plan['price']))

                                            <div class="dollar-area">

                                                <h2 class="title">
                                                    {{ $plan['price'] }}
                                                </h2>

                                                @if (!empty($plan['period']))
                                                    <span class="time">
                                                        {{ $plan['period'] }}
                                                    </span>
                                                @endif

                                            </div>

                                        @endif


                                        @if (!empty($plan['description']))

                                            <p>
                                                {{ $plan['description'] }}
                                            </p>

                                        @endif


                                        @if (!empty($plan['button_text']))

                                            <a
                                                href="{{ localized_url($plan['button_link'] ?? '/contact') }}"
                                                class="rts-btn btn-primary"
                                            >
                                                {{ $plan['button_text'] }}
                                            </a>

                                        @endif

                                    </div>

                                </div>


                                @if (!empty($plan['features']))

                                    <div class="pricing-body">

                                        <h5 class="title">
                                            {{ $plan['features_title'] ?? 'Key Features' }}
                                        </h5>

                                        <div class="check-content-wrapper">

                                            @foreach ($plan['features'] as $feature)

                                                <div class="single-check-area">

                                                    <i class="fa-light fa-circle-check"></i>

                                                    <p>
                                                        {{ $feature }}
                                                    </p>

                                                </div>

                                            @endforeach

                                        </div>

                                    </div>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </section>

@endif