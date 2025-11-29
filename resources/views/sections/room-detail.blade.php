@extends('layouts.app')

@section('header')
@include('layouts.header')
@endsection

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Room Image -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="shadow rounded overflow-hidden">
                    <img src="{{ asset($room->image) }}" alt="{{ $room->roomtype->name }}" class="img-fluid w-100">
                </div>
            </div>

```
        <!-- Room Details -->
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
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

                <!-- Book Now Form -->
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

                    <div class="d-flex gap-2">
                        <a href="{{ route('rooms.index') }}" class="btn btn-outline-dark flex-fill">Back to Rooms</a>
                        <button type="submit" class="btn btn-primary flex-fill">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
```

</div>

<style>
/* Hover effect for room image and details */
.shadow-sm:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 12px 20px rgba(0,0,0,0.12);
}
</style>

@endsection

@section('footer')
@include('layouts.footer')
@endsection
