@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>PRODUCT DETAILS</h2>
        <p>Home / Shampoo</p>
    </section>

    <section class="product-view">
        <div class="container-fluid">
            <div class="row">

                <!-- LEFT : FEATURED PRODUCTS -->
                <div class="col-lg-3 ps-5">
                    <h6 class="featured-title">Gallery</h6>

                    @forelse($product->gallery as $image)
                        <div class="featured-item">
                            <img src="{{ asset('storage/' . $image->url) }}" alt="Product Image" class="gallery-img"
                                style="cursor:pointer;">
                        </div>
                    @empty
                        <p>No gallery images available</p>
                    @endforelse
                </div>

                <!-- CENTER : MAIN IMAGE -->
                <div class="col-lg-4 text-center">
                    <div class="main-product-box sticky-image">
                        <img id="mainProductImage" src="{{ asset('storage/' . $product->mainImage->url) }}" alt="">
                    </div>
                </div>


                <!-- RIGHT : PRODUCT INFO -->
                <div class="col-lg-5 pe-5">

                    <h4>{{ $product->name }}</h4>
                    <p class="price">
                        $<span id="product-price">
                            {{ $product->variants->first()->price ?? $product->price }}
                        </span>
                    </p>

                    <p class="variant-title">{{ $product->short_description }}</p>

                    @php
                        $groupedAttributes = [];

                        foreach ($product->variants as $variant) {
                            foreach ($variant->attributes as $attr) {
                                $groupedAttributes[$attr->name][] = $attr->value;
                            }
                        }

                        // remove duplicate values
                        foreach ($groupedAttributes as $name => $values) {
                            $groupedAttributes[$name] = array_unique($values);
                        }
                    @endphp
                    <p class="variant-title">Choose Variant</p>

                    <div id="variant-options">
                        @foreach ($product->variants as $v)
                            <div class="form-check mb-2">
                                <input class="form-check-input variant-radio" type="radio" name="variant"
                                    value="{{ $v->id }}" data-price="{{ $v->price }}"
                                    data-stock="{{ $v->stock ?? 0 }}">

                                <label class="form-check-label">
                                    {{ $v->sku ?? 'Variant' }} - ${{ $v->price }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <p class="product-varients"><strong>Vendor:</strong> {{ $product->brand->name ?? 'N/A' }}</p>
                    {{-- <p class="product-varients"><strong>Type:</strong></p> --}}

                    <p class="product-varients"><strong>Availability:</strong> <span
                            class="stock">{{ $product->total_stock ?? 0 }}</span></p>

                    <!-- QTY -->
                    <div class="qty-box">
                        <button type="button" id="qty-minus">-</button>
                        <input type="text" id="qty" value="1">
                        <button type="button" id="qty-plus">+</button>
                    </div>

                    <button class="cart-btn" id="add-to-cart-btn">
                        Add to Cart
                    </button>
                    <button
                        class="wishlist-btn {{ auth()->check() && auth()->user()->wishlist->pluck('product_id')->contains($upperNewProduct->id) ? 'text-danger' : '' }}"
                        data-product-id="{{ $product->id }}">Add to wishlist</button>
                    {{-- <button class="buy-btn">Buy it now</button> --}}

                </div>

            </div>
        </div>
    </section>
    <section class="product-tabs py-5">
        <div class="container-fluid">
            <div class="row">

                <!-- EMPTY LEFT SPACE (to push right like your design) -->
                <div class="col-lg-3"></div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-7">
                    <div class="tabs-box">

                        <!-- TAB BUTTONS -->
                        <div class="d-flex gap-2 mb-3">
                            <button class="tab-btn active" data-tab="description">Description</button>
                            <button class="tab-btn" data-tab="benefits">Benefits</button>
                            <button class="tab-btn" data-tab="ingredients">Ingredients</button>
                            <button class="tab-btn" data-tab="howto">How to Use</button>
                            <button class="tab-btn" data-tab="protip">Pro Tip</button>
                        </div>

                        <!-- DESCRIPTION -->
                        <!-- DESCRIPTION -->
                        <div class="tab-content active" id="description">
                            {!! $product->long_description !!}
                        </div>

                        <!-- BENEFITS -->
                        <div class="tab-content" id="benefits">
                            {!! $product->benefits !!}
                        </div>

                        <!-- INGREDIENTS -->
                        <div class="tab-content" id="ingredients">
                            {!! $product->ingredients !!}
                        </div>

                        <!-- HOW TO USE -->
                        <div class="tab-content" id="howto">
                            {!! $product->how_to_use !!}
                        </div>

                        <!-- PRO TIP -->
                        <div class="tab-content" id="protip">
                            {!! $product->pro_tip !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="reviews-section py-5">
        <div class="container">

            <!-- TITLE -->
            <h3 class="text-center mb-4">Customer Reviews</h3>

            <!-- SUMMARY ROW -->
            <div class="row align-items-center mb-4">

                <!-- LEFT -->
                <div class="col-md-4 text-center">
                    <div class="stars">★★★★☆</div>
                    <p>4.00 out of 5</p>
                    <small>Based on 1 review ✔</small>
                </div>

                <!-- MIDDLE -->
                <div class="col-md-4">
                    <div class="rating-row">★★★★★ <div class="bar"></div> <span>0</span></div>
                    <div class="rating-row">★★★★☆ <div class="bar active"></div> <span>1</span></div>
                    <div class="rating-row">★★★☆☆ <div class="bar"></div> <span>0</span></div>
                    <div class="rating-row">★★☆☆☆ <div class="bar"></div> <span>0</span></div>
                    <div class="rating-row">★☆☆☆☆ <div class="bar"></div> <span>0</span></div>
                </div>

                <!-- RIGHT -->
                <div class="col-md-4 text-center">
                    <button id="openReview" class="btn btn-dark px-4">Write a review</button>
                </div>

            </div>

            <hr>

            <!-- REVIEW LIST -->
            <div class="review-item py-3">
                <div class="stars">★★★★☆</div>
                <strong>Jasminie</strong>
                <span class="float-end">10/26/2022</span>
                <p class="mt-2 fw-bold">Cursus eget nunc scelerisque viverra</p>
                <p>
                    Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet risus.
                    Magnis dis parturient montes nascetur.
                </p>
            </div>

            <hr>

            <!-- REVIEW FORM (HIDDEN INITIALLY) -->
            <div id="reviewForm" class="review-form mt-5" style="display:none;">
                <h4 class="text-center mb-4">Write a review</h4>

                <div class="text-center mb-3">
                    Rating <br>
                    ★★★★★
                </div>

                <div class="mb-3">
                    <label>Review Title (100)</label>
                    <input type="text" class="form-control" placeholder="Give your review a title">
                </div>

                <div class="mb-3">
                    <label>Review content</label>
                    <textarea class="form-control" rows="4" placeholder="Start writing here..."></textarea>
                </div>

                <div class="mb-3 text-center">
                    <label>Picture/Video (optional)</label>
                    <div class="upload-box">⬆</div>
                </div>

                <div class="mb-3">
                    <label>Display name</label>
                    <input type="text" class="form-control" placeholder="Display name">
                </div>

                <div class="mb-3">
                    <label>Email address</label>
                    <input type="email" class="form-control" placeholder="Your email address">
                </div>

                <p class="small">
                    How we use your data: We'll only contact you about the review you left,
                    and only if necessary.
                </p>

                <div class="text-center mt-3">
                    <button id="cancelReview" class="btn btn-outline-dark me-2">Cancel review</button>
                    <button class="btn btn-dark">Submit Review</button>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .variant-btn.active {
            background: black;
            color: #fff;
        }
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
    </script>

    <script>
        $(document).on('click', '.add-cart', function(e) {
            e.preventDefault();

            let productId = $(this).data('id');
            let quantity = $(this).closest('.box-quantity').find('.quantity').val();

            $.post("{{ route('cart.add') }}", {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                quantity: quantity
            }, function(res) {
                if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Cart!',
                        text: 'Quantity: ' + quantity,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // update cart count
                    $('#cart-count').text(res.cart_count);
                }
            }).fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Something went wrong. Please try again.'
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const mainImage = document.getElementById("mainProductImage");

            document.querySelectorAll(".gallery-img").forEach(img => {
                img.addEventListener("click", function() {
                    mainImage.src = this.src;
                });
            });
        });
    </script>
    <script>
        document.querySelectorAll('.variant-btn').forEach(btn => {
            btn.addEventListener('click', function() {

                let attr = this.dataset.attribute;

                // remove active only from same group
                document.querySelectorAll(`.variant-btn[data-attribute="${attr}"]`)
                    .forEach(b => b.classList.remove('active'));

                this.classList.add('active');
            });
        });
    </script>

    <script>
        $(document).on('change', '.variant-radio', function () {

    let price = $(this).data('price');
    $('#product-price').text(price);

    $('#qty').val(1);
});


$(document).on('click', '#qty-plus', function () {
    let qty = parseInt($('#qty').val()) + 1;
    $('#qty').val(qty);
});

$(document).on('click', '#qty-minus', function () {
    let qty = parseInt($('#qty').val()) - 1;
    if (qty < 1) qty = 1;
    $('#qty').val(qty);
});


$(document).on('click', '#add-to-cart-btn', function () {

    let variantId = $('input[name="variant"]:checked').val();
    let qty = $('#qty').val();

    if (!variantId) {
        Swal.fire('Please select a variant');
        return;
    }

    $.ajax({
        url: '/cart/add',
        method: 'POST',
        data: {
            variant_id: variantId,
            quantity: qty,
            _token: $('meta[name="csrf-token"]').attr('content')
        },

        success: function (res) {

            Swal.fire({
                icon: 'success',
                title: res.message || 'Added to cart'
            });

            loadCart(); // reuse your existing cart refresh
        },

        error: function () {
            Swal.fire('Something went wrong');
        }
    });

});
    </script>
@endsection
