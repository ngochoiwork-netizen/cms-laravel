<aside class="sticky-top" aria-label="Article sidebar">

    {{-- Categories --}}
    @if ($categories->isNotEmpty())
        <section class="rts-single-wized Categories">
            <div class="wized-header">
                <h2 class="title">
                    Categories
                </h2>
            </div>

            <div class="wized-body">
                <nav aria-label="Resource categories">
                    <ul class="single-categories">
                        @foreach ($categories as $item)
                            <li>
                                <a href="{{ localized_route('resources.category', [
                                    'categorySlug' => $item->slug,
                                ]) }}">
                                    {{ $item->name }}
                                    <i class="far fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </section>
    @endif

    {{-- Recent Posts --}}
    @if ($recentPosts->isNotEmpty())
        <section class="rts-single-wized Recent-post">
            <div class="wized-header">
                <h2 class="title">
                    Recent Posts
                </h2>
            </div>

            <div class="wized-body">
                @foreach ($recentPosts as $recentPost)
                    <article class="recent-post-single">

                        @if ($recentPost->thumbnail)
                            <div class="thumbnail">
                                <a
                                    href="{{ localized_route('resources.show', [
                                        'categorySlug' => $recentPost->category->slug,
                                        'postSlug' => $recentPost->slug,
                                    ]) }}"
                                    aria-label="{{ $recentPost->title }}"
                                >
                                    <img
                                        src="{{ $recentPost->thumbnail->url }}"
                                        alt="{{ $recentPost->thumbnail->alt_text ?: $recentPost->title }}"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </a>
                            </div>
                        @endif

                        <div class="content-area">
                            @if ($recentPost->published_at)
                                <div class="user">
                                    <i class="fal fa-clock" aria-hidden="true"></i>

                                    <time datetime="{{ $recentPost->published_at->toDateString() }}">
                                        {{ $recentPost->published_at->format('d M, Y') }}
                                    </time>
                                </div>
                            @endif

                            <h3 class="title recent-post-title">
                                <a
                                    class="post-title"
                                    href="{{ localized_route('resources.show', [
                                        'categorySlug' => $recentPost->category->slug,
                                        'postSlug' => $recentPost->slug,
                                    ]) }}"
                                >
                                    {{ $recentPost->title }}
                                </a>
                            </h3>
                        </div>

                    </article>
                @endforeach
            </div>
        </section>
    @endif

</aside>