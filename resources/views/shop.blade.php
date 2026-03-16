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

                    <div class="filter-item">Category <span>+</span></div>
                    <div class="filter-item">Availability <span>+</span></div>
                    <div class="filter-item">Price <span>+</span></div>
                    <div class="filter-item">Product type <span>+</span></div>
                    <div class="filter-item">Brand <span>+</span></div>

                    <button class="btn-clear" id="cta-btn">Clear All</button>

                    <h5 class="mt-4">Best Sellers</h5>

                    <div class="best-slider">
                        <img src="assets/images/na-mp-4.webp">
                        <img src="assets/images/na-mp-5.webp">
                        <img src="assets/images/na-mp-2.webp">
                    </div>

                </div>


                <!-- PRODUCTS -->
                <div class="col-lg-9 pe-5">

                    <!-- TOP BAR -->
                    <form method="GET">

                        <div class="d-flex justify-content-between mb-4">

                            <div>
                                Displayed As
                                <button class="btn btn-dark btn-sm">▦</button>
                                <button class="btn btn-light btn-sm">☰</button>
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
                    <div class="row g-4">

                        @forelse($products as $product)
                            <div class="col-md-4">
                                <div class="product-box">

                                    <div class="product-img">
                                        <img src="{{ asset('storage/' . $product->mainImage->url) }}">
                                    </div>

                                    <small>{{ $product->category->name ?? '' }}</small>

                                    {{-- <a href="{{ route('productDetails', $product->slug) }}"> --}}
                                        <h6>{{ $product->name }}</h6>
                                    {{-- </a> --}}

                                    <strong>${{ $product->firstVariant->price }}</strong>

                                    <button id="cta-btn" class="shop-btn quick-view-btn" data-product-id="{{ $product->id }}">
                                        Add to Cart
                                    </button>

                                </div>
                            </div>

                        @empty

                            <div class="col-12 text-center">
                                <h4>No Products Found</h4>
                            </div>
                        @endforelse

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
@endsection
