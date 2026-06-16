@extends('layouts.main')

@section('content')
    <section class="collection-banner text-center py-4">
        <h2>Resources</h2>
        <p>Home / Resources</p>
        <p>Expert tips, skincare guides, and educational resources from SkinCare Factory.</p>
    </section>

    <!-- Page Banner -->
    {{-- <section class="bg-light py-5 text-center">
        <div class="container">
            <h1 class="fw-bold">Skin Care Resources</h1>
            <p class="text-muted mb-0">
                Expert tips, skincare guides, and educational resources from SkinCare Factory.
            </p>
        </div>
    </section> --}}

    <!-- Introduction -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1556228578-8c89e6adf883" alt="Skin Care Resources"
                        class="img-fluid rounded shadow">
                </div>

                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Your Guide to Healthy Skin</h2>
                    <p class="text-muted">
                        At SkinCare Factory, we believe that informed skincare decisions lead
                        to healthier and more radiant skin. Explore our educational resources,
                        expert recommendations, and practical skincare advice designed for
                        every skin type.
                    </p>

                    <p class="text-muted">
                        Whether you're building a skincare routine, learning about ingredients,
                        or addressing specific skin concerns, our resource center is here to help.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Featured Articles</h2>
                <p class="text-muted">
                    Discover skincare insights from our experts.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1571781926291-c477ebfd024b" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">
                                How to Build a Daily Skincare Routine
                            </h5>
                            <p class="card-text text-muted">
                                Learn the essential steps for cleansing, moisturizing,
                                and protecting your skin every day.
                            </p>
                            <a href="#" class="btn btn-primary btn-sm">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">
                                Understanding Common Skincare Ingredients
                            </h5>
                            <p class="card-text text-muted">
                                Explore ingredients like Hyaluronic Acid, Vitamin C,
                                Niacinamide, and Retinol.
                            </p>
                            <a href="#" class="btn btn-primary btn-sm">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">
                                Choosing Products for Your Skin Type
                            </h5>
                            <p class="card-text text-muted">
                                Find out which products work best for oily, dry,
                                combination, and sensitive skin.
                            </p>
                            <a href="#" class="btn btn-primary btn-sm">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Skin Care Tips -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Quick Skin Care Tips</h2>
                <p class="text-muted">
                    Simple habits for healthier skin.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded text-center h-100">
                        <div class="display-6 mb-3">💧</div>
                        <h5>Stay Hydrated</h5>
                        <p class="text-muted small">
                            Drink enough water daily to support healthy skin.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded text-center h-100">
                        <div class="display-6 mb-3">☀️</div>
                        <h5>Use Sunscreen</h5>
                        <p class="text-muted small">
                            Protect your skin from harmful UV exposure.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded text-center h-100">
                        <div class="display-6 mb-3">🧴</div>
                        <h5>Moisturize Daily</h5>
                        <p class="text-muted small">
                            Maintain your skin's natural barrier and hydration.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded text-center h-100">
                        <div class="display-6 mb-3">🌿</div>
                        <h5>Choose Quality Products</h5>
                        <p class="text-muted small">
                            Use products suited to your skin type and concerns.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Download Resources -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Free Guides & Resources</h2>
                <p class="text-muted">
                    Download useful skincare guides.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6">
                    <div class="border rounded p-4 bg-white shadow-sm">
                        <h5>Beginner's Skin Care Guide</h5>
                        <p class="text-muted">
                            Learn the basics of cleansing, moisturizing, and skin protection.
                        </p>
                        <a href="#" class="btn btn-primary">
                            Download PDF
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded p-4 bg-white shadow-sm">
                        <h5>Ingredient Reference Guide</h5>
                        <p class="text-muted">
                            Understand the benefits of popular skincare ingredients.
                        </p>
                        <a href="#" class="btn btn-primary">
                            Download PDF
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="p-5 rounded text-center">
                        <h2 class="fw-bold mb-3">
                            Stay Updated
                        </h2>

                        <p class="text-muted mb-4">
                            Subscribe to receive skincare tips, product updates,
                            and exclusive educational content.
                        </p>

                        <form>
                            <div class="row g-2 justify-content-center">
                                <div class="col-md-8">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-primary w-100">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        section {
            background: #fbf5ec
        }

        .card img {
            height: 220px;
            object-fit: cover;
        }


        h1,
        h2 {
            color: #2d3748;
        }

        .btn-primary {
            background: #000;
            border-color: #000;
        }

        .btn-primary:hover {
            background: #fbf5ec;
            border-color: #000;
            color: #000
        }
    </style>
@endsection

@section('js')
    <script></script>
@endsection
