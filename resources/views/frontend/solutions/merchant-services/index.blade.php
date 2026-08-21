@extends('frontend.layouts.app')

@section('title', 'Senverse')

@section('meta_description', 'Senverse')

@section('body_class', 'demo-software-company')

@section('content')
    {{-- Banner --}}
    @include('frontend.solutions.merchant-services.sections.slider')

    {{-- Benefits --}}
    @include('frontend.solutions.merchant-services.sections.benefits')

    {{-- Payment Method --}}
    @include('frontend.solutions.merchant-services.sections.payment-method')

    {{-- Workflow --}}
    @include('frontend.solutions.merchant-services.sections.workflow')

    {{-- Payment manament --}}
    @include('frontend.solutions.merchant-services.sections.payment-manament')

    {{-- Testimonials --}}
    @include('frontend.home.sections.testimonials')

    {{-- FAQ --}}
    @include('frontend.solutions.merchant-services.sections.faq')

    {{-- CTA --}}
    @include('frontend.solutions.merchant-services.sections.cta')
@endsection