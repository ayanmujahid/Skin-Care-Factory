@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>CHECKOUT</h2>
        <p>Home / Shampoo</p>
    </section>


    <div class="amiy-checkout-wrapper">

        <div class="amiy-checkout-container">

            <!-- LEFT -->
            <div class="amiy-checkout-left">

                <form action="{{ route('place.order') }}" method="POST">
                    @csrf

                    <h2 class="amiy-section-title">Contact</h2>

                    <input class="amiy-checkout-input" type="email" name="email" placeholder="Email" required>

                    <label class="amiy-checkout-checkbox">
                        <input type="checkbox"> Email me with news and offers
                    </label>

                    <h2 class="amiy-section-title amiy-mt-30">Delivery</h2>

                    <select class="amiy-checkout-select" name="country">
                        <option>United States</option>
                        <option>Canada</option>
                        <option>UK</option>
                    </select>

                    <div class="amiy-checkout-row">
                        <input class="amiy-checkout-input" type="text" name="name" placeholder="Full Name">
                        <input class="amiy-checkout-input" type="text" name="phone" placeholder="Phone">
                    </div>

                    <input class="amiy-checkout-input" type="text" name="address" placeholder="Address">

                    <input class="amiy-checkout-input" type="text" name="apartment" placeholder="Apartment, suite, etc">

                    <div class="amiy-checkout-row">
                        <input class="amiy-checkout-input" type="text" name="city" placeholder="City">
                        <input class="amiy-checkout-input" type="text" name="state" placeholder="State">
                        <input class="amiy-checkout-input" type="text" name="zip" placeholder="ZIP code">
                    </div>

                    <label class="amiy-checkout-checkbox">
                        <input type="checkbox"> Save this information for next time
                    </label>

                    <h2 class="amiy-section-title amiy-mt-30">Shipping Method</h2>

                    <div class="amiy-shipping-box">
                        Enter your shipping address to view available shipping methods.
                    </div>

                    <h2 class="amiy-section-title amiy-mt-30">Payment</h2>

                    <div class="amiy-payment-box">

                        <label class="amiy-payment-option">
                            <input type="radio" name="payment_method" value="card" checked>
                            Credit Card
                        </label>

                        <div class="amiy-card-fields">
                            <input class="amiy-checkout-input" type="text" placeholder="Card number">

                            <div class="amiy-checkout-row">
                                <input class="amiy-checkout-input" type="text" placeholder="Expiration date (MM/YY)">
                                <input class="amiy-checkout-input" type="text" placeholder="Security code">
                            </div>

                            <input class="amiy-checkout-input" type="text" placeholder="Name on card">
                        </div>

                        <label class="amiy-payment-option">
                            <input type="radio" name="payment_method" value="cod">
                            Cash on Delivery
                        </label>

                    </div>

                    <button class="amiy-pay-btn">Pay now</button>

                </form>

            </div>


            <!-- RIGHT -->
            <div class="amiy-checkout-right">

                <div class="amiy-order-products">

                    @foreach ($cart as $item)
                        <div class="amiy-product-row">

                            <img src="{{ $item['image'] }}">

                            <div class="amiy-product-info">
                                <h4>{{ $item['name'] }}</h4>
                                <small>{{ $item['color'] }} / {{ $item['size'] }}</small>
                                <br>
                                <span>Qty: {{ $item['quantity'] }}</span>
                            </div>

                            <div class="amiy-product-price">
                                ${{ number_format($item['price'] * $item['quantity'], 2) }}
                            </div>

                        </div>
                    @endforeach

                </div>

                <div class="amiy-discount-box">
                    <input class="amiy-checkout-input" type="text" placeholder="Discount code">
                    <button class="amiy-pay-btn" style="width:auto;padding:10px 20px;">Apply</button>
                </div>

                <div class="amiy-summary">

                    <div class="amiy-summary-row">
                        <span>Subtotal</span>
                        <span>${{ number_format($cartTotal, 2) }}</span>
                    </div>

                    <div class="amiy-summary-row">
                        <span>Shipping</span>
                        <span>Calculated at next step</span>
                    </div>

                    <div class="amiy-summary-total">
                        <span>Total</span>
                        <span>${{ number_format($cartTotal, 2) }}</span>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection
