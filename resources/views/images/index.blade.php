@extends('layouts.app')

@section('title', 'All Images')

@section('content')
    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('status') ?? 'Message Not Found!' }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Image Gallery</h4>
                <a href="{{ route('images.create') }}" class="btn btn-light">
                    <i class="fas fa-plus"></i> Upload New
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row g-4">
                @foreach ($images as $image)
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('images.edit', $image) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('images.destroy', $image) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
