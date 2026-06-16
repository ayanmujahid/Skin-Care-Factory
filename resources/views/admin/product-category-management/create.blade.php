@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <h1 class="mb-3">Create Product Category</h1>

        <form action="{{ route('admin.product-categories.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            Category Info
                        </div>

                        <div class="card-body">
                            <p class="text-muted mb-0">
                                Create and manage your product categories easily.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">

                            {{-- Category Name --}}
                            <div class="mb-3">
                                <label>Category Name</label>
                                <input type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Enter category name"
                                    required>
                            </div>

                            {{-- Featured --}}
                            <div class="mb-3">
                                <label>Featured</label>
                                <select class="form-control" name="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Enter category description..."></textarea>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    Create Category
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