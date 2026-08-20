@php
    $pricingData = $pricingSection->data_json ?? [];
    $packages = $pricingData['packages'] ?? [];
@endphp

@if (!empty($packages))
    <div class="row g-4">

        @foreach ($packages as $package)

            <div class="col-lg-6">

                <div class="pricing-card">

                    <h3>{{ $package['name'] }}</h3>

                    <h2>
                        {{ $package['price'] }}
                        <span>{{ $package['period'] }}</span>
                    </h2>

                    <a href="{{ $package['button_link'] }}">
                        {{ $package['button_text'] }}
                    </a>

                    <ul>

                        @foreach ($package['features'] as $feature)

                            <li>{{ $feature }}</li>

                        @endforeach

                    </ul>

                    <p>{{ $package['description'] }}</p>

                </div>

            </div>

        @endforeach

    </div>
@endif