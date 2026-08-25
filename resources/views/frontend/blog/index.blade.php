@extends('frontend.layouts.app')

@section('title', 'Senverse')

@section('meta_description', 'Senverse')

@section('body_class', 'demo-software-company')

@section('content')


    {{-- Breadcrumb --}}
    @include('frontend.blog.sections.breadcrumbs')

    <div class="rts-blog-list-area rts-section-gapBottom">
        <div class="container">
            <div class="row">

                <div class="col-xl-8">
                    @include('frontend.blog.sections.list')
                </div>

                <div class="col-xl-4 col-md-12 col-sm-12 col-12 pl--50 pl_md--10 pl_sm--10 mt_md--50 mt_sm--50">
                    @include('frontend.blog.sections.slidebar')
                </div>

            </div>
        </div>
    </div>

@endsection
