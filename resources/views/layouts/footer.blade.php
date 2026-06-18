<footer class="amiy-footer">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-4">
                <div class="brand-logo"><img src="{{ asset('assets/images/logo.webp') }}" alt=""></div>
                <div class="tagline-main">Emails that people love</div>
                <p class="tagline-sub">
                    ed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam.
                </p>

                <div class="subscribe-container">
                    <form action={{ route('newsletterSubmit') }} class="subscribe-group" method="POST">
                        @csrf
                        <input type="email" name="email" class="subscribe-input" placeholder="Your Email Here">
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

            <button type="button" class="qv-close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="ti ti-x"></i>
            </button>

            <div class="modal-body p-0">
                <div class="qv-body">

                    <!-- LEFT: SLIDER -->
                    <div class="qv-left">
                        <div class="slider-main" id="sliderMain">
                            <button class="sl-btn sl-prev" id="slPrev" aria-label="Previous image">
                                <i class="ti ti-chevron-left"></i>
                            </button>
                            <img id="modal-main-image" alt="Product image">
                            <button class="sl-btn sl-next" id="slNext" aria-label="Next image">
                                <i class="ti ti-chevron-right"></i>
                            </button>
                            <div class="sl-counter" id="slCounter">1 / 1</div>
                        </div>
                        <div class="thumbs" id="modal-gallery"></div>
                    </div>

                    <!-- RIGHT: INFO -->
                    <div class="qv-right">

                        <div>
                            <h3 id="modal-product-name" class="qv-title"></h3>
                            <div class="qv-category-row">
                                <i class="ti ti-tag"></i>
                                <span class="cat-pill" id="modal-category"></span>
                            </div>
                        </div>

                        <p id="modal-short-description" class="qv-desc"></p>
                        <div id="modal-description" class="qv-desc"></div>

                        <hr class="qv-divider">

                        <div id="variant-options"></div>

                        <hr class="qv-divider">

                        <div class="qv-bottom-row">
                            <div>
                                <div class="section-label">Quantity</div>
                                <div class="qty-row">
                                    <button class="qty-btn" id="qtyMinus" aria-label="Decrease quantity">
                                        <i class="ti ti-minus"></i>
                                    </button>
                                    <input class="qty-input" type="number" id="qty" value="1"
                                        min="1" max="99" readonly>
                                    <button class="qty-btn" id="qtyPlus" aria-label="Increase quantity">
                                        <i class="ti ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="text-end">
                                <div class="section-label">Price</div>
                                <div class="qv-price">$ <span id="modal-price"></span></div>
                            </div>
                        </div>

                        <div class="qv-cta">
                            <button id="add-to-cart-btn" class="btn-cart">
                                <i class="ti ti-shopping-cart"></i> Add to cart
                            </button>
                            <button class="btn-wish wishlist-btn mt-2" aria-label="Add to wishlist">
                                <i class="ti ti-heart"></i>
                            </button>
                        </div>

                        <!-- Product Detail Button -->
                        <a id="product-detail-link" href="#" class="btn-detail">
                            <i class="ti ti-eye"></i> View full details
                            <i class="ti ti-arrow-right" style="font-size:13px; margin-left:4px;"></i>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
<script>
    
</script>
</body>
