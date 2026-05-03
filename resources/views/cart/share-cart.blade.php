@extends('layouts.main')

@section('content')

<section class="collection-banner text-center">
    <h2>SHARED CART</h2>
    <p>Home / Shared Cart</p>
</section>

<section class="cart-section">
    <div class="cart-container">

        <!-- LEFT SIDE -->
        <div class="cart-products">
            <h2>Products</h2>

            @foreach($cart->items as $item)
                <div class="cart-item">
                    <p><strong>{{ $item->product->name }}</strong></p>
                    <p>Qty: {{ $item->quantity }}</p>
                    <p>Price: ${{ $item->product->price }}</p>
                </div>
            @endforeach

        </div>

        <!-- RIGHT SIDE -->
        <div class="order-summary">

            <h2>Order Summary</h2>

            <p>Subtotal : ${{ $subtotal }}</p>

            <p>Discount ({{ $cart->discount_percent }}%) :
                - ${{ $discountAmount }}
            </p>

            <p><strong>Total : ${{ $total }}</strong></p>

            <p class="shipping-text">
                Shipping, taxes, and discounts will be calculated at checkout.
            </p>

            <a href="{{ route('checkout') }}" class="checkout-btn">
                Checkout
            </a>

        </div>

    </div>
</section>

@endsection