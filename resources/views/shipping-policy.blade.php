@extends('layouts.main')
@section('content')
<!-- ================= Shipping Policy Banner ================= -->
<section class="shipping-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Shipping Policy</h1>
        <p style="font-size:18px; margin-top:10px;">Learn about our delivery process and shipping options.</p>
    </div>
</section>

<!-- ================= Shipping Policy Content ================= -->
<section class="shipping-content" style="padding:80px 0;">
    <div class="container" style="max-width:900px; margin:0 auto; color:#555; font-size:16px; line-height:1.8;">
        <h2 style="font-size:32px; font-weight:700; margin-bottom:20px;">Delivery Information</h2>
        <p>
            At Christelle Grocery Store, we are committed to delivering fresh, high-quality groceries right to your doorstep. We work with trusted delivery partners to ensure your orders arrive safely and on time.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Shipping Options & Costs</h3>
        <ul style="margin-left:20px;">
            <li>Standard Shipping: $5.00 — Delivered within 3-5 business days.</li>
            <li>Express Shipping: $10.00 — Delivered within 1-2 business days.</li>
            <li>Free Shipping: Available for orders over $50.00 (Standard Shipping only).</li>
        </ul>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Order Processing</h3>
        <p>
            Orders are processed within 1-2 business days after confirmation. You will receive an email notification once your order has been shipped, including tracking details if available.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Shipping Restrictions</h3>
        <p>
            We currently ship within the United States only. Certain remote areas may require additional delivery time. Customers are responsible for providing accurate shipping information to avoid delays.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Damaged or Lost Items</h3>
        <p>
            If your order arrives damaged or is lost during shipping, please contact our customer service team within 48 hours of receiving your package. We will work with you to resolve the issue promptly, including replacement or refund where applicable.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Contact Us</h3>
        <p>
            For any questions about your order or our shipping policy, please <a href="contact-us.php" style="color:#3cb815; text-decoration:none;">contact us</a>. We’re happy to assist you!
        </p>
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