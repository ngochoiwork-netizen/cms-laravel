<!-- rts service-details-breadcrumb-area-start -->
<div class="rts-service-details-breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area">
                    <ul>
                        @foreach ($breadcrumbs as $breadcrumb)
                            <li>
                                @if (!empty($breadcrumb['url']))
                                    <a href="{{ $breadcrumb['url'] }}">
                                        {{ $breadcrumb['label'] }}
                                    </a>
                                @else
                                    <a href="#" class="active">
                                        {{ $breadcrumb['label'] }}
                                    </a>
                                @endif
                            </li>

                            @if (!$loop->last)
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                    <h1 class="title rts-text-anime-style-1">
                        {{ $category->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts service-details-breadcrumb-area-end -->