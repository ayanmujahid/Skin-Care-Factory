@extends('admin.layouts.main')
@section('content')
@include('admin.layouts.sidebar')

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid page-container main-body-container">

        <!-- Start::page-header -->
        <div class="page-header-breadcrumb mb-3">
            <div class="d-flex align-center justify-content-between flex-wrap">
                <h1 class="page-title fw-medium fs-18 mb-0">Create Product Subcategory</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product-subcategories.index') }}">Subcategories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Subcategory</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">

                    <div class="card-header">
                        <div class="card-title">
                            Add New Subcategory
                        </div>
                    </div>

                    <form action="{{ route('admin.product-subcategories.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="row gy-3">

                                <!-- Parent Category -->
                                <div class="col-xl-6">
                                    <label class="form-label">Parent Category :</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Subcategory Name -->
                                <div class="col-xl-6">
                                    <label class="form-label">Subcategory Name :</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        class="form-control" 
                                        placeholder="Enter subcategory name" 
                                        required>
                                </div>

                                <!-- Featured -->
                                <div class="col-xl-6">
                                    <label class="form-label">Featured :</label>
                                    <select name="featured" class="form-control">
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                <!-- Description -->
                                <div class="col-xl-12">
                                    <label class="form-label">Description (Optional):</label>
                                    <textarea 
                                        name="description" 
                                        class="form-control" 
                                        rows="4" 
                                        placeholder="Enter description..."></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary-light btn-wave ms-auto float-end">
                                Create Subcategory
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- End::row -->

    </div>
</div>
<!-- End::app-content -->

@endsection

@section('css')
<style>
    /* page specific css */
</style>
@endsection

@section('js')
<script>
(() => {
    /* page specific js */
})();
</script>
@endsection
