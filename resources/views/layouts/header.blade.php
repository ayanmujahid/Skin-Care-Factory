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
        <nav class="navbar navbar-expand-lg bg-light px-4">
            <!-- <a class="navbar-brand fw-bold" href="#">AMIY</a> -->
            <a class="navbar-brand fw-bold" href="index.php"><img class="logo-header" src="assets/images/logo.webp"
                    alt=""></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse w-100" id="mainNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="shop.php">BRANDS</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">TOOLS & SUPPLIES</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">SERVICES</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">EDUCATION</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">BLOGS</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">PROFESSIONAL</a></li>
                </ul>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="login.php" class="text-dark"><i class="fa-regular fa-user"></i></a>
                <i class="fa-solid fa-magnifying-glass"></i>

                <div class="position-relative">
                    <a href="javascript:void(0)" class="text-dark" id="openCart">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span class="cart-count badge bg-dark position-absolute top-0 start-100 translate-middle">0</span>
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

                <a href="/checkout" class="btn btn-dark w-100 mt-2">
                    Checkout
                </a>

            </div>

        </div>

    </header>
