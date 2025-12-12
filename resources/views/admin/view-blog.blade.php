<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Manage Blogs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f7fd;
      font-family: 'Inter', sans-serif;
    }
    .sidebar {
      min-height: 100vh;
      background: #152238;
      color: white;
      transition: 0.3s;
    }
    .sidebar .nav-link {
      color: white;
      margin: 5px 0;
      border-radius: 10px;
      transition: 0.2s;
    }
    .sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }
    .sidebar .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
    }
    .topbar {
      background-color: white;
      padding: 10px 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 0 0 15px 15px;
    }
    .card-custom {
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .card-custom:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    .btn-custom {
      border-radius: 50px;
      padding: 5px 20px;
    }
    .table-custom th {
      background: #152238;
      color: white;
      text-align: center;
    }
    .table-custom td {
      vertical-align: middle;
      text-align: center;
    }
    .img-thumb {
      width: 70px;
      height: 50px;
      object-fit: cover;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="d-flex">
  <div class="sidebar p-3 flex-shrink-0">
    <h3 class="text-center mb-4"><i class="fas fa-dashboard me-2"></i>My Dashboard</h3>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active"><i class="fas fa-home me-2"></i> Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blogMenu" role="button" aria-expanded="false">
                <i class="fas fa-pencil-alt me-2"></i> Blog
                <i class="fas fa-caret-down float-end"></i>
            </a>
            <div class="collapse ms-3" id="blogMenu">
                <a class="nav-link" href="{{ route('blogs.create') }}">Create Blog</a>
                <a class="nav-link" href="{{ route('blogs.view') }}">View Blog</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#breed" role="button" aria-expanded="false">
                <i class="fas fa-horse me-2"></i> Manage Breed
                <i class="fas fa-caret-down float-end"></i>
            </a>
            <div class="collapse ms-3" id="breed">
                <a class="nav-link" href="{{ route('breeds.create') }}">Create Breed</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#galleryMenu" role="button" aria-expanded="false">
                <i class="fas fa-images me-2"></i> Gallery
                <i class="fas fa-caret-down float-end"></i>
            </a>
            <div class="collapse ms-3" id="galleryMenu">
                <a class="nav-link" href="{{ route('gallery.categories.create') }}">Create Category</a>
                <a class="nav-link" href="{{ route('gallery.images.create') }}"><i class="fas fa-plus-circle me-2"></i> Add Images</a>
            </div>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-user me-2"></i> Profile</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </li>
    </ul>
</div>


    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
      <!-- Topbar -->
      <div class="topbar mb-4">
        <h4>Welcome, {{ auth()->user()->name }}!</h4>
        <div>
          <a href="#" class="btn btn-outline-primary btn-custom me-2"><i class="fas fa-user"></i> Profile</a>
          <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-custom">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
      </div>

      <!-- Blogs Table -->
      <div class="container py-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="fw-bold">Manage Blogs</h2>
          <a href="{{ route('blogs.create') }}" class="btn btn-custom" style="background: #152238; color: white;">
            <i class="fas fa-plus me-1"></i> Create Blog
          </a>
        </div>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
          <div class="card-body">
            <table class="table table-bordered table-hover table-custom align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Short Description</th>
                  <th>Meta Title</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($blogs as $index => $blog)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                      @if($blog->image)
                        <img src="{{ asset($blog->image) }}" class="img-thumb" alt="{{ $blog->title }}">
                      @endif
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td>{{ Str::limit($blog->short_description, 50) }}</td>
                    <td>{{ $blog->meta_title }}</td>
                    <td>{{ $blog->created_at->format('d M, Y') }}</td>
                    <td>
                      <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                      <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog?')">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center text-muted">No blogs found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
              {{ $blogs->links() }}
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
