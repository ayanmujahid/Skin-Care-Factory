@extends('layouts.main')

@section('content')
    <section class="collection-banner text-center py-4">
        <h2>Blogs</h2>
        <p>Home / Blogs</p>
    </section>

    <section class="brands-section py-5">
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
@endsection

@section('css')
    <style type="text/css">
        .brands-section {
            background: #fbf5ec;
        }

        .brand-card {
            display: block;
            text-decoration: none;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            overflow: hidden;
            transition: 0.3s ease;
            background: #fbf5ec;
            height: 100%;
        }

        .brand-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .brand-image-wrapper {
            width: 100%;
            height: 250px;
            overflow: hidden;
            background: #f8f8f8;
        }

        .brand-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Keeps full image visible */
            padding: 20px;
        }

        .brand-title {
            text-align: center;
            padding: 15px 10px;
            font-size: 18px;
            font-weight: 600;
            color: #000;
        }
    </style>
@endsection

@section('js')
    <script></script>
@endsection
