@extends('admin.layout.main')

@section('title', 'Create Category')

@section('content')
<div class="card card-custom p-4">
    <h3 class="mb-3">
        @isset($category) Edit Category @else Create Category @endisset
    </h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="@isset($category) {{ route('gallery.categories.update', $category->id) }} @else {{ route('gallery.categories.store') }} @endisset" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($category) @method('PUT') @endisset

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name ?? old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail (optional)</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            @isset($category)
                @if($category->thumbnail)
                    <img src="{{ asset($category->thumbnail) }}" alt="Thumbnail" width="80" class="mt-2">
                @endif
            @endisset
        </div>

        <button type="submit" class="btn" style="background-color:#152238 ;color:#fff;">
            @isset($category) Update @else Save @endisset
        </button>

        @isset($category)
            <a href="{{ route('gallery.categories.create') }}" class="btn btn-secondary">Cancel</a>
        @endisset
    </form>
</div>

<div class="card card-custom p-4 mt-4">
    <h3 class="mb-3">All Categories</h3>
    <table class="table table-bordered table-hover">
        <thead style="background-color:#5B0A0A;color:#fff;">
            <tr><th>#</th><th>Name</th><th>Thumbnail</th><th>Created At</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>@if($category->thumbnail)<img src="{{ asset($category->thumbnail) }}" width="60" class="rounded">@else N/A @endif</td>
                <td>{{ $category->created_at->format('d M, Y') }}</td>
                <td>
                    <a href="{{ route('gallery.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('gallery.categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">No categories found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">{{ $categories->links('pagination::bootstrap-5') }}</div>
</div>
@endsection
