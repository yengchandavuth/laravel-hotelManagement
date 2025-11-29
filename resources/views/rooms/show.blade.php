@extends('layouts.app')

@section('header')
@include('layouts.header')
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Room Image -->
            <div class="col-lg-6">
                <div class="shadow rounded overflow-hidden">
                    <img src="{{ asset($room->image) }}" alt="{{ $room->roomtype->name }}" class="img-fluid w-100">
                </div>
            </div>

            <!-- Room Details -->
            <div class="col-lg-6">
                <div class="p-4 shadow-sm rounded border border-light">
                    <h1 class="text-primary mb-3">{{ $room->roomtype->name }}</h1>
                    <h4 class="mb-3">${{ $room->price }}/Night</h4>
                    <p class="text-muted mb-3">{{ $room->desc }}</p>

                    <!-- Features -->
                    <ul class="list-unstyled mb-3">
                        <li><i class="fa fa-bed text-primary me-2"></i>{{ $room->no_beds }} Bed(s)</li>
                        <li><i class="fa fa-bath text-primary me-2"></i>Bath</li>
                        <li><i class="fa fa-wifi text-primary me-2"></i>Wifi</li>
                    </ul>

                    <!-- Booking Form (only if booking=true) -->
                    @if($booking)
                        @guest
                            <div class="alert alert-warning">
                                You need to <a href="{{ route('login') }}">log in</a> before booking a room.
                            </div>
                        @endguest

                        @auth
                            <form method="post" action="{{ route('orders.store') }}">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">

                                <div class="mb-3">
                                    <label for="check_in" class="form-label">Check In:</label>
                                    <input type="date" id="check_in" name="check_in" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="check_out" class="form-label">Check Out:</label>
                                    <input type="date" id="check_out" name="check_out" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Book Now</button>
                            </form>
                        @endauth
                    @endif
                    <a href="{{ route('rooms.index') }}" class="btn btn-outline-dark mt-3 w-100">Back to Rooms</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
