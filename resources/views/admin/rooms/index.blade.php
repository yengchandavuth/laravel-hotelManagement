@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="fw-bold mb-0">All Rooms</h3>
            <a href="{{ route('admin.rooms.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus me-1"></i> Add Room
            </a>
        </div>

        <div class="card-body p-0">
            @if($rooms->isEmpty())
                <div class="text-center text-muted py-4">No rooms found. Please add some.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light text-uppercase small">
                            <tr>
                                <th>#</th>
                                <th>Room Name</th>
                                <th>Total Rooms</th>
                                <th>No of Beds</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $room->roomtype->name ?? '-' }}</td>
                                    <td>{{ $room->total_room }}</td>
                                    <td>{{ $room->no_beds }}</td>
                                    <td>${{ number_format($room->price, 2) }}</td>
                                    <td>
                                        @if($room->image)
                                            <img src="{{ asset($room->image) }}" width="50" height="40" class="rounded">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($room->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
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
