<footer class="amiy-footer">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-4">
                <div class="brand-logo"><img src="{{asset('assets/images/logo.webp')}}" alt=""></div>
                <div class="tagline-main">Emails that people love</div>
                <p class="tagline-sub">
                    ed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam.
                </p>

                <div class="subscribe-container">
                    <form class="subscribe-group">
                        <input type="email" class="subscribe-input" placeholder="Your Email Here">
                        <button type="submit" class="btn-subscribe">Subscribe</button>
                    </form>
                </div>

                <div class="payment-icons">
                    <img src="https://cdn-icons-png.flaticon.com/512/349/349221.png" alt="Visa">
                    <img src="https://cdn-icons-png.flaticon.com/512/349/349228.png" alt="Mastercard">
                    <img src="https://cdn-icons-png.flaticon.com/512/349/349230.png" alt="Amex">
                    <img src="https://cdn-icons-png.flaticon.com/512/174/174861.png" alt="Paypal">
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="link-group">
                            <h6>Learn</h6>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Business FAQs</a></li>
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">Affiliate Application</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="link-group">
                            <h6>Help</h6>
                            <ul>
                                <li><a href="#">Return Policy</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Accessibility</a></li>
                                <li><a href="#">Account Login</a></li>
                                <li><a href="#">Product How-To's</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="link-group">
                            <h6>Shop</h6>
                            <ul>
                                <li><a href="#">Skincare</a></li>
                                <li><a href="#">Beauty</a></li>
                                <li><a href="#">Wellness</a></li>
                                <li><a href="#">Bundles</a></li>
                                <li><a href="#">Bundle Builder</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Skin Quiz</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="link-group">
                            <h6>Social</h6>
                            <ul>
                                <li><a href="#">Instagram</a></li>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Tiktok</a></li>
                                <li><a href="#">YouTube</a></li>
                                <li><a href="#">Pinterest</a></li>
                                <li><a href="#">Join our texts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div>&copy; 2026 SKINCARE FACTORY</div>
            <div>BY DESIGNATRIX</div>
        </div>
    </div>
</footer>

<div class="modal fade" id="quickViewModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                style="
        position: absolute;
        top: 0;
        transform: translateX(-50%);
        font-size: 15px;
        color: #fff;
        border: none;
        padding: 10px 10px 12px 10px;
        z-index: 1055;
        margin-top: 7px;
    ">
                X
            </button>
            <div class="modal-body">

                <div class="row">


                    <div class="col-md-6">
                        <img id="modal-main-image" class="img-fluid mb-3">

                        {{-- <div id="modal-gallery" class="d-flex gap-2"></div> --}}
                    </div>

                    <div class="col-md-6">

                        <h3 id="modal-product-name"></h3>

                        <p id="modal-short-description"></p>
                        <div id="modal-description" class="product-description"></div>

                        <p>
                            Category: <span id="modal-category"></span>
                        </p>

                        <h4>$ <span id="modal-price"></span></h4>

                        <div id="variant-options"></div>
                        {{-- <div id="modal-description" class="product-description"></div> --}}

                        <input type="number" id="qty" value="1" min="1"
                            class="form-control w-25 mb-3">

                        <button id="add-to-cart-btn" class="btn btn-dark w-100">
                            Add To Cart
                        </button>

                        {{-- <div class="col-md-6 mt-6 product-detail-btn">
                            <a href="{{ route('productDetails', $product->slug) }}">View
                                Details</a>
    
                        </div> --}}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
