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
                                    <span class="active">
                                        {{ $breadcrumb['label'] }}
                                    </span>
                                @endif
                            </li>
                            @if (!$loop->last)
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    {{-- Chỉ hiện H1 Category ở trang Blog List --}}
                    @if (!isset($post))
                        <h1 class="title rts-text-anime-style-1">
                            {{ $category->name }}
                        </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts service-details-breadcrumb-area-end -->