@if ($productSection)

    @php
        $productData = $productSection->data_json ?? [];
        $products = $productData['products'] ?? [];
    @endphp

    <!-- rts product area start -->
    <div class="rts-product-area bg_dark rts-section-gap">

        <div class="container">

            <div class="title-center-wrapper">

                @if ($productSection->subtitle)
                    <span class="pre-title">
                        {{ $productSection->subtitle }}
                    </span>
                @endif

                @if ($productSection->title)
                    <h2 class="title rts-text-anime-style-1 mt--0">
                        {{ $productSection->title }}
                    </h2>
                @endif

            </div>


            @if (!empty($products))

                <div class="product-sticky-wrapper-main mt--60">
                    @php
                        $classes = ['one', 'two', 'three'];
                    @endphp
                    @foreach ($products as $index => $product)

                        <!-- product area start -->
                        <div class="product-wrapper">

                            <div class="inner {{ $classes[$index] ?? '' }}">

                                <div class="left-content">

                                    @if (!empty($product['title']))

                                        <h3 class="title">
                                            {{ $product['title'] }}
                                        </h3>

                                    @endif


                                    @if (!empty($product['description']))

                                        <p class="disc">
                                            {{ $product['description'] }}
                                        </p>

                                    @endif


                                    @if (!empty($product['features']))

                                        <ul class="feature-list">

                                            @foreach ($product['features'] as $feature)

                                                <li>
                                                    <i class="fa-regular fa-check"></i>
                                                    {{ $feature }}
                                                </li>

                                            @endforeach

                                        </ul>

                                    @endif


                                    @if (!empty($product['tags']))

                                        <ul class="tags">

                                            @foreach ($product['tags'] as $tag)

                                                <li>
                                                    {{ $tag }}
                                                </li>

                                            @endforeach

                                        </ul>

                                    @endif


                                    @if (!empty($product['link']))

                                        <a
                                            href="{{ url($product['link']) }}"
                                            class="rts-btn btn-primary mt--30"
                                        >
                                            {{ app()->getLocale() === 'vi'
                                                ? 'Tìm Hiểu Thêm'
                                                : 'Learn More'
                                            }}

                                            <i class="fa-light fa-arrow-right"></i>
                                        </a>

                                    @endif

                                </div>


                                @if (!empty($product['image']))

                                    <div class="image-area">

                                        <img
                                            src="{{ asset(
                                                'assets/frontend/images/project/' .
                                                $product['image']
                                            ) }}"
                                            width="563"
                                            alt="{{ $product['title'] ?? '' }}"
                                        >

                                    </div>

                                @endif

                            </div>

                        </div>
                        <!-- product area end -->

                    @endforeach

                </div>

            @endif

        </div>

    </div>
    <!-- rts product area end -->

@endif