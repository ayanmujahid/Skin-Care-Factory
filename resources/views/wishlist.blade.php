@extends('layouts.main')
@section('content')
<!-- ================= Wishlist Banner ================= -->
<section class="wishlist-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Your Wishlist</h1>
        <p style="font-size:18px; margin-top:10px;">Save your favorite products to buy later.</p>
    </div>
</section>

<!-- ================= Wishlist Content ================= -->
<section class="wishlist-content" style="padding:80px 0;">
    <div class="container" style="display:flex; flex-wrap:wrap; gap:30px;">

        <!-- Example Wishlist Product -->
        <div class="wishlist-item" style="flex:1 1 calc(33.333% - 20px); background:#fff; border:1px solid #eee; border-radius:12px; overflow:hidden; text-align:center; padding:20px;">
            <img src="{{asset('assets/images/grapes.jpg')}}" alt="Product" style="width:100%; border-radius:12px;">
            <h4 style="margin:15px 0 5px; font-weight:600;">Organic grapes</h4>
            <p style="color:#3cb815; font-weight:600;">$5.00</p>
            <div style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <a href="#" style="background:#3cb815; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">Add to Cart</a>
                <a href="#" style="background:#007bff; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">See Details</a>
                <a href="#" style="background:#dc3545; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">Remove</a>
            </div>
        </div>

        <div class="wishlist-item" style="flex:1 1 calc(33.333% - 20px); background:#fff; border:1px solid #eee; border-radius:12px; overflow:hidden; text-align:center; padding:20px;">
            <img src="{{asset('assets/images/redish.jpg')}}" alt="Product" style="width:100%; border-radius:12px;">
            <h4 style="margin:15px 0 5px; font-weight:600;">Organic Radish</h4>
            <p style="color:#3cb815; font-weight:600;">$6.00</p>
            <div style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <a href="#" style="background:#3cb815; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">Add to Cart</a>
                <a href="#" style="background:#007bff; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">See Details</a>
                <a href="#" style="background:#dc3545; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">Remove</a>
            </div>
        </div>

        <div class="wishlist-item" style="flex:1 1 calc(33.333% - 20px); background:#fff; border:1px solid #eee; border-radius:12px; overflow:hidden; text-align:center; padding:20px;">
            <img src="{{asset('assets/images/carot.jpg')}}" alt="Product" style="width:100%; border-radius:12px;">
            <h4 style="margin:15px 0 5px; font-weight:600;">Organic Carrots</h4>
            <p style="color:#3cb815; font-weight:600;">$4.00</p>
            <div style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <a href="#" style="background:#3cb815; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">Add to Cart</a>
                <a href="#" style="background:#007bff; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">See Details</a>
                <a href="#" style="background:#dc3545; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; font-size:14px;">Remove</a>
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