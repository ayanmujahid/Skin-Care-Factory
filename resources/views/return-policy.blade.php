@extends('layouts.main')
@section('content')
<!-- ================= Return Policy Banner ================= -->
<section class="return-policy-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Return & Refund Policy</h1>
        <p style="font-size:18px; margin-top:10px;">Your satisfaction is our priority. Learn about returns and refunds.</p>
    </div>
</section>

<!-- ================= Return Policy Content ================= -->
<section class="return-policy-content" style="padding:80px 0;">
    <div class="container" style="max-width:900px; margin:0 auto; color:#555; font-size:16px; line-height:1.8;">
        <h2 style="font-size:32px; font-weight:700; margin-bottom:20px;">Returns & Refunds</h2>
        
        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Eligibility for Returns</h3>
        <p>
            We accept returns for items that are damaged, defective, or not as described. To be eligible for a return:
        </p>
        <ul style="margin-left:20px;">
            <li>Items must be returned within 7 days of delivery.</li>
            <li>Products must be in their original packaging and condition.</li>
            <li>Proof of purchase (receipt or order number) is required.</li>
        </ul>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Non-Returnable Items</h3>
        <p>
            Certain items cannot be returned due to hygiene or safety reasons, including:
        </p>
        <ul style="margin-left:20px;">
            <li>Perishable goods such as fruits, vegetables, and dairy products.</li>
            <li>Opened or used products.</li>
        </ul>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Return Process</h3>
        <p>
            To initiate a return, please contact our customer service team via <a href="contact-us.php" style="color:#3cb815; text-decoration:none;">contact page</a> with your order details. Our team will provide instructions for returning your item.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Refunds</h3>
        <p>
            Once we receive and inspect your returned item, we will notify you of the approval or rejection of your refund. Approved refunds will be processed to the original payment method within 5-7 business days.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Exchanges</h3>
        <p>
            If you wish to exchange an item for a different product, please contact our customer service team. Exchanges are subject to product availability.
        </p>

        <h3 style="font-size:24px; font-weight:600; margin-top:30px; margin-bottom:10px;">Contact Us</h3>
        <p>
            For questions regarding returns or refunds, please <a href="contact-us.php" style="color:#3cb815; text-decoration:none;">contact us</a>. We’re here to help ensure your satisfaction.
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