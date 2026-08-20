@extends('frontend.layouts.app')

@section('title', 'Senverse')

@section('meta_description', 'Senverse')

@section('body_class', 'demo-software-company')

@section('content')
    {{-- Banner --}}
    @include('frontend.solutions.pos-system.sections.slider')

    {{-- Features --}}
    @include('frontend.solutions.pos-system.sections.features')

    {{-- Features --}}
    @include('frontend.solutions.pos-system.sections.audiences')

    {{-- workflow --}}
    @include('frontend.solutions.pos-system.sections.workflow')

    {{-- Testimonials --}}
    @include('frontend.solutions.pos-system.sections.price')

    {{-- Testimonials --}}
    @include('frontend.home.sections.testimonials')

    {{-- FAQ --}}
    @include('frontend.home.sections.faq')

    {{-- CTA --}}
    @include('frontend.home.sections.cta')
@endsection