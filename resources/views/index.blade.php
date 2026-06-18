@extends('layouts.main')
@section('content')
    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 text-center hero-box">

                    <small class="d-block mb-2 text-muted">SKIN-ESSENTIALS</small>


                    <h1 class="fw-bold">
                        Let your Skin Breathe with this Light Moisturizer
                    </h1>

                    <p class="mt-3 text-muted">
                        Nullam a ultrices ipsum. Curabitur justo augue, volutpat sed dui.
                        Quisque vehicula augue faucibus justo.
                    </p>

                    <a href="#" id="cta-btn" class="btn btn-dark mt-3 px-4 py-2">
                        Explore More
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section -->

    <section class="category-section py-5 text-center">
        <div class="container">

            <small class="text-muted letter-spacing">ESSENTIALS</small>
            <h2 class="fw-bold mb-4">Shop by Category</h2>

            <div class="position-relative">

                <!-- Left Arrow -->
                <button class="slider-btn left" onclick="slideLeft()">&#10094;</button>

                <!-- Slider -->
                <div class="category-slider d-flex overflow-hidden" id="categorySlider">

                    <div class="category-item">
                        <div class="category-circle">
                            <img src="{{ asset('assets/images/es-ct-1.webp') }}" alt="">
                        </div>
                        <p>Serum Set</p>
                    </div>

                    <div class="category-item">
                        <div class="category-circle">
                            <img src="{{ asset('assets/images/es-ct-2.webp') }}" alt="">
                        </div>
                        <p>Face Cream</p>
                    </div>

                    <div class="category-item">
                        <div class="category-circle">
                            <img src="{{ asset('assets/images/es-ct-3.webp') }}" alt="">
                        </div>
                        <p>Hair Oil</p>
                    </div>

                    <div class="category-item">
                        <div class="category-circle">
                            <img src="{{ asset('assets/images/es-ct-4.webp') }}" alt="">
                        </div>
                        <p>Face Wash</p>
                    </div>

                    <div class="category-item">
                        <div class="category-circle">
                            <img src="{{ asset('assets/images/es-ct-5.webp') }}" alt="">
                        </div>
                        <p>Lip Shade</p>
                    </div>

                    <div class="category-item">
                        <div class="category-circle">
                            <img src="{{ asset('assets/images/es-ct-1.webp') }}" alt="">
                        </div>
                        <p>Foundation</p>
                    </div>


                </div>

                <!-- Right Arrow -->
                <button class="slider-btn right" onclick="slideRight()">&#10095;</button>

            </div>

        </div>
    </section>

    <section class="product-section py-5">
        <div class="container">

            <small class="text-muted d-block text-center letter-spacing">NEW ARRIVALS</small>
            <h2 class="fw-bold text-center mb-4">Most Popular Products</h2>

            <div class="product-slider d-flex">

                @foreach ($upperNewProducts as $upperNewProduct)
                    <!-- Product 1 -->
                    <div class="product-card">

                        <div class="product-img">
                            <img src="{{ $upperNewProduct->mainImage && $upperNewProduct->mainImage->url
                                ? asset('storage/' . $upperNewProduct->mainImage->url)
                                : asset('assets/images/placeholder.png') }}"
                                class="img-fluid" alt="">

                            <div class="hover-icons">
                                <button class="icon-btn quick-view-btn" data-product-id="{{ $upperNewProduct->id }}">
                                    <i class="bi bi-search"></i>
                                </button>

                                <button class="icon-btn wishlist-btn" data-product-id="{{ $upperNewProduct->id }}">
                                    <i
                                        class="bi bi-heart {{ auth()->check() && auth()->user()->wishlist->pluck('product_id')->contains($upperNewProduct->id) ? 'text-danger' : '' }}"></i>
                                </button>
                            </div>
                        </div>

                        <small class="text-muted d-block mt-3">{{ $upperNewProduct->brand->name ?? '' }}</small>
                        <a class="text-dark text-decoration-none"
                            href="{{ route('productDetails', $upperNewProduct->slug) }}">
                            <h6>{{ $upperNewProduct->name }}</h6>
                        </a>

                        <strong>
                            $ {{ number_format(optional($upperNewProduct->firstVariant)->price ?? 0, 2) }}
                        </strong>

                        <button class="btn btn-dark w-100 mt-2 quick-view-btn" id="cta-btn"
                            data-product-id="{{ $upperNewProduct->id }}">
                            Add to Cart
                        </button>

                    </div>
                @endforeach



            </div>

        </div>
    </section>

    <section class="whatwedo-section d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-end">

                <div class="col-lg-6 col-md-7 whatwedo-content">

                    <small class="text-muted letter-spacing">WHAT WE DO</small>

                    <h2 class="fw-bold mt-2">
                        Know what's happening with your skin
                    </h2>

                    <p class="mt-3 text-muted">
                        Suspendisse non fermentum nibh, eu porttitor leo. Morbi facilisis
                        nulla non nulla eleifend at rhoncus arcu dictum. Phasellus odio quam,
                        dapibus vel magna eget, molestie.
                    </p>

                    <div class="feature d-flex mb-3">
                        <i class="fa-solid fa-leaf me-2"></i>
                        <div>
                            <h6>Made From Handpicked Herbs</h6>
                            <p>Suspendisse non fermentum nibh, eu porttitor leo.</p>
                        </div>
                    </div>

                    <div class="feature d-flex mb-3">
                        <i class="fa-solid fa-flask me-2"></i>
                        <div>
                            <h6>Maintained PH Levels & Lab tested</h6>
                            <p>Dependisse non fermentum nibh, eu porttitor leo.</p>
                        </div>
                    </div>

                    <div class="feature d-flex mb-3">
                        <i class="fa-solid fa-leaf me-2"></i>
                        <div>
                            <h6>100% Genuine Products</h6>
                            <p>Kispendisse non fermentum nibh, eu porttitor leo.</p>
                        </div>
                    </div>

                    <div class="feature d-flex mb-4">
                        <i class="fa-solid fa-heart me-2"></i>
                        <div>
                            <h6>Handmade with Care & Love</h6>
                            <p>Auspendisse non fermentum nibh, eu porttitor leo.</p>
                        </div>
                    </div>

                    <a href="#" id="cta-btn" class="btn btn-dark px-4 py-2">Explore Now</a>

                </div>

            </div>
        </div>
    </section>

    <section class="extra-feature-category py-5">
        <div class="container">

            <div class="extra-feature-category-slider d-flex overflow-auto">

                <!-- Item -->
                <div class="extra-feature-category-card position-relative">
                    <img src="assets/images/ex-ct-1.webp" class="img-fluid rounded-4" alt="">
                    <div class="extra-feature-category-overlay">
                        <h4>Buy Organic Face Pack</h4>
                        <a href="#">Explore Now →</a>
                    </div>
                </div>

                <!-- Item -->
                <div class="extra-feature-category-card position-relative">
                    <img src="assets/images/ex-ct-2.webp" class="img-fluid rounded-4" alt="">
                    <div class="extra-feature-category-overlay">
                        <h4>Buy Imported Cosmetics</h4>
                        <a href="#">Explore Now →</a>
                    </div>
                </div>

                <!-- Item -->
                <div class="extra-feature-category-card position-relative">
                    <img src="assets/images/ex-ct-3.webp" class="img-fluid rounded-4" alt="">
                    <div class="extra-feature-category-overlay">
                        <h4>Skin Care Essentials</h4>
                        <a href="#">Explore Now →</a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="popular-products py-5">
        <div class="container">

            <!-- Heading -->
            <div class="popular-products-header text-center mb-5">
                <p class="popular-products-subtitle mb-2">NEW ARRIVALS</p>
                <h2 class="popular-products-title">Most Popular Products</h2>
            </div>

            <div class="row g-4">

                <!-- Product Card -->
                @foreach ($featuredProducts as $featuredProduct)
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="popular-products-card">
                            <div class="popular-products-image">
                                <img src="{{ $featuredProduct->mainImage && $featuredProduct->mainImage->url
                                    ? asset('storage/' . $featuredProduct->mainImage->url)
                                    : asset('assets/images/placeholder.png') }}"
                                    class="img-fluid" alt="">
                                <div class="hover-icons">
                                    <button class="icon-btn quick-view-btn" data-product-id="{{ $featuredProduct->id }}">
                                        <i class="bi bi-search"></i>
                                    </button>

                                    <button class="icon-btn wishlist-btn" data-product-id="{{ $featuredProduct->id }}">
                                        <i
                                            class="bi bi-heart {{ auth()->check() && auth()->user()->wishlist->pluck('product_id')->contains($featuredProduct->id) ? 'text-danger' : '' }}"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="popular-products-info">
                                <span class="popular-products-brand">{{ $featuredProduct->brand->name }}</span>
                                <h6 class="popular-products-name">
                                    {{ $featuredProduct->name }}
                                </h6>
                                <div class="popular-products-price">$
                                    {{ number_format(optional($featuredProduct->firstVariant)->price ?? 0, 2) }}</div>
                                <button class="popular-products-btn quick-view-btn" id="cta-btn"
                                    data-product-id="{{ $featuredProduct->id }}">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- View More Button -->
            <div class="text-center mt-5">
                <form action="{{ route('shop') }}" method="GET">
                    <button type="submit" class="popular-products-viewmore">View More</button>
                </form>
            </div>

        </div>
    </section>

    <section class="essential-video">
        <div class="container">
            <div class="essential-video-wrapper">

                <!-- Left Content -->
                <div class="essential-video-content">
                    <small class="text-muted letter-spacing">SKIN-ESSENTIALS</small>


                    <h2 class="essential-video-title">
                        Your Skin is Your Foundation, Protect it.
                    </h2>

                    <p class="essential-video-text">
                        Nullam a ultrices ipsum. Curabitur justo augue, volutpat vitae porta vel,
                        ullamcorper sed dui. Quisque vehicula augue faucibus justo ultrices,
                        quis rutrum bibendum.
                    </p>

                    <a href="#" id="cta-btn" class="essential-video-btn">Explore Now</a>
                </div>

                <!-- Right Play Button -->
                <div class="essential-video-play">
                    <span class="essential-video-play-text">Play Video</span>
                    <span class="essential-video-line"></span>
                    <div class="essential-video-play-btn">▶</div>
                </div>

            </div>
        </div>
    </section>


    <section class="blog-section py-5">
        <div class="container">

            <!-- Heading -->
            <div class="blog-section-header text-center mb-5">
                <!-- <span class="blog-section-subtitle">TRENDING</span> -->
                <small class="text-muted letter-spacing">TRENDING</small>

                <!-- <h2 class="blog-section-title">Latest News & Blogs</h2> -->
                <h2 class="fw-bold text-center mb-4">Latest News & Blogs</h2>

            </div>

            <div class="row g-4">

                <!-- Blog Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-section-card">
                        <img src="assets/images/blog-1.webp" class="img-fluid" alt="">
                        <div class="blog-section-overlay">
                            <h4>The best color awaits your beautiful hair</h4>
                            <p>Urna id sociis natoque penatibus et...</p>
                            <a href="#">Read More →</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-section-card">
                        <img src="assets/images/blog-2.webp" class="img-fluid" alt="">
                        <div class="blog-section-overlay">
                            <h4>Best body treatment to get rid of dry skin patches</h4>
                            <p>Elementum eu sociis natoque penatibus...</p>
                            <a href="#">Read More →</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-section-card">
                        <img src="assets/images/blog-3.webp" class="img-fluid" alt="">
                        <div class="blog-section-overlay">
                            <h4>Important points to know in collagen induction therapy</h4>
                            <p>Hac habitasse sociis natoque penatibus...</p>
                            <a href="#">Read More →</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="testimonial-section">
        <div class="container">
            <div class="testimonial-wrapper">

                <!-- Left Content -->
                <div class="testimonial-left">
                    <span class="testimonial-subtitle">SKIN-CARE</span>
                    <h2 class="testimonial-title">What Our clients Say</h2>
                    <p class="testimonial-text">
                        Nullam a ultrices ipsum. Curabitur justo augue,
                        volutpat vitae porta vel, ullamcorper sed dui.
                        Quisque vehicula augue faucibus.
                    </p>

                    <!-- Arrows -->
                    <div class="testimonial-navigation">
                        <div class="testimonial-prev">←</div>
                        <div class="testimonial-next">→</div>
                    </div>
                </div>

                <!-- Right Slider -->
                <div class="testimonial-slider swiper">
                    <div class="swiper-wrapper">

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <p>
                                    “Vullam soales massa a pellentesque vehicula. Nnc et felis eros.
                                    Cras non odio facilisis, pellentesque diam.”
                                </p>
                                <div class="testimonial-author">
                                    <img src="assets/images/test.webp" alt="">
                                    <div>
                                        <h6>Author Name</h6>
                                        <span>Author Designation</span>
                                        <div class="testimonial-stars">★★★★★</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <p>
                                    “Nulla quis sem at nibh elementum imperdiet.
                                    Praesent mauris. Fusce nec tellus sed augue semper porta.”
                                </p>
                                <div class="testimonial-author">
                                    <img src="assets/images/test1.webp" alt="">
                                    <div>
                                        <h6>Kylie Jennar</h6>
                                        <span>Hollywood Actor</span>
                                        <div class="testimonial-stars">★★★★★</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="insta-post">
        <div class="container text-center">

            <!-- <span class="insta-post-subtitle">INSTAGRAM</span> -->
            <small class="text-muted letter-spacing">INSTAGRAM</small>

            <!-- <h2 class="insta-post-title">Follow us @yourinstagram</h2> -->
            <h2 class="fw-bold text-center mb-4">Follow us @yourinstagram</h2>


            <div class="insta-post-grid">
                <div class="insta-post-item">
                    <img src="assets/images/ifu-1.webp" alt="">
                </div>
                <div class="insta-post-item">
                    <img src="assets/images/ifu-2.webp" alt="">
                </div>
                <div class="insta-post-item">
                    <img src="assets/images/ifu-3.webp" alt="">
                </div>
                <div class="insta-post-item">
                    <img src="assets/images/ifu-4.webp" alt="">
                </div>
                <div class="insta-post-item">
                    <img src="assets/images/ifu-5.webp" alt="">
                </div>
            </div>

        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /* Video Section Styling */
    </style>
@endsection
@section('js')
    <script type="text/javascript"></script>
@endsection
