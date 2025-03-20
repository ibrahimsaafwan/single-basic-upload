<!-- resources/views/images/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Image</h1>

    <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Choose New Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                onchange="previewImage(event)">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Current Image</label>
            <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid rounded mb-2" alt="Current Image">
        </div>
        <div class="mb-3">
            <label class="form-label">New Image Preview</label>
            <img id="preview" class="img-preview" alt="New Image Preview">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="{{ route('images.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </form>
@endsection
