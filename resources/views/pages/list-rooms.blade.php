@extends('layouts.app')

@section('header')
@include('layouts.header')
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-primary text-uppercase fw-bold">Our Rooms</h6>
            <h1 class="mb-0">Explore Our <span class="text-primary">Rooms</span></h1>
        </div>

        <!-- Rooms Grid -->
        <div class="row g-4">
            @foreach($rooms as $room)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration / 10 }}s">
                <div class="room-item shadow-sm rounded overflow-hidden border border-light h-100 hover-shadow">
                    <!-- Room Image -->
                    <div class="position-relative">
                        <img src="{{ asset($room->image) }}" alt="{{ $room->roomtype->name }}" class="img-fluid w-100">
                        <small class="position-absolute start-0 top-0 bg-primary text-white rounded py-1 px-3 ms-3 mt-3">
                            ${{ $room->price }}/Night
                        </small>
                    </div>

                    <!-- Room Info -->
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0 text-dark">{{ $room->roomtype->name }}</h5>
                            <div class="text-primary">
                                @for ($i = 0; $i < 5; $i++)
                                <small class="fa fa-star"></small>
                                @endfor
                            </div>
                        </div>

                        <p class="text-muted mb-3">{{ Str::limit($room->desc, 80) }}</p>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <!-- View Detail Button -->
                            <a class="btn btn-sm btn-outline-primary flex-fill" 
                               href="{{ route('rooms.show', ['room' => $room->id]) }}">
                               View Detail
                            </a>

                            <!-- Book Now Button -->
                            <a class="btn btn-sm btn-primary flex-fill" 
                               href="{{ route('rooms.show', ['room' => $room->id, 'booking' => true]) }}">
                               Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.room-item:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 12px 20px rgba(0,0,0,0.12);
}
</style>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
