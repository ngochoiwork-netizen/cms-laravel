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

            @php
                $values = $valuesSection->data_json ?? [];

                if (is_string($values)) {
                    $values = json_decode($values, true) ?? [];
                }

                // Hỗ trợ cả JSON dạng mảng trực tiếp và {"values": [...]}
                $values = $values['values'] ?? $values;
            @endphp

            <div class="row g-5 mt--10 justify-content-center">

                @foreach ($values as $value)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-company-value-area">

                            @if (!empty($value['icon']))
                                <div class="icon">
                                    <img
                                        src="{{ asset($value['icon']) }}"
                                        alt="{{ $value['title'] ?? 'Company Value' }}"
                                        loading="lazy"
                                    >
                                </div>
                            @endif

                            <div class="content">

                                @if (!empty($value['title']))
                                    <h3 class="title">
                                        {{ $value['title'] }}
                                    </h3>
                                @endif

                                @if (!empty($value['description']))
                                    <p class="disc">
                                        {{ $value['description'] }}
                                    </p>
                                @endif

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>
    <!-- rts company values area end -->

@endif