@extends('admin.layout.main')

@section('title', 'My Profile')

@section('content')
<style>
    body { background: #f4f6fa; font-family: 'Poppins', sans-serif; }
    .profile-wrapper { max-width: 730px; margin: auto; }
    .profile-card { background: #fff; border-radius: 20px; box-shadow: 0 6px 20px rgba(0,0,0,0.08); padding: 30px; }
    .profile-avatar { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid #eee; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .nav-tabs .nav-link { border: none; font-weight: 600; color: #444; border-radius: 30px; padding: 10px 20px; }
    .nav-tabs .nav-link.active { background-color: #152238; color: #fff; }
    .form-label { font-weight: 600; color: #444; }
    .btn-custom { border-radius: 30px; padding: 10px 25px; font-weight: 600; transition: all 0.3s ease; background-color: #152238; color: #fff; }
    .btn-custom:hover { opacity: 0.9; background-color:#b9972e; transform: translateY(-2px); }
</style>

<div class="container py-5 profile-wrapper">
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <div class="profile-card">
        <!-- Tabs -->
        <ul class="nav nav-tabs justify-content-center mb-4" id="profileTabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="info-tab" data-bs-toggle="tab" href="#info" role="tab">Profile Info</a></li>
            <li class="nav-item"><a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab">Change Email</a></li>
            <li class="nav-item"><a class="nav-link" id="password-tab" data-bs-toggle="tab" href="#password" role="tab">Change Password</a></li>
        </ul>

        <div class="tab-content" id="profileTabsContent">
            <!-- Profile Info -->
            <div class="tab-pane fade show active" id="info" role="tabpanel">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-12 text-center mb-3">
                    @if($user->logo && file_exists(public_path('admin_logos/' . $user->logo)))
    <img src="{{ asset('admin_logos/' . $user->logo) }}" class="profile-avatar mb-2" alt="Admin Logo">
@else
    <img src="https://via.placeholder.com/100" class="profile-avatar mb-2" alt="Placeholder">
@endif

                    </div>
                    <div class="col-12">
                        <label class="form-label">Profile Picture</label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-custom">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Change Email -->
            <div class="tab-pane fade" id="email" role="tabpanel">
                <form action="{{ route('profile.request.email') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-8">
                        <label class="form-label">New Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-3 text-center mt-5">
                        <button type="submit" class="btn btn-custom">Send OTP</button>
                    </div>
                </form>

                <form action="{{ route('profile.verify.email') }}" method="POST" class="row g-3 mt-4">
                    @csrf
                    <div class="col-8">
                        <label class="form-label">Enter OTP</label>
                        <input type="text" name="otp" class="form-control" required>
                    </div>
                    <div class="col-4 mt-5">
                        <button type="submit" class="btn btn-custom">Verify Email</button>
                    </div>
                </form>
            </div>

            <!-- Change Password -->
            <div class="tab-pane fade" id="password" role="tabpanel">
                <form action="{{ route('profile.password') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-custom">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
