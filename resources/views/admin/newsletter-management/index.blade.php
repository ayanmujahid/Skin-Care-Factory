@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        {{-- HEADER --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">
                Newsletters List
            </h6>

            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Newsletters</li>
            </ul>
        </div>

        {{-- TABLE --}}
        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Newsletters</h5>

                {{-- Search --}}
                <form method="GET" class="d-flex gap-2">
                    <input 
                        type="search" 
                        name="search" 
                        class="form-control"
                        placeholder="Search Newsletter"
                        value="{{ request('search') }}"
                    >
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>

            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($newsletters as $newsletter)
                            <tr>
                                <td>{{ $newsletter->id }}</td>

                                <td>{{ $newsletter->email }}</td>

                                <td>{{ $newsletter->created_at->format('d M, Y') }}</td>

                                <td class="d-flex gap-2">

                                    {{-- View --}}
                                    {{-- <a href="{{ route('admin.newsletters.show', $newsletter->id) }}"
                                        class="w-32-px h-32-px bg-primary-focus text-primary-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                    </a> --}}

                                    {{-- Edit --}}
                                    {{-- <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}"
                                        class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a> --}}

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this newsletter?')">
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
                                <td colspan="4" class="text-center py-5">
                                    <div class="py-4">
                                        <iconify-icon icon="mdi:email-remove-outline" width="50"
                                            class="text-muted mb-2"></iconify-icon>

                                        <h5 class="mb-1">No Newsletters Found</h5>

                                        <p class="text-muted mb-0">
                                            There are currently no newsletter subscriptions.
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
            {{ $newsletters->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection

@section('css')
<style>
    /* Page-specific CSS */
</style>
@endsection

@section('js')
<script>
(() => {
    /* Page-specific JS */
})();
</script>
@endsection
