@php
    $tracking = \App\Services\TrackingService::get();

    $gaId = $tracking['google_analytics'] ?? null;
    $gtmId = $tracking['google_tag_manager'] ?? null;
    $metaPixelId = $tracking['meta_pixel'] ?? null;
@endphp


{{-- =========================================================
     Google Analytics 4

     Chỉ load GA4 trực tiếp khi KHÔNG sử dụng GTM.
     Nếu có GTM, nên cấu hình GA4 bên trong GTM để tránh
     duplicate page_view.
========================================================= --}}

@if ($gaId && !$gtmId)

    <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}">
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', @json($gaId));
    </script>

@endif


{{-- =========================================================
     Google Tag Manager
========================================================= --}}

@if ($gtmId)

    <script>
        (function(w,d,s,l,i){
            w[l]=w[l]||[];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event:'gtm.js'
            });

            var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),
                dl=l!='dataLayer'
                    ? '&l='+l
                    : '';

            j.async=true;
            j.src='https://www.googletagmanager.com/gtm.js?id='
                + i + dl;

            f.parentNode.insertBefore(j,f);

        })(window,document,'script','dataLayer',@json($gtmId));
    </script>

@endif


{{-- =========================================================
     Meta Pixel

     Chỉ load trực tiếp nếu không sử dụng GTM.
     Nếu dùng GTM, nên quản lý Meta Pixel trong GTM.
========================================================= --}}

@if ($metaPixelId && !$gtmId)

    <script>
        !function(f,b,e,v,n,t,s)
        {
            if(f.fbq)return;

            n=f.fbq=function(){
                n.callMethod
                    ? n.callMethod.apply(n,arguments)
                    : n.queue.push(arguments)
            };

            if(!f._fbq)f._fbq=n;

            n.push=n;
            n.loaded=!0;
            n.version='2.0';
            n.queue=[];

            t=b.createElement(e);
            t.async=!0;
            t.src=v;

            s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)

        }(
            window,
            document,
            'script',
            'https://connect.facebook.net/en_US/fbevents.js'
        );

        fbq('init', @json($metaPixelId));
        fbq('track', 'PageView');
    </script>

@endif


{{-- =========================================================
     Custom Head Script

     Chỉ Admin đáng tin cậy được phép nhập field này.
========================================================= --}}

@if (!empty($tracking['custom_head_script']))

    {!! $tracking['custom_head_script'] !!}

@endif