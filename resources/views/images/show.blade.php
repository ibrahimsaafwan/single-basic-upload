<!-- resources/views/images/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">View Image</h1>

    <div class="text-center">
        <a href="{{ asset('storage/' . $image->image) }}" data-lightbox="image" data-title="Image">
            <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid rounded" alt="Image">
        </a>
    </div>

    <div class="mt-4">
        <a href="{{ route('images.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@endsection
