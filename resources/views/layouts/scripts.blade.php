{{-- -----------------------------------Links to Change----------------------------------- --}}

<!-- Js Files -->
<!-- jQuery (Required for FancyBox and Slick Slider) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

<!-- FancyBox (For Lightbox Functionality) -->
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<!-- AOS (Animate on Scroll) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://js.stripe.com/v3/"></script>

<!-- Custom JS (Place at the end to ensure it loads last) -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    const slider = document.getElementById("categorySlider");

    function slideLeft() {
        slider.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    }

    function slideRight() {
        slider.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    }
</script>

<script>
    var swiper = new Swiper(".testimonial-slider", {
        slidesPerView: 1.2,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: ".testimonial-next",
            prevEl: ".testimonial-prev",
        },
        breakpoints: {
            992: {
                slidesPerView: 1.5
            }
        }
    });
</script>

<script>
    document.querySelectorAll('.product-thumbs img').forEach(img => {
        img.onclick = () => {
            document.querySelector('.product-main-img img').src = img.src;
        }
    });

    document.querySelectorAll('.acc-item h6').forEach(header => {
        header.onclick = () => {
            header.nextElementSibling.classList.toggle('show');
            header.nextElementSibling.style.display =
                header.nextElementSibling.style.display === 'block' ? 'none' : 'block';
        };
    });
</script>

<script>
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.dataset.tab).classList.add('active');
        });
    });
</script>
<script>
    document.getElementById("openReview").addEventListener("click", function() {
        document.getElementById("reviewForm").style.display = "block";
        this.style.display = "none";
    });

    document.getElementById("cancelReview").addEventListener("click", function() {
        document.getElementById("reviewForm").style.display = "none";
        document.getElementById("openReview").style.display = "inline-block";
    });
</script>

<script>
    const openCart = document.getElementById("openCart");
    const cartModal = document.querySelector(".cart-modal");
    const overlay = document.querySelector(".cart-modal-overlay");
    const closeBtn = document.querySelector(".close-cart");

    document.querySelectorAll(".openCart").forEach(btn => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();

            cartModal.classList.add("active");
            overlay.classList.add("active");
        });
    });

    closeBtn.addEventListener("click", closeCart);
    overlay.addEventListener("click", closeCart);

    function closeCart() {
        cartModal.classList.remove("active");
        overlay.classList.remove("active");
    }
</script>


<script>
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-item")) {
            e.target.closest(".cart-item").remove(); // dummy remove
        }
    });
</script>

<script>
    $(document).ready(function() {

        // OPEN SEARCH
        $(document).on("click", ".openSearch", function(e) {
            e.preventDefault();

            $(".search-sidebar").addClass("active");
            $(".search-overlay").addClass("active");
        });

        // CLOSE SEARCH
        $(".close-search, .search-overlay").click(function() {
            $(".search-sidebar").removeClass("active");
            $(".search-overlay").removeClass("active");
        });

        // REALTIME SEARCH
        $("#productSearch").keyup(function() {

            let query = $(this).val();

            if (query.length < 1) {
                $("#search-results").html('');
                $("#viewAllBtn").addClass('d-none');
                return;
            }

            $.ajax({
                url: "{{ route('product.search') }}",
                type: "GET",
                data: {
                    query: query
                },
                success: function(response) {

                    $("#search-results").html(response.html);

                    $("#viewAllBtn")
                        .removeClass('d-none')
                        .attr('href', '/shop?search=' + encodeURIComponent(query));
                }
            });

        });

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (window.innerWidth >= 992) {

            document.querySelectorAll('.dropdown-toggle').forEach(function(el) {

                el.addEventListener('click', function(e) {
                    e.preventDefault(); // prevent dropdown click behavior on desktop
                    window.location.href = this.href; // go to brands page
                });

            });

        }

    });
</script>

{{-- -----------------------------------Links to Change----------------------------------- --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('dash/js/jquery.toast.js') }}"></script>
@if (Auth::guard('admin'))
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/content-management.js') }}"></script>
@endif
