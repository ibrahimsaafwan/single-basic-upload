<!-- resources/views/images/index.blade.php -->
@extends('layouts.app')

@section('content')
    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('status') ?? 'Message Not Found!' }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="mb-4">Image Gallery</h1>
    <a href="{{ route('images.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Upload Image
    </a>

    <div class="row">
        @foreach ($images as $image)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <a href="{{ route('images.show', $image->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('images.edit', $image->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $images->links() }}
    </div>
@endsection
