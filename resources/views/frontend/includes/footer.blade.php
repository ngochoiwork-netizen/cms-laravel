<!-- rts footer area start -->
<div class="rts-footer-one pt--100 bg_dark">

    <div class="container pb--80">

        <div class="row">

            {{-- =========================================================
                LEFT: LOGO + CONTACT INFORMATION
            ========================================================== --}}
            <div class="col-lg-3">

                <div class="left-wiget">

                    {{-- Logo --}}
                    <a class="logo" href="{{ localized_route('home') }}">

                        @if (setting_media('logo'))
                            <img
                                src="{{ setting_media('logo') }}"
                                alt="{{ setting('site_name') ?? 'Senverse' }}"
                            >
                        @endif

                    </a>


                    {{-- Footer Description --}}
                    @if (setting('footer_description'))

                        <p class="disc">
                            {{ setting('footer_description') }}
                        </p>

                    @endif


                    {{-- Address --}}
                    @if (setting('address'))

                        <div class="footer-contact-item">

                            <i class="fa-light fa-location-dot"></i>

                            <span>
                                {{ setting('address') }}
                            </span>

                        </div>

                    @endif


                    {{-- Phone --}}
                    @if (setting('phone'))

                        <div class="footer-contact-item">

                            <i class="fa-light fa-phone"></i>

                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">
                                {{ setting('phone') }}
                            </a>

                        </div>

                    @endif


                    {{-- Email --}}
                    @if (setting('email'))

                        <div class="footer-contact-item">

                            <i class="fa-light fa-envelope"></i>

                            <a href="mailto:{{ setting('email') }}">
                                {{ setting('email') }}
                            </a>

                        </div>

                    @endif

                </div>

            </div>


            {{-- =========================================================
                FOOTER MENUS
            ========================================================== --}}
            <div class="offset-lg-1 col-lg-8 mt_md--50 mt_sm--50">

                <div class="footer-wized-wrapper">


                    {{-- =================================================
                        COMPANY
                    ================================================== --}}

                    @php
                        $companyItems = [];

                        if (!empty($footerCompany)) {
                            $companyData = $footerCompany->data_json ?? [];
                            $companyItems = $companyData['items'] ?? [];
                        }
                    @endphp

                    @if (!empty($footerCompany))

                        <div class="single">

                            <h6 class="title">
                                {{ $footerCompany->title ?? 'Company' }}
                            </h6>

                            @if (!empty($companyItems))

                                <ul>

                                    @foreach ($companyItems as $item)

                                        @if (!empty($item['title']))

                                            <li>

                                                <a href="{{ localized_url($item['link'] ?? null) }}">
                                                    {{ $item['title'] }}
                                                </a>

                                            </li>

                                        @endif

                                    @endforeach

                                </ul>

                            @endif

                        </div>

                    @endif


                    {{-- =================================================
                        SERVICES
                    ================================================== --}}

                    @php
                        $serviceItems = [];

                        if (!empty($footerService)) {
                            $serviceData = $footerService->data_json ?? [];
                            $serviceItems = $serviceData['items'] ?? [];
                        }
                    @endphp

                    @if (!empty($footerService))

                        <div class="single">

                            <h6 class="title">
                                {{ $footerService->title ?? 'Services' }}
                            </h6>

                            @if (!empty($serviceItems))

                                <ul>

                                    @foreach ($serviceItems as $item)

                                        @if (!empty($item['title']))

                                            <li>

                                                <a href="{{ localized_url($item['link'] ?? null) }}">
                                                    {{ $item['title'] }}
                                                </a>

                                            </li>

                                        @endif

                                    @endforeach

                                </ul>

                            @endif

                        </div>

                    @endif


                    {{-- =================================================
                        POLICY
                    ================================================== --}}

                    @php
                        $policyItems = [];

                        if (!empty($footerPolicy)) {
                            $policyData = $footerPolicy->data_json ?? [];
                            $policyItems = $policyData['items'] ?? [];
                        }
                    @endphp

                    @if (!empty($footerPolicy))

                        <div class="single">

                            <h6 class="title">
                                {{ $footerPolicy->title ?? 'Policy' }}
                            </h6>

                            @if (!empty($policyItems))

                                <ul>

                                    @foreach ($policyItems as $item)

                                        @if (!empty($item['title']))

                                            <li>

                                                <a href="{{ localized_url($item['link'] ?? null) }}">
                                                    {{ $item['title'] }}
                                                </a>

                                            </li>

                                        @endif

                                    @endforeach

                                </ul>

                            @endif

                        </div>

                    @endif


                    {{-- =================================================
                        SOCIAL MEDIA
                    ================================================== --}}

                    <div class="single">

                        <h6 class="title">
                            Social Media
                        </h6>

                        <ul>

                            @if (setting('facebook_url'))

                                <li>

                                    <a
                                        href="{{ setting('facebook_url') }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Facebook
                                    </a>

                                </li>

                            @endif


                            @if (setting('instagram_url'))

                                <li>

                                    <a
                                        href="{{ setting('instagram_url') }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Instagram
                                    </a>

                                </li>

                            @endif


                            @if (setting('tiktok_url'))

                                <li>

                                    <a
                                        href="{{ setting('tiktok_url') }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        TikTok
                                    </a>

                                </li>

                            @endif


                            @if (setting('youtube_url'))

                                <li>

                                    <a
                                        href="{{ setting('youtube_url') }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        YouTube
                                    </a>

                                </li>

                            @endif


                            @if (setting('linkedin_url'))

                                <li>

                                    <a
                                        href="{{ setting('linkedin_url') }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        LinkedIn
                                    </a>

                                </li>

                            @endif

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =============================================================
        COPYRIGHT
    ============================================================== --}}
    <div class="copyright-area">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="copyright-1">

                        <p class="disc">

                            © {{ date('Y') }}

                            {{ setting('site_name') ?? 'Senverse' }}.

                            {{ app()->getLocale() === 'vi'
                                ? 'Bảo lưu mọi quyền.'
                                : 'All Rights Reserved.'
                            }}

                        </p>


                        {{-- Policy links --}}
                        @if (!empty($policyItems))

                            <ul>

                                @foreach (array_slice($policyItems, 0, 3) as $item)

                                    @if (!empty($item['title']))

                                        <li>

                                            <a href="{{ localized_url($item['link'] ?? null) }}">
                                                {{ $item['title'] }}
                                            </a>

                                        </li>

                                    @endif

                                @endforeach

                            </ul>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- rts footer area end -->