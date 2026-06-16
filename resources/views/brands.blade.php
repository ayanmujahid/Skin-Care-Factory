@extends('layouts.main')

@section('content')
    <section class="collection-banner text-center py-4">
        <h2>BRANDS</h2>
        <p>Home / Brands</p>
    </section>

    <section class="brands-section py-5">
        <div class="container">
            <div class="row">

                {{-- Brand Item --}}
                @foreach ($brands as $brand)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="{{ route('shop', ['brand' => $brand->slug]) }}" class="brand-card">

                            <div class="brand-image-wrapper">
                                <img src="{{ asset('storage/' . $brand->file->url) }}" alt="{{ $brand->name }}"
                                    class="img-fluid brand-image">
                            </div>

                            <div class="brand-title">
                                {{ $brand->name }}
                            </div>

                        </a>
                    </div>
                @endforeach

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
