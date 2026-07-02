@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>{{ $categoryName }}</h2>
        <p>
            <a href="{{ route('index') }}" style="color: #000; text-decoration: none;">Home</a> /
            {{ $categoryName }}
        </p>
    </section>

    <section class="shop-products py-5">
        <div class="container">
            <div class="row">

                <!-- SIDEBAR -->
                <div class="col-lg-3 shop-sidebar">

                    <!-- CATEGORY -->
                    <div class="filter-box mb-3">

                        <div class="filter-item toggle-filter">
                            Category
                            <span class="toggle-icon">+</span>
                        </div>

                        <div class="filter-content">

                            @foreach ($categories as $category)
                                <div class="form-check mb-2">

                                    <input class="form-check-input filter-checkbox" type="checkbox"
                                        value="{{ $category->id }}" data-type="category" id="category{{ $category->id }}">

                                    <label class="form-check-label" for="category{{ $category->id }}">

                                        {{ $category->name }}

                                    </label>

                                </div>
                            @endforeach

                        </div>

                    </div>

                    <!-- BRAND -->
                    <div class="filter-box mb-3">

                        <div class="filter-item toggle-filter">
                            Brand
                            <span class="toggle-icon">+</span>
                        </div>

                        <div class="filter-content">

                            @foreach ($brands as $brand)
                                <div class="form-check mb-2">

                                    <input class="form-check-input filter-checkbox" type="checkbox"
                                        value="{{ $brand->id }}" data-type="brand" id="brand{{ $brand->id }}">

                                    <label class="form-check-label" for="brand{{ $brand->id }}">

                                        {{ $brand->name }}

                                    </label>

                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>


                <!-- PRODUCTS -->
                <div class="col-lg-9 pe-5">

                    <!-- TOP BAR -->
                    <form method="GET">

                        <div class="d-flex justify-content-between mb-4">

                            <div>
                                Displayed As

                                <button type="button" class="btn btn-light btn-sm display-btn" id="gridView">
                                    <i class="fa-solid fa-grip"></i>
                                </button>

                                <button type="button" class="btn btn-light btn-sm display-btn" id="listView">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </div>

                            <div>
                                Sort by
                                <select name="sort" onchange="this.form.submit()"
                                    class="form-select d-inline-block w-auto">

                                    <option value="featured">Featured</option>

                                    <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>
                                        Price Low → High
                                    </option>

                                    <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>
                                        Price High → Low
                                    </option>

                                    <option value="alphabetical-asc"
                                        {{ request('sort') == 'alphabetical-asc' ? 'selected' : '' }}>
                                        A → Z
                                    </option>

                                    <option value="alphabetical-desc"
                                        {{ request('sort') == 'alphabetical-desc' ? 'selected' : '' }}>
                                        Z → A
                                    </option>

                                </select>
                            </div>

                        </div>

                    </form>

                    <!-- GRID -->
                    <div class="row g-4" id="productsWrapper">

                        @include('partials.shop-products', ['products' => $products])

                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-4">

                        {{ $products->links('pagination::bootstrap-5') }}

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
    <script>
        function applySort(sortOption) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('sort', sortOption);
            window.location.href = currentUrl.toString();
        }
    </script>
    <script>
        window.CART_MODE = "professional";
    </script>
@endsection
