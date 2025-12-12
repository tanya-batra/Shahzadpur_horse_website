@extends('admin.layout.main')
@section('title', 'Subcategories')
@section('content')

<div class="container mt-4">
    <h2>All Subcategories</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Short Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subcategories as $sub)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sub->name }}</td>
                    <td>{{ $sub->category->name ?? 'N/A' }}</td>
                    <td>
                        @if($sub->image)
                            <img src="{{ asset($sub->image) }}" width="70">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $sub->short_description ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('subcategories.edit', $sub->id) }}" class="btn btn-sm" style="background-color: #152238; color:white">Edit</a>
                        <form action="{{ route('subcategories.destroy', $sub->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No subcategories found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $subcategories->links('pagination::bootstrap-5') }}
</div>
@endsection
