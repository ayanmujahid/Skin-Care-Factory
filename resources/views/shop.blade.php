@extends('layouts.main')
@section('content')
<!-- ================= Shop Banner ================= -->
<section class="shop-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat;">
    <div class="container">
        <h1>Shop Fresh & Organic Products</h1>
        <p>Discover thousands of fresh grocery items delivered to your doorstep.</p>
    </div>
</section>

<!-- ================= Filter Bar ================= -->
<section class="shop-filters">
    <div class="container" style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center;">
        <div class="filter-left" style="flex:1;">
            <h2>All Products</h2>
        </div>
        <div class="filter-right" style="display:flex; gap:15px; align-items:center;">
            <select class="form-select" style="padding:10px 15px; border:1px solid #ddd; border-radius:8px;">
                <option>Default Sorting</option>
                <option>Sort by Price: Low to High</option>
                <option>Sort by Price: High to Low</option>
                <option>Sort by Newest</option>
            </select>
        </div>
    </div>
</section>

<!-- ================= Products Grid ================= -->
<section class="shop-products">
    <div class="container">
        <div class="row">

            <!-- Product Card -->
            <?php 
            // Example static products
            $products = [
    ['img' => asset('assets/images/mint.jpg'), 'title' => 'Fresh Red Apples', 'desc' => 'Crisp and sweet apples for your daily nutrition.', 'price' => '$12.00'],
    ['img' => asset('assets/images/basil.jpg'), 'title' => 'Organic Orange Juice', 'desc' => 'Freshly squeezed orange juice with no preservatives.', 'price' => '$8.00'],
    ['img' => asset('assets/images/redish.jpg'), 'title' => 'Atlantic Salmon Fillet', 'desc' => 'Rich in omega-3, perfect for grilling and baking.', 'price' => '$20.00'],
    ['img' => asset('assets/images/carot.jpg'), 'title' => 'Organic Carrots', 'desc' => 'Fresh and crunchy carrots directly from the farm.', 'price' => '$6.00'],
    ['img' => asset('assets/images/spring.jpg'), 'title' => 'Fresh Lettuce', 'desc' => 'Crisp, green, and perfect for salads and sandwiches.', 'price' => '$5.00'],
    ['img' => asset('assets/images/avacado.jpg'), 'title' => 'Avocado', 'desc' => 'Creamy avocados packed with nutrients and flavor.', 'price' => '$10.00'],
];


            foreach ($products as $p): ?>
            <div class="product-card">
                
                <!-- Wishlist Icon -->
                <button class="wishlist-btn" title="Add to Wishlist">
                    <i class="fa fa-heart" style="color:#ff4d4d;"></i>
                </button>

                <img src="<?php echo $p['img']; ?>" alt="<?php echo $p['title']; ?>">
                <h3><?php echo $p['title']; ?></h3>
                <p><?php echo $p['desc']; ?></p>
                <span><?php echo $p['price']; ?></span>

                <!-- Buttons -->
                <div>
                    <button class="btn btn-success">Add to Cart</button>
                    <a href="{{route('productDetails')}}" class="btn btn-outline-success">See Details</a>
                </div>
            </div>
            <?php endforeach; ?>

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
@endsection