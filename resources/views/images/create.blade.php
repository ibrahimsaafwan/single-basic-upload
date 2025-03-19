@extends('layouts.app')

@section('title', 'Upload Image')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Upload New Image</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="image" class="form-label">Select Image File</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload me-2"></i> Upload Image
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
