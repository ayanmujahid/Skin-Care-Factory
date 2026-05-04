@extends('layouts.main')

@section('content')
    <section class="collection-banner text-center">
        <h2>SHARED CART</h2>
        <p>Home / Shared Cart</p>
    </section>

    <section class="cart-section">
        <div class="cart-container">

            <!-- LEFT -->
            <div class="cart-products">
                <h2>Products</h2>

                @foreach ($cart as $item)
                    <div class="cart-item">
                        <img src="{{ $item['image'] }}" width="60">

                        <div>
                            <strong>{{ $item['name'] }}</strong><br>
                            <small>{{ $item['color'] }} {{ $item['size'] }}</small><br>
                            Qty: {{ $item['quantity'] }}<br>
                            ${{ number_format($item['price'], 2) }}
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- RIGHT -->
            <div class="order-summary">

                <h2>Order Summary</h2>

                <p>Subtotal: ${{ number_format($subtotal, 2) }}</p>

                <p>Discount ({{ $cartModel->discount_percent }}%):
                    - ${{ number_format($discount, 2) }}
                </p>

                <h3>Total: ${{ number_format($total, 2) }}</h3>

                <p class="shipping-text">
                    Shipping, taxes, and discounts will be calculated at checkout.
                </p>

                @if ($cartModel->status === 'used')
                    <button disabled>Already Purchased</button>
                @else
                    <a href="{{ route('share.checkout', $cartModel->token) }}" class="checkout-btn">
                        Checkout
                    </a>
                @endif

            </div>

        </div>
    </section>
@endsection
