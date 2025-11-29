@extends('layouts.app')

@section('header')
    @include('layouts.header')

    <!-- Hero / Carousel Section -->
    <section class="mb-5">
        @include('sections.carousel')
    </section>
@endsection

@section('content')

    <!-- Services -->
    <section class="py-5 bg-light">
        <div class="container">
            @include('sections.service')
        </div>
    </section>

    <!-- Featured Rooms -->
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center text-primary">Our Rooms</h2>
            @include('sections.room-container-brief')
        </div>
    </section>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
