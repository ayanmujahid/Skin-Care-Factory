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

                @foreach ($featuredProducts as $featuredProduct)
                    <!-- Product 1 -->
                    <div class="product-card">

                        <div class="product-img">
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

                        <small class="text-muted d-block mt-3">{{ $featuredProduct->brand->name ?? '' }}</small>
                        <a class="text-dark text-decoration-none"
                            href="{{ route('productDetails', $featuredProduct->slug) }}">
                            <h6>{{ $featuredProduct->name }}</h6>
                        </a>

                        <strong>
                            $ {{ number_format(optional($featuredProduct->firstVariant)->price ?? 0, 2) }}
                        </strong>

                        <button class="btn btn-dark w-100 mt-2 quick-view-btn" id="cta-btn"
                            data-product-id="{{ $featuredProduct->id }}">
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
    @verbatim
        /* ==========================================================
           GSAP Premium Animation — Base States
           These rules only hide elements pre-animation. They apply
           only when the browser has no reduced-motion preference,
           so nothing ever gets stuck invisible if JS fails to run.
        ========================================================== */
        @media (prefers-reduced-motion: no-preference) {
            .hero-box small,
            .hero-box h1,
            .hero-box p,
            .hero-box #cta-btn,
            .category-section h2,
            .category-item,
            .product-card,
            .whatwedo-content,
            .whatwedo-content .feature,
            .whatwedo-content #cta-btn,
            .extra-feature-category-card,
            .extra-feature-category-overlay,
            .essential-video-content,
            .essential-video-play,
            .blog-section-card,
            .testimonial-section,
            .testimonial-card,
            .insta-post-item {
                opacity: 0;
            }
        }

        /* GPU-friendly hints — only transform/opacity are animated */
        .hero-section, .hero-box, .category-item, .category-circle,
        .product-card, .product-img img, .whatwedo-content, .feature, .feature i,
        .extra-feature-category-card, .extra-feature-category-card img,
        .essential-video-content, .essential-video-play, .essential-video-play-btn,
        .blog-section-card, .blog-section-card img, .blog-section-overlay a,
        .testimonial-card, .testimonial-stars, .testimonial-author img,
        .insta-post-item, .insta-post-item img {
            will-change: transform, opacity;
        }

        /* Keep zoom/parallax effects clipped inside their cards */
        .product-img,
        .extra-feature-category-card,
        .blog-section-card,
        .insta-post-item {
            overflow: hidden;
            position: relative;
        }

        /* Scroll progress bar (injected via JS) */
        #scroll-progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0%;
            background: #111;
            z-index: 9999;
            transform-origin: left;
            pointer-events: none;
        }

        /* Instagram hover overlay (injected via JS, markup untouched) */
        .insta-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
        }

        .insta-overlay i {
            color: #fff;
            font-size: 1.6rem;
            transform: scale(0.6);
        }

        /* Reduced motion: everything simply appears, no animation runs */
        .reduce-motion * {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    @endverbatim
    </style>
@endsection
@section('js')
    <script type="text/javascript">
    @verbatim
        (function () {
            function initPremiumAnimations() {
                if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
                    console.warn('GSAP/ScrollTrigger failed to load — animations skipped.');
                    return;
                }
                gsap.registerPlugin(ScrollTrigger);

                var root = document.documentElement;
                var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                if (reduceMotion) {
                    root.classList.add('reduce-motion');
                    return; // CSS fallback makes everything visible instantly, no motion
                }

                gsap.defaults({ ease: 'power3.out', overwrite: 'auto' });

                /* -----------------------------------------------------------
                   Utility: once-only, staggered "fade + rise" reveal for
                   repeated card groups (category items, products, etc.)
                ----------------------------------------------------------- */
                function revealBatch(selector, opts) {
                    opts = opts || {};
                    var els = gsap.utils.toArray(selector);
                    if (!els.length) return;

                    ScrollTrigger.batch(els, {
                        start: 'top 85%',
                        once: true,
                        onEnter: function (batch) {
                            gsap.fromTo(batch,
                                { opacity: 0, y: opts.y || 40, scale: opts.scale || 1 },
                                {
                                    opacity: 1,
                                    y: 0,
                                    scale: 1,
                                    duration: opts.duration || 0.8,
                                    stagger: opts.stagger || 0.1,
                                    ease: opts.ease || 'power3.out'
                                });
                        }
                    });
                }

                /* -----------------------------------------------------------
                   1. HERO SECTION + page entrance
                ----------------------------------------------------------- */
                var heroSection = document.querySelector('.hero-section');
                if (heroSection) {
                    var heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });

                    heroTl
                        .to(heroSection, { opacity: 1, duration: 0.6 }, 0)
                        .fromTo(heroSection.querySelector('.hero-box small'),
                            { y: 16, opacity: 0 }, { y: 0, opacity: 1, duration: 0.5 }, 0.05)
                        .fromTo(heroSection.querySelector('.hero-box h1'),
                            { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 0.9 }, 0.15)
                        .fromTo(heroSection.querySelector('.hero-box p'),
                            { y: 20, opacity: 0 }, { y: 0, opacity: 1, duration: 0.7 }, 0.5)
                        .fromTo(heroSection.querySelector('.hero-box #cta-btn'),
                            { scale: 0.9, opacity: 0 },
                            { scale: 1, opacity: 1, duration: 0.6, ease: 'back.out(1.9)' }, 0.7);

                    // Slow background parallax as the hero scrolls out
                    gsap.to(heroSection, {
                        backgroundPosition: 'center 25%',
                        ease: 'none',
                        scrollTrigger: {
                            trigger: heroSection,
                            start: 'top top',
                            end: 'bottom top',
                            scrub: 1
                        }
                    });
                }

                /* -----------------------------------------------------------
                   2. CATEGORY SECTION
                ----------------------------------------------------------- */
                var categorySection = document.querySelector('.category-section');
                if (categorySection) {
                    var catHeading = categorySection.querySelector('h2');
                    if (catHeading) {
                        gsap.fromTo(catHeading, { y: 30, opacity: 0 }, {
                            y: 0, opacity: 1, duration: 0.7,
                            scrollTrigger: { trigger: categorySection, start: 'top 80%', once: true }
                        });
                    }

                    revealBatch(categorySection.querySelectorAll('.category-item'), { y: 40, stagger: 0.08, duration: 0.7 });

                    categorySection.querySelectorAll('.category-item').forEach(function (item) {
                        var circle = item.querySelector('.category-circle');
                        var img = item.querySelector('img');
                        if (!circle) return;

                        item.addEventListener('mouseenter', function () {
                            gsap.to(circle, { rotate: 5, boxShadow: '0 12px 28px rgba(0,0,0,0.18)', duration: 0.4, ease: 'power2.out' });
                            if (img) gsap.to(img, { scale: 1.12, duration: 0.5, ease: 'power2.out' });
                        });
                        item.addEventListener('mouseleave', function () {
                            gsap.to(circle, { rotate: 0, boxShadow: '0 4px 10px rgba(0,0,0,0.06)', duration: 0.4, ease: 'power2.out' });
                            if (img) gsap.to(img, { scale: 1, duration: 0.5, ease: 'power2.out' });
                        });
                    });
                }

                /* -----------------------------------------------------------
                   3. PRODUCT SECTIONS (both "Most Popular Products" blocks,
                      including the Blade @foreach-rendered cards)
                ----------------------------------------------------------- */
                document.querySelectorAll('.product-section').forEach(function (section) {
                    revealBatch(section.querySelectorAll('.product-card'), { y: 60, scale: 0.95, stagger: 0.1, duration: 0.75 });
                });

                document.querySelectorAll('.product-card').forEach(function (card) {
                    var img = card.querySelector('.product-img img');
                    var addBtn = card.querySelector('button.btn-dark.w-100');

                    card.addEventListener('mouseenter', function () {
                        gsap.to(card, { y: -10, boxShadow: '0 18px 34px rgba(0,0,0,0.14)', duration: 0.4, ease: 'power2.out' });
                        if (img) gsap.to(img, { scale: 1.1, duration: 0.6, ease: 'power2.out' });
                        if (addBtn) gsap.to(addBtn, { y: -4, duration: 0.35, ease: 'power2.out' });
                    });
                    card.addEventListener('mouseleave', function () {
                        gsap.to(card, { y: 0, boxShadow: '0 0 0 rgba(0,0,0,0)', duration: 0.4, ease: 'power2.out' });
                        if (img) gsap.to(img, { scale: 1, duration: 0.6, ease: 'power2.out' });
                        if (addBtn) gsap.to(addBtn, { y: 0, duration: 0.35, ease: 'power2.out' });
                    });
                });

                /* -----------------------------------------------------------
                   4. WHAT WE DO SECTION
                ----------------------------------------------------------- */
                var whatwedo = document.querySelector('.whatwedo-content');
                if (whatwedo) {
                    var wtl = gsap.timeline({
                        scrollTrigger: { trigger: whatwedo, start: 'top 80%', once: true }
                    });

                    wtl
                        .fromTo(whatwedo, { x: -50, opacity: 0 }, { x: 0, opacity: 1, duration: 0.8 })
                        .fromTo(whatwedo.querySelectorAll('.feature'),
                            { x: -30, opacity: 0 },
                            { x: 0, opacity: 1, duration: 0.6, stagger: 0.15 }, '-=0.4')
                        .fromTo(whatwedo.querySelectorAll('.feature i'),
                            { rotate: -25, opacity: 0, scale: 0.6 },
                            { rotate: 0, opacity: 1, scale: 1, duration: 0.5, stagger: 0.15 }, '<')
                        .fromTo(whatwedo.querySelector('#cta-btn'),
                            { scale: 0.85, opacity: 0 },
                            { scale: 1, opacity: 1, duration: 0.5, ease: 'back.out(1.8)' }, '-=0.2');
                }

                /* -----------------------------------------------------------
                   5. FEATURED CATEGORY BANNER
                ----------------------------------------------------------- */
                revealBatch('.extra-feature-category-card', { y: 50, stagger: 0.15, duration: 0.8 });

                document.querySelectorAll('.extra-feature-category-card').forEach(function (card) {
                    var img = card.querySelector('img');
                    var overlay = card.querySelector('.extra-feature-category-overlay');

                    if (overlay) {
                        gsap.set(overlay, { y: 15 });
                        ScrollTrigger.create({
                            trigger: card,
                            start: 'top 85%',
                            once: true,
                            onEnter: function () {
                                gsap.to(overlay, { opacity: 1, y: 0, duration: 0.6, delay: 0.2 });
                            }
                        });
                    }

                    if (img) {
                        gsap.to(img, {
                            scale: 1.15,
                            ease: 'none',
                            scrollTrigger: { trigger: card, start: 'top bottom', end: 'bottom top', scrub: 1 }
                        });
                    }

                    card.addEventListener('mouseenter', function () {
                        if (img) gsap.to(img, { scale: 1.22, duration: 0.5 });
                        if (overlay) gsap.to(overlay, { opacity: 1, duration: 0.3 });
                    });
                    card.addEventListener('mouseleave', function () {
                        if (img) gsap.to(img, { scale: 1.15, duration: 0.5 });
                    });
                });

                /* -----------------------------------------------------------
                   6. VIDEO SECTION
                ----------------------------------------------------------- */
                var videoSection = document.querySelector('.essential-video');
                if (videoSection) {
                    var vtl = gsap.timeline({
                        scrollTrigger: { trigger: videoSection, start: 'top 75%', once: true }
                    });

                    var videoContent = videoSection.querySelector('.essential-video-content');
                    var videoPlay = videoSection.querySelector('.essential-video-play');

                    if (videoContent) {
                        vtl.fromTo(videoContent, { x: -50, opacity: 0 }, { x: 0, opacity: 1, duration: 0.8 });
                    }
                    if (videoPlay) {
                        vtl.fromTo(videoPlay, { scale: 0, opacity: 0 },
                            { scale: 1, opacity: 1, duration: 0.6, ease: 'back.out(1.7)' }, '-=0.3');
                    }

                    var playBtn = videoSection.querySelector('.essential-video-play-btn');
                    if (playBtn) {
                        gsap.to(playBtn, { scale: 1.12, duration: 1.1, repeat: -1, yoyo: true, ease: 'sine.inOut' });
                    }

                    gsap.to(videoSection, {
                        backgroundPositionY: '20%',
                        ease: 'none',
                        scrollTrigger: { trigger: videoSection, start: 'top bottom', end: 'bottom top', scrub: 1 }
                    });
                }

                /* -----------------------------------------------------------
                   7. BLOG SECTION
                ----------------------------------------------------------- */
                revealBatch('.blog-section-card', { y: 50, stagger: 0.12, duration: 0.75 });

                document.querySelectorAll('.blog-section-card').forEach(function (card) {
                    var img = card.querySelector('img');
                    var readMore = card.querySelector('a');
                    var overlay = card.querySelector('.blog-section-overlay');

                    card.addEventListener('mouseenter', function () {
                        if (img) gsap.to(img, { scale: 1.12, duration: 0.6 });
                        if (overlay) gsap.to(overlay, { opacity: 1, duration: 0.4 });
                        if (readMore) gsap.to(readMore, { x: 6, duration: 0.3 });
                    });
                    card.addEventListener('mouseleave', function () {
                        if (img) gsap.to(img, { scale: 1, duration: 0.6 });
                        if (readMore) gsap.to(readMore, { x: 0, duration: 0.3 });
                    });
                });

                /* -----------------------------------------------------------
                   8. TESTIMONIALS
                   Note: only inner content is animated (.testimonial-card,
                   stars, author photo) — the .swiper-slide itself is left
                   alone so Swiper's own transforms keep working normally.
                ----------------------------------------------------------- */
                var testimonialSection = document.querySelector('.testimonial-section');
                if (testimonialSection) {
                    gsap.fromTo(testimonialSection, { y: 40, opacity: 0 }, {
                        y: 0, opacity: 1, duration: 0.8,
                        scrollTrigger: { trigger: testimonialSection, start: 'top 80%', once: true }
                    });

                    testimonialSection.querySelectorAll('.testimonial-card').forEach(function (card, i) {
                        var stars = card.querySelector('.testimonial-stars');
                        var author = card.querySelector('.testimonial-author img');

                        gsap.fromTo(card, { x: 40, opacity: 0 }, {
                            x: 0, opacity: 1, duration: 0.7, delay: i * 0.1,
                            scrollTrigger: { trigger: testimonialSection, start: 'top 75%', once: true }
                        });

                        if (stars) {
                            gsap.fromTo(stars, { scale: 0.6, opacity: 0 }, {
                                scale: 1, opacity: 1, duration: 0.5, delay: 0.3 + i * 0.1,
                                scrollTrigger: { trigger: testimonialSection, start: 'top 75%', once: true }
                            });
                        }
                        if (author) {
                            gsap.fromTo(author, { opacity: 0 }, {
                                opacity: 1, duration: 0.6, delay: 0.2 + i * 0.1,
                                scrollTrigger: { trigger: testimonialSection, start: 'top 75%', once: true }
                            });
                        }
                    });
                }

                /* -----------------------------------------------------------
                   9. INSTAGRAM GALLERY
                   Hover overlay + icon are created here in JS only, so the
                   Blade markup/design stays exactly as written.
                ----------------------------------------------------------- */
                document.querySelectorAll('.insta-post-item').forEach(function (item) {
                    if (!item.querySelector('.insta-overlay')) {
                        var overlay = document.createElement('div');
                        overlay.className = 'insta-overlay';
                        overlay.innerHTML = '<i class="bi bi-instagram"></i>';
                        item.appendChild(overlay);
                    }

                    var img = item.querySelector('img');
                    var overlayEl = item.querySelector('.insta-overlay');
                    var icon = overlayEl.querySelector('i');

                    item.addEventListener('mouseenter', function () {
                        if (img) gsap.to(img, { scale: 1.15, duration: 0.6 });
                        gsap.to(overlayEl, { opacity: 1, duration: 0.35 });
                        gsap.to(icon, { scale: 1, duration: 0.35, delay: 0.05 });
                    });
                    item.addEventListener('mouseleave', function () {
                        if (img) gsap.to(img, { scale: 1, duration: 0.6 });
                        gsap.to(overlayEl, { opacity: 0, duration: 0.3 });
                        gsap.to(icon, { scale: 0.6, duration: 0.3 });
                    });
                });

                revealBatch('.insta-post-item', { y: 30, scale: 0.9, stagger: 0.08, duration: 0.6 });

                /* -----------------------------------------------------------
                   10. MAGNETIC BUTTONS
                ----------------------------------------------------------- */
                document.querySelectorAll('#cta-btn, .essential-video-btn').forEach(function (btn) {
                    btn.addEventListener('mousemove', function (e) {
                        var rect = btn.getBoundingClientRect();
                        var x = e.clientX - rect.left - rect.width / 2;
                        var y = e.clientY - rect.top - rect.height / 2;
                        gsap.to(btn, { x: x * 0.25, y: y * 0.35, duration: 0.3, ease: 'power2.out' });
                    });
                    btn.addEventListener('mouseleave', function () {
                        gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.4)' });
                    });
                });

                /* -----------------------------------------------------------
                   11. SCROLL PROGRESS BAR
                ----------------------------------------------------------- */
                var progressBar = document.createElement('div');
                progressBar.id = 'scroll-progress-bar';
                document.body.appendChild(progressBar);

                gsap.to(progressBar, {
                    width: '100%',
                    ease: 'none',
                    scrollTrigger: { trigger: document.body, start: 'top top', end: 'bottom bottom', scrub: 0.3 }
                });

                /* -----------------------------------------------------------
                   12. COUNTER ANIMATION (ready for stat blocks — add
                   data-counter="1500" to any element to activate; a no-op
                   right now since this page has no stats yet)
                ----------------------------------------------------------- */
                document.querySelectorAll('[data-counter]').forEach(function (el) {
                    var target = parseFloat(el.getAttribute('data-counter')) || 0;
                    var counterObj = { val: 0 };
                    gsap.to(counterObj, {
                        val: target,
                        duration: 1.6,
                        ease: 'power1.out',
                        scrollTrigger: { trigger: el, start: 'top 85%', once: true },
                        onUpdate: function () { el.textContent = Math.round(counterObj.val).toLocaleString(); }
                    });
                });

                // Recalculate trigger positions once images/fonts finish loading
                window.addEventListener('load', function () { ScrollTrigger.refresh(); });
            }

            // Load GSAP + ScrollTrigger from CDN only if not already present
            // on the page (avoids clashing with a copy loaded in layouts.main)
            if (window.gsap && window.ScrollTrigger) {
                document.addEventListener('DOMContentLoaded', initPremiumAnimations);
                return;
            }

            var gsapScript = document.createElement('script');
            gsapScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js';
            gsapScript.onload = function () {
                var stScript = document.createElement('script');
                stScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js';
                stScript.onload = function () {
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initPremiumAnimations);
                    } else {
                        initPremiumAnimations();
                    }
                };
                document.head.appendChild(stScript);
            };
            document.head.appendChild(gsapScript);
        })();
    @endverbatim
    </script>
@endsection
