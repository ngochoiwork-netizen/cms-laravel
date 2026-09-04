@extends('frontend.layouts.app')
@section('title', 'Senverse')
@section('meta_description', 'Senverse')
@section('body_class', 'demo-software-company')

@section('content')
    {{-- Banner --}}
    @include('frontend.solutions.growth-services.sections.slider')

    {{-- benefits --}}
    @include('frontend.solutions.growth-services.sections.benefits')

    {{-- Showcase --}}
    @include('frontend.solutions.growth-services.sections.showcase')

    {{-- Service --}}
    @include('frontend.solutions.growth-services.sections.service')

    {{-- Workflow --}}
    @include('frontend.solutions.growth-services.sections.workflow')

    {{-- Why --}}
    @include('frontend.solutions.growth-services.sections.whysenverse')

    {{-- Pricing --}}
    @include('frontend.solutions.growth-services.sections.pricing')

    {{-- FAQ --}}
    @include('frontend.solutions.growth-services.sections.faq')

    {{-- CTA --}}
    @include('frontend.solutions.growth-services.sections.cta')
@endsection