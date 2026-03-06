<body>
    <div id="wrapper" class="wrapper">

        <!-- HEADER AREA START -->
        <header class="header sticky-header">

            <!-- Header Top Area -->
            <div class="header-top-area">
                <div class="container">
                    <div class="header-top-inner">
                        <div class="header-top-left">
                            <p>Welcome to Sleepy Slopes</p>
                        </div>
                        <ul class="header-options">
                            <li>
                                <select name="language-selection" id="header-language-selection"
                                    class="language-selection">
                                    <option>Select language</option>
                                    <option>English</option>
                                    <option>Spanish</option>
                                    <option>Portuguise</option>
                                </select>
                            </li>
                            <li>
                                <a href="my-account.html">My account</a>
                            </li>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="login-register.html">Login / Reg</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--// Header Top Area -->

            <!-- Header Bottom Area -->
            <div class="header-bottom-area d-none d-lg-block">
                <div class="container">
                    <div class="header-bottom-inner">
                        <a href="index.html" class="header-logo">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="slimfit">
                        </a>
                        <nav class="sf-navigation">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>

                                <li><a href="{{route('aboutUs')}}">ABOUT</a></li>
                                <li><a href="{{route('shop')}}">SHOP</a>
                                    <ul>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                        <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="product-details-reverse.html">Product Details Reverse</a></li>
                                        <li><a href="product-details-2.html">Product Details 2</a></li>
                                        <li><a href="product-details-2-reverse.html">Product Details 2 Reverse</a></li>
                                        <li><a href="product-details-gallery.html">Product Details Gallery</a></li>
                                        <li><a href="product-details-gallery-reverse.html">Product Details Gallery
                                                Reverse</a></li>
                                    </ul>
                                </li>
                                {{-- <li class="megamenu-active"><a href="#">PAGES</a>
                                    <ul>
                                        <li>
                                            <a href="#">Shop Pages</a>
                                            <ul>
                                                <li><a href="shop.html">SHOP</a></li>
                                                <li><a href="shop-right-sidebar.html">SHOP WITH RIGHT SIDEBAR</a></li>
                                                <li><a href="shop-left-sidebar.html">SHOP WITH LEFT SIDEBAR</a></li>
                                                <li><a href="shop-2-column-right-sidebar.html">SHOP 2 COLUMN</a></li>
                                                <li><a href="shop-3-column.html">SHOP 3 COLUMN</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Product Details Pages</a>
                                            <ul>
                                                <li><a href="product-details.html">PRODUCT DETAILS</a></li>
                                                <li><a href="product-details-reverse.html">PRODUCT DETAILS REVERSE</a>
                                                </li>
                                                <li><a href="product-details-2.html">PRODUCT DETAILS 2</a></li>
                                                <li><a href="product-details-2-reverse.html">PRODUCT DETAILS 2
                                                        REVERSE</a></li>
                                                <li><a href="product-details-gallery.html">PRODUCT DETAILS GALLERY</a>
                                                </li>
                                                <li><a href="product-details-gallery-reverse.html">PRODUCT DETAILS
                                                        GALLERY REVERSE</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Shop Related Pages</a>
                                            <ul>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Other Pages</a>
                                            <ul>
                                                <li><a href="login-register.html">LOGIN/REGISTER</a></li>
                                                <li><a href="my-account.html">MY ACCOUNT</a></li>
                                                <li><a href="about-us.html">ABOUT US</a></li>
                                                <li><a href="contact.html">CONTACT</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="index.html">BLOG</a>
                                    <ul>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                                        <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li><a href="{{route('contactUs')}}">CONTACT</a></li>
                            </ul>
                        </nav>
                        <ul class="header-icons">
                            <li>
                                <button class="header-search-trigger"><i class="ti ti-search"></i></button>
                                <div class="header-searchbox-wrapper">
                                    <form class="header-searchbox">
                                        <input type="text" placeholder="Search">
                                        <button><i class="ti ti-search"></i></button>

                                    </form>
                                </div>
                            </li>
                            <li>
                                <button class="header-minicart-trigger"><i class="ti ti-shopping-cart"></i></button>
                                
                                <div class="minicart header-minicart">
                                    <ul class="minicart-product-list">
                                        <li>
                                            <a href="product-details-right-sidebar.html" class="minicart-product-image">
                                                <img src="{{ asset('assets/img/product/small-size/product-image-1.jpg') }}"
                                                    alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="product-details-right-sidebar.html">Aenean eu tristique</a>
                                                </h6>
                                                <span>£80 x 2</span>
                                            </div>
                                            <button class="close">
                                                <i class="ti ti-close"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="product-details-right-sidebar.html" class="minicart-product-image">
                                                <img src="{{ asset('assets/img/product/small-size/product-image-2.jpg') }}"
                                                    alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="product-details-right-sidebar.html">Aenean sagittis</a>
                                                </h6>
                                                <span>£80 x 1</span>
                                            </div>
                                            <button class="close">
                                                <i class="ti ti-close"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>£315.00</span></p>
                                    <div class="minicart-button">
                                        <a href="checkout.html"
                                            class="sf-button sf-button-dark sf-button-fullwidth sf-button-sm">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="checkout.html" class="sf-button sf-button-fullwidth sf-button-sm">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--// Header Bottom Area -->

            <!-- Header Mobile Menu -->
            <div class="mobile-menu-area d-block d-lg-none">
                <div class="container">
                    <div class="mobile-menu clearfix">
                        <ul class="header-icons">
                            <li>
                                <button class="header-search-trigger"><i class="ti ti-search"></i></button>
                                <div class="header-searchbox-wrapper">
                                    <form class="header-searchbox">
                                        <input type="text" placeholder="Search">
                                        <button><i class="ti ti-search"></i></button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <button class="header-minicart-trigger"><i class="ti ti-shopping-cart"></i></button>
                                <div class="minicart header-minicart">
                                    <ul class="minicart-product-list">
                                        <li>
                                            <a href="product-details-right-sidebar.html"
                                                class="minicart-product-image">
                                                <img src="{{ asset('assets/img/product/small-size/product-image-1.jpg') }}"
                                                    alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="product-details-right-sidebar.html">Aenean eu
                                                        tristique</a></h6>
                                                <span>£80 x 2</span>
                                            </div>
                                            <button class="close">
                                                <i class="ti ti-close"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="product-details-right-sidebar.html"
                                                class="minicart-product-image">
                                                <img src="{{ asset('assets/img/product/small-size/product-image-2.jpg') }}"
                                                    alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="product-details-right-sidebar.html">Aenean sagittis</a>
                                                </h6>
                                                <span>£80 x 1</span>
                                            </div>
                                            <button class="close">
                                                <i class="ti ti-close"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>£315.00</span></p>
                                    <div class="minicart-button">
                                        <a href="checkout.html"
                                            class="sf-button sf-button-dark sf-button-fullwidth sf-button-sm">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="checkout.html" class="sf-button sf-button-fullwidth sf-button-sm">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="index.html" class="logo">
                            <img src="{{asset('assets/img/logo/logo-dark.png')}}" alt="slimfit">
                        </a>
                    </div>
                </div>
            </div>
            <!--// Header Mobile Menu -->

        </header>
        <!--// Header -->
