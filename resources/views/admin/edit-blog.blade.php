@extends('admin.layout.main')

@section('title', 'Edit Blog')

@section('content')
<div class="card card-custom p-4">
    <h2 class="mb-4">Edit Blog</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $blog->slug) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $blog->short_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5">{{ old('description', $blog->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($blog->image)<img src="{{ asset($blog->image) }}" width="120" class="mb-2">@endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $blog->meta_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">YouTube URL</label>
            <input type="text" name="youtube_url" value="{{ old('youtube_url', $blog->youtube_url) }}" class="form-control">
        </div>

        <button type="submit" class="btn" style="background-color:#152238;color:#fff;">Update Blog</button>
        <a href="{{ route('blogs.view') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
