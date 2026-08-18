@extends('frontend.layouts.master')

@section('content')
	<style type="text/css">
		
		/* Timeline container */
.timeline-area {
    position: relative;
}

/* Line giữa */
.timeline-items {
    position: relative;
}

.timeline-items::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 0;
    width: 2px;
    height: 100%;
    background: #ddd;
    transform: translateX(-50%);
}

/* Item */
.timeline-item {
    position: relative;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

/* Year */
.timeline-year {
    font-weight: 700;
    color: #fff;
    background: #2b4dff; /* màu theme */
    display: inline-block;
    padding: 5px 12px;
    border-radius: 20px;
    margin-bottom: 10px;
    font-size: 14px;
}

/* Content */
.timeline-info h4 {
    font-size: 18px;
    margin-bottom: 5px;
}

.timeline-info p {
    font-size: 14px;
    color: #666;
}

/* Layout trái phải */
.timeline-items .col-lg-6:nth-child(odd) {
    padding-right: 40px;
}

.timeline-items .col-lg-6:nth-child(even) {
    padding-left: 40px;
}

/* Dot */
.timeline-item::before {
    content: "";
    position: absolute;
    top: 25px;
    width: 12px;
    height: 12px;
    background: #2b4dff;
    border-radius: 50%;
    z-index: 2;
}

/* Left */
.timeline-items .col-lg-6:nth-child(odd) .timeline-item::before {
    right: -6px;
}

/* Right */
.timeline-items .col-lg-6:nth-child(even) .timeline-item::before {
    left: -6px;
}


@media (max-width: 991px) {

    .timeline-items::before {
        left: 10px;
    }

    .timeline-items .col-lg-6 {
        padding-left: 30px !important;
        padding-right: 0 !important;
    }

    .timeline-item::before {
        left: -6px !important;
        right: auto !important;
    }
}
	</style>	

    @include('frontend.partials.breadcrumb', [
	    'title' => $page->title,
	    'image' => $page->banner ? asset('storage/' . $page->banner->file_path) : null,
	    'items' => $breadcrumbs
	])

	@if($aboutIntro)
	<!-- Start About Area -->
	<div class="about-area inc-shape default-padding">
	    <div class="container">
	        <div class="row align-center">

	            {{-- LEFT IMAGE (1 ảnh duy nhất) --}}
	            <div class="col-lg-6">
	            	<div class="thumb">
		                @if($aboutIntro->image)
	                        <img 
	                            src="{{ asset('storage/' . $aboutIntro->image->file_path) }}" 
	                            alt="{{ $aboutIntro->title }}"
	                            class="img-fluid"
	                        >
	                    @endif
		                <div class="overlay">
		                    <div class="content">
		                        <h4><strong>20</strong> năm kinh nghiệm</h4>
		                    </div>
		                </div>
		            </div>
	            </div>
	            
	            {{-- RIGHT CONTENT --}}
	            <div class="col-lg-5 offset-lg-1 info">

	                {{-- Subtitle --}}
	                @if($aboutIntro->subtitle)
	                    <h5>{{ $aboutIntro->subtitle }}</h5>
	                @endif

	                {{-- Title --}}
	                <h2 class="title">{{ $aboutIntro->title }}</h2>

	                {{-- Description --}}
	                @if($aboutIntro->description)
	                    <p>{{ $aboutIntro->description }}</p>
	                @endif

	                {{-- Content --}}
	                @if($aboutIntro->content)
	                    <div>
	                        {!! $aboutIntro->content !!}
	                    </div>
	                @endif

	                {{-- Button (nếu có) --}}
	                @if(!empty($aboutIntro->button_text) && !empty($aboutIntro->button_link))
	                    <a href="{{ $aboutIntro->button_link }}" class="btn btn-theme mt-3">
	                        {{ $aboutIntro->button_text }}
	                    </a>
	                @endif

	            </div>

	        </div>
	    </div>
	</div>
	<!-- End About Area -->
	@endif

	@if($aboutWorks)
	<!-- Start Works About -->
	<div class="works-about-area overflow-hidden">
	    <div class="container">
	        <div class="works-about-items default-padding">
	            <div class="row align-center">

	                <div class="col-lg-6 info">

	                    @if($aboutWorks->subtitle)
	                        <h5>{{ $aboutWorks->subtitle }}</h5>
	                    @endif

	                    @if($aboutWorks->title)
	                        <h2 class="title">{!! nl2br(e($aboutWorks->title)) !!}</h2>
	                    @endif

	                    @if($aboutWorks->description)
	                        <p>{{ $aboutWorks->description }}</p>
	                    @endif

	                    @if(!empty($aboutWorks->items))
	                        <ul>
	                            @foreach($aboutWorks->items as $item)
	                                <li>
	                                    <h5>{{ $item['title'] ?? '' }}</h5>
	                                </li>
	                            @endforeach
	                        </ul>
	                    @endif

	                    @if($aboutWorks->button_text && $aboutWorks->button_link)
	                        <a href="{{ $aboutWorks->button_link }}" class="btn btn-theme effect btn-sm">
	                            {{ $aboutWorks->button_text }}
	                        </a>
	                    @endif

	                </div>

	                <div class="col-lg-6">
	                    <div class="thumb">
	                        @if($aboutWorks->image)
	                            <img src="{{ asset('storage/' . $aboutWorks->image->file_path) }}" alt="{{ $aboutWorks->title }}">
	                        @endif

	                        <div class="fun-fact">
	                            <div class="timer" data-to="875" data-speed="5000"></div>
	                            <span class="medium">Dự án đã hoàn thành</span>
	                        </div>
	                    </div>
	                </div>

	            </div>
	        </div>
	    </div>
	</div>
	<!-- End Works About Area -->
	@endif


	@if($aboutProcess && !empty($aboutProcess->items))
	<!-- Start Work Process -->
	<div class="work-process-area overflow-hidden default-padding bottom-less">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2">
	                <div class="site-heading text-center">
	                    @if($aboutProcess->subtitle)
	                        <h4>{{ $aboutProcess->subtitle }}</h4>
	                    @endif

	                    @if($aboutProcess->title)
	                        <h2 class="title">{{ $aboutProcess->title }}</h2>
	                    @endif
	                </div>
	            </div>
	        </div>
	    </div>

	    <div class="container-full">
	        <div class="work-pro-items">
	            <div class="row">
	                @foreach($aboutProcess->items as $index => $item)
	                    <div class="single-item col-lg-3 col-md-6">
	                        <div class="item">
	                            <div class="item-inner">
	                                <div class="icon">
	                                    <i class="{{ $item['icon'] ?? 'flaticon-select' }}"></i>
	                                    <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
	                                </div>

	                                <h5>{{ $item['title'] ?? '' }}</h5>

	                                <p>{{ $item['description'] ?? '' }}</p>
	                            </div>
	                        </div>
	                    </div>
	                @endforeach
	            </div>
	        </div>
	    </div>
	</div>
	<!-- End Work Process Area -->
	@endif


	{{-- ABOUT_BANNER --}}
@if($aboutChoose)
<!-- Start Banner Area -->
<div class="video-area extra-padding text-center default-padding faq-area bg-gray bg-fixed shadow dark text-light"
     style="background-image: url({{ $aboutChoose->image ? asset('storage/' . $aboutChoose->image->file_path) : asset('assets/img/banner/2.jpg') }});">

    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    @if($aboutChoose->subtitle)
                        <h5>{{ $aboutChoose->subtitle }}</h5>
                    @endif

                    @if($aboutChoose->title)
                        <h2>{{ $aboutChoose->title }}</h2>
                    @endif

                    @if($aboutChoose->description)
                        <p class="mt-3">
                            {{ $aboutChoose->description }}
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="fixed-shape-bottom">
        <img src="{{ asset('assets/img/shape/9.png') }}" alt="Shape">
    </div>
</div>
<!-- End Banner Area -->
@endif


{{-- ABOUT_CHOOSE --}}
@if($aboutChoose && !empty($aboutChoose->items))
<!-- Start Why Choose Us -->
<div class="choose-us-area default-padding-bottom">
    <div class="container">
        <div class="items-box">
            <div class="row">

                @foreach($aboutChoose->items as $item)

                    @if(($item['type'] ?? '') === 'highlight')
                        <!-- Single item -->
                        <div class="single-item col-lg-6 col-md-6">
                            <div class="item bg-gradient text-light">
                                <div class="info">

                                    @if(!empty($item['title']))
                                        <h4>{{ $item['title'] }}</h4>
                                    @endif

                                    @if(!empty($item['description']))
                                        <p>{{ $item['description'] }}</p>
                                    @endif

                                    @if(!empty($item['phone']))
                                        <div class="call">
                                            <div class="icons">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="info">
                                                <span>{{ $item['phone_label'] ?? 'Hotline' }}</span>
                                                {{ $item['phone'] }}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- End Single item -->
                    @else
                        <!-- Single item -->
                        <div class="single-item col-lg-6 col-md-6">
                            <div class="item">
                                <div class="icon">
                                    <i class="{{ $item['icon'] ?? 'fas fa-cubes' }}"></i>
                                </div>

                                <div class="info">

                                    @if(!empty($item['title']))
                                        <h4>{{ $item['title'] }}</h4>
                                    @endif

                                    @if(!empty($item['description']))
                                        <p>{{ $item['description'] }}</p>
                                    @endif

                                    @if(!empty($item['button_text']))
                                        <a href="{{ $item['button_link'] ?? url('/lien-he') }}" class="btn-more">
                                            {{ $item['button_text'] }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- End Single item -->
                    @endif

                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- End Why Choose Us -->
@endif


@if($aboutTimeline && !empty($aboutTimeline->items))
<!-- Start Timeline Area -->
<div class="timeline-area default-padding bg-light">
    <div class="container">

        {{-- Heading --}}
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">

                    @if($aboutTimeline->subtitle)
                        <h4>{{ $aboutTimeline->subtitle }}</h4>
                    @endif

                    @if($aboutTimeline->title)
                        <h2 class="title">{{ $aboutTimeline->title }}</h2>
                    @endif

                    @if($aboutTimeline->description)
                        <p>{{ $aboutTimeline->description }}</p>
                    @endif

                    @if($aboutTimeline->content)
                        <div>
                            {!! $aboutTimeline->content !!}
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- Timeline Items --}}
        <div class="timeline-items mt-5">
            <div class="row">

                @foreach($aboutTimeline->items as $item)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="timeline-item">

                            <div class="timeline-year">
                                {{ $item['year'] ?? '' }}
                            </div>

                            <div class="timeline-info">
                                <h4>{{ $item['title'] ?? '' }}</h4>
                                <p>{{ $item['description'] ?? '' }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
<!-- End Timeline Area -->
@endif


@endsection