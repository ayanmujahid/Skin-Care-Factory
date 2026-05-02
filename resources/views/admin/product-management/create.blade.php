@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="main-content app-content">
        <div class="container-fluid">

            <h1 class="mb-3">Add Product</h1>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- LEFT --}}
                    <div class="col-md-3">

                        {{-- MAIN IMAGE --}}
                        <div class="card mb-3">
                            <div class="card-header">Main Image</div>
                            <div class="card-body">
                                <input type="file" name="main_image" id="mainImageInput" class="form-control"
                                    accept="image/*">
                                <div id="mainImagePreview" class="mt-3"></div>
                            </div>
                        </div>

                        {{-- GALLERY --}}
                        <div class="card">
                            <div class="card-header">Gallery Images</div>
                            <div class="card-body">
                                <input type="file" name="gallery[]" id="galleryInput" class="form-control" multiple
                                    accept="image/*">
                                <div id="galleryPreview" class="d-flex flex-wrap mt-3 gap-2"></div>
                            </div>
                        </div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="col-md-9">

                        <div class="card">
                            <div class="card-body">

                                {{-- BASIC INFO --}}
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label>Category</label>
                                        <select name="category_id" id="categorySelect" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Sub Category</label>
                                        <select name="sub_category_id" id="subCategorySelect" class="form-control" disabled>
                                            <option value="">-- Select Sub Category --</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Brand</label>
                                        <select name="brand_id" class="form-control" required>
                                            <option value="">-- Select Brand --</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="mb-3">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="long_description" id="description" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Benefits</label>
                                    <textarea name="benefits" id="benefits" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Ingredients</label>
                                    <textarea name="ingredients" id="ingredients" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>How to Use</label>
                                    <textarea name="how_to_use" id="how_to_use" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Pro Tip</label>
                                    <textarea name="pro_tip" id="pro_tip" class="form-control"></textarea>
                                </div>

                                {{-- VARIANTS --}}
                                <hr>
                                <h5>Product Variants</h5>

                                <div id="variants-wrapper">

                                    <div class="variant-box border p-3 mb-3">

                                        <div class="row">

                                            <div class="col-md-4 mb-2">
                                                <label>Price</label>
                                                <input type="number" name="variants[0][price]" class="form-control"
                                                    step="0.01" required>
                                            </div>

                                            <div class="col-md-4 mb-2">
                                                <label>Compare Price</label>
                                                <input type="number" name="variants[0][compare_price]" class="form-control"
                                                    step="0.01">
                                            </div>

                                            <div class="col-md-4 mb-2">
                                                <label>Stock</label>
                                                <input type="number" name="variants[0][stock]" class="form-control">
                                            </div>

                                        </div>

                                        <hr>

                                        <h6>Attributes</h6>

                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <input type="text" name="variants[0][attributes][0][name]"
                                                    class="form-control" placeholder="Attribute (Size, Pack, Color)">
                                            </div>

                                            <div class="col-md-5">
                                                <input type="text" name="variants[0][attributes][0][value]"
                                                    class="form-control" placeholder="Value (1 OZ, Pack of 4)">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <button type="button" class="btn btn-sm btn-primary" id="add-variant">
                                    + Add Variant
                                </button>

                                {{-- FEATURED --}}
                                <div class="mt-3">
                                    <label>Featured</label>
                                    <select name="is_featured" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-success">Save Product</button>
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
        /* MAIN IMAGE PREVIEW */
        document.getElementById('mainImageInput').addEventListener('change', function() {
            const preview = document.getElementById('mainImagePreview');
            preview.innerHTML = '';

            if (this.files[0]) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(this.files[0]);
                img.style.width = '100px';
                img.style.borderRadius = '6px';

                const box = document.createElement('div');
                box.classList.add('preview-box');

                const remove = document.createElement('span');
                remove.innerHTML = '&times;';
                remove.classList.add('remove-btn');
                remove.onclick = () => {
                    this.value = '';
                    preview.innerHTML = '';
                };

                box.appendChild(img);
                box.appendChild(remove);
                preview.appendChild(box);
            }
        });

        /* GALLERY PREVIEW */
        let galleryFiles = [];

        document.getElementById('galleryInput').addEventListener('change', function() {
            galleryFiles = Array.from(this.files);
            renderGallery();
        });

        function renderGallery() {
            const preview = document.getElementById('galleryPreview');
            preview.innerHTML = '';

            galleryFiles.forEach((file, index) => {
                const box = document.createElement('div');
                box.classList.add('preview-box');

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);

                const remove = document.createElement('span');
                remove.innerHTML = '&times;';
                remove.classList.add('remove-btn');
                remove.onclick = () => {
                    galleryFiles.splice(index, 1);
                    updateGalleryInput();
                    renderGallery();
                };

                box.appendChild(img);
                box.appendChild(remove);
                preview.appendChild(box);
            });
        }

        function updateGalleryInput() {
            const dataTransfer = new DataTransfer();
            galleryFiles.forEach(file => dataTransfer.items.add(file));
            document.getElementById('galleryInput').files = dataTransfer.files;
        }
    </script>

    <script>
        // CATEGORY → SUBCATEGORY
        document.getElementById('categorySelect').addEventListener('change', function() {
            const categoryId = this.value;
            const subCategorySelect = document.getElementById('subCategorySelect');
            const noSubText = document.getElementById('noSubCategoryText');

            subCategorySelect.innerHTML = '<option value="">-- Select Sub Category --</option>';
            subCategorySelect.disabled = true;
            noSubText.classList.add('d-none');

            if (!categoryId) return;

            fetch(`/admin/categories/${categoryId}/sub-categories`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        noSubText.classList.remove('d-none');
                        return;
                    }

                    data.forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.id;
                        option.textContent = sub.name;
                        subCategorySelect.appendChild(option);
                    });

                    subCategorySelect.disabled = false;
                });
        });
    </script>

    <script>
        // ATTRIBUTES
        let attrIndex = 1;

        document.getElementById('add-attribute').addEventListener('click', function() {
            const wrapper = document.getElementById('attributes-wrapper');

            const row = document.createElement('div');
            row.classList.add('row', 'mb-2', 'attribute-row');

            row.innerHTML = `
        <div class="col-md-5">
            <input type="text" name="attributes[${attrIndex}][name]" class="form-control" placeholder="Attribute">
        </div>
        <div class="col-md-5">
            <input type="text" name="attributes[${attrIndex}][value]" class="form-control" placeholder="Value">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger remove-attribute">X</button>
        </div>
    `;

            wrapper.appendChild(row);
            attrIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-attribute')) {
                e.target.closest('.attribute-row').remove();
            }
        });
    </script>
    <script>
        let variantIndex = 1;

        document.getElementById('add-variant').addEventListener('click', function() {

            let html = `
    <div class="variant-box border p-3 mb-3">

        <div class="row">

            <div class="col-md-4 mb-2">
                <label>Price</label>
                <input type="number" name="variants[${variantIndex}][price]" class="form-control" step="0.01" required>
            </div>

            <div class="col-md-4 mb-2">
                <label>Compare Price</label>
                <input type="number" name="variants[${variantIndex}][compare_price]" class="form-control" step="0.01">
            </div>

            <div class="col-md-4 mb-2">
                <label>Stock</label>
                <input type="number" name="variants[${variantIndex}][stock]" class="form-control">
            </div>

        </div>

        <hr>

        <h6>Attributes</h6>

        <div class="row mb-2">
            <div class="col-md-5">
                <input type="text" name="variants[${variantIndex}][attributes][0][name]" class="form-control" placeholder="Attribute">
            </div>

            <div class="col-md-5">
                <input type="text" name="variants[${variantIndex}][attributes][0][value]" class="form-control" placeholder="Value">
            </div>
        </div>

    </div>`;

            document.getElementById('variants-wrapper').insertAdjacentHTML('beforeend', html);

            variantIndex++;
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
