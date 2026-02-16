@extends('layouts.main')
@section('content')
<!-- ================= Checkout Banner ================= -->
<section class="checkout-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Checkout</h1>
        <p style="font-size:18px; margin-top:10px;">Fill in your details and place your order.</p>
    </div>
</section>

<!-- ================= Checkout Content ================= -->
<section class="checkout-content" style="padding:80px 0;">
    <div class="container" style="display:flex; flex-wrap:wrap; gap:50px;">

        <!-- Left Side: Billing Form -->
        <div class="checkout-form" style="flex:2; min-width:300px;">
            <h2 style="font-size:32px; font-weight:700; margin-bottom:30px;">Billing Details</h2>
            <form action="place-order.php" method="POST" style="display:flex; flex-direction:column; gap:15px;">
                <input type="text" name="first_name" placeholder="First Name" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="last_name" placeholder="Last Name" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="email" name="email" placeholder="Email Address" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="phone" placeholder="Phone Number" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="country" placeholder="Country" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="state" placeholder="State" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="address" placeholder="Address" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="city" placeholder="City" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="zip" placeholder="Zip Code" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
            </form>
        </div>

        <!-- Right Side: Order Summary -->
        <div class="order-summary" style="flex:1; min-width:300px;">
            <div style="background:#f8f9f8; padding:30px; border-radius:12px; border:1px solid #eee;">
                <h3 style="font-size:24px; font-weight:700; margin-bottom:20px;">Your Order</h3>
                
                <!-- Example Product 1 -->
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                    <div style="display:flex; gap:15px; align-items:center;">
                        <img src="{{asset('assets/images/redish.jpg')}}" alt="Product" style="width:60px; border-radius:8px;">
                        <span style="font-weight:600;">Organic Radish</span>
                    </div>
                    <span>$5.00</span>
                </div>

                <!-- Example Product 2 -->
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                    <div style="display:flex; gap:15px; align-items:center;">
                        <img src="{{asset('assets/images/grapes.jpg')}}" alt="Product" style="width:60px; border-radius:8px;">
                        <span style="font-weight:600;">Organic grapes</span>
                    </div>
                    <span>$6.00</span>
                </div>

                <hr style="margin:15px 0;">

                <!-- Total -->
                <div style="display:flex; justify-content:space-between; font-weight:700; font-size:18px; margin-bottom:20px;">
                    <span>Total</span>
                    <span>$11.00</span>
                </div>

                <!-- Place Order Button -->
                <form action="place-order.php" method="POST">
                    <button type="submit" style="width:100%; background:#3cb815; color:#fff; padding:12px 0; border-radius:8px; font-weight:600; border:none;">Place Order</button>
                </form>
            </div>
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
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection