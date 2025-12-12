<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7fd; font-family: 'Inter', sans-serif; }
        .sidebar { min-height: 100vh; background: #152238; color: white; transition: 0.3s; }
        .sidebar .nav-link { color: white; margin: 5px 0; border-radius: 10px; transition: 0.2s; }
        .sidebar .nav-link:hover { background-color: rgba(255, 255, 255, 0.1); }
        .sidebar .nav-link.active { background-color: rgba(255, 255, 255, 0.2); }
        .topbar { background-color: white; padding: 10px 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); display: flex; justify-content: space-between; align-items: center; border-radius: 0 0 15px 15px; }
        .card-custom { border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); transition: 0.3s; }
        .card-custom:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); }
        .btn-custom { border-radius: 50px; padding: 5px 20px; }
    </style>
    @stack('styles')
</head>

<body>
    <div class="d-flex">
        @include('admin.layout.sidebar') 
        <div class="flex-grow-1 p-4">
            @include('admin.layout.topbar')
            
         
            @yield('content')

            @include('admin.layout.footer') 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
