@extends('frontend.layouts.master')

@section('title', $category->meta_title ?? $category->name)
@section('meta_description', $category->meta_description)

@section('content')
@include('frontend.partials.breadcrumb', [
    'title' => $category->name,
    'image' => $category->thumbnail ? asset('storage/' . $category->thumbnail->file_path) : null,
    'items' => $breadcrumbs
])

<div class="blog-area full-blog blog-standard full-blog grid-colum default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="blog-content">
                <div class="blog-item-box">
                    <div class="row">

                        @forelse($posts as $post)
                            @php
                                $postUrl = $post->category
                                    ? route('frontend.post.show', [$post->category->slug, $post->slug])
                                    : url($post->slug);

                                $image = $post->thumbnail
                                    ? asset('storage/' . $post->thumbnail->file_path)
                                    : asset('assets/frontend/img/blog/1.jpg');
                            @endphp

                            <div class="col-lg-4 col-md-6 single-item">
                                <div class="item">

                                    <div class="thumb">
                                        <a href="{{ $postUrl }}">
                                            <img src="{{ $image }}" alt="{{ $post->title }}">
                                        </a>
                                    </div>

                                    <div class="info">

                                        @if($post->category)
                                            <div class="cats">
                                                <a href="{{ url($post->category->slug) }}">
                                                    {{ $post->category->name }}
                                                </a>
                                            </div>
                                        @endif

                                        <div class="meta">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                                                </li>

                                                @if($post->user)
                                                    <li>
                                                        By {{ $post->user->name }}
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>

                                        <h4>
                                            <a href="{{ $postUrl }}">
                                                {{ $post->title }}
                                            </a>
                                        </h4>

                                        @if($post->excerpt)
                                            <p>
                                                {{ \Illuminate\Support\Str::limit($post->excerpt, 120) }}
                                            </p>
                                        @endif

                                        <a class="btn circle btn-theme effect btn-md" href="{{ $postUrl }}">
                                            Xem chi tiết
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <p class="text-center">Chưa có bài viết nào trong danh mục này.</p>
                            </div>
                        @endforelse

                    </div>

                    @if($posts->hasPages())
                        <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection