@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>COLLECTION</h2>
        <p>Home / Shampoo</p>
    </section>

    <section class="shop-products py-5">
        <div class="container-fluid">
            <div class="row">

                <!-- SIDEBAR -->
                <div class="col-lg-3 shop-sidebar">

                    <div class="filter-item">Category <span>+</span></div>
                    <div class="filter-item">Availability <span>+</span></div>
                    <div class="filter-item">Price <span>+</span></div>
                    <div class="filter-item">Product type <span>+</span></div>
                    <div class="filter-item">Brand <span>+</span></div>

                    <button class="btn-clear">Clear All</button>

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
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            Displayed As
                            <button class="btn btn-dark btn-sm">▦</button>
                            <button class="btn btn-light btn-sm">☰</button>
                        </div>
                        <div>
                            Sort by
                            <select class="form-select d-inline-block w-auto">
                                <option>Featured</option>
                            </select>
                        </div>
                    </div>

                    <!-- GRID -->
                    <div class="row g-4">

                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-1.webp">
                                </div>
                                <small>Harp</small>
                                <a href="product-details.php">
                                    <h6>Face Moisturizer With Vitamin E</h6>
                                </a>
                                <strong>$380.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-2.webp">
                                </div>
                                <small>Harp</small>
                                <a href="product-details.php">
                                    <h6>Nature's Organic Raw Cosmetic Product</h6>
                                </a>
                                <strong>$156.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-3.webp">
                                </div>
                                <small>Splash</small>
                                <a href="product-details.php">
                                    <h6>Moisture Filling Shampoo</h6>
                                </a>
                                <strong>$175.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-1.webp">
                                </div>
                                <small>Harp</small>
                                <a href="product-details.php">
                                    <h6>Face Moisturizer With Vitamin E</h6>
                                </a>
                                <strong>$380.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-2.webp">
                                </div>
                                <small>Harp</small>
                                <a href="product-details.php">
                                    <h6>Nature's Organic Raw Cosmetic Product</h6>
                                </a>
                                <strong>$156.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-3.webp">
                                </div>
                                <small>Splash</small>
                                <a href="product-details.php">
                                    <h6>Moisture Filling Shampoo</h6>
                                </a>
                                <strong>$175.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-1.webp">
                                </div>
                                <small>Harp</small>
                                <a href="product-details.php">
                                    <h6>Face Moisturizer With Vitamin E</h6>
                                </a>
                                <strong>$380.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-2.webp">
                                </div>
                                <small>Harp</small>
                                <a href="product-details.php">
                                    <h6>Nature's Organic Raw Cosmetic Product</h6>
                                </a>
                                <strong>$156.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="assets/images/na-mp-3.webp">
                                </div>
                                <small>Splash</small>
                                <a href="product-details.php">
                                    <h6>Moisture Filling Shampoo</h6>
                                </a>
                                <strong>$175.00</strong>
                                <button class="shop-btn">Add to Cart</button>
                            </div>
                        </div>

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
