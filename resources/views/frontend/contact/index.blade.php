@extends('frontend.layouts.app')

@section('title', 'Senverse')

@section('meta_description', 'Senverse')

@section('body_class', 'demo-software-company')

@section('content')

    {{-- Info --}}
    @include('frontend.contact.sections.contact')

     {{-- Form --}}
    @include('frontend.contact.sections.contact-form') 

    {{-- FAQ --}}
    @include('frontend.home.sections.faq')


    {{-- CTA --}}
    @include('frontend.home.sections.cta')

@endsection