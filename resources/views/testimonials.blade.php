@extends('layouts.main')
@section('content')
<!-- ================= Testimonials Banner ================= -->
<section class="testimonials-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">What Our Customers Say</h1>
        <p style="font-size:18px; margin-top:10px;">Hear from our happy customers who love our fresh groceries.</p>
    </div>
</section>

<!-- ================= Testimonials Content ================= -->
<section class="testimonials-content" style="padding:80px 0; background:#f8f9f8;">
    <div class="container" style="max-width:1200px; margin:0 auto; text-align:center;">
        <h2 style="font-size:32px; font-weight:700; margin-bottom:50px;">Customer Reviews</h2>

        <div class="testimonials-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:30px;">

            <!-- Testimonial 1 -->
            <div style="background:#fff; border-radius:12px; padding:30px; border:1px solid #eee; text-align:center;">
                <img src="images/customer1.jpg" alt="Customer" style="width:80px; height:80px; border-radius:50%; object-fit:cover; margin-bottom:15px;">
                <h4 style="margin:10px 0; font-weight:600;">Jane Doe</h4>
                <p style="color:#3cb815; font-weight:600; margin-bottom:10px;">Verified Buyer</p>
                <p style="color:#555; font-size:16px; line-height:1.6;">
                    "Christelle Grocery Store has made healthy eating so easy and affordable! The produce is always fresh and the service is amazing."
                </p>
            </div>

            <!-- Testimonial 2 -->
            <div style="background:#fff; border-radius:12px; padding:30px; border:1px solid #eee; text-align:center;">
                <img src="images/customer2.jpg" alt="Customer" style="width:80px; height:80px; border-radius:50%; object-fit:cover; margin-bottom:15px;">
                <h4 style="margin:10px 0; font-weight:600;">Michael Smith</h4>
                <p style="color:#3cb815; font-weight:600; margin-bottom:10px;">Verified Buyer</p>
                <p style="color:#555; font-size:16px; line-height:1.6;">
                    "Amazing selection of organic groceries. Delivery was quick, and everything arrived perfectly fresh. Highly recommend!"
                </p>
            </div>

            <!-- Testimonial 3 -->
            <div style="background:#fff; border-radius:12px; padding:30px; border:1px solid #eee; text-align:center;">
                <img src="images/customer3.jpg" alt="Customer" style="width:80px; height:80px; border-radius:50%; object-fit:cover; margin-bottom:15px;">
                <h4 style="margin:10px 0; font-weight:600;">Sarah Johnson</h4>
                <p style="color:#3cb815; font-weight:600; margin-bottom:10px;">Verified Buyer</p>
                <p style="color:#555; font-size:16px; line-height:1.6;">
                    "I love ordering from Christelle Grocery Store! The quality of the fruits and veggies is unbeatable, and customer service is fantastic."
                </p>
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