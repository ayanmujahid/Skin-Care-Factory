@extends('layouts.main')
@section('content')
<!-- ================= Cart Banner ================= -->
<section class="cart-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Your Shopping Cart</h1>
        <p style="font-size:18px; margin-top:10px;">Review your items before proceeding to checkout.</p>
    </div>
</section>

<!-- ================= Cart Content ================= -->
<section class="cart-content" style="padding:80px 0;">
    <div class="container" style="display:flex; flex-wrap:wrap; gap:50px;">
        
        <!-- Left Side: Cart Table -->
        <div class="cart-table" style="flex:2; min-width:300px;">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8f9f8; text-align:left;">
                        <th style="padding:15px; font-size:16px;">Product</th>
                        <th style="padding:15px; font-size:16px;">Price</th>
                        <th style="padding:15px; font-size:16px;">Quantity</th>
                        <th style="padding:15px; font-size:16px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Product Row -->
                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:15px; vertical-align:top;">
                            <div style="display:flex; gap:15px; align-items:center;">
                                <img src="{{asset('assets/images/grapes.jpg')}}" alt="Product" style="width:80px; border-radius:8px;">
                                <div>
                                    <p style="margin:0; font-weight:600;">Organic grapes</p>
                                    <a href="#" style="color:red; font-size:14px; text-decoration:none;">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td style="padding:15px; vertical-align:top;">$5.00</td>
                        <td style="padding:15px; vertical-align:top;">
                            <input type="number" value="1" min="1" style="width:60px; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td style="padding:15px; vertical-align:top;">$5.00</td>
                    </tr>

                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:15px; vertical-align:top;">
                            <div style="display:flex; gap:15px; align-items:center;">
                                <img src="{{asset('assets/images/redish.jpg')}}" alt="Product" style="width:80px; border-radius:8px;">
                                <div>
                                    <p style="margin:0; font-weight:600;">Organic Radish</p>
                                    <a href="#" style="color:red; font-size:14px; text-decoration:none;">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td style="padding:15px; vertical-align:top;">$3.00</td>
                        <td style="padding:15px; vertical-align:top;">
                            <input type="number" value="2" min="1" style="width:60px; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td style="padding:15px; vertical-align:top;">$6.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Right Side: Summary Box -->
        <div class="cart-summary" style="flex:1; min-width:300px;">
            <div style="background:#f8f9f8; padding:30px; border-radius:12px; border:1px solid #eee;">
                <h3 style="font-size:24px; font-weight:700; margin-bottom:20px;">Order Summary</h3>
                <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                    <span>Subtotal</span>
                    <span>$11.00</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                    <span>Shipping</span>
                    <span>$2.00</span>
                </div>
                <hr style="margin:15px 0;">
                <div style="display:flex; justify-content:space-between; font-weight:700; font-size:18px; margin-bottom:20px;">
                    <span>Total</span>
                    <span>$13.00</span>
                </div>
                <a href="{{route('checkout')}}" style="display:block; text-align:center; background:#3cb815; color:#fff; padding:12px 0; border-radius:8px; text-decoration:none; font-weight:600;">Proceed to Checkout</a>
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