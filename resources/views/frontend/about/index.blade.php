@extends('frontend.layouts.app')

@section('title', 'Senverse')

@section('meta_description', 'Senverse')

@section('body_class', 'demo-software-company')

@section('content')

    {{-- Banner --}}
    @include('frontend.about.sections.hero')

    {{-- Mission --}}
    @include('frontend.about.sections.mission')

    {{-- Values --}}
    @include('frontend.about.sections.values')

    {{-- workflow --}}
    @include('frontend.about.sections.workflow')

    {{-- Cta --}}
    @include('frontend.about.sections.cta')

@endsection