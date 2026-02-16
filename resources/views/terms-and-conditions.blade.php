@extends('layouts.main')
@section('content')
<!-- ================= Terms & Conditions Banner ================= -->
<section class="terms-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Terms & Conditions</h1>
        <p style="font-size:18px; margin-top:10px;">Please read these terms carefully before using our website.</p>
    </div>
</section>

<!-- ================= Terms & Conditions Content ================= -->
<section class="terms-content" style="padding:80px 0;">
    <div class="container" style="max-width:900px; margin:0 auto; color:#555; font-size:16px; line-height:1.8;">
        <h2 style="font-size:32px; font-weight:700; margin-bottom:20px;">Introduction</h2>
        <p>
            Welcome to Christelle Grocery Store. By accessing or using our website, you agree to comply with and be bound by the following terms and conditions. If you do not agree, please do not use our website.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Use of Website</h3>
        <p>
            You agree to use this website for lawful purposes only and in a manner that does not infringe the rights of, restrict, or inhibit anyone else's use and enjoyment of the site.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Product Information</h3>
        <p>
            We strive to provide accurate product descriptions, images, and pricing. However, we do not guarantee that all information is error-free. We reserve the right to correct errors or update information without prior notice.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Orders and Payment</h3>
        <ul style="margin-left:20px;">
            <li>All orders are subject to acceptance and availability.</li>
            <li>Payment must be made in full at the time of order through our secure payment system.</li>
            <li>We reserve the right to refuse or cancel any order for reasons including product unavailability, errors in pricing, or suspected fraudulent activity.</li>
        </ul>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Shipping & Delivery</h3>
        <p>
            Shipping will be carried out according to our <a href="shipping-policy.php" style="color:#3cb815; text-decoration:none;">Shipping Policy</a>. Delivery times are estimates and not guaranteed. Customers are responsible for providing accurate shipping information.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Returns & Refunds</h3>
        <p>
            Our <a href="return-policy.php" style="color:#3cb815; text-decoration:none;">Return & Refund Policy</a> outlines the procedures for returns, exchanges, and refunds. Please review it carefully before placing an order.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Intellectual Property</h3>
        <p>
            All content on this website, including text, images, logos, and graphics, is the property of Christelle Grocery Store or its licensors and is protected by copyright and other intellectual property laws. Unauthorized use is prohibited.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Limitation of Liability</h3>
        <p>
            Christelle Grocery Store shall not be liable for any indirect, incidental, or consequential damages arising from the use or inability to use our website, products, or services.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Governing Law</h3>
        <p>
            These terms and conditions are governed by and construed in accordance with the laws of the United States. Any disputes arising from these terms shall be subject to the exclusive jurisdiction of the courts of the United States.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Changes to Terms</h3>
        <p>
            We may update these terms and conditions from time to time. Any changes will be posted on this page with the updated date. Continued use of the website constitutes acceptance of the revised terms.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Contact Us</h3>
        <p>
            For any questions about these Terms & Conditions, please <a href="contact-us.php" style="color:#3cb815; text-decoration:none;">contact us</a>.
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