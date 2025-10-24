@extends('layouts.app')

@section('header')
    @include('layouts.header')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Booking -->
    @include('sections.booking-header')
@endsection

@section('content')
    <!-- Room -->
    @include('sections.room-container-details')
    <!-- Testimonial -->
    @include('sections.testimonial')
    <!-- Newsletter -->
    @include('sections.newsletter')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
