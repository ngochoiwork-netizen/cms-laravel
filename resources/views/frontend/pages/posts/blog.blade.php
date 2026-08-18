@extends('frontend.layouts.master')

@section('content')

@include('frontend.partials.breadcrumb', [
    'title' => $post->title,
    'image' => $category->thumbnail ? asset('storage/' . $category->thumbnail->file_path) : null,
    'items' => $breadcrumbs
])

<div class="blog-area single full-blog right-sidebar full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">

                {{-- LEFT CONTENT --}}
                <div class="blog-content col-lg-8 col-md-12">

                    @php
                        $image = $post->thumbnail
                            ? asset('storage/' . $post->thumbnail->file_path)
                            : asset('assets/frontend/img/blog/1.jpg');
                    @endphp

                    <div class="item">
                        <div class="blog-item-box">

                            <div class="thumb">
                                <img src="{{ $image }}" alt="{{ $post->title }}">
                            </div>

                            <div class="info">

                                {{-- CATEGORY --}}
                                @if($post->category)
                                    <div class="cats">
                                        <a href="{{ url($post->category->slug) }}">
                                            {{ $post->category->name }}
                                        </a>
                                    </div>
                                @endif

                                {{-- META --}}
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                                        </li>

                                        @if($post->user)
                                            <li>By {{ $post->user->name }}</li>
                                        @endif
                                    </ul>
                                </div>

                                {{-- CONTENT --}}
                                {!! $post->content !!}

                            </div>
                        </div>
                    </div>

                    {{-- PREV NEXT --}}
                    @if($previousPost || $nextPost)
                        <div class="post-pagi-area">

                            @if($previousPost && $previousPost->category)
                                <a href="{{ route('frontend.post.show', [$previousPost->category->slug, $previousPost->slug]) }}">
                                    <i class="fas fa-angle-double-left"></i> Bài trước
                                    <h5>{{ $previousPost->title }}</h5>
                                </a>
                            @endif

                            @if($nextPost && $nextPost->category)
                                <a href="{{ route('frontend.post.show', [$nextPost->category->slug, $nextPost->slug]) }}">
                                    Bài tiếp theo <i class="fas fa-angle-double-right"></i>
                                    <h5>{{ $nextPost->title }}</h5>
                                </a>
                            @endif

                        </div>
                    @endif

                </div>

                {{-- SIDEBAR --}}
                <div class="col-lg-4 sidebar">

                    

                    {{-- RECENT POSTS --}}
                    <div class="sidebar-item recent-post">
                        <div class="title">
                            <h4>Bài viết mới</h4>
                        </div>
                        <ul>
                            @foreach($recentPosts as $item)
                                @php
                                    $itemUrl = $item->category
                                        ? route('frontend.post.show', [$item->category->slug, $item->slug])
                                        : url($item->slug);

                                    $thumb = $item->thumbnail
                                        ? asset('storage/' . $item->thumbnail->file_path)
                                        : asset('assets/frontend/img/blog/1.jpg');
                                @endphp

                                <li>
                                    <div class="thumb">
                                        <a href="{{ $itemUrl }}">
                                            <img src="{{ $thumb }}" alt="{{ $item->title }}">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="{{ $itemUrl }}">
                                            {{ $item->title }}
                                        </a>
                                        <div class="meta-title">
                                            <span class="post-date">
                                                <i class="fas fa-clock"></i>
                                                {{ $item->published_at?->format('d/m/Y') ?? $item->created_at->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- CATEGORY --}}
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>Danh mục</h4>
                        </div>

                        <div class="sidebar-info">
                            <ul>
                                @foreach($sidebarCategories as $cat)
                                    <li>
                                        <a href="{{ url($cat->slug) }}">
                                            {{ $cat->name }}
                                            <span>({{ $cat->posts_count }})</span>
                                        </a>

                                        @if($cat->children->count())
                                            <ul class="children">
                                                @foreach($cat->children as $child)
                                                    <li>
                                                        <a href="{{ url($child->slug) }}">
                                                            — {{ $child->name }}
                                                            <span>({{ $child->posts_count }})</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- SOCIAL --}}
                    <div class="sidebar-item social-sidebar">
                        <div class="title">
                            <h4>Follow us</h4>
                        </div>

                        <div class="sidebar-info">
                            <ul>

                                @if(setting('facebook'))
                                    <li class="facebook">
                                        <a href="{{ setting('facebook') }}" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(setting('youtube'))
                                    <li class="youtube">
                                        <a href="{{ setting('youtube') }}" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(setting('tiktok'))
                                    <li class="tiktok">
                                        <a href="{{ setting('tiktok') }}" target="_blank">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(setting('zalo'))
                                    <li class="zalo">
                                        <a href="{{ setting('zalo') }}" target="_blank">
                                            <img src="{{ asset('assets/frontend/img/icon/zalo.png') }}" width="16">
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection