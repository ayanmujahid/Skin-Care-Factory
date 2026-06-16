@extends('layouts.main')

@section('content')
    <!-- BANNER -->
    <section class="collection-banner text-center">
        <h2>About Us</h2>
        <p>Home / About Us</p>
    </section>
    <!-- ABOUT -->




    <!-- ABOUT US -->
    <section class="py-5" style="background:#fbf5ec;">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-lg-4 col-md-5 col-12">
                    <img src="{{ asset('assets/images/logo.webp') }}" class="img-fluid w-100" alt="About Us">
                </div>

                <div class="col-lg-8 col-md-7 col-12">
                    <h2 class="mb-4">About Us</h2>

                    <p>Skincare Factory was created to support both estheticians and skincare clients through professional
                        products, education, and community.</p>

                    <p>Founded by licensed esthetician and educator Erin Nesbit, Skincare Factory is a professional skincare
                        retail store and advanced education hub located in Tempe, Arizona.</p>

                    <p>Our mission is simple: to create a place where estheticians can access the products, tools, and
                        education they need to build successful businesses — and where skincare clients can purchase the
                        same professional products their estheticians trust and recommend.</p>

                    <p>At Skincare Factory, licensed estheticians can shop professional skincare brands, treatment supplies,
                        tools, and equipment all in one place. Whether opening a new treatment room, restocking inventory,
                        or looking for advanced devices, estheticians can rely on Skincare Factory as a trusted resource for
                        their businesses.</p>

                    <p>We also offer advanced training and certification courses designed to help estheticians expand their
                        skills and stay at the forefront of the industry.</p>

                    <p>For skincare clients, Skincare Factory provides access to professional-grade skincare products
                        typically recommended during treatments. Many estheticians send their clients here to purchase the
                        products they recommend, ensuring clients receive authentic professional skincare that supports
                        their treatment results.</p>

                    <p>More than just a store, Skincare Factory is a professional skincare hub where estheticians shop,
                        train, and grow — and where clients can confidently shop the products their skin professionals
                        trust.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- WHY SKINCARE FACTORY -->
    <section class="py-5" style="background:#fbf5ec;">
        <div class="container">

            <div class="row align-items-center g-4">

                <div class="col-lg-6 col-12 order-2 order-lg-1">

                    <h2 class="mb-4 text-uppercase">
                        WHY SKINCARE FACTORY?
                    </h2>

                    <p>At Skincare Factory, we believe skincare goes far beyond a treatment room appointment. Healthy skin
                        is built through consistency, education, and the right products used both during treatments and at
                        home.</p>

                    <p>Many clients rely on their esthetician to recommend professional skincare products tailored to their
                        unique skin concerns and goals. Skincare Factory was created to make those trusted recommendations
                        more accessible — while also giving estheticians a place to shop, learn, and grow their businesses.
                    </p>

                    <p>Unlike traditional beauty retail stores, Skincare Factory is an esthetician-led skincare hub that
                        connects professional skincare, education, and retail all in one place. Estheticians can access
                        professional brands, treatment room supplies, tools, and advanced education without being limited to
                        a single skincare line or large buy-ins.</p>

                    <p>At the same time, skincare clients can shop professional-grade products with confidence, knowing they
                        are purchasing trusted products recommended by skin professionals.</p>

                    <p>Whether you’re an esthetian building your business or someone searching for better skin, Skincare
                        Factory was designed to support your journey through education, access, and expert guidance.</p>

                    <p class="fw-bold mt-4">
                        🔑 The Key to Skincare. Unlocking Esthetics.
                    </p>

                </div>

                <div class="col-lg-6 col-12 order-1 order-lg-2">
                    <img src="{{ asset('assets/images/about-us-img.webp') }}" class="img-fluid w-100"
                        alt="Why Skincare Factory">
                </div>

            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="py-5" style="background:#fbf5ec;">
        <div class="container">

            <div class="row g-4">

                <div class="col-lg-8 col-12">

                    <h2 class="mb-4">Get in touch</h2>

                    <form>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Phone number">
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="Comment"></textarea>
                        </div>

                        <button class="btn btn-dark px-5 py-3">
                            SEND MESSAGE
                        </button>

                    </form>

                </div>

                <div class="col-lg-4 col-12">

                    <h5 class="mb-3">Customer Service</h5>
                    <p>info@skincarefactory.com</p>

                    <div class="mt-5">
                        <h5 class="mb-3">Follow us</h5>

                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="mx-3"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="mx-3"><i class="fab fa-instagram"></i></a>
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

        section {
            background: #fbf5ec;
        }

        .about-area p,
        .page-content p {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
        }

        .page-content h2 {
            font-size: 42px;
            font-weight: 600;
            color: #111;
        }

        .page-content img {
            border-radius: 4px;
        }

        .form-control {
            border-radius: 0;
            padding: 14px;
            min-height: 50px;
        }

        textarea.form-control {
            min-height: 140px;
        }

        .btn-dark {
            background: #c89b7b;
            border-color: #c89b7b;
            border-radius: 0;
            letter-spacing: 1px;
        }

        .btn-dark:hover {
            background: #b58462;
            border-color: #b58462;
        }

        .social-links a {
            color: #222;
            font-size: 22px;
            text-decoration: none;
        }

        @media (max-width: 991px) {

            .page-content h2 {
                font-size: 32px;
            }

            .page-content img {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection
