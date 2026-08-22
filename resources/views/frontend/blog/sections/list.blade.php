<div class="rts-blog-list-wrapper">

    @forelse ($posts as $post)

        <div class="single-blog-style-one">

            <a href="{{ route('resources.show', [
                'categorySlug' => $category->slug,
                'postSlug' => $post->slug
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

                <a href="{{ route('resources.show', [
                    'categorySlug' => $category->slug,
                    'postSlug' => $post->slug
                ]) }}">
                    <h5 class="title">
                        {{ $post->title }}
                    </h5>
                </a>

                <a href="{{ route('resources.show', [
                    'categorySlug' => $category->slug,
                    'postSlug' => $post->slug
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

<style>
    .blog-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.blog-pagination a {
    width: 46px;
    height: 46px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e5e5e5;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 500;
    color: #1b1b1b;
    background: #ffffff;
    transition: all 0.3s ease;
    text-decoration: none;
}

.blog-pagination a:hover {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
}

.blog-pagination .active {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
    pointer-events: none;
}

.blog-pagination .page-arrow {
    font-size: 18px;
}

@media (max-width: 575px) {

    .blog-pagination {
        gap: 7px;
        margin-top: 35px;
    }

    .blog-pagination a {
        width: 40px;
        height: 40px;
        font-size: 14px;
    }

}
</style>