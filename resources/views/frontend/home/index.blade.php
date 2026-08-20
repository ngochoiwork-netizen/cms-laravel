@extends('frontend.layouts.app')

@section('title', 'Senverse')

@section('meta_description', 'Senverse')

@section('body_class', 'demo-software-company')

@section('content')

    {{-- Banner --}}
    @include('frontend.home.sections.slider')

    {{-- About --}}
    @include('frontend.home.sections.about')

    {{-- Services --}}
    @include('frontend.home.sections.service')

    {{-- Features --}}
    @include('frontend.home.sections.solution')

    {{-- Products --}}
    @include('frontend.home.sections.workflow')

    {{-- Awards --}}
    @include('frontend.home.sections.whysenverse')

    {{-- Case Study --}}

    {{-- Testimonials --}}
    @include('frontend.home.sections.testimonials')

    {{-- FAQ --}}
    @include('frontend.home.sections.faq')

    {{-- Blog --}}
    @include('frontend.home.sections.posts')

    {{-- CTA --}}
    @include('frontend.home.sections.cta')
@endsection