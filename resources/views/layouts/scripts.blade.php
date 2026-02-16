{{-- -----------------------------------Links to Change----------------------------------- --}}
{{-- <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/fontawesome.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

--}}
<!-- jQuery (Required for FancyBox and Slick Slider) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!-- FancyBox (For Lightbox Functionality) -->
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<!-- AOS (Animate on Scroll) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<!-- Custom JS (Place at the end to ensure it loads last) -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    },
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("welcomeModal");
  const closeBtn = document.querySelector(".close-btn");

  // Show modal only once per session
  if (!sessionStorage.getItem("welcomeShown")) {
    modal.style.display = "block";
    sessionStorage.setItem("welcomeShown", "true");
  }

  // Close modal on click
  closeBtn.onclick = () => modal.style.display = "none";
  window.onclick = (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
});
</script>
<script>
  AOS.init({
    duration: 800,
    easing: 'slide',
    once: true
  }); 
</script>



{{-- -----------------------------------Links to Change----------------------------------- --}}


<script src="{{ asset('dash/js/jquery.toast.js') }}"></script>
@if (Auth::guard('admin'))
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/content-management.js') }}"></script>
@endif

<script>
document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.querySelector(".mobile-menu-btn");

    if (!menuBtn) {
        console.error("Mobile menu button not found!");
        return;
    }

    // Get all nav menus in the header
    const menus = document.querySelectorAll(".main-header .nav-menu");
    
    console.log("Found menus:", menus.length);
    
    // Legacy icon toggle removed — no-op to avoid manipulating FontAwesome <i> element
    function updateIcon(isOpen) {
        // Intentionally empty: the mobile hamburger is now a styled <span> structure
        // and is controlled via CSS/JS directly in the header. Leaving this stub
        // preserves existing calls without trying to change DOM classes.
    }
    
    // Toggle menu on button click
    menuBtn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        
        // Prevent button from moving - lock its position with inline styles
        menuBtn.style.setProperty("position", "relative", "important");
        menuBtn.style.setProperty("top", "auto", "important");
        menuBtn.style.setProperty("left", "auto", "important");
        menuBtn.style.setProperty("transform", "none", "important");
        menuBtn.style.setProperty("margin", "0", "important");
        menuBtn.style.setProperty("padding", "0", "important");
        
        console.log("Hamburger clicked! Menus found:", menus.length);
        
        const isCurrentlyOpen = Array.from(menus).some(menu => menu.classList.contains("menu-open"));
        
        console.log("Menu currently open:", isCurrentlyOpen);
        
        if (isCurrentlyOpen) {
            // Close menu
            menus.forEach(menu => {
                menu.classList.remove("menu-open");
                // Remove inline styles from menu
                menu.style.display = "";
                menu.style.flexDirection = "";
                menu.style.position = "";
                menu.style.top = "";
                menu.style.left = "";
                menu.style.right = "";
                menu.style.width = "";
                menu.style.background = "";
                menu.style.zIndex = "";
                menu.style.padding = "";
                menu.style.boxShadow = "";
                menu.style.maxHeight = "";
                menu.style.overflowY = "";
                menu.style.visibility = "";
                menu.style.opacity = "";
                menu.style.margin = "";
                
                // Hide parent nav
                const navParent = menu.closest('nav');
                if (navParent) {
                    navParent.style.display = "";
                    navParent.style.visibility = "";
                    navParent.style.position = "";
                }
                
                console.log("Removed menu-open class");
            });
            updateIcon(false);
        } else {
            // Make sure parent nav elements are visible - CRITICAL for menu to show
            menus.forEach(menu => {
                const navParent = menu.closest('nav');
                if (navParent) {
                    navParent.style.display = "block";
                    navParent.style.visibility = "visible";
                    navParent.style.position = "static";
                    console.log("Made nav parent visible:", navParent);
                }
            });
            
            // Open menu - show both nav menus
            menus.forEach((menu, index) => {
                menu.classList.add("menu-open");
                // Force display with inline style as fallback
                menu.style.display = "flex";
                menu.style.flexDirection = "column";
                menu.style.position = "fixed";
                menu.style.left = "0";
                menu.style.right = "0";
                menu.style.width = "100%";
                menu.style.maxWidth = "100%";
                menu.style.background = "#fff";
                menu.style.zIndex = "9999";
                menu.style.padding = "0";
                menu.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.1)";
                menu.style.maxHeight = "calc(100vh - 70px)";
                menu.style.overflowY = "auto";
                menu.style.overflowX = "hidden";
                menu.style.visibility = "visible";
                menu.style.opacity = "1";
                menu.style.margin = "0";
                menu.style.boxSizing = "border-box";
                
                // First menu at top
                if (index === 0) {
                    menu.style.top = "70px";
                }
                
                console.log("Added menu-open to menu", index, menu, "Height:", menu.offsetHeight);
            });
            
            // Position second menu below first menu after render
            setTimeout(() => {
                if (menus.length > 1 && menus[0] && menus[1]) {
                    const firstMenu = menus[0];
                    // Force a reflow to get accurate height
                    firstMenu.style.display = "flex";
                    const firstMenuHeight = firstMenu.offsetHeight || firstMenu.scrollHeight || firstMenu.clientHeight;
                    const headerHeight = 70; // Match CSS top value
                    const secondMenuTop = headerHeight + firstMenuHeight;
                    menus[1].style.top = secondMenuTop + 'px';
                    console.log("First menu height:", firstMenuHeight, "Positioned second menu at:", secondMenuTop + 'px');
                }
            }, 50);
            
            updateIcon(true);
        }
    });

    // Close menu when clicking outside
    document.addEventListener("click", function(e) {
        const isClickInsideMenu = Array.from(menus).some(menu => menu.contains(e.target));
        const isClickOnButton = menuBtn.contains(e.target);
        
        if (!isClickOnButton && !isClickInsideMenu) {
            menus.forEach(menu => {
                menu.classList.remove("menu-open");
                // Remove inline styles
                menu.style.display = "";
                menu.style.flexDirection = "";
                menu.style.position = "";
                menu.style.top = "";
                menu.style.left = "";
                menu.style.right = "";
                menu.style.width = "";
                menu.style.background = "";
                menu.style.zIndex = "";
                menu.style.padding = "";
                menu.style.boxShadow = "";
                menu.style.maxHeight = "";
                menu.style.overflowY = "";
                menu.style.visibility = "";
                menu.style.opacity = "";
                menu.style.margin = "";
                
                // Hide parent nav
                const navParent = menu.closest('nav');
                if (navParent) {
                    navParent.style.display = "";
                    navParent.style.visibility = "";
                    navParent.style.position = "";
                }
            });
            updateIcon(false);
        }
    });

    // Close menu when clicking on a nav link (if not a dropdown)
        menus.forEach(menu => {
        const links = menu.querySelectorAll(".nav-link");
        links.forEach(link => {
            link.addEventListener("click", function(e) {
                const navItem = link.closest(".nav-item");
                const dropdown = navItem ? navItem.querySelector(".dropdown") : null;
                
                // If no dropdown, close menu after navigation
                if (!dropdown) {
                    setTimeout(() => {
                        menus.forEach(m => {
                            m.classList.remove("menu-open");
                            // Remove inline styles
                            m.style.display = "";
                            m.style.flexDirection = "";
                            m.style.position = "";
                            m.style.top = "";
                            m.style.left = "";
                            m.style.right = "";
                            m.style.width = "";
                            m.style.background = "";
                            m.style.zIndex = "";
                            m.style.padding = "";
                            m.style.boxShadow = "";
                            m.style.maxHeight = "";
                            m.style.overflowY = "";
                            m.style.visibility = "";
                            m.style.opacity = "";
                            m.style.margin = "";
                            
                            // Hide parent nav
                            const navParent = m.closest('nav');
                            if (navParent) {
                                navParent.style.display = "";
                                navParent.style.visibility = "";
                                navParent.style.position = "";
                            }
                        });
                        updateIcon(false);
                    }, 100);
                }
            });
        });
    });

    // Handle dropdown toggles on mobile
    const navItems = document.querySelectorAll(".main-header .nav-item");
    navItems.forEach(item => {
        const link = item.querySelector(".nav-link");
        const dropdown = item.querySelector(".dropdown");
        
        if (link && dropdown) {
            link.addEventListener("click", function(e) {
                // On mobile, toggle dropdown instead of navigating
                if (window.innerWidth <= 1189) {
                    e.preventDefault();
                    e.stopPropagation();
                    item.classList.toggle("active");
                }
            });
        }
    });
});
</script>
<script>
window.addEventListener("load", function() {

    const text = "WELCOME TO";
    const arc = document.getElementById("arcText");
    const logo = document.getElementById("logo");

    // STEP 1 — Create letters in arc
    text.split("").forEach((char, index) => {
        const span = document.createElement("span");
        span.textContent = char;
        span.style.animationDelay = (index * 0.2) + "s"; // staggered fade-in
        arc.appendChild(span);
    });

    // STEP 2 — After letters finish, show logo
    const totalTime = text.length * 200; // ms

    setTimeout(() => {
        logo.classList.add("show");
    }, totalTime + 300);

    // STEP 3 — Remove preloader after everything
    const preloader = document.getElementById("preloader");
    setTimeout(() => {
        preloader.style.opacity = "0";
        setTimeout(() => {
            preloader.style.display = "none";
        }, 600);
    }, totalTime + 2500); 
});

</script>



