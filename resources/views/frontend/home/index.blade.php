@extends('frontend.layout.master')

@section('title')
    Hoşgeldiniz
@endsection

@section('customcss')

@endsection

@section('content')


    <!-- BEGIN SLIDER -->
    @include('frontend.home.section.slider')
    <!-- END SLIDER -->

    {{-- MAİN --}}
    @include('frontend.home.section.main')
    {{-- END MAİN --}}

    <!-- BEGIN BRANDS -->
    @include('frontend.home.section.brands')

    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    @include('frontend.home.section.steps')
    <!-- END STEPS -->

@endsection

@section('customjs')

@endsection
