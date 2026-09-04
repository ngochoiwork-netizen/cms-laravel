@extends('frontend.layouts.app')

@section('content')

    {{-- Breadcrumb --}}
    @include('frontend.blog.sections.breadcrumbs')

    <!-- rts blog list area start -->
    <div class="rts-blog-list-area rts-section-gapBottom">
        <div class="container">
            <div class="row">

                {{-- Blog Detail --}}
                <div class="col-xl-8">

                    <!-- rts blog details wrapper area start -->
                    <div class="rts-blog-detials-area-start">
                        {{-- Featured Image --}}
                        @if ($post->banner)
                            <div class="thumbnail-top">
                                <img
                                    src="{{ $post->banner->url }}"
                                    alt="{{ $post->banner->alt_text ?: $post->title }}"
                                >
                            </div>
                        @elseif ($post->thumbnail)
                            <div class="thumbnail-top">
                                <img
                                    src="{{ $post->thumbnail->url }}"
                                    alt="{{ $post->thumbnail->alt_text ?: $post->title }}"
                                >
                            </div>
                        @endif

                        <div class="inner-content-blog-details">
                            {{-- Post Meta --}}
                                <div class="top-area">
                                    @if ($category->name)
                                        <span>
                                           
                                             {{ $category->name }}
                                        </span>
                                    @endif

                                    @if ($post->published_at)
                                        <span>
                                            <i class="fa-regular fa-calendar"></i>

                                            {{ app()->getLocale() === 'vi'
                                                ? 'Đăng ngày'
                                                : 'Published'
                                            }}

                                            {{ $post->published_at->format('d/m/Y') }}
                                        </span>
                                    @endif

                                </div>


                            {{-- Post Title --}}
                            <h1 class="title">
                                {{ $post->title }}
                            </h1>


                            {{-- Short Description --}}
                            @if ($post->short_description)
                                <p class="disc">
                                    {{ $post->short_description }}
                                </p>
                            @endif


                            {{-- Post Content --}}
                            @if ($post->content)
                                <div class="blog-content">
                                    {!! localized_html($post->content) !!}
                                </div>
                            @endif

                        </div>

                    </div>
                    <!-- rts blog details wrapper area end -->

                </div>


                {{-- Sidebar --}}
                <div class="col-xl-4 col-md-12 col-sm-12 col-12
                            pl--50 pl_sm--10 pl_md--10
                            pt_md--50 pt_sm--50">

                    @include('frontend.blog.sections.slidebar')

                </div>

            </div>
        </div>
    </div>
    <!-- rts blog list area end -->

@endsection