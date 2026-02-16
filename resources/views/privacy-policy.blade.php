@extends('layouts.main')
@section('content')
<!-- ================= Privacy Policy Banner ================= -->
<section class="privacy-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Privacy Policy</h1>
        <p style="font-size:18px; margin-top:10px;">Your privacy is important to us. Learn how we collect and use your information.</p>
    </div>
</section>

<!-- ================= Privacy Policy Content ================= -->
<section class="privacy-content" style="padding:80px 0;">
    <div class="container" style="max-width:900px; margin:0 auto; color:#555; font-size:16px; line-height:1.8;">
        <h2 style="font-size:32px; font-weight:700; margin-bottom:20px;">Introduction</h2>
        <p>
            At Christelle Grocery Store, we value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your data.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Information We Collect</h3>
        <ul style="margin-left:20px;">
            <li>Personal information such as name, email address, phone number, and shipping address.</li>
            <li>Account login information and order history.</li>
            <li>Payment information (securely processed by our payment providers).</li>
            <li>Cookies and usage data to improve our website experience.</li>
        </ul>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">How We Use Your Information</h3>
        <ul style="margin-left:20px;">
            <li>To process orders and deliver products to you.</li>
            <li>To communicate with you about your orders, promotions, and updates.</li>
            <li>To improve our website, services, and customer experience.</li>
            <li>To ensure security and prevent fraud or unauthorized activity.</li>
        </ul>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Sharing Your Information</h3>
        <p>
            We do not sell, trade, or rent your personal information to third parties. We may share your information with trusted service providers to process payments, deliver orders, or provide customer support.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Data Security</h3>
        <p>
            We implement appropriate security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Cookies</h3>
        <p>
            Our website uses cookies to enhance your browsing experience, analyze site traffic, and personalize content. You can choose to disable cookies in your browser settings, but some features may not function properly.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Your Rights</h3>
        <p>
            You have the right to access, update, or request the deletion of your personal information. To exercise these rights, please <a href="contact-us.php" style="color:#3cb815; text-decoration:none;">contact us</a>.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Changes to This Policy</h3>
        <p>
            We may update this Privacy Policy from time to time. Any changes will be posted on this page with the updated date.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Contact Us</h3>
        <p>
            For any questions about this Privacy Policy or how your information is used, please <a href="contact-us.php" style="color:#3cb815; text-decoration:none;">contact us</a>.
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