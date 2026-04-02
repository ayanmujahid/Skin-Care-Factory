@extends('admin.layouts.main')
@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid page-container main-body-container">

        <!-- Start::page-header -->
        <div class="page-header-breadcrumb mb-3">
            <div class="d-flex align-center justify-content-between flex-wrap">
                <h1 class="page-title fw-medium fs-18 mb-0">Edit Product Category</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product-categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">

                    <div class="card-header">
                        <div class="card-title">
                            Update Category
                        </div>
                    </div>

                    <form action="{{ route('admin.product-categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            <div class="row gy-3">

                                <!-- Category Name -->
                                <div class="col-xl-6">
                                    <label class="form-label">Category Name :</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        class="form-control" 
                                        value="{{ $category->name }}"
                                        placeholder="Enter category name" 
                                        required>
                                </div>

                                <!-- Featured -->
                                <div class="col-xl-6">
                                    <label class="form-label">Featured :</label>
                                    <select name="featured" class="form-control">
                                        <option value="0" {{ $category->featured == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $category->featured == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>

                                <!-- Description -->
                                <div class="col-xl-12">
                                    <label class="form-label">Description (Optional):</label>
                                    <textarea 
                                        name="description" 
                                        class="form-control" 
                                        rows="4"
                                        placeholder="Enter description...">{{ $category->description }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary-light btn-wave ms-auto float-end">
                                Update Category
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- End::row-1 -->

    </div>
</div>

@endsection

@section('css')
<style>
    /* Page specific CSS */
</style>
@endsection

@section('js')
<script>
(() => {
    /* Page specific JS */
})();
</script>
@endsection
