@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        {{-- HEADER --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">
                Inquiries List
            </h6>

            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Inquiries</li>
            </ul>
        </div>

        {{-- TABLE --}}
        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h5 class="card-title mb-0">All Inquiries</h5>

                {{-- Search --}}
                <form method="GET" class="d-flex gap-2">
                    <input type="search" name="search" class="form-control" placeholder="Search Inquiry"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>

            <div class="card-body table-responsive">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($inquiries as $inquiry)
                            <tr>
                                <td>{{ $inquiry->id }}</td>
                                <td>{{ $inquiry->name }}</td>
                                <td>{{ $inquiry->email }}</td>
                                <td>{{ $inquiry->phone }}</td>
                                <td>{{ $inquiry->subject }}</td>
                                <td>{{ Str::limit($inquiry->message, 50) }}</td>
                                <td>{{ $inquiry->created_at->format('d M, Y') }}</td>

                                <td class="d-flex gap-2">

                                    {{-- View --}}
                                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}"
                                        class="w-32-px h-32-px bg-primary-focus text-primary-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}"
                                        class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this inquiry?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="py-4">
                                        <iconify-icon icon="mdi:message-text-remove-outline" width="50"
                                            class="text-muted mb-2"></iconify-icon>

                                        <h5 class="mb-1">No Inquiries Found</h5>

                                        <p class="text-muted mb-0">
                                            There are currently no inquiries available.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $inquiries->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection

@section('css')
    <style>
        /* Page-specific CSS if needed */
    </style>
@endsection

@section('js')
    <script>
        (() => {
            /* Page-specific JS if needed */
        })();
    </script>
@endsection
