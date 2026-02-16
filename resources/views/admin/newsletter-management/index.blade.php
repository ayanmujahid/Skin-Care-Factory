@extends('admin.layouts.main')
@section('content')
@include('admin.layouts.sidebar')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid page-container main-body-container">

        <!-- Start::page-header -->
        <div class="page-header-breadcrumb mb-3">
            <div class="d-flex align-center justify-content-between flex-wrap">
                <h1 class="page-title fw-medium fs-18 mb-0">Newsletters</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletters List</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body p-3 d-flex justify-content-between align-items-center">

                        <!-- Filter Box -->
                        <div class="d-flex flex-wrap gap-2">
                            <select class="form-control">
                                <option value="">Sort By</option>
                                <option value="Newest">Newest</option>
                                <option value="Date Added">Date Added</option>
                                <option value="A - Z">A - Z</option>
                            </select>
                        </div>

                        <!-- Search -->
                        <div class="d-flex gap-2" role="search">
                            <input class="form-control" type="search" placeholder="Search Newsletter" aria-label="Search">
                            <button class="btn btn-light" type="submit">Search</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->

        <!-- Start::row-2 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($newsletters as $newsletter)
                                        <tr>
                                            <td>{{ $newsletter->id }}</td>
                                            <td>{{ $newsletter->email }}</td>
                                            <td>{{ $newsletter->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light" data-bs-toggle="dropdown">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">

                                                        <!-- View -->
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.newsletters.show', $newsletter->id) }}">
                                                                <i class="ti ti-eye me-1"></i>View
                                                            </a>
                                                        </li>

                                                        <!-- Edit -->
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.newsletters.edit', $newsletter->id) }}">
                                                                <i class="ti ti-edit me-1"></i>Edit
                                                            </a>
                                                        </li>

                                                        <!-- Delete -->
                                                        <li>
                                                            <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="ti ti-trash me-1"></i>Delete
                                                                </button>
                                                            </form>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $newsletters->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
        <!-- End::row-2 -->

    </div>
</div>
<!-- End::app-content -->

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
