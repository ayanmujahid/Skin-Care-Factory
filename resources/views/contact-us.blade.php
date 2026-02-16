@extends('layouts.main')
@section('content')
<!-- ================= Contact Banner ================= -->
<section class="contact-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Contact Christelle Grocery Store</h1>
        <p style="font-size:18px; margin-top:10px;">We’d love to hear from you! Reach out for inquiries or support.</p>
    </div>
</section>

<!-- ================= Contact Content ================= -->
<section class="contact-content" style="padding:80px 0;">
    <div class="container" style="display:flex; flex-wrap:wrap; gap:50px;">
        
        <!-- Contact Form -->
        <div class="contact-form" style="flex:1; min-width:300px;">
            <h2 style="font-size:32px; font-weight:700; margin-bottom:20px;">Get in Touch</h2>
            <form action="{{route('contactSubmit')}}" method="POST" style="display:flex; flex-direction:column; gap:20px;">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="email" name="email" placeholder="Your Email" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <input type="text" name="subject" placeholder="Subject" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
                <textarea name="message" placeholder="Your Message" rows="6" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;"></textarea>
                <button type="submit" class="btn btn-success" style="padding:12px 30px; border-radius:8px;">Send Message</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info" style="flex:1; min-width:300px;">
            <h2 style="font-size:32px; font-weight:700; margin-bottom:20px;">Contact Information</h2>
            <p style="color:#555; font-size:16px; line-height:1.8;">
                We'd love to answer any questions you have. You can reach us via phone, email, or visit our store.
            </p>
            <ul style="list-style:none; padding:0; margin-top:30px; color:#555; font-size:16px; line-height:2;">
                <li><strong>Address:</strong> 123 Fresh Market Road, City, State, ZIP</li>
                <li><strong>Phone:</strong> +1 234 567 890</li>
                <li><strong>Email:</strong> info@christellegrocery.com</li>
                <li><strong>Store Hours:</strong> Mon-Sat 8:00am - 8:00pm</li>
            </ul>
        </div>

    </div>
</section>

<!-- ================= Google Map ================= -->
<section class="contact-map" style="padding:0;">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.1234567890!2d-122.41941568468141!3d37.77492977975985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064b1234567%3A0xabcdef1234567890!2sChristelle%20Grocery%20Store!5e0!3m2!1sen!2sus!4v1699999999999" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
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