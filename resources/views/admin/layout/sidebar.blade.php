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
            <a class="nav-link" data-bs-toggle="collapse" href="#listingMenu" role="button" aria-expanded="false">
                <i class="fas fa-pencil-alt me-2"></i> Manage Listing
                <i class="fas fa-caret-down float-end"></i>
            </a>
            <div class="collapse ms-3" id="listingMenu">
                <!-- Category Links -->
                <a class="nav-link" href="{{ route('categories.create') }}">Create Category</a>
                <a class="nav-link" href="{{ route('categories.index') }}">View Category</a>

                <!-- Subcategory Links -->
                <a class="nav-link" href="{{ route('subcategories.create') }}">Create Sub Category</a>
                <a class="nav-link" href="{{ route('subcategory.index') }}">View Sub Category</a>

                <!--- Add Detail--->
                   <a class="nav-link" href="{{ route('horses.create') }}">Add Detail</a>
                <a class="nav-link" href="{{ route('horses.index') }}">View Detail</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#galleryMenu" role="button" aria-expanded="false">
                <i class="fas fa-images me-2"></i> Gallery
                <i class="fas fa-caret-down float-end"></i>
            </a>
            <div class="collapse ms-3" id="galleryMenu">
                <a class="nav-link" href="{{ route('gallery.categories.create') }}">Create Category</a>
                <a class="nav-link" href="{{ route('gallery.images.create') }}"><i class="fas fa-plus-circle me-2"></i>
                    Add Images</a>
            </div>
        </li>

        <li class="nav-item">
            <a href="{{ route('profile.edit') }}" class="nav-link"><i class="fas fa-user me-2"></i> Profile</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>

            <form id="sidebar-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</div>
