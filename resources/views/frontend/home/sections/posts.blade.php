@if ($posts->count())

<div class="rts-blog-area rts-section-gap bg_light2">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="title-center-wrapper">

                    <h2 class="title rts-text-anime-style-1">

                        {{ app()->getLocale() === 'vi'
                            ? 'Kiến Thức & Tài Nguyên'
                            : 'Insights & Resources'
                        }}

                    </h2>

                    <p class="disc">

                        {{ app()->getLocale() === 'vi'
                            ? 'Cập nhật xu hướng, kiến thức và những giải pháp mới nhất dành cho chủ salon.'
                            : 'Stay updated with the latest trends, tips, and best practices for salon management.'
                        }}

                    </p>

                </div>

            </div>

        </div>

        <div class="row g-5 mt--30">

            @foreach ($posts as $post)

                <div class="col-lg-4 col-md-6 col-sm-12">

                    <div class="single-blog-style-one br-8">
                        
                        <a href="{{ localized_route('resources.show', [
                                    'categorySlug' => $post->category->slug,
                                    'postSlug' => $post->slug,
                                ]) }}"
                            class="thumbnail-blog br-10">

                            @if ($post->thumbnail)

                                <img src="{{ asset('storage/' . $post->thumbnail->file_path) }}"
                                    alt="{{ $post->title }}">

                            @endif

                        </a>

                        <div class="inner-content-blog">
                            <span>
                                @if(app()->getLocale() === 'vi')
                                    {{ $post->created_at->format('d/m/Y') }}
                                @else
                                    {{ $post->created_at->format('M d, Y') }}
                                @endif
                            </span>
                            @if ($post->category)

                                <span>

                                    {{ $post->category->title }}

                                </span>

                            @endif

                            <a href="{{ localized_route('resources.show', [
                                            'categorySlug' => $post->category->slug,
                                            'postSlug' => $post->slug,
                                        ]) }}">

                                <h5 class="title">

                                    {{ $post->title }}

                                </h5>

                            </a>

                            <a href="{{ localized_route('resources.show', [
                                            'categorySlug' => $post->category->slug,
                                            'postSlug' => $post->slug,
                                        ]) }}"
                                class="btn-line">

                                <span>

                                    {{ app()->getLocale() === 'vi'
                                        ? 'Xem thêm'
                                        : 'Learn More'
                                    }}

                                </span>

                                <i class="fa-solid fa-chevron-right"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endif