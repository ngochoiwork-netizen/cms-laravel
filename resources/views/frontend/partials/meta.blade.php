@php
    $metaTitle = trim($__env->yieldContent('title'))
        ?: ($page->meta_title ?? null)
        ?: ($category->meta_title ?? $category->name ?? null)
        ?: ($post->meta_title ?? $post->title ?? null)
        ?: ($product->meta_title ?? $product->name ?? null)
        ?: setting('meta_title', setting('site_name', 'ATEN Việt Nam'));

    $metaDescription = trim($__env->yieldContent('meta_description'))
        ?: ($page->meta_description ?? null)
        ?: ($category->meta_description ?? null)
        ?: ($post->meta_description ?? null)
        ?: ($product->meta_description ?? null)
        ?: setting('meta_description', 'Giải pháp ATEN chính hãng tại Việt Nam');

    $metaKeywords =
        ($page->meta_keywords ?? null)
        ?? ($category->meta_keywords ?? null)
        ?? ($post->meta_keywords ?? null)
        ?? ($product->meta_keywords ?? null)
        ?? setting('meta_keywords', '');

    $canonical =
        ($page->canonical_url ?? null)
        ?? ($category->canonical_url ?? null)
        ?? ($post->canonical_url ?? null)
        ?? ($product->canonical_url ?? null)
        ?? url()->current();

    $robots =
        ($page->robots ?? null)
        ?? ($category->robots ?? null)
        ?? ($post->robots ?? null)
        ?? ($product->robots ?? null)
        ?? (setting('robots_index') ? 'index, follow' : 'noindex, nofollow');
@endphp

<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="{{ $metaKeywords }}">
<meta name="robots" content="{{ $robots }}">
<link rel="canonical" href="{{ $canonical }}">

<meta property="og:title" content="{{ $metaTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">