<!-- resources/views/images/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Upload Image</h1>

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-upload"></i> Upload
        </button>
        <a href="{{ route('images.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </form>
@endsection
