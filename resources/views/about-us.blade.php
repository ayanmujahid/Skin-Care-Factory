@extends('layouts.main')
@section('content')
<!-- ================= About Banner ================= -->
<section class="about-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">About Christelle Grocery Store</h1>
        <p style="font-size:18px; margin-top:10px;">Your trusted partner for fresh, organic, and sustainable groceries.</p>
    </div>
</section>

<!-- ================= About Content ================= -->
<section class="about-content" style="padding:80px 0;">
    <div class="container" style="display:flex; flex-wrap:wrap; align-items:center; gap:50px;">
        <div class="about-image" style="flex:1; min-width:300px;">
            <img src="images/about-store.jpg" alt="About Christelle" style="width:100%; border-radius:15px;">
        </div>
        <div class="about-text" style="flex:1; min-width:300px;">
            <h2 style="font-size:32px; font-weight:700; margin-bottom:20px;">Who We Are</h2>
            <p style="color:#555; font-size:16px; line-height:1.8;">
                Christelle Grocery Store is dedicated to delivering farm-fresh, organic, and high-quality grocery items right to your doorstep. 
                Our mission is simple — to make healthy living accessible and affordable for every household.
            </p>
            <p style="color:#555; font-size:16px; line-height:1.8;">
                With years of experience and partnerships with local farmers, we ensure every product you receive is handled with care, ethically sourced, and environmentally friendly.
            </p>
            <button class="btn btn-success" style="margin-top:20px; padding:12px 30px; border-radius:8px;">Shop Now</button>
        </div>
    </div>
</section>

<!-- ================= Mission & Values ================= -->
<section class="about-values" style="padding:80px 0; background:#f8f9f8;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:32px; font-weight:700;">Our Mission & Values</h2>
            <p style="color:#666; max-width:700px; margin:10px auto;">
                We believe that everyone deserves access to healthy, natural, and sustainable food options.
            </p>
        </div>

        <div class="row" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:30px;">
            <div style="background:#fff; border-radius:12px; padding:30px; text-align:center; border:1px solid #eee;">
                <img src="images/mission-icon.png" alt="Mission" style="width:60px; margin-bottom:15px;">
                <h4 style="font-size:20px; font-weight:600;">Our Mission</h4>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    To empower communities with fresh and organic food that promotes wellness and sustainability.
                </p>
            </div>

            <div style="background:#fff; border-radius:12px; padding:30px; text-align:center; border:1px solid #eee;">
                <img src="images/value-icon.png" alt="Values" style="width:60px; margin-bottom:15px;">
                <h4 style="font-size:20px; font-weight:600;">Our Values</h4>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    Integrity, sustainability, and community — we grow together by doing what’s right.
                </p>
            </div>

            <div style="background:#fff; border-radius:12px; padding:30px; text-align:center; border:1px solid #eee;">
                <img src="images/quality-icon.png" alt="Quality" style="width:60px; margin-bottom:15px;">
                <h4 style="font-size:20px; font-weight:600;">Quality Commitment</h4>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    We handpick only the best organic and natural products to ensure freshness and taste in every order.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= Team Section ================= -->
<section class="about-team" style="padding:80px 0;">
    <div class="container" style="text-align:center;">
        <h2 style="font-size:32px; font-weight:700;">Meet Our Team</h2>
        <p style="color:#666; max-width:700px; margin:10px auto 50px;">
            Our passionate team works every day to make Christelle Grocery Store a symbol of trust and freshness.
        </p>

        <div class="team-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:30px;">
            <div style="background:#fff; border:1px solid #eee; border-radius:12px; padding:30px;">
                <img src="images/team1.jpg" alt="Team Member" style="width:100%; border-radius:12px;">
                <h4 style="margin-top:15px; font-weight:600;">John Doe</h4>
                <p style="color:#3cb815;">Founder & CEO</p>
            </div>

            <div style="background:#fff; border:1px solid #eee; border-radius:12px; padding:30px;">
                <img src="images/team2.jpg" alt="Team Member" style="width:100%; border-radius:12px;">
                <h4 style="margin-top:15px; font-weight:600;">Sarah Smith</h4>
                <p style="color:#3cb815;">Head of Operations</p>
            </div>

            <div style="background:#fff; border:1px solid #eee; border-radius:12px; padding:30px;">
                <img src="images/team3.jpg" alt="Team Member" style="width:100%; border-radius:12px;">
                <h4 style="margin-top:15px; font-weight:600;">Michael Brown</h4>
                <p style="color:#3cb815;">Quality Manager</p>
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