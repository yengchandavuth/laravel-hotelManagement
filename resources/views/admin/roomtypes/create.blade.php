@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="fw-bold mb-0">Add New Room Type</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.roomtypes.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Room Type Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter room type name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label fw-bold">Description</label>
                    <textarea name="desc" id="desc" rows="4"
                        class="form-control @error('desc') is-invalid @enderror"
                        placeholder="Enter description">{{ old('desc') }}</textarea>
                    @error('desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.roomtypes.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-success">Save Room Type</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
