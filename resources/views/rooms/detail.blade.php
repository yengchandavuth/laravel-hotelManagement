@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <img src="{{ asset($room->image) }}" class="img-fluid rounded" alt="{{ $room->roomtype->name }}">
            </div>
            <div class="col-lg-6">
                <h1 class="mb-3">{{ $room->roomtype->name }}</h1>
                <h4 class="text-primary mb-3">${{ $room->price }}/Night</h4>
                <p>{{ $room->desc }}</p>
                <ul class="list-unstyled mb-3">
                    <li><i class="fa fa-bed me-2"></i>{{ $room->no_beds }} Bed</li>
                    <li><i class="fa fa-bath me-2"></i>Bath</li>
                    <li><i class="fa fa-wifi me-2"></i>Wifi</li>
                </ul>
                <a href="{{ route('rooms.index') }}" class="btn btn-dark me-2">Back to Rooms</a>
                <a href="{{ route('orders.store', ['room' => $room->id]) }}" class="btn btn-success">Book Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
