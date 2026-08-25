@php
    $tracking = $tracking
        ?? \App\Services\TrackingService::get();

    $gtmId = $tracking['google_tag_manager'] ?? null;
@endphp


{{-- =========================================================
     Google Tag Manager - NoScript
========================================================= --}}

@if ($gtmId)

    <noscript>
        <iframe
            src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}"
            height="0"
            width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>

@endif


{{-- =========================================================
     Meta Pixel - NoScript

     Chỉ cần khi Meta Pixel chạy trực tiếp.
========================================================= --}}

@if (!empty($tracking['meta_pixel']) && !$gtmId)

    <noscript>
        <img
            height="1"
            width="1"
            style="display:none"
            src="https://www.facebook.com/tr?id={{ $tracking['meta_pixel'] }}&ev=PageView&noscript=1"
            alt="">
    </noscript>

@endif


{{-- =========================================================
     Custom Body Script
========================================================= --}}

@if (!empty($tracking['custom_body_script']))

    {!! $tracking['custom_body_script'] !!}

@endif