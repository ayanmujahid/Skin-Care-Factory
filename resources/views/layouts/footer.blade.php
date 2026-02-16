<!-- Footer -->
<!--Footer-->

<footer class="footer">
    <div class="footer-container">
        <!-- Left Links -->
        <div class="footer-column footer-links">
            <a href="{{route('aboutUs')}}">About Us</a>
            <a href="{{route('contactUs')}}">Contact Us</a>
            <a href="{{route('testimonials')}}">Testimonials</a>
            <a href="{{route('shippingPolicy')}}">Shipping Policy</a>
            <a href="{{route('returnPolicy')}}">Refund Policy</a>
            <a href="{{route('privacyPolicy')}}">Privacy Policy</a>
            <!-- <a href="#">Delivery Info</a> -->
            <a href="{{route('termsAndConditions')}}">Terms and Conditions</a>
        </div>

        <!-- Center Info -->
        <div class="footer-column footer-center">
            <!-- <h2 class="footer-logo">Christelle<span>🥗</span>Store</h2> -->
             <img class="footer-logo" src="{{asset('assets/images/christelle-logo.png')}}" alt="Tasty Daily">
            <p>
                We’re Tasty Daily Shop, an innovative team of food engineers.
                Our unique model minimizes fresh food handling by up to 85%,
                sourcing locally and dispatching within hours through cold chain logistics
                in eco-friendly containers.
            </p>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p class="copyright">© 2025 Christelle Store</p>
        </div>

        <!-- Right Subscribe -->
        <div class="footer-column footer-right">
            <h3>Get Latest News</h3>
            <p>
                Sign up to get 10% off your first order and stay up to date
                on the latest product releases, special offers and news.
            </p>
            <form action="{{route('newsletterSubmit')}}" class="subscribe-form" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Your Email" required />
                    <button type="submit">Subscribe</button>
                </div>
            </form>
            <h4>Payment Accept</h4>
            <div class="payments">
                <img src="{{asset('assets/images/visa.webp')}}" alt="Visa">
                <img src="{{asset('assets/images/master.webp')}}" alt="Mastercard">
                <img src="{{asset('assets/images/paypal.webp')}}" alt="PayPal">
                <img src="{{asset('assets/images/amex.webp')}}" alt="Amex">
            </div>
        </div>
    </div>
</footer>

</body>
