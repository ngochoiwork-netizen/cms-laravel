<div class="rts-blog-list-wrapper">

    @forelse ($posts as $post)

        <div class="single-blog-style-one">

            <a href="{{ localized_route('resources.show', [
                        'categorySlug' => $category->slug,
                        'postSlug' => $post->slug,
                    ]) }}" class="thumbnail-blog">

                @if ($post->thumbnail)
                    <img
                        src="{{ $post->thumbnail->url }}"
                        alt="{{ $post->thumbnail->alt_text ?: $post->title }}"
                    >
                @endif

            </a>

            <div class="inner-content-blog">

                <span>{{ $category->name }}</span>

                <a href="{{ localized_route('resources.show', [
                            'categorySlug' => $category->slug,
                            'postSlug' => $post->slug,
                        ]) }}">
                    <h5 class="title">
                        {{ $post->title }}
                    </h5>
                </a>

                <a href="{{ localized_route('resources.show', [
                            'categorySlug' => $category->slug,
                            'postSlug' => $post->slug,
                        ]) }}" class="btn-line">

                    <span>Learn More</span>

                    <i class="fa-solid fa-chevron-right"></i>
                </a>

            </div>

        </div>

    @empty

        <div class="text-center">
            <p>No posts found.</p>
        </div>

    @endforelse
@if ($posts->hasPages())
    <div class="blog-pagination">

        @if (!$posts->onFirstPage())
            <a href="{{ $posts->previousPageUrl() }}" class="page-arrow">
                <i class="fa fa-angle-left"></i>
            </a>
        @endif

        @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
            <a
                href="{{ $url }}"
                class="page-number {{ $page == $posts->currentPage() ? 'active' : '' }}"
            >
                {{ $page }}
            </a>
        @endforeach

        @if ($posts->hasMorePages())
            <a href="{{ $posts->nextPageUrl() }}" class="page-arrow">
                <i class="fa fa-angle-right"></i>
            </a>
        @endif

    </div>
@endif
</div>
