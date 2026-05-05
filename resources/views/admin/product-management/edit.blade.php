@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="main-content app-content">
        <div class="container-fluid">

            <h1 class="mb-3">Edit Product</h1>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- LEFT --}}
                    <div class="col-md-3">

                        {{-- MAIN IMAGE --}}
                        <div class="card mb-3">
                            <div class="card-header">Main Image</div>
                            <div class="card-body">
                                <input type="file" name="main_image" id="mainImageInput" class="form-control">

                                <div id="mainImagePreview" class="mt-3">
                                    @if ($product->mainImage)
                                        <div class="preview-box">
                                            <img src="{{ asset('storage/' . $product->mainImage->url) }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- GALLERY --}}
                        <div class="card">
                            <div class="card-header">Gallery Images</div>
                            <div class="card-body">
                                <input type="file" name="gallery[]" id="galleryInput" class="form-control" multiple>

                                <div id="galleryPreview" class="d-flex flex-wrap mt-3 gap-2">
                                    @foreach ($product->gallery as $img)
                                        <div class="preview-box">
                                            <img src="{{ asset('storage/' . $img->url) }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">

                                {{-- NAME --}}
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $product->name) }}" required>
                                </div>

                                <div class="row">

                                    {{-- CATEGORY --}}
                                    <div class="col-md-4 mb-3">
                                        <label>Category</label>
                                        <select name="category_id" id="categorySelect" class="form-control">
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- SUB CATEGORY --}}
                                    <div class="col-md-4 mb-3">
                                        <label>Sub Category</label>
                                        <select name="sub_category_id" id="subCategorySelect" class="form-control">
                                        </select>
                                    </div>

                                    {{-- BRAND --}}
                                    <div class="col-md-4 mb-3">
                                        <label>Brand</label>
                                        <select name="brand_id" class="form-control">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                {{-- TEXT FIELDS --}}
                                <textarea name="short_description" class="form-control mb-2">{{ $product->short_description }}</textarea>
                                <textarea name="long_description" id="description" class="form-control mb-2">{{ $product->long_description }}</textarea>
                                <textarea name="benefits" id="benefits" class="form-control mb-2">{{ $product->benefits }}</textarea>
                                <textarea name="ingredients" id="ingredients" class="form-control mb-2">{{ $product->ingredients }}</textarea>
                                <textarea name="how_to_use" id="how_to_use" class="form-control mb-2">{{ $product->how_to_use }}</textarea>
                                <textarea name="pro_tip" id="pro_tip" class="form-control mb-2">{{ $product->pro_tip }}</textarea>

                                <hr>

                                <h5>Variants</h5>

                                <div id="variants-wrapper">

                                    @foreach ($product->variants as $i => $variant)
                                        <div class="variant-box border p-3 mb-3">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="number" name="variants[{{ $i }}][price]"
                                                        value="{{ $variant->price }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number"
                                                        name="variants[{{ $i }}][compare_price]"
                                                        value="{{ $variant->compare_price }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="variants[{{ $i }}][stock]"
                                                        value="{{ $variant->stock }}" class="form-control">
                                                </div>
                                            </div>

                                            <hr>

                                            {{-- ATTRIBUTES --}}
                                            @foreach ($variant->attributes as $j => $attr)
                                                <div class="row mb-2">
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                            name="variants[{{ $i }}][attributes][{{ $j }}][name]"
                                                            value="{{ $attr->name }}" class="form-control">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                            name="variants[{{ $i }}][attributes][{{ $j }}][value]"
                                                            value="{{ $attr->value }}" class="form-control">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    @endforeach

                                </div>

                                <button type="button" id="add-variant" class="btn btn-primary btn-sm">+ Add
                                    Variant</button>

                                {{-- FEATURED --}}
                                <div class="mt-3">
                                    <select name="is_featured" class="form-control">
                                        <option value="0" {{ $product->is_featured ? '' : 'selected' }}>No</option>
                                        <option value="1" {{ $product->is_featured ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-success mt-3">Update Product</button>

            </form>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .preview-box {
            position: relative;
            width: 90px;
            height: 90px;
        }

        .preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .remove-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: #fff;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            text-align: center;
            line-height: 22px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryId = document.getElementById('categorySelect').value;
            const selectedSubCategory = "{{ $product->sub_category_id }}";

            if (!categoryId) return;

            fetch(`/admin/categories/${categoryId}/sub-categories`)
                .then(res => res.json())
                .then(data => {
                    const subSelect = document.getElementById('subCategorySelect');
                    const noSubText = document.getElementById('noSubCategoryText');

                    subSelect.innerHTML = '<option value="">-- Select Sub Category --</option>';

                    if (data.length === 0) {
                        noSubText.classList.remove('d-none');
                        subSelect.disabled = true;
                        return;
                    }

                    data.forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.id;
                        option.textContent = sub.name;

                        if (sub.id == selectedSubCategory) {
                            option.selected = true;
                        }

                        subSelect.appendChild(option);
                    });

                    subSelect.disabled = false;
                });
        });
    </script>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('benefits');
        CKEDITOR.replace('ingredients');
        CKEDITOR.replace('how_to_use');
        CKEDITOR.replace('pro_tip');
    </script>
@endsection
