<!-- for customers start -->

    <div class="rts-product-area bg_dark rts-section-gap">
        <div class="container">
            <div class="product-sticky-wrapper-main mt--60">
                @if ($customerSection)
                <div class="product-wrapper">
                    <div class="inner one">

                        <div class="left-content">
                            @if (!empty($customerSection->title))
                                        <h3 class="title">
                                            {{ $customerSection->title }}
                                        </h3>

                            @endif
                            {!! $customerSection->content !!}
                                <ul class="tags">
                                    <li>
                                        {{ $customerSection->subtitle }}
                                    </li>
                                </ul>

                        </div>

                        <div class="image-area">
                            @if ($customerSection->image)
                                <img src="{{ $customerSection->image->url }}"
                                    alt="{{ $customerSection->title }}"
                                    width="563">
                            @endif
                        </div>

                    </div>
                </div>
                @endif
                @if ($ownerSection)
                    <div class="product-wrapper">
                        <div class="inner two">
                            <div class="left-content">
                                @if (!empty($ownerSection->title))
                                <h3 class="title">
                                    {{ $ownerSection->title }}
                                </h3>
                                @endif
                                {!! $ownerSection->content !!}
                                <ul class="tags">
                                    <li>
                                        {{ $ownerSection->subtitle }}
                                    </li>
                                </ul>
                            </div>
                            <div class="image-area">
                                @if ($ownerSection->image)
                                    <img src="{{ $ownerSection->image->url }}"
                                        alt="{{ $ownerSection->title }}"
                                        width="563">
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                @if ($techSection)
                <div class="product-wrapper">
                    <div class="inner three">
                        <div class="left-content">
                            @if (!empty($techSection->title))
                                <h3 class="title">
                                    {{ $techSection->title }}
                                </h3>
                            @endif
                            {!! $techSection->content !!}
                            <ul class="tags">
                                    <li>
                                        {{ $techSection->subtitle }}
                                    </li>
                            </ul>
                        </div>
                        <div class="image-area">
                            @if ($techSection->image)
                                <img src="{{ $techSection->image->url }}"
                                    alt="{{ $techSection->title }}"
                                    width="563">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>

<!-- for customers end -->