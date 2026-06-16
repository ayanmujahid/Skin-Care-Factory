@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <h1 class="mb-3">Create Admin</h1>

        <form action="{{ route('admin.admins.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-md-3">

                    <div class="card mb-3">

                        <div class="card-header">
                            Admin Info
                        </div>

                        <div class="card-body">

                            <p class="text-muted mb-0">
                                Create and manage admin accounts.
                            </p>

                        </div>

                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-md-9">

                    <div class="card">

                        <div class="card-body">

                            {{-- Admin Name --}}
                            <div class="mb-3">

                                <label>Admin Name</label>

                                <input 
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    placeholder="Enter admin name"
                                    required
                                >

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            {{-- Email --}}
                            <div class="mb-3">

                                <label>Email</label>

                                <input 
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="Enter admin email"
                                    required
                                >

                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            {{-- Password --}}
                            <div class="mb-3">

                                <label>Password</label>

                                <input 
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Enter password"
                                    required
                                >

                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                                <small class="text-muted">
                                    Password must contain uppercase, lowercase,
                                    number and special character.
                                </small>

                            </div>

                            {{-- Verification Status --}}
                            <div class="mb-3">

                                <label>Verification Status</label>

                                <select class="form-control" name="is_verified">

                                    <option value="1" {{ old('is_verified') == 1 ? 'selected' : '' }}>
                                        Verified
                                    </option>

                                    <option value="0" {{ old('is_verified') == 0 ? 'selected' : '' }}>
                                        Disabled
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="text-end mt-3">

                <button type="submit" class="btn btn-primary">
                    Create Admin
                </button>

            </div>

        </form>

    </div>
</div>

@endsection

@section('css')
<style>
/* Optional page specific styling */
</style>
@endsection

@section('js')
<script>
(() => {
    /* Optional page specific JS */
})();
</script>
@endsection