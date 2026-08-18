<!-- Start Breadcrumb -->
@php
	//dd($image);
@endphp
<div class="breadcrumb-area shadow theme bg-fixed text-light"
     style="background-image: url({{ $image ?? asset('assets/img/banner/7.jpg') }});">

    <div class="container">
        <div class="row align-center">

            <!-- Title -->
            <div class="col-lg-6">
                <h1>{{ $title }}</h1>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-6 text-end">
                <ul class="breadcrumb">
                    @foreach($items as $item)
                        <li class="{{ $loop->last ? 'active' : '' }}">
                            @if(!empty($item['url']) && !$loop->last)
                                <a href="{{ $item['url'] }}">
                                    @if($loop->first)
                                        <i class="fas fa-home"></i>
                                    @endif
                                    {{ $item['label'] }}
                                </a>
                            @else
                                {{ $item['label'] }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- End Breadcrumb -->