@extends('layouts.main')

@section('content')
    <!-- Banner -->
    <section class="collection-banner text-center">
        <h2>Education</h2>
        <p>Home / Education</p>
    </section>

    <!-- Introduction -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <img src="{{ asset('assets/images/logo.webp') }}" alt="Skin Care Education"
                        class="img-fluid rounded shadow">
                </div>

                <div class="col-lg-6">
                    <span class="badge mb-3">SkinCare Factory Learning Center</span>

                    <h2 class="fw-bold mb-4">
                        Understanding Your Skin Starts Here
                    </h2>

                    <p class="text-muted">
                        Healthy skin begins with knowledge. At SkinCare Factory,
                        we provide educational resources to help you understand
                        skin health, skincare ingredients, daily routines, and
                        common skin concerns.
                    </p>

                    <p class="text-muted">
                        Whether you're a beginner or a skincare enthusiast,
                        our educational content is designed to help you make
                        informed decisions about your skincare journey.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Learn About Skin Types -->
    <section class="py-5 ">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Know Your Skin Type</h2>
                <p class="text-muted">
                    Understanding your skin type is the first step toward choosing the right products.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="education-card h-100">
                        <div class="icon-box">💧</div>
                        <h5>Dry Skin</h5>
                        <p>
                            Often feels tight, rough, and may appear flaky.
                            Requires extra hydration and moisture retention.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="education-card h-100">
                        <div class="icon-box">✨</div>
                        <h5>Oily Skin</h5>
                        <p>
                            Produces excess sebum, resulting in shine and
                            increased likelihood of clogged pores.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="education-card h-100">
                        <div class="icon-box">🌿</div>
                        <h5>Combination Skin</h5>
                        <p>
                            Features both oily and dry areas,
                            commonly with an oily T-zone.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="education-card h-100">
                        <div class="icon-box">🩺</div>
                        <h5>Sensitive Skin</h5>
                        <p>
                            More prone to irritation, redness,
                            and reactions to certain products.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Ingredients Section -->
    <section class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Popular Skincare Ingredients</h2>
                <p class="text-muted">
                    Learn how key ingredients benefit your skin.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="ingredient-card">
                        <h5>Vitamin C</h5>
                        <p>
                            Brightens skin tone and helps reduce the appearance of dark spots.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="ingredient-card">
                        <h5>Hyaluronic Acid</h5>
                        <p>
                            Deeply hydrates the skin and helps maintain moisture balance.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="ingredient-card">
                        <h5>Niacinamide</h5>
                        <p>
                            Helps improve texture, minimize pores, and calm redness.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="ingredient-card">
                        <h5>Retinol</h5>
                        <p>
                            Supports skin renewal and helps reduce signs of aging.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Routine Steps -->
    <section class="py-5 ">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Basic Daily Skincare Routine</h2>
                <p class="text-muted">
                    Follow these essential steps for healthier-looking skin.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <span>1</span>
                        <h5>Cleanse</h5>
                        <p>Remove dirt, oil, and impurities from your skin.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <span>2</span>
                        <h5>Treat</h5>
                        <p>Apply serums and active ingredients as needed.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <span>3</span>
                        <h5>Moisturize</h5>
                        <p>Hydrate and strengthen the skin barrier.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <span>4</span>
                        <h5>Protect</h5>
                        <p>Apply sunscreen daily to prevent UV damage.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Skin Concerns -->
    <section class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Common Skin Concerns</h2>
            </div>

            <div class="row g-4">

                <div class="col-md-6">
                    <div class="concern-card">
                        <h5>Acne & Breakouts</h5>
                        <p>
                            Learn about common causes, prevention methods,
                            and effective skincare ingredients.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="concern-card">
                        <h5>Hyperpigmentation</h5>
                        <p>
                            Understand how discoloration develops and what
                            ingredients may help improve skin tone.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="concern-card">
                        <h5>Dryness & Dehydration</h5>
                        <p>
                            Discover ways to restore moisture and strengthen
                            your skin barrier.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="concern-card">
                        <h5>Signs of Aging</h5>
                        <p>
                            Explore preventative skincare practices and
                            ingredients commonly used in anti-aging routines.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 text-dark">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">
                Continue Your Skin Care Journey
            </h2>

            <p class="mb-4">
                Explore our skincare products and educational resources designed
                to help you achieve healthy, radiant skin.
            </p>

            <a href="#" class="btn btn-light btn-lg">
                Explore Products
            </a>
        </div>
    </section>
@endsection

@section('css')
    <style>
        section {
            background: #fbf5ec
        }

        .education-card,
        .ingredient-card,
        .concern-card,
        .step-card {
            background: #fff;
            border: 1px solid #ececec;
            border-radius: 12px;
            padding: 25px;
            transition: .3s ease;
            height: 100%;
        }

        .education-card:hover,
        .ingredient-card:hover,
        .concern-card:hover,
        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .icon-box {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .step-card {
            text-align: center;
        }

        .step-card span {
            width: 60px;
            height: 60px;
            background: #fbf5ec;
            color: #000;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .ingredient-card h5,
        .education-card h5,
        .concern-card h5 {
            font-weight: 600;
            margin-bottom: 12px;
        }

        .education-card p,
        .ingredient-card p,
        .concern-card p,
        .step-card p {
            color: #6c757d;
            margin-bottom: 0;
        }

        @media(max-width: 767px) {
            .step-card span {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }
    </style>
@endsection

@section('js')
    <script>
        (() => {

        })();
    </script>
@endsection
