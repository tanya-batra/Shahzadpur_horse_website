@extends('admin.layout.main')

@section('title', isset($breed) ? 'Edit Horse Breed' : 'Create Horse Breed')

@section('content')
<div class="container">
    <h2>{{ isset($breed) ? 'Edit Horse Breed' : 'Create Horse Breed' }}</h2>

    <form action="{{ isset($breed) ? route('breeds.update', $breed->id) : route('breeds.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($breed)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="breedname" class="form-label">Breed Name</label>
            <input type="text" name="breedname" class="form-control" value="{{ old('breedname', $breed->breedname ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" rows="3">{{ old('short_description', $breed->short_description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="breed_image" class="form-label">Breed Image</label>
            <input type="file" name="breed_image" class="form-control">
            @isset($breed)
                @if($breed->breed_image)
                    <img src="{{ asset($breed->breed_image) }}" width="100" class="mt-2" alt="{{ $breed->breedname }}">
                @endif
            @endisset
        </div>

        <button type="submit" class="btn" style="background-color:#152238;color:#f4f7fd;">
            {{ isset($breed) ? 'Update Breed' : 'Create Breed' }}
        </button>
        @isset($breed)
            <a href="{{ route('breeds.create') }}" class="btn btn-secondary">Cancel</a>
        @endisset
    </form>

    <!-- Display Breeds Table -->
    <div class="card card-custom mt-5 p-3">
        <h3 class="mb-3">All Breeds</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover align-middle">
            <thead style="background-color:#152238 ;color:white;">
                <tr>
                    <th>#</th>
                    <th>Breed Name</th>
                    <th>Image</th>
                    <th>Short Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($breeds as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $b->breedname }}</td>
                        <td>
                            @if($b->breed_image)
                                <img src="{{ asset('storage/' . $b->breed_image) }}" width="80" height="60" style="object-fit:cover;border-radius:5px;">
                            @else N/A @endif
                        </td>
                        <td>{{ Str::limit($b->short_description, 50) }}</td>
                        <td>
                            <a href="{{ route('breeds.edit', $b->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('breeds.destroy', $b->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this breed?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No breeds found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $breeds->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
