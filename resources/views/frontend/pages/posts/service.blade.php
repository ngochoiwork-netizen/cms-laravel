@extends('frontend.layouts.master')

@section('content')
@include('frontend.partials.breadcrumb', [
'title' => $post->title,
'image' => $category->thumbnail ? asset('storage/' . $category->thumbnail->file_path) : null,
'items' => $breadcrumbs
])

<!-- Start Services Details -->
<div class="services-details-area default-padding">
    <div class="container">
        <div class="row">

            {{-- LEFT --}}
            <div class="col-lg-8 content">

                {{-- IMAGE POST --}}
                <div class="thumb">
                    <img src="{{ asset('storage/'.$post->thumbnail?->file_path ?? 'assets/img/banner/7.jpg') }}"
                         alt="{{ $post->title }}">
                </div>

                {{-- CONTENT --}}
                <div class="content mt-3">
                    {!! $post->content !!}
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="col-lg-4 sidebar">

                {{-- SERVICE LIST --}}
                <div class="sidebar-item link">
                    <ul>
                        @foreach($services as $item)
                            <li>
                                <a href="{{ route('frontend.post.show', [
                                        'categorySlug' => $item->category->slug,
                                        'postSlug' => $item->slug
                                    ]) }}"
                                   class="{{ $item->id === $post->id ? 'active' : '' }}">
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if($blogBanner && $blogBanner->image)
                {{-- CONTACT --}}
                <div class="sidebar-item banner">
                    <div class="thumb">
                        @if($blogBanner && $blogBanner->image)
						    <img src="{{ asset('storage/'.$blogBanner->image->file_path) }}" alt="Banner">
						@else
						    <img src="{{ asset('assets/img/about/4.jpg') }}" alt="Default">
						@endif
                        <div class="content">
                            <h5>{{$blogBanner->title}}</h5>
                            <h3><i class="fas fa-phone"></i> {{$blogBanner->subtitle}}</h3>
                        </div>
                    </div>
                </div>
                @endif
              

            </div>

        </div>
    </div>
</div>
<!-- End Services Details -->
@endsection