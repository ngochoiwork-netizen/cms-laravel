@php
    $seo = $seo ?? [];

    $seoTitle = $seo['title']
        ?? setting('site_name', null, 'Senverse');

    $seoDescription = $seo['description']
        ?? '';

    $seoRobots = $seo['robots']
        ?? 'index, follow';

    $canonical = $seo['canonical']
        ?? url()->current();

    $ogTitle = $seo['og_title']
        ?? $seoTitle;

    $ogDescription = $seo['og_description']
        ?? $seoDescription;

    $locale = $seo['locale']
        ?? app()->getLocale();

    $ogLocale = $locale === 'vi'
        ? 'vi_VN'
        : 'en_US';

    $ogImage = $seo['og_image'] ?? null;

    if (is_object($ogImage)) {
        $ogImage = $ogImage->url ?? null;
    }
@endphp

<title>{{ $seoTitle }}</title>

@if ($seoDescription)
    <meta name="description" content="{{ $seoDescription }}">
@endif

@if (!empty($seo['keywords']))
    <meta name="keywords" content="{{ $seo['keywords'] }}">
@endif

<meta name="robots" content="{{ $seoRobots }}">

<link rel="canonical" href="{{ $canonical }}">

{{-- Hreflang --}}
@if (!empty($seo['hreflang']))
    @foreach ($seo['hreflang'] as $lang => $url)
        <link rel="alternate"
              hreflang="{{ $lang }}"
              href="{{ $url }}">
    @endforeach
@endif

@if (!empty($seo['x_default']))
    <link rel="alternate"
          hreflang="x-default"
          href="{{ $seo['x_default'] }}">
@endif

{{-- Open Graph --}}
<meta property="og:type" content="{{ ($seo['model_type'] ?? null) === 'post' ? 'article' : 'website' }}">

<meta property="og:title" content="{{ $ogTitle }}">

@if ($ogDescription)
    <meta property="og:description" content="{{ $ogDescription }}">
@endif

<meta property="og:url" content="{{ $canonical }}">

<meta property="og:locale" content="{{ $ogLocale }}">

<meta property="og:site_name"
      content="{{ setting('site_name', null, 'Senverse') }}">

@if ($ogImage)
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:secure_url" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="{{ $ogTitle }}">
@endif

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $ogTitle }}">

@if ($ogDescription)
    <meta name="twitter:description" content="{{ $ogDescription }}">
@endif

@if ($ogImage)
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="twitter:image:alt" content="{{ $ogTitle }}">
@endif