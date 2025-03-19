@extends('layouts.app')

@section('title', 'Edit Image')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Image</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('images.update', $image) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/' . $image->image) }}" class="img-thumbnail mb-3" id="currentImage"
                        style="max-width: 400px;">
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Update Image (Optional)</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
