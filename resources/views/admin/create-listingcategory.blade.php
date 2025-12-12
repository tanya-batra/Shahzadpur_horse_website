@extends('admin.layout.main')

@section('title', isset($category) ? 'Edit Category' : 'Create Category')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 fw-bold text-dark">
        @isset($category) Edit Category @else Create Category @endisset
    </h2>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <ul class="mb-0">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="@isset($category) {{ route('categories.update', $category->id) }} @else {{ route('categories.store') }} @endisset" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @isset($category) @method('PUT') @endisset

        <div class="mb-3">
            <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" 
                   value="{{ $category->name ?? old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Short Description</label>
            <textarea name="short_description" class="form-control" rows="3">{{ $category->short_description ?? old('short_description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Image</label>
            <input type="file" name="image" class="form-control">
            @isset($category)
                @if($category->image)
                    <img src="{{ asset($category->image) }}" width="100" class="mt-2 rounded">
                @endif
            @endisset
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn text-white" style="background-color:#152238;">
                @isset($category) <i class="fas fa-save me-1"></i> Update 
                @else <i class="fas fa-plus-circle me-1"></i> Save @endisset
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </form>
</div>
@endsection
