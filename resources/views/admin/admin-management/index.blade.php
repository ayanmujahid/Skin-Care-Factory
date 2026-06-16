@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">

        <h6 class="fw-semibold mb-0">
            Admin List

            @if (request('status') !== null)

                @if (request('status') == 0)
                    <span class="badge bg-danger ms-2">Disabled</span>
                @elseif(request('status') == 1)
                    <span class="badge bg-success ms-2">Verified</span>
                @endif

            @endif
        </h6>

        <ul class="d-flex align-items-center gap-2">

            <li class="fw-medium">
                <a href="{{ route('admin.dashboard.index') }}"
                    class="d-flex align-items-center gap-1 hover-text-primary">

                    <iconify-icon icon="solar:home-smile-angle-outline"
                        class="icon text-lg">
                    </iconify-icon>

                    Dashboard
                </a>
            </li>

            <li>-</li>

            <li class="fw-medium">
                Admin Management
            </li>

        </ul>
        <a href="{{ route('admin.admins.create') }}"
            class="btn btn-primary">

            + Add Admin
        </a>

    </div>

    <div class="card basic-data-table">

        <div class="card-header">
            <h5 class="card-title mb-0">
                Admin Datatable
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table bordered-table mb-0"
                    id="dataTable"
                    data-page-length="10">

                    <thead>

                        <tr>

                            <th scope="col">
                                #
                            </th>

                            <th scope="col">
                                Name
                            </th>

                            <th scope="col">
                                Email
                            </th>

                            <th scope="col">
                                Status
                            </th>

                            <th scope="col">
                                Created Date
                            </th>

                            <th scope="col">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($admins as $admin)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $admin->name }}
                                </td>

                                <td>
                                    {{ $admin->email }}
                                </td>

                                <td>

                                    @if ($admin->is_verified == 1)

                                        <span class="badge bg-success">
                                            Verified
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Disabled
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $admin->created_at->format('d M Y') }}
                                </td>

                                <td>

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.admins.show', $admin->id) }}"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">

                                        <iconify-icon icon="lucide:edit">
                                        </iconify-icon>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-4">

                                    <h5>
                                        No Admins Found
                                    </h5>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="mt-3 px-3 pb-3">

            {{ $admins->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>
@endsection

@section('css')
<style>
/* page-specific CSS if needed */
</style>
@endsection

@section('js')
<script>
(() => {
    /* page-specific JS if needed */
})();
</script>
@endsection