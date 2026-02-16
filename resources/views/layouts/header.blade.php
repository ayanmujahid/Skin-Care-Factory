<body>
    <div id="preloader">
        <div class="preloader-content">
            <div class="arc-text" id="arcText"></div>
            <img src="{{asset('assets/images/christelle-logo.png')}}"
                alt="Logo"
                class="preloader-logo" id="logo">
        </div>
    </div>





    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="top-bar-left">
                <i class="fas fa-truck delivery-icon"></i>
                <span>Delivery on Next Day from 10:00 AM to 08:00 PM</span>
            </div>
            <nav>
                <ul class="top-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    <li><a href="{{ route('aboutUs') }}">About us</a></li>
                    <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                </ul>
            </nav>
            <div class="top-bar-right">
                <a href="tel:+1234567890" class="phone-link">
                    <i class="fas fa-phone phone-icon"></i>
                    +1 234 567 8900
                </a>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="language-selector">
                    <button class="language-toggle" id="languageToggle" aria-label="Select language" aria-haspopup="true" aria-expanded="false">
                        <span class="language-icon"><i class="fas fa-globe"></i></span>
                        <span class="language-label" id="currentLanguage">EN</span>
                        <i class="fas fa-chevron-down language-chevron"></i>
                    </button>
                    <div class="language-dropdown" id="languageDropdown" role="menu" aria-hidden="true">
                        <button class="language-option" data-lang="en" role="menuitem">
                            <span class="option-flag">🇺🇸</span>
                            <span class="option-text">English</span>
                            <i class="fas fa-check check-icon"></i>
                        </button>
                        <button class="language-option" data-lang="fr" role="menuitem">
                            <span class="option-flag">🇫🇷</span>
                            <span class="option-text">Français</span>
                            <i class="fas fa-check check-icon"></i>
                        </button>
                    </div>
                </div>
                <!-- 🌍 Language Switcher -->
                <div id="google_translate_element" style="display:none;"></div>

                <script>
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                                pageLanguage: 'en',
                                includedLanguages: 'en,fr',
                                autoDisplay: false
                            },
                            'google_translate_element'
                        );
                    }
                </script>

                <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {

                        const toggle = document.getElementById('languageToggle');
                        const dropdown = document.getElementById('languageDropdown');
                        const currentLabel = document.getElementById('currentLanguage');
                        const options = document.querySelectorAll('.language-option');

                        // Toggle dropdown
                        toggle.addEventListener('click', () => {
                            dropdown.classList.toggle('open');
                        });

                        // Change language
                        options.forEach(option => {
                            option.addEventListener('click', function() {
                                const lang = this.dataset.lang;
                                applyGoogleTranslate(lang);

                                currentLabel.innerText = lang.toUpperCase();

                                // Update checkmark
                                options.forEach(o => o.classList.remove('active'));
                                this.classList.add('active');

                                dropdown.classList.remove('open');
                            });
                        });

                        function applyGoogleTranslate(lang) {
                            const select = document.querySelector('.goog-te-combo');
                            if (!select) {
                                console.warn('Google Translate not ready');
                                return;
                            }
                            select.value = lang;
                            select.dispatchEvent(new Event('change'));
                        }
                    });
                </script>

                <style>
                    /* Hide Google Translate UI */
                    .goog-te-banner-frame,
                    .goog-logo-link,
                    .goog-te-gadget {
                        display: none !important;
                    }

                    body {
                        top: 0 !important;
                    }

                    /* Dropdown toggle */
                    .language-dropdown {
                        display: none;
                    }

                    .language-dropdown.open {
                        display: block;
                    }

                    /* Active language */
                    .language-option.active .check-icon {
                        display: inline-block;
                    }

                    .check-icon {
                        display: none;
                    }
                </style>

            </div>
        </div>
    </div>

    <!-- Main Header -->

    <header class="main-header">
        <div class="header-content">
            <button class="mobile-menu-btn" aria-label="Menu" id="mobileMenuBtn" aria-expanded="false">
                <span class="hamburger" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <!-- Left Navigation (desktop) -->
            <nav aria-label="Primary" class="left-nav">
                <ul class="nav-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}"><i class="nav-icon fas fa-shopping-bag" aria-hidden="true"></i><span>Grocery</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}"><i class="nav-icon fas fa-utensils" aria-hidden="true"></i><span>Restaurant</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}"><i class="nav-icon fas fa-leaf" aria-hidden="true"></i><span>Beauty Products</span></a></li>
                </ul>
            </nav>

            <!-- Center Logo -->
            <div class="logo">
                <a href="{{ route('index') }}" style="text-decoration:none;">
                    <img src="{{asset('assets/images/christelle-logo.png')}}" alt="Christelle Store">
                </a>
            </div>

            <!-- Right side: categories + action icons -->
            <div class="header-actions">
                <nav aria-label="Secondary">
                    <ul class="nav-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}"><i class="nav-icon fas fa-tshirt" aria-hidden="true"></i><span>Clothing</span></a>
                            <div class="dropdown">
                                <a href="#">Milk</a>
                                <a href="#">Cheese</a>
                                <a href="#">Eggs</a>
                            </div>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}"><i class="nav-icon fas fa-paint-roller" aria-hidden="true"></i><span>Decor</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}"><i class="nav-icon fas fa-running" aria-hidden="true"></i><span>Sportwears</span></a></li>
                    </ul>
                </nav>

                <div class="action-icons">
                    <a href="{{ Route::has('search') ? route('search') : '#' }}" class="icon-btn" aria-label="Search"><i class="fas fa-search"></i></a>
                    @if (Auth::check())
                    <a href="{{ Route::has('profile') ? route('profile') : '#' }}" class="icon-btn" aria-label="Account"><i class="fas fa-user"></i></a>
                    <a href="{{ route('logout') }}" class="icon-btn" aria-label="Logout"><i class="fas fa-sign-out-alt"></i></a>
                    @else
                    <a href="{{ route('login') }}" class="icon-btn" aria-label="Account"><i class="fas fa-user"></i></a>
                    @endif
                    <a href="{{ route('wishlist') }}" class="icon-btn" aria-label="Wishlist"><i class="far fa-heart"></i></a>
                    <a href="{{ route('cart') }}" class="icon-btn" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>

        </div>
    </header>

    <!-- Mobile Navigation (only visible on small screens) -->
    <nav class="mobile-nav" id="mobileNav" aria-hidden="true">
        <div class="mobile-nav-header">
            <a href="{{ route('index') }}" class="mobile-logo">
                <img src="{{asset('assets/images/christelle-logo.png')}}" alt="Logo">
            </a>
            <button class="mobile-close-btn" id="mobileCloseBtn" aria-label="Close menu">&times;</button>
        </div>
        <ul class="mobile-nav-list">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li class="mobile-nav-item has-children">
                <button class="mobile-accordion-btn" aria-expanded="false">Shop <i class="fas fa-chevron-down"></i></button>
                <ul class="mobile-submenu">
                    <li><a href="{{ route('shop') }}">Grocery</a></li>
                    <li><a href="{{ route('shop') }}">Restaurant</a></li>
                    <li><a href="{{ route('shop') }}">Beauty Products</a></li>
                    <li><a href="{{ route('shop') }}">Clothing</a></li>
                    <li><a href="{{ route('shop') }}">Decor</a></li>
                    <li><a href="{{ route('shop') }}">Sportwears</a></li>
                </ul>
            </li>
            <li><a href="{{ route('aboutUs') }}">About us</a></li>
            <li><a href="{{ route('contactUs') }}">Contact Us</a></li>

            <li class="mobile-divider" aria-hidden="true"></li>
            <li class="mobile-actions">
                @if (Auth::check())
                <a href="{{ route('logout') }}" class="mobile-action">Logout</a>
                @else
                <a href="{{ route('login') }}" class="mobile-action">Account</a>
                @endif
                <a href="{{ route('wishlist') }}" class="mobile-action">Wishlist</a>
                <a href="{{ route('cart') }}" class="mobile-action">Cart</a>
            </li>
        </ul>
    </nav>

    <div class="mobile-nav-backdrop" id="mobileNavBackdrop" tabindex="-1"></div>

    <script>
        (function() {
            const openBtn = document.getElementById('mobileMenuBtn');
            const closeBtn = document.getElementById('mobileCloseBtn');
            const nav = document.getElementById('mobileNav');
            const backdrop = document.getElementById('mobileNavBackdrop');
            const accordion = document.querySelector('.mobile-accordion-btn');

            function openNav() {
                nav.classList.add('open');
                backdrop.classList.add('visible');
                openBtn.setAttribute('aria-expanded', 'true');
                nav.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            }

            function closeNav() {
                nav.classList.remove('open');
                backdrop.classList.remove('visible');
                openBtn.setAttribute('aria-expanded', 'false');
                nav.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }

            openBtn && openBtn.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true';
                if (expanded) {
                    closeNav();
                } else {
                    openNav();
                }
            });
            closeBtn && closeBtn.addEventListener('click', closeNav);
            backdrop && backdrop.addEventListener('click', closeNav);

            if (accordion) {
                accordion.addEventListener('click', function() {
                    const expanded = this.getAttribute('aria-expanded') === 'true';
                    this.setAttribute('aria-expanded', String(!expanded));
                    this.parentElement.querySelector('.mobile-submenu').classList.toggle('open');
                });
            }
        })();
    </script>

    <!-- Google Translate Script -->
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- Language Selector Script -->
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }

        function changeLanguage(lang) {
            // Try multiple methods to trigger the translation
            const element = document.querySelector('.goog-te-combo');

            if (element) {
                // Method 1: Direct value change
                element.value = lang;

                // Method 2: Dispatch change event
                element.dispatchEvent(new Event('change', {
                    bubbles: true
                }));

                // Method 3: Trigger click on the option
                setTimeout(() => {
                    const option = element.querySelector(`option[value="${lang}"]`);
                    if (option) {
                        option.selected = true;
                        element.dispatchEvent(new Event('change', {
                            bubbles: true
                        }));
                    }
                }, 100);
            }
        }

        // Wait for DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('languageToggle');
            const dropdown = document.getElementById('languageDropdown');
            const currentLanguageSpan = document.getElementById('currentLanguage');
            const options = document.querySelectorAll('.language-option');
            const savedLang = localStorage.getItem('selected_language') || 'en';

            // Set initial active option in UI
            function setActiveLanguage(lang) {
                options.forEach(option => {
                    if (option.dataset.lang === lang) {
                        option.classList.add('active');
                    } else {
                        option.classList.remove('active');
                    }
                });
                currentLanguageSpan.textContent = lang.toUpperCase();
            }

            // Initialize UI with saved language
            setActiveLanguage(savedLang);

            // Apply saved language translation after page loads
            if (savedLang === 'fr') {
                setTimeout(() => changeLanguage('fr'), 3000);
            }

            // Toggle dropdown
            if (toggle) {
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';
                    this.setAttribute('aria-expanded', String(!isExpanded));
                    dropdown.setAttribute('aria-hidden', String(isExpanded));
                });
            }

            // Handle language selection
            options.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    const lang = this.dataset.lang;

                    // Update UI
                    setActiveLanguage(lang);

                    // Close dropdown
                    toggle.setAttribute('aria-expanded', 'false');
                    dropdown.setAttribute('aria-hidden', 'true');

                    // Store preference
                    localStorage.setItem('selected_language', lang);

                    // Change language with immediate retry
                    changeLanguage(lang);
                    setTimeout(() => changeLanguage(lang), 200);
                    setTimeout(() => changeLanguage(lang), 500);
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.language-selector')) {
                    toggle.setAttribute('aria-expanded', 'false');
                    dropdown.setAttribute('aria-hidden', 'true');
                }
            });

            // Close dropdown on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    toggle.setAttribute('aria-expanded', 'false');
                    dropdown.setAttribute('aria-hidden', 'true');
                }
            });
        });
    </script>

    <!-- Hidden Google Translate Container -->
    <div id="google_translate_element" style="display:none;"></div>