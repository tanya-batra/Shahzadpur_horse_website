<div class="topbar mb-4">
    <h4>Welcome, {{ auth()->user()->name }}!</h4>
    <div>
        <a href="" class="btn btn-outline-primary btn-custom me-2">
            <i class="fas fa-user"></i> Profile
        </a>
        <a href="{{ route('admin.logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="btn btn-danger btn-custom">
           <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
