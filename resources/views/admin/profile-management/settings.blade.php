@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-white text-white">
                <h4 class="mb-0">Profile Settings</h4>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.settings.update') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $admin->name) }}"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $admin->email) }}"
                        >
                    </div>

                    <hr>

                    <h5>Change Password (Optional)</h5>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                        >
                    </div>

                    <button class="btn btn-primary">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
    /* .container {
        margin-left: 260px; /* adjust according to sidebar width */
    } */
</style>
@endsection