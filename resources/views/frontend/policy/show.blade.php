@extends('frontend.layouts.app')

@section('content')
    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-11 col-12">

                    <article class="rts-blog-detials-area-start">
                        <div class="inner-content-blog-details">

                            {{-- Policy Title --}}
                            <h1 class="title">
                                {{ $policySection->title }}
                            </h1>

                            {{-- Policy Content --}}
                            @if ($policySection->content)
                                <div class="blog-content">
                                    {!! localized_html($policySection->content) !!}
                                </div>
                            @endif

                        </div>
                    </article>

                </div>
            </div>
        </div>
    </div>
@endsection