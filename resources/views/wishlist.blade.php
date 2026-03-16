@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>WISHLIST</h2>
        <p>Home / WISHLIST</p>
    </section>

    <main class="page-content">

        <div class="wishlist-page-area section-padding-lg" style="background: #fbf5ec">
            <div class="container">

                <h4 class="wishlist-title">Your Wishlist ({{ $wishlistCount }})</h4>

                @if ($wishlistCount > 0)
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>IMAGE</th>
                                    <th>PRODUCT</th>
                                    <th>PRICE</th>
                                    <th>ADD TO CART</th>
                                    <th>REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlistItems as $item)
                                    <tr id="wishlist-row-{{ $item->product_id }}">
                                        <td>
                                            {{-- <a href="{{ route('productDetails', $item->product->id) }}"> --}}
                                                <img src="{{ asset('storage/' . $item->product->mainImage->url) }}"
                                                    alt="{{ $item->product->name }}" style="width:80px;">
                                            {{-- </a> --}}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('productDetails', $item->product->id) }}"> --}}
                                                {{ $item->product->name }}
                                            {{-- </a> --}}
                                        </td>
                                        <td>${{ number_format($item->product->firstVariant->price ?? 0, 2) }}</td>
                                        <td>
                                            <button class="btn btn-dark quick-view-btn"
                                                data-product-id="{{ $item->product_id }}">
                                                Add to Cart
                                            </button>
                                        </td>
                                        <td>
                                            <button class="remove-wishlist-btn btn btn-danger"
                                                data-product-id="{{ $item->product_id }}">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Your wishlist is empty.</p>
                @endif

            </div>
        </div>

    </main>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        table.table.table-bordered.table-hover {
            --bs-table-bg: #fbf5ec;
        }

        td a {
            text-decoration: none;
            color: black;
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
