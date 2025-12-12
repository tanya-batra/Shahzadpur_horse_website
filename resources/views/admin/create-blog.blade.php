@extends('admin.layout.main')

@section('title', 'Create New Blog')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Create New Blog</h3>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Blog Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" required>
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Slug --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control @error('slug') is-invalid @enderror" required>
            @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Short Description --}}
        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea name="short_description" id="short_description" rows="2" class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description') }}</textarea>
            @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="6" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Meta Title --}}
        <div class="mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
        </div>

        {{-- Meta Description --}}
        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" id="meta_description" rows="3" class="form-control">{{ old('meta_description') }}</textarea>
        </div>

        {{-- Meta Keywords --}}
        <div class="mb-3">
            <label for="meta_keywords" class="form-label">Meta Keywords</label>
            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}" class="form-control" placeholder="keyword1, keyword2, keyword3">
        </div>

        {{-- YouTube URL --}}
        <div class="mb-3">
            <label for="youtube_url" class="form-label">YouTube URL</label>
            <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url') }}" class="form-control">
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn" style="background-color: #152238; color:#f4f7fd;">Create Blog</button>
    </form>
</div>
@endsection
