@extends('admin.layouts.main')
@section('content')
@include('admin.layouts.sidebar')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid page-container main-body-container">

        <!-- Start::page-header -->
        <div class="page-header-breadcrumb mb-3">
            <div class="d-flex align-center justify-content-between flex-wrap">
                <h1 class="page-title fw-medium fs-18 mb-0">Product Categories</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories List</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                            <!-- Filter Box -->
                            <div class="d-flex flex-wrap gap-1 project-list-main">
                                <select class="form-control">
                                    <option value="">Sort By</option>
                                    <option value="Newest">Newest</option>
                                    <option value="A - Z">A - Z</option>
                                </select>
                            </div>

                            <!-- Search -->
                            <div class="d-flex custom-project-list" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search Category" aria-label="Search">
                                <button class="btn btn-light" type="submit">Search</button>
                            </div>

                            <!-- Add New -->
                            <a href="{{ route('admin.product-categories.create') }}" class="btn btn-primary">
                                <i class="ri-add-line me-1"></i> Add Category
                            </a>

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
                                        <th>Name</th>
                                        <th>Featured</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if($category->featured)
                                            <span class="badge bg-success">Yes</span>
                                            @else
                                            <span class="badge bg-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $category->created_at->format('d M, Y') }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"
                                                    data-bs-toggle="dropdown">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu">

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.product-categories.edit', $category->id) }}">
                                                            <i class="ti ti-edit me-1"></i>Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('admin.product-categories.destroy', $category->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="ti ti-trash me-1"></i> Delete
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
                    {{ $categories->links('pagination::bootstrap-5') }}
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