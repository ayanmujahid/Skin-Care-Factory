@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="main-content app-content">
        <div class="container-fluid">

            <h1 class="mb-3">Edit Product</h1>

            <form action="{{ route('admin.products.update', $product->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- LEFT --}}
                    <div class="col-md-3">

                        {{-- MAIN IMAGE --}}
                        <div class="card mb-3">
                            <div class="card-header">Main Image</div>
                            <div class="card-body">
                                <input type="file"
                                       name="main_image"
                                       id="mainImageInput"
                                       class="form-control"
                                       accept="image/*">

                                <div id="mainImagePreview" class="mt-3">
                                    @if($product->mainImage)
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
                                <input type="file"
                                       name="gallery[]"
                                       id="galleryInput"
                                       class="form-control"
                                       multiple
                                       accept="image/*">

                                <div id="galleryPreview"
                                     class="d-flex flex-wrap mt-3 gap-2">
                                    @foreach($product->gallery ?? [] as $image)
                                        <div class="preview-box">
                                            <img src="{{ asset('storage/' . $image->url) }}">
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

                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name', $product->name) }}"
                                           required>
                                </div>

                                {{-- CATEGORY / SUB CATEGORY --}}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Category</label>
                                        <select name="category_id"
                                                id="categorySelect"
                                                class="form-control"
                                                required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Sub Category</label>
                                        <select name="sub_category_id"
                                                id="subCategorySelect"
                                                class="form-control"
                                                {{ $product->sub_category_id ? '' : 'disabled' }}>
                                            <option value="">-- Select Sub Category --</option>
                                        </select>
                                        <small id="noSubCategoryText"
                                               class="text-muted d-none">
                                            No sub-category exists
                                        </small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Short Description</label>
                                    <textarea name="short_description"
                                              class="form-control"
                                              maxlength="500">{{ old('short_description', $product->short_description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Long Description</label>
                                    <textarea name="long_description"
                                              class="form-control"
                                              rows="4">{{ old('long_description', $product->long_description) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Price</label>
                                        <input type="number"
                                               name="price"
                                               class="form-control"
                                               step="0.01"
                                               value="{{ old('price', $product->price) }}"
                                               required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Stock</label>
                                        <input type="number"
                                               name="stock"
                                               class="form-control"
                                               step="0.01"
                                               value="{{ old('stock', $product->stock) }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Discounted Price</label>
                                        <input type="number"
                                               name="discounted_price"
                                               class="form-control"
                                               step="0.01"
                                               value="{{ old('discounted_price', $product->discounted_price) }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        Update Product
                    </button>
                </div>

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
document.addEventListener('DOMContentLoaded', function () {
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
@endsection
