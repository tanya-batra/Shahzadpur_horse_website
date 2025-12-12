@extends('admin.layout.main')

@section('title', 'Add Gallery Images')

@section('content')
<div class="container py-4">
    <h2>Add Images to Gallery</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow-sm mt-3">
        <form action="{{ route('gallery.images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category_id" class="form-label">Select Category</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">-- Choose Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Select Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple required>
                <small class="text-muted">You can select multiple images at once.</small>
            </div>

            <button type="submit" class="btn" style="background-color: #152238; color:#f4f7fd">Upload Images</button>
        </form>
    </div>
</div>
@endsection
