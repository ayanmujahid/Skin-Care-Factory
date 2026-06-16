@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <h1 class="mb-3">Edit Admin</h1>

        <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-md-3">

                    <div class="card mb-3">

                        <div class="card-header">
                            Admin Info
                        </div>

                        <div class="card-body">

                            <p class="text-muted mb-0">
                                Manage admin verification status.
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
                                    class="form-control"
                                    value="{{ $admin->name }}"
                                    readonly
                                >

                            </div>

                            {{-- Email --}}
                            <div class="mb-3">

                                <label>Email</label>

                                <input 
                                    type="email"
                                    class="form-control"
                                    value="{{ $admin->email }}"
                                    readonly
                                >

                            </div>

                            {{-- Verification Status --}}
                            <div class="mb-3">

                                <label>Verification Status</label>

                                <select class="form-control" name="is_verified">

                                    <option value="0" {{ $admin->is_verified == 0 ? 'selected' : '' }}>
                                        Disabled
                                    </option>

                                    <option value="1" {{ $admin->is_verified == 1 ? 'selected' : '' }}>
                                        Verified
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="text-end mt-3">

                <button type="submit" class="btn btn-primary">
                    Update Admin
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