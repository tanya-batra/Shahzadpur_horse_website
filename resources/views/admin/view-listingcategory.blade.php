@extends('admin.layout.main')

@section('title', 'View Categories')

@section('content')
    <div class="container mt-4">

        {{-- Page Title --}}
        <h2 class="mb-4 fw-bold text-dark">All Categories</h2>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Categories Table --}}
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="text-white" style="background-color: #5B0A0A;">
                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Short Description</th>
                            <th>Status</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset($category->image) }}" width="70"
                                            class="rounded shadow-sm border">
                                    @else
                                        <span class="badge bg-secondary">N/A</span>
                                    @endif
                                </td>
                                <td>{{ $category->short_description ?? 'N/A' }}</td>
                                <td>
                                    <button
                                        class="btn btn-sm toggle-status {{ $category->status ? 'btn-success' : 'btn-danger' }}"
                                        data-id="{{ $category->id }}">
                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </td>

                                <td>
                                    {{-- Edit Button --}}
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm  mb-1"
                                        style="background-color: #152238 ; color:white;">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>

                                    {{-- Delete Form --}}
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1">
                                            <i class="fas fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <script>
document.querySelectorAll('.toggle-status').forEach(button => {
    button.addEventListener('click', function () {
        let categoryId = this.dataset.id;
        let btn = this;

        fetch(`/categories/${categoryId}/toggle-status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (data.status) {
                    btn.classList.remove('btn-danger');
                    btn.classList.add('btn-success');
                    btn.textContent = 'Active';
                    alert("Category activated successfully");
                } else {
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-danger');
                    btn.textContent = 'Inactive';
                    alert("Category deactivated successfully");
                }
            } else {
                alert("Something went wrong!");
            }
        })
        .catch(() => {
            alert("Server error! Please try again later.");
        });
    });
});

</script>

@endsection
