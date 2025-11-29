@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="fw-bold mb-0">Room Types</h3>
            <a href="{{ route('admin.roomtypes.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus me-1"></i> Add Room Type
            </a>
        </div>
        <div class="card-body p-0">
            @if($types->isEmpty())
                <div class="text-center text-muted py-4">
                    No room types found. Please add some.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light text-uppercase small">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->desc }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.roomtypes.edit', $type->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('admin.roomtypes.destroy', $type->id) }}" method="POST" class="d-inline">
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
