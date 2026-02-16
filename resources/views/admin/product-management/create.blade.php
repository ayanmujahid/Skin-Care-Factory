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
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Sub Category</label>
                                        <select name="sub_category_id" id="subCategorySelect" class="form-control" disabled>
                                            <option value="">-- Select Sub Category --</option>
                                        </select>
                                        <small id="noSubCategoryText" class="text-muted d-none">
                                            No sub-category exists
                                        </small>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control" maxlength="500"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Long Description</label>
                                    <textarea name="long_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Price</label>
                                        <input type="number" name="price" class="form-control" step="0.01" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Stock</label>
                                        <input type="number" name="stock" class="form-control" step="0.01">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Discounted Price</label>
                                        <input type="number" name="discounted_price" class="form-control" step="0.01">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        Add Product
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
document.getElementById('categorySelect').addEventListener('change', function () {
    const categoryId = this.value;
    const subCategorySelect = document.getElementById('subCategorySelect');
    const noSubText = document.getElementById('noSubCategoryText');

    // Reset
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
        })
        .catch(() => {
            noSubText.classList.remove('d-none');
        });
});
</script>

@endsection
