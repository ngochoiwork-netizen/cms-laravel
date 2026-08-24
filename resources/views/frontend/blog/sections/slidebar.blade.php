<div class="sticky-top">

    {{-- Search --}}


    {{-- Categories --}}
    <div class="rts-single-wized Categories">
        <div class="wized-header">
            <h5 class="title">
                Categories
            </h5>
        </div>

        <div class="wized-body">

            @foreach ($categories as $item)

                <ul class="single-categories">
                    <li>
                        <a href="{{ route('resources.category', [
                            'categorySlug' => $item->slug
                        ]) }}">
                            {{ $item->name }}

                            <i class="far fa-long-arrow-right"></i>
                        </a>
                    </li>
                </ul>

            @endforeach

        </div>
    </div>


    {{-- Recent Posts --}}
    <div class="rts-single-wized Recent-post">
        <div class="wized-header">
            <h5 class="title">
                Recent Posts
            </h5>
        </div>

        <div class="wized-body">

            @foreach ($recentPosts as $recentPost)

                <div class="recent-post-single">

                    @if ($recentPost->thumbnail)
                        <div class="thumbnail">
                            <a href="{{ route('resources.show', [
                                'categorySlug' => $recentPost->category->slug,
                                'postSlug' => $recentPost->slug
                            ]) }}">

                                <img
                                    src="{{ $recentPost->thumbnail->url }}"
                                    alt="{{ $recentPost->thumbnail->alt_text ?: $recentPost->title }}"
                                >

                            </a>
                        </div>
                    @endif

                    <div class="content-area">

                        @if ($recentPost->published_at)
                            <div class="user">
                                <i class="fal fa-clock"></i>
                                <span>
                                    {{ $recentPost->published_at->format('d M, Y') }}
                                </span>
                            </div>
                        @endif

                        <a
                            class="post-title"
                            href="{{ route('resources.show', [
                                'categorySlug' => $recentPost->category->slug,
                                'postSlug' => $recentPost->slug
                            ]) }}"
                        >
                            <h6 class="title">
                                {{ $recentPost->title }}
                            </h6>
                        </a>

                    </div>

                </div>

            @endforeach

        </div>
    </div>



</div>
