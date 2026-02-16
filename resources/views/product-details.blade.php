@extends('layouts.main')
@section('content')
<!-- ================= Product Details Section ================= -->
<section class="product-details" style="padding:80px 0;">
  <div class="container" style="display:flex; flex-wrap:wrap; gap:50px;">

    <!-- ===== Left: Product Image Gallery ===== -->
    <div class="product-gallery" style="flex:1; min-width:350px;">
  <!-- Main Image -->
  <div class="main-image" style="border:1px solid #eee; border-radius:12px; padding:15px; text-align:center;">
    <img id="mainProductImage" src="{{ asset('assets/images/mint.jpg') }}" alt="Product Image" style="width:100%; max-height:450px; object-fit:contain; border-radius:12px;">
  </div>

  <!-- Thumbnails Slider -->
  <div class="thumbs" style="display:flex; gap:10px; margin-top:15px; overflow-x:auto;">
    <img src="{{ asset('assets/images/basil.jpg') }}" alt="thumb1" class="thumb active" style="width:80px; height:80px; object-fit:cover; border-radius:10px; border:2px solid #3cb815; cursor:pointer;">
    <img src="{{ asset('assets/images/redish.jpg') }}" alt="thumb2" class="thumb" style="width:80px; height:80px; object-fit:cover; border-radius:10px; border:2px solid transparent; cursor:pointer;">
    <img src="{{ asset('assets/images/avacado.jpg') }}" alt="thumb3" class="thumb" style="width:80px; height:80px; object-fit:cover; border-radius:10px; border:2px solid transparent; cursor:pointer;">
    <img src="{{ asset('assets/images/spring.jpg') }}" alt="thumb4" class="thumb" style="width:80px; height:80px; object-fit:cover; border-radius:10px; border:2px solid transparent; cursor:pointer;">
  </div>
</div>


    <!-- ===== Right: Product Info ===== -->
    <div class="product-info" style="flex:1; min-width:350px;">
      <h2 style="font-size:32px; font-weight:700;">Fresh Red Apples</h2>
      <p style="color:#666; margin:10px 0 20px;">Crisp, sweet, and freshly picked apples for your everyday nutrition. Perfect for juices, snacks, or desserts.</p>

      <h3 style="font-size:28px; font-weight:700; color:#3cb815;">$12.00</h3>

      <div class="rating" style="margin:10px 0;">
        ⭐⭐⭐⭐☆ <span style="color:#888; font-size:14px;">(23 Reviews)</span>
      </div>

      <div class="quantity" style="display:flex; align-items:center; margin:25px 0;">
        <label for="qty" style="margin-right:10px; font-weight:600;">Quantity:</label>
        <div style="display:flex; align-items:center; gap:10px;">
          <button class="qty-btn" onclick="changeQty(-1)" style="width:35px; height:35px; border:none; background:#f1f1f1; border-radius:6px;">-</button>
          <input type="text" id="qty" value="1" style="width:50px; text-align:center; border:1px solid #ccc; border-radius:6px; padding:5px;">
          <button class="qty-btn" onclick="changeQty(1)" style="width:35px; height:35px; border:none; background:#f1f1f1; border-radius:6px;">+</button>
        </div>
      </div>

      <button class="btn btn-success" style="padding:12px 30px; border-radius:10px; font-size:16px;">Add to Cart</button>

      <div class="product-meta" style="margin-top:25px; font-size:14px; color:#555;">
        <p><strong>Category:</strong> Fruits</p>
        <p><strong>Tags:</strong> Organic, Fresh, Healthy</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= Related Products ================= -->
<section class="related-products" style="padding:60px 0; background:#f9f9f9;">
  <div class="container">
    <h2 style="font-size:28px; font-weight:700; margin-bottom:30px;">You May Also Like</h2>
    <div class="row" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:25px;">
      
      <div class="product-card" style="background:#fff; border:1px solid #eee; border-radius:12px; padding:15px; text-align:center;">
        <img src="{{ asset('assets/images/evian.jpg') }}" alt="Orange Juice" style="width:100%; height:200px; object-fit:contain;">
        <h3 style="font-size:18px; margin-top:10px;">Organic Orange Juice</h3>
        <span style="color:#3cb815; font-weight:700;">$8.00</span>
      </div>

      <div class="product-card" style="background:#fff; border:1px solid #eee; border-radius:12px; padding:15px; text-align:center;">
        <img src="{{ asset('assets/images/grapes.jpg') }}" alt="Banana" style="width:100%; height:200px; object-fit:contain;">
        <h3 style="font-size:18px; margin-top:10px;">Bananas</h3>
        <span style="color:#3cb815; font-weight:700;">$5.00</span>
      </div>

      <div class="product-card" style="background:#fff; border:1px solid #eee; border-radius:12px; padding:15px; text-align:center;">
        <img src="{{ asset('assets/images/oister.jpg') }}" alt="Avocado" style="width:100%; height:200px; object-fit:contain;">
        <h3 style="font-size:18px; margin-top:10px;">Avocado</h3>
        <span style="color:#3cb815; font-weight:700;">$10.00</span>
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
    <script>
// ===== Thumbnail Click Event =====
const thumbs = document.querySelectorAll('.thumb');
const mainImage = document.getElementById('mainProductImage');

thumbs.forEach(thumb => {
  thumb.addEventListener('click', function() {
    thumbs.forEach(t => t.style.borderColor = 'transparent');
    this.style.borderColor = '#3cb815';
    mainImage.src = this.src;
  });
});

// ===== Quantity Buttons =====
function changeQty(val) {
  const qtyInput = document.getElementById('qty');
  let current = parseInt(qtyInput.value);
  current = isNaN(current) ? 1 : current;
  current += val;
  if (current < 1) current = 1;
  qtyInput.value = current;
}
</script>
@endsection