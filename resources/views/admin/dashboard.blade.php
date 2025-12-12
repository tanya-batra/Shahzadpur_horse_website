@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card card-custom p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5>Total Posts</h5>
                    <h2>34</h2>
                </div>
                <i class="fas fa-pencil-alt fa-2x text-primary"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5>New Comments</h5>
                    <h2>12</h2>
                </div>
                <i class="fas fa-comments fa-2x text-success"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5>Followers</h5>
                    <h2>1.2K</h2>
                </div>
                <i class="fas fa-users fa-2x text-warning"></i>
            </div>
        </div>
    </div>
</div>

<div class="mt-5">
    <h5>Recent Blogs</h5>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">How to create a creative dashboard</a>
        <a href="#" class="list-group-item list-group-item-action">Bootstrap 5 Tips & Tricks</a>
        <a href="#" class="list-group-item list-group-item-action">Modern UI Design Inspiration</a>
    </div>
</div>
@endsection
