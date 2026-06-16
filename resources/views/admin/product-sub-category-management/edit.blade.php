@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <h1 class="mb-3">Edit Product Subcategory</h1>

        <form action="{{ route('admin.product-subcategories.update', $subcategory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-md-3">

                    <div class="card mb-3">

                        <div class="card-header">
                            Subcategory Info
                        </div>

                        <div class="card-body">
                            <p class="text-muted mb-0">
                                Update and manage your product subcategory details easily.
                            </p>
                        </div>

                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-md-9">

                    <div class="card">

                        <div class="card-body">

                            {{-- Parent Category --}}
                            <div class="mb-3">

                                <label>Parent Category</label>

                                <select name="category_id" class="form-control" required>

                                    <option value="">
                                        Select Category
                                    </option>

                                    @foreach ($categories as $category)

                                        <option 
                                            value="{{ $category->id }}"
                                            {{ $subcategory->category_id == $category->id ? 'selected' : '' }}
                                        >
                                            {{ $category->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            {{-- Subcategory Name --}}
                            <div class="mb-3">

                                <label>Subcategory Name</label>

                                <input 
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ $subcategory->name }}"
                                    placeholder="Enter subcategory name"
                                    required
                                >

                            </div>

                            {{-- Featured --}}
                            <div class="mb-3">

                                <label>Featured</label>

                                <select class="form-control" name="featured">

                                    <option value="0" {{ $subcategory->featured == 0 ? 'selected' : '' }}>
                                        No
                                    </option>

                                    <option value="1" {{ $subcategory->featured == 1 ? 'selected' : '' }}>
                                        Yes
                                    </option>

                                </select>

                            </div>

                            {{-- Description --}}
                            <div class="mb-3">

                                <label>Description</label>

                                <textarea 
                                    name="description"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Enter subcategory description..."
                                >{{ $subcategory->description }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="text-end mt-3">

                <button type="submit" class="btn btn-primary">
                    Update Subcategory
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