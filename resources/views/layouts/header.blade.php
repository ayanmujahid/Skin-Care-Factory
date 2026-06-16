<body>
    <header>
        <!-- Top Bar -->
        <div class="announcement-bar">
            <div class="announcement-track">
                <span>FREE SHIPPING ALL OVER US</span>
                <span>•</span>
                <span>15% OFF FOR STUDENTS & TEACHERS! – ENTER ID AT CHECKOUT</span>
                <span>•</span>
                <span>FREE SHIPPING ALL OVER US</span>
                <span>•</span>
                <span>15% OFF FOR STUDENTS & TEACHERS! – ENTER ID AT CHECKOUT</span>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-light px-4 navbar-responsive">
            <!-- Hamburger Toggler (Left on mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo (Centered on mobile) -->
            <a class="navbar-brand fw-bold" href="{{ route('index') }}"><img class="logo-header"
                    src="{{ asset('assets/images/logo.webp') }}" alt=""></a>

            <!-- Mobile Right Icons (Cart & Wishlist only on mobile) -->
            <div class="header-icons-mobile d-lg-none d-flex align-items-center gap-3">
                <a href="{{ route('wishlist') }}" class="text-dark position-relative">
                    <i class="fa-regular fa-heart"></i>
                    <span
                        class="wishlist-count badge bg-dark position-absolute top-0 start-100 translate-middle">0</span>
                </a>

                <div class="position-relative">
                    <a href="javascript:void(0)" class="openCart text-dark" id="openCart">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span
                            class="cart-count badge bg-dark position-absolute top-0 start-100 translate-middle">0</span>
                    </a>
                </div>
            </div>

            <!-- Collapsible Menu -->
            <div class="collapse navbar-collapse w-100" id="mainNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">SHOP</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('brands') }}" id="brandsDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            BRANDS
                        </a>

                        <ul class="dropdown-menu">
                            @foreach ($brands as $brand)
                                <li><a class="dropdown-item"
                                        href="{{ route('shop', ['brand' => $brand->slug]) }}">{{ $brand->name }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('aboutUs') }}">ABOUT US</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('education') }}">EDUCATION</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">BLOGS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('resources') }}">RESOURCES</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contactUs') }}">CONTACT US</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('faqs') }}">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('professionalSignup') }}">PROFESSIONAL</a>
                    </li>
                    <!-- Mobile only: Search and Account -->
                    <li class="nav-item d-lg-none border-top mt-3 pt-3">
                        <a href="javascript:void(0)" id="openSearch" class="openSearch nav-link text-dark d-flex align-items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i> Search
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        @if (Auth::check())
                            <a href="{{ route('logout') }}" class="nav-link text-dark d-flex align-items-center gap-2"><i
                                    class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link text-dark d-flex align-items-center gap-2"><i class="fa-regular fa-user"></i> Login</a>
                        @endif
                    </li>
                </ul>
            </div>

            <!-- Desktop Right Icons -->
            <div class="header-icons d-none d-lg-flex align-items-center gap-3">
                @if (Auth::check())
                    <a href="{{ route('logout') }}" class="text-dark"><i
                            class="fa-solid fa-arrow-right-from-bracket"></i></a>
                @else
                    <a href="{{ route('login') }}" class="text-dark"><i class="fa-regular fa-user"></i></a>
                @endif

                <a href="javascript:void(0)" id="openSearch" class="openSearch text-dark">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>

                <a href="{{ route('wishlist') }}" class="text-dark position-relative">
                    <i class="fa-regular fa-heart"></i>
                    <span
                        class="wishlist-count badge bg-dark position-absolute top-0 start-100 translate-middle">0</span>
                </a>

                <div class="position-relative">
                    <a href="javascript:void(0)" class="openCart text-dark" id="openCart">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span
                            class="cart-count badge bg-dark position-absolute top-0 start-100 translate-middle">0</span>
                    </a>
                </div>
            </div>
        </nav>



        <div class="cart-modal-overlay"></div>

        <div class="cart-modal">

            <div class="cart-header d-flex justify-content-between align-items-center">
                <h5>Your Cart (<span class="cart-count">0</span>)</h5>
                <button class="close-cart">&times;</button>
            </div>

            <!-- CART ITEMS -->
            <div id="cart-items"></div>

            <div class="cart-footer">
                <strong>Total: $<span id="cart-total">0</span></strong>

                <div id="checkout-action"></div>

            </div>

        </div>

        <!-- SEARCH OVERLAY -->
        <div class="search-overlay"></div>

        <!-- SEARCH SIDEBAR -->
        <div class="search-sidebar">

            <div class="search-header d-flex justify-content-between align-items-center">
                <h5>Search Products</h5>
                <button class="close-search">&times;</button>
            </div>

            <div class="p-3">
                <input type="text" id="productSearch" class="form-control" placeholder="Search products...">
            </div>

            <!-- SEARCH RESULTS -->
            <div id="search-results"></div>

            <div class="p-3">
                <a href="javascript:void(0)" id="viewAllBtn" class="btn btn-dark w-100 d-none">
                    View All
                </a>
            </div>

        </div>

    </header>
