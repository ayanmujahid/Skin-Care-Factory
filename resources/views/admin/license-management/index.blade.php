@extends('admin.layouts.main')
@section('content')
    @include('admin.layouts.sidebar')

    <!-- Start::app-content -->
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">
                License List

                @if (request('status') !== null)
                    @if (request('status') == 0)
                        <span class="badge bg-warning ms-2">Pending</span>
                    @elseif(request('status') == 1)
                        <span class="badge bg-success ms-2">Approved</span>
                    @elseif(request('status') == 2)
                        <span class="badge bg-danger ms-2">Rejected</span>
                    @endif
                @endif
            </h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">License Management</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Default Datatables</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            S.L
                                        </label>
                                    </div>
                                </th>
                                <th scope="col">License Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Professional Type</th>
                                <th scope="col">Submit Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($professionals as $professional)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>#{{ $professional->license_number }}</td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $professional->license_upload) }}"
                                                style="width:70px" class="me-2 radius-8">

                                            <span>{{ $professional->user->name }}</span>
                                        </div>
                                    </td>

                                    <td>{{ $professional->professional_type }}</td>

                                    <td>{{ $professional->created_at->format('d M Y') }}</td>

                                    <td>
                                        @php $status = $professional->user->verified_status; @endphp

                                        @if ($status == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif ($status == 1)
                                            <span class="badge bg-success">Approved</span>
                                        @elseif ($status == 2)
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.licenses.show', $professional->id) }}"
                                            class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                        </a>
                                        {{-- <a href="javascript:void(0)"
                                            class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                        </a> --}}
                                        <a href="javascript:void(0)"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </a>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center py-4">

                                        <h5>No {{ request('status') !== null ? 'Matching' : '' }} Licenses Found</h5>

                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{ $professionals->links('pagination::bootstrap-5') }}
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
