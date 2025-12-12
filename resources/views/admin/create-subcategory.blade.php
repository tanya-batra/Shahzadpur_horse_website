@extends('admin.layout.main')

@section('title', isset($subcategory) ? 'Edit Subcategory' : 'Create Subcategory')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 fw-bold text-dark">
        @isset($subcategory) Edit Subcategory @else Create Subcategory @endisset
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

    <form action="@isset($subcategory) {{ route('subcategories.update', $subcategory->id) }} @else {{ route('subcategories.store') }} @endisset" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @isset($subcategory) @method('PUT') @endisset

        {{-- Parent Category --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Parent Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        @isset($subcategory) {{ $subcategory->category_id == $cat->id ? 'selected' : '' }} @endisset>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Subcategory Name --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Subcategory Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" 
                   value="{{ $subcategory->name ?? old('name') }}" required>
        </div>

        {{-- Short Description --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Short Description</label>
            <textarea name="short_description" class="form-control" rows="3">{{ $subcategory->short_description ?? old('short_description') }}</textarea>
        </div>

        {{-- Image Upload --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Image</label>
            <input type="file" name="image" class="form-control">
            @isset($subcategory)
                @if($subcategory->image)
                    <img src="{{ asset($subcategory->image) }}" width="100" class="mt-2 rounded">
                @endif
            @endisset
        </div>

        {{-- Buttons --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn text-white" style="background-color:#152238;">
                @isset($subcategory) <i class="fas fa-save me-1"></i> Update 
                @else <i class="fas fa-plus-circle me-1"></i> Save @endisset
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </form>
</div>
@endsection
