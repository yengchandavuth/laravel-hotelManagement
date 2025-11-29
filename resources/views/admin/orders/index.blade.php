@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="fw-bold mb-0">Upcoming Bookings</h3>
        </div>

        <div class="card-body p-0">
            @if($orders->isEmpty())
                <div class="text-center text-muted py-4">No bookings found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light text-uppercase small">
                            <tr>
                                <th>#</th>
                                <th>Room Name</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Total Price</th>
                                <th>Booked On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->room->roomtype->name ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->check_in)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->check_out)->format('d M Y') }}</td>
                                    <td>${{ number_format($order->room->price * $order->stayDays, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
