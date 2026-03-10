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
                    <h6 class="featured-title">Featured Products</h6>

                    <div class="featured-item">
                        <img src="assets/images/na-mp-4.webp">
                        <div>
                            <p>Erotic Ayurvedic Lotion</p>
                            <span>$12.00</span>
                        </div>
                    </div>

                    <div class="featured-item">
                        <img src="assets/images/na-mp-5.webp">
                        <div>
                            <p>Skin Naturals BB Cream VitaminC</p>
                            <span>$173.00</span>
                        </div>
                    </div>

                    <div class="featured-item">
                        <img src="assets/images/na-mp-2.webp">
                        <div>
                            <p>Natural Cold Pressed Oil And Reduces Wrinkles</p>
                            <span>$190.00</span>
                        </div>
                    </div>
                </div>

                <!-- CENTER : MAIN IMAGE -->
                <div class="col-lg-4 text-center">
                    <div class="main-product-box sticky-image">
                        <img src="assets/images/na-mp-1.webp">
                    </div>
                </div>


                <!-- RIGHT : PRODUCT INFO -->
                <div class="col-lg-5 pe-5">

                    <h4>Face Moisturizer With Vitamin E-Hyaluronic Acid And Ceramides</h4>
                    <p class="price">$380.00</p>

                    <p class="variant-title">Choose style: Ceramides</p>

                    <div class="variant-images">
                        <div>
                            <img src="assets/images/na-mp-4.webp">
                            <small>Lotion</small>
                        </div>
                        <div>
                            <img src="assets/images/na-mp-3.webp">
                            <small>VitaminC</small>
                        </div>
                        <div>
                            <img src="assets/images/na-mp-2.webp">
                            <small>Wrinkles</small>
                        </div>
                    </div>

                    <div class="meta-row">
                        <span>Finish Type:</span>
                        <button>Matte</button>
                    </div>

                    <div class="meta-row">
                        <span>Speciality:</span>
                        <button>Natural</button>
                    </div>

                    <div class="meta-row">
                        <span>Skin Type:</span>
                        <button>All</button>
                    </div>

                    <p class="product-varients"><strong>Vendor:</strong> Harp</p>
                    <p class="product-varients"><strong>Type:</strong></p>

                    <p class="product-varients"><strong>Availability:</strong> <span class="stock">12 In stock!</span></p>

                    <!-- QTY -->
                    <div class="qty-box">
                        <button>-</button>
                        <input type="text" value="1">
                        <button>+</button>
                    </div>

                    <button class="cart-btn">Add to Cart</button>
                    <button class="wishlist-btn">Add to wishlist</button>
                    <button class="buy-btn">Buy it now</button>

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
                            <button class="tab-btn active" data-tab="desc">Description</button>
                            <button class="tab-btn" data-tab="ship">Shipping Information</button>
                            <button class="tab-btn" data-tab="faq">Faq</button>
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="tab-content active" id="desc">
                            <p>
                                Use our lovely beauty products to make a striking appearance that leaves people wondering
                                about your gorgeous look.
                                Perfect, natural, feathery lashes that have the right length and volume: to give a right
                                finishing touch to an extraordinary makeup look.
                            </p>

                            <ul>
                                <li>Feathery light Korean silk fiber</li>
                                <li>Handmade Cotton band</li>
                                <li>Suitable for Hair lengths from 2mm to 12mm</li>
                                <li>Band Length 36mm</li>
                            </ul>

                            <h6>What it is:</h6>
                            <p><strong>EVERY INGREDIENT WE USE IS BENEFICIAL, HERE ARE A FEW:</strong></p>

                            <div class="row text-center my-4">
                                <div class="col-6 mb-4">
                                    <img src="assets/images/panthanol.webp" class="ing-img">
                                    <h5>PANTHENOL</h5>
                                    <p>Panthenol helps to lock skin moisture.</p>
                                </div>
                                <div class="col-6 mb-4">
                                    <img src="assets/images/neem.webp" class="ing-img">
                                    <h5>NEEM</h5>
                                    <p>Neem fights and prevents acne scars.</p>
                                </div>
                                <div class="col-6">
                                    <img src="assets/images/vitamin.webp" class="ing-img">
                                    <h5>VITAMIN E</h5>
                                    <p>Vitamin E protects from free radical damage.</p>
                                </div>
                                <div class="col-6">
                                    <img src="assets/images/coco.webp" class="ing-img">
                                    <h5>COCONUT</h5>
                                    <p>Coconut refreshes the skin.</p>
                                </div>
                            </div>

                            <h5>COMPLETE LIST OF INGREDIENTS:</h5>
                            <p class="small">
                                Centifolia Flower Water (Organic Rose Hydrosol), Fucus Vesiculosus (Kelp) Extract, Plant
                                Cellulose (Vegan),
                                Cocos Nucifera (Virgin Coconut) Oil, Aloe Barbadensis (Organic Aloe) Leaf Juice, Rosa
                                Vegetable Glycerin,
                                Tocopherol (Vitamin E), Caprifolium (Honeysuckle) Flower, Lonicera Japonica (Honeysuckle)
                                Flower,
                                and Mentha Piperita (Peppermint) Essential Oil.
                            </p>
                        </div>

                        <!-- SHIPPING -->
                        <div class="tab-content" id="ship">
                            <p>We ship within 2–5 business days worldwide.</p>
                        </div>

                        <!-- FAQ -->
                        <div class="tab-content" id="faq">
                            <p>Contact support for any questions about this product.</p>
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
@endsection
