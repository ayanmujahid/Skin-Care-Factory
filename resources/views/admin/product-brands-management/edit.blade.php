@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <h1 class="mb-3">Edit Brand</h1>

        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- LEFT SIDE (IMAGE) --}}
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            Brand Logo
                        </div>

                        <div class="card-body">

                            <input 
                                type="file" 
                                name="brand_logo" 
                                id="brandLogoInput" 
                                class="form-control" 
                                accept="image/*"
                            >

                            <div id="brandLogoPreview" class="mt-3">

                                @if($brand->brand_logo)
                                    <div class="preview-box">
                                        <img 
                                            src="{{ asset($brand->brand_logo) }}" 
                                            alt="Brand Logo"
                                        >

                                        <span class="remove-btn" id="removeExistingLogo">
                                            &times;
                                        </span>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">

                            {{-- Brand Name --}}
                            <div class="mb-3">
                                <label>Brand Name</label>

                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control"
                                    value="{{ $brand->name }}"
                                    required
                                >
                            </div>

                            {{-- Featured --}}
                            <div class="mb-3">
                                <label>Featured</label>

                                <select class="form-control" name="is_featured">
                                    <option value="0" {{ $brand->is_featured == 0 ? 'selected' : '' }}>
                                        No
                                    </option>

                                    <option value="1" {{ $brand->is_featured == 1 ? 'selected' : '' }}>
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
                                >{{ $brand->description }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    Update Brand
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
    width: 100px;
    height: 100px;
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
}
</style>
@endsection

@section('js')
<script>
const brandLogoInput = document.getElementById('brandLogoInput');
const brandLogoPreview = document.getElementById('brandLogoPreview');

brandLogoInput.addEventListener('change', function () {

    brandLogoPreview.innerHTML = '';

    if (this.files[0]) {

        const img = document.createElement('img');
        img.src = URL.createObjectURL(this.files[0]);

        const box = document.createElement('div');
        box.classList.add('preview-box');

        const remove = document.createElement('span');
        remove.innerHTML = '&times;';
        remove.classList.add('remove-btn');

        remove.onclick = () => {
            brandLogoInput.value = '';
            brandLogoPreview.innerHTML = '';
        };

        box.appendChild(img);
        box.appendChild(remove);

        brandLogoPreview.appendChild(box);
    }
});

const removeExistingLogo = document.getElementById('removeExistingLogo');

if (removeExistingLogo) {
    removeExistingLogo.addEventListener('click', function () {
        brandLogoPreview.innerHTML = '';
    });
}
</script>
@endsection