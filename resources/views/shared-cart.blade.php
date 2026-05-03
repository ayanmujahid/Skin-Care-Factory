@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>YOUR SHOPPING CART</h2>
        <p>Home / Shampoo</p>
    </section>

    <section class="cart-section">
        <div class="cart-container">

            <!-- LEFT SIDE - PRODUCTS -->


            <!-- Product 1 -->
            <div class="cart-products">

                <h2>Products</h2>

                <div id="cart-page-items"></div>

            </div>

            <!-- Product 2 -->




            <!-- RIGHT SIDE - ORDER SUMMARY -->
            <div class="order-summary">

                <h2>Order Summary</h2>

                <p class="subtotal">Subtotal : $<span id="summary-subtotal">0</span></p>
                <p class="saving">You're saving : $<span id="summary-saving">0</span></p>

                <button class="note-btn">Add a note to your order</button>

                <p class="shipping-text">
                    Shipping, taxes, and discounts will be calculated at checkout.
                </p>

                <button class="checkout-btn">Checkout</button>

                <button class="shipping-btn">
                    Get shipping estimates ▼
                </button>

                <input type="text" placeholder="Enter Discount Code" class="discount-input">
                <button class="apply-btn">Apply</button>

            </div>

        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script></script>
    <script>
    window.CART_MODE = "shared";
</script>
@endsection
