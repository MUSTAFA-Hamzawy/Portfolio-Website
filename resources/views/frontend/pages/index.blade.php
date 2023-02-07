@extends('frontend.layout.app')

    @section('page-title', 'Rasalina - Personal Portfolio HTML Template')


@include('frontend.Includes.header')

@section('content')
    <!-- banner-area -->
    @include('frontend.pages.home_banner')
    <!-- banner-area-end -->

    <!-- about-area -->
    @include('frontend.pages.about')
    <!-- about-area-end -->

    <!-- services-area -->
    @include('frontend.pages.services')
    <!-- services-area-end -->

    <!-- work-process-area -->
    @include('frontend.pages.work_process')
    <!-- work-process-area-end -->

    <!-- portfolio-area -->
    @include('frontend.pages.portfolio')
    <!-- portfolio-area-end -->

    <!-- partner-area -->
    @include('frontend.pages.partner')
    <!-- partner-area-end -->

    <!-- testimonial-area -->
    @include('frontend.pages.testimonials')
    <!-- testimonial-area-end -->

    <!-- blog-area -->
    @include('frontend.pages.blog')
    <!-- blog-area-end -->

    <!-- contact-area -->
    @include('frontend.pages.contact')
    <!-- contact-area-end -->

@endsection


