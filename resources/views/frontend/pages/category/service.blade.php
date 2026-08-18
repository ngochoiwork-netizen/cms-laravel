@extends('frontend.layouts.master')


@section('content')

@include('frontend.partials.breadcrumb', [
    'title' => $category->name,
    'image' => $category->thumbnail ? asset('storage/' . $category->thumbnail->file_path) : null,
    'items' => $breadcrumbs
])

<div class="service-area default-padding bottom-less bg-cover">
    <div class="container">
        <div class="service-items text-center">
            <div class="row">

                @php
                    $icons = [
                        'flaticon-cogwheel',
                        'flaticon-analysis-1',
                        'flaticon-reduction',
                        'flaticon-interview',
                        'flaticon-sketch',
                        'flaticon-firewall',
                    ];
                @endphp

                @forelse($services as $index => $service)

                    @php
                        $serviceUrl = $service->category
                            ? route('frontend.post.show', [$service->category->slug, $service->slug])
                            : url($service->slug);
                    @endphp

                    <div class="col-lg-4 col-md-6 single-item">
                        <div class="item">
                            <div class="info">

                                <h4>
                                    <a href="{{ $serviceUrl }}">
                                        {{ $service->title }}
                                    </a>
                                </h4>

                                <i class="{{ $icons[$index] ?? 'flaticon-cogwheel' }}"></i>

                                <p>
                                    {{ $service->excerpt }}
                                </p>

                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-lg-12">
                        <p>Chưa có dịch vụ nào.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>

@if($aboutChoose)
<!-- Banner -->
<div class="video-area extra-padding text-center default-padding faq-area bg-gray bg-fixed shadow dark text-light"
     style="background-image: url({{ $aboutChoose->image ? asset('storage/' . $aboutChoose->image->file_path) : asset('assets/frontend/img/banner/2.jpg') }});">

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
        <img src="{{ asset('assets/frontend/img/shape/9.png') }}" alt="Shape">
    </div>
</div>
@endif

@if($aboutChoose && !empty($aboutChoose->items))
<!-- Why Choose -->
<div class="choose-us-area default-padding-bottom">
    <div class="container">
        <div class="items-box">
            <div class="row">

                @foreach($aboutChoose->items as $item)

                    @if(($item['type'] ?? '') === 'highlight')
                        <div class="single-item col-lg-6 col-md-6">
                            <div class="item bg-gradient text-light">
                                <div class="info">

                                    <h4>{{ $item['title'] ?? '' }}</h4>
                                    <p>{{ $item['description'] ?? '' }}</p>

                                    @if(!empty($item['phone']))
                                        <div class="call">
                                            <div class="icons">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="info">
                                                <span>{{ $item['phone_label'] ?? 'Hotline' }}</span>
                                                <a href="tel:{{ preg_replace('/\D+/', '', $item['phone']) }}">
                                                    {{ $item['phone'] }}
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                    @else
                        <div class="single-item col-lg-6 col-md-6">
                            <div class="item">
                                <div class="icon">
                                    <i class="{{ $item['icon'] ?? 'fas fa-cubes' }}"></i>
                                </div>

                                <div class="info">
                                    <h4>{{ $item['title'] ?? '' }}</h4>
                                    <p>{{ $item['description'] ?? '' }}</p>

                                    @if(!empty($item['button_text']))
                                        <a href="{{ !empty($item['button_link']) ? $item['button_link'] : route('frontend.contact') }}"
                                           class="btn-more">
                                            {{ $item['button_text'] }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach

            </div>
        </div>
    </div>
</div>
@endif

<!-- Clients -->
<div class="clients-area bg-gray default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="clients-carousel owl-carousel owl-theme">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/img/clients/1.png') }}"></a>
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/img/clients/2.png') }}"></a>
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/img/clients/3.png') }}"></a>
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/img/clients/4.png') }}"></a>
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/img/clients/5.png') }}"></a>
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/img/clients/6.png') }}"></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection