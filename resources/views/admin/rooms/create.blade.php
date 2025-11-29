@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if($types->isEmpty())
        <div class="alert alert-warning">
            You should create a Room Type first!
        </div>
    @else
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="fw-bold mb-0">Add New Room</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.rooms.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="room_type_id" class="form-label fw-bold">Room Type</label>
                            <select name="room_type_id" id="room_type_id" class="form-select @error('room_type_id') is-invalid @enderror">
                                <option value="">Choose...</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" @selected(old('room_type_id') == $type->id)>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('room_type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="total_room" class="form-label fw-bold">Total Rooms</label>
                            <input type="number" name="total_room" id="total_room" value="{{ old('total_room') }}" 
                                class="form-control @error('total_room') is-invalid @enderror">
                            @error('total_room')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="no_beds" class="form-label fw-bold">No of Beds</label>
                            <input type="number" name="no_beds" id="no_beds" value="{{ old('no_beds') }}" 
                                class="form-control @error('no_beds') is-invalid @enderror">
                            @error('no_beds')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" 
                                class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="desc" class="form-label fw-bold">Description</label>
                            <textarea name="desc" id="desc" rows="4" 
                                class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" name="image" id="image" 
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" id="status" checked role="switch">
                                <label class="form-check-label fw-bold" for="status">Active / Disabled</label>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-success">Add Room</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    @endif

</div>
@endsection
