@extends('admin.layouts.main')
@section('content')
    @include('admin.layouts.sidebar')
    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">My Profile</h4>

                <a href="{{ route('admin.settings') }}" class="btn btn-light btn-sm">
                    Edit Profile
                </a>
            </div>

            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-md-3 text-center">
                        @if ($admin->profile_image)
                            <img src="{{ asset('storage/' . $admin->profile_image) }}" class="rounded-circle img-fluid"
                                width="150" height="150">
                        @else
                            <img src="https://via.placeholder.com/150" class="rounded-circle img-fluid">
                        @endif
                    </div> --}}

                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{ $admin->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $admin->email }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $admin->phone ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Role</th>
                                <td>{{ $admin->role ?? 'Admin' }}</td>
                            </tr>

                            <tr>
                                <th>Joined</th>
                                <td>{{ $admin->created_at->format('d M Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {


            /*in page css here*/
        })()
    </script>
    <script></script>
@endsection
