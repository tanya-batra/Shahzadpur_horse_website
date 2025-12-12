@extends('admin.layout.main')
@section('title', 'View Horse Details')

@section('content')
<div class="container mt-4">
    <h2>Horse Details</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Subcategory</th>
                <th>Horse Name</th>
                <th>Color</th>
                <th>Age</th>
                <th>Height</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($horses as $horse)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $horse->subcategory->name ?? 'N/A' }}</td>
                    <td>{{ $horse->horse_name ?? 'N/A' }}</td>
                    <td>{{ $horse->color ?? 'N/A' }}</td>
                    <td>{{ $horse->age ?? 'N/A' }}</td>
                    <td>{{ $horse->height ?? 'N/A' }}</td>
                    <td>
                        @foreach($horse->images as $img)
                            <img src="{{ asset($img->image_path) }}" width="50" class="me-1 mb-1 rounded">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('horses.edit', $horse->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form action="{{ route('horses.destroy', $horse->id) }}" method="POST" 
                              class="d-inline" onsubmit="return confirm('Delete this horse detail?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center">No horse details found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $horses->links() }}
</div>
@endsection
