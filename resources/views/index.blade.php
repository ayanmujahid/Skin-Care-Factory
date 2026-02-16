@extends('layouts.main')
@section('content')
 
<section class="hero-section" style=" background-image:  url('{{ asset('assets/images/banner-image.jpg') }}');">
  <div class="hero-container">
    <div class="hero-content">
      <h1 class="hero-title">
        Order Tasty Fruits<br>
        and Get Free Delivery!
      </h1>
      <div class="hero-actions">
        <a href="#shop" class="btn-explore">
          <i class="fa-solid fa-bag-shopping"></i>
          Explore Shop
        </a>
        <div class="hero-text">2500+ Fresh Products 2</div>
      </div>
    </div>
    <!-- <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1610832958506-aa56368176cf?w=800&q=80" alt="Fresh Fruits Collection">
            </div> -->
  </div>
</section>

<!-- Demo Content Below Hero -->
<section class="promo-section container mt-3 py-5">
  <div class="promo-grid">
    <!-- Card 1 -->
    <div class="promo-card" style="background-color:#DFF2E1;">
      <div class="promo-content">
        <h3>Fresh Seafood Everyday.</h3>
        <a href="#" class="promo-btn">Shop Now</a>
      </div>
      <img src="{{asset('assets/images/category-one.jpg')}}" alt="Fresh Seafood">
    </div>

    <!-- Card 2 -->
    <div class="promo-card" style="background-color:#FDE8C9;">
      <div class="promo-content">
        <h3>Sweet Organic Drinks</h3>
        <a href="#" class="promo-btn">Shop Now</a>
      </div>
      <img src="{{asset('assets/images/category-two.jpg')}}" alt="Organic Drinks">
    </div>

    <!-- Card 3 -->
    <div class="promo-card" style="background-color:#D4EBF2;">
      <div class="promo-content">
        <h3>For Steak Lovers</h3>
        <a href="#" class="promo-btn">Shop Now</a>
      </div>
      <img src="{{asset('assets/images/category-three.jpg')}}" alt="Steak Lovers">
    </div>
  </div>
</section>


<section class="bestsellers-section">
  <div class="container">
    <div class="section-header">
      <h2>Bestsellers in September</h2>
    </div>

    <div class="products-grid">
      <!-- Product 1 -->
      <div class="product-card">
        <div class="product-image">
          <img src="{{asset('assets/images/p1.jpg')}}" alt="Ewan Still Water">
        </div>
        <div class="product-info">
          <h3 class="product-title">Ewan Still Water in 500 Ml X 12</h3>
          <p class="product-description">It's a uniquely sourced spring water that's always refreshing and naturally hydrating.</p>
          <div class="product-price">
            <span class="current-price">$20.00</span>
          </div>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="product-card">
        <div class="product-image">
          <img src="{{asset('assets/images/p2.jpg')}}" alt="Spring Onions">
        </div>
        <div class="product-info">
          <h3 class="product-title">Spring Onions 1 Bunch</h3>
          <p class="product-description">Go for spring onions with firm, unblemished bulbs and bright green, perky leaves.</p>
          <div class="product-price">
            <span class="current-price">$10.00</span>
          </div>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="product-card">
        <div class="product-image">
          <img src="{{asset('assets/images/p3.jpg')}}" alt="Red Radish">
        </div>
        <div class="product-info">
          <h3 class="product-title">Red Radish 1 Pack</h3>
          <p class="product-description">The color of a radish is a strong indicator of its taste. Pick the ones that are a rich, full red.</p>
          <div class="product-price">
            <span class="current-price">$8.00</span>
          </div>
        </div>
      </div>

      <!-- Product 4 -->
      <div class="product-card">
        <div class="product-image">
          <img src="{{asset('assets/images/p4.jpg')}}" alt="Boisli">
        </div>
        <div class="product-info">
          <h3 class="product-title">Boisli</h3>
          <p class="product-description">To keep boisli fresh, trim the stems and place them in a glass or jar of water.</p>
          <div class="product-price">
            <span class="current-price">$12.00</span>
          </div>
        </div>
      </div>

      <!-- Product 5 -->
      <div class="product-card">
        <div class="product-image">
          <img src="{{asset('assets/images/p5.jpg')}}" alt="Leafy Greens">
        </div>
        <div class="product-info">
          <h3 class="product-title">Leafy Green 2 units</h3>
          <p class="product-description">Fresh leafy greens packed with nutrients and flavor for your healthy meals.</p>
          <div class="product-price">
            <span class="current-price">$10.00</span>
          </div>
        </div>
      </div>

      <!-- Product 6 -->
      <div class="product-card">
        <div class="product-image">
          <img src="{{asset('assets/images/p6.jpg')}}" alt="Root Vegetables">
        </div>
        <div class="product-info">
          <h3 class="product-title">Root Vegetables Bundle</h3>
          <p class="product-description">A selection of fresh root vegetables including radishes, carrots, and more.</p>
          <div class="product-price">
            <span class="original-price">$20.00</span>
            <span class="current-price">$10.00</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="video-cont">
  <div class="video-container">
    <div class="video-wrapper">
      <div class="video-thumbnail">
        <img src="{{asset('assets/images/banner-image.jpg')}}" alt="Video Thumbnail" class="thumbnail-image">
        <div class="play-button-overlay">
          <button class="play-button" onclick="playVideo()">
            <svg viewBox="0 0 24 24" width="80" height="80">
              <path d="M8 5v14l11-7z" fill="white"/>
            </svg>
          </button>
        </div>
      </div>
      <video id="mainVideo" src="{{asset('assets/images/v1.mp4')}}" controls class="video-element" style="display: none;"></video>
    </div>
    <div class="video-info">
      <h3>Discover Fresh Produce Delivered</h3>
      <p>Watch how we source and deliver the freshest fruits and vegetables directly to your doorstep with quality assurance at every step.</p>
    </div>
  </div>
</section>

<div class="big-sales-container">
  <div class="left-section">
    <div class="header-v">
      <h1>Big Sales Today</h1>
      <div class="countdown">
        <div class="countdown-item">
          <div class="countdown-number">2</div>
          <div class="countdown-label">days</div>
        </div>
        <div class="countdown-item">
          <div class="countdown-number">00</div>
          <div class="countdown-label">hours</div>
        </div>
        <div class="countdown-item">
          <div class="countdown-number">42</div>
          <div class="countdown-label">mins</div>
        </div>
        <div class="countdown-item">
          <div class="countdown-number">00</div>
          <div class="countdown-label">secs</div>
        </div>
      </div>
    </div>

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <!-- Product 1: Mint -->
        <div class="swiper-slide">
          <div class="product-card-v">
            <div class="product-image-container-v">
              <div class="badges">
                <span class="badge-v markdown">MARKDOWN</span>
                <span class="badge-v new">NEW</span>
              </div>
              <span class="discount-badge-v">-13%</span>
              <img src="{{asset('assets/images/p4.jpg')}}" alt="Mint" />
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width: 67%;"></div>
            </div>
            <div class="stock-info">
              <span>Sold: 43</span>
              <span>Available: 21</span>
            </div>
            <h3 class="product-title-v">Mint</h3>
            <p class="product-category">Leafy Green</p>
            <div class="quantity-selector">
              <select>
                <option>Choose an option</option>
                <option>1 unit</option>
                <option>2 units</option>
                <option>3 units</option>
              </select>
            </div>
            <div class="price-row">
              <div class="price-container">
                <span class="current-price-v">$13.00</span>
                <span class="original-price-v">$22.00</span>
              </div>
              <button class="add-to-cart">
                <svg viewBox="0 0 24 24">
                  <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Product 2: Basil -->
        <div class="swiper-slide">
          <div class="product-card-v">
            <div class="product-image-container-v">
              <div class="badges">
                <span class="badge-v new">NEW</span>
              </div>
              <span class="discount-badge-v">-20%</span>
              <img src="{{asset('assets/images/p4.jpg')}}" alt="Basil" />
            </div>
            <h3 class="product-title-v">Basil</h3>
            <p class="product-category">Leafy Green</p>
            <div class="quantity-selector">
              <select>
                <option>2 units</option>
                <option>1 unit</option>
                <option>3 units</option>
              </select>
            </div>
            <span class="stock-badge in-stock">126 IN STOCK</span>
            <div class="price-row">
              <div class="price-container">
                <span class="current-price-v">$8.00</span>
                <span class="original-price-v">$10.00</span>
              </div>
              <button class="add-to-cart">
                <svg viewBox="0 0 24 24">
                  <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Product 3: Oyster Mushroom -->
        <div class="swiper-slide">
          <div class="product-card-v">
            <div class="product-image-container-v">
              <span class="discount-badge-v">-25%</span>
              <img src="{{asset('assets/images/oister.jpg')}}" alt="Oyster Mushroom" />
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width: 31%;"></div>
            </div>
            <div class="stock-info">
              <span>Sold: 54</span>
              <span>Available: 120</span>
            </div>
            <h3 class="product-title-v">Oyster Mushroom 500 Gr</h3>
            <p class="product-category">Mushrooms</p>
            <div class="country-flags">
              <svg width="24" height="18" viewBox="0 0 24 18">
                <rect width="24" height="18" fill="#002395" />
                <rect width="16" height="18" fill="#fff" />
                <rect width="8" height="18" fill="#ED2939" />
              </svg>
              <svg width="24" height="18" viewBox="0 0 24 18">
                <rect width="24" height="6" fill="#009246" />
                <rect y="6" width="24" height="6" fill="#fff" />
                <rect y="12" width="24" height="6" fill="#CE2B37" />
              </svg>
            </div>
            <span class="stock-badge in-stock">120 IN STOCK</span>
            <div class="price-row">
              <div class="price-container">
                <span class="current-price-v">$12.00</span>
                <span class="original-price-v">$15.00</span>
              </div>
              <button class="add-to-cart">
                <svg viewBox="0 0 24 24">
                  <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Product 4: Kiwi -->
        <div class="swiper-slide">
          <div class="product-card-v">
            <div class="product-image-container-v">
              <span class="discount-badge-v">-33%</span>
              <span class="out-of-stock-badge">OUT OF STOCK</span>
              <img src="{{asset('assets/images/kiwi.jpg')}}" alt="Kiwi" />
            </div>
            <h3 class="product-title-v">Kiwi</h3>
            <p class="product-category">Tropical & Exotic</p>
            <div class="color-options">
              <div class="color-dot" style="background-color: #8fbc4e; border-color: #8fbc4e;"></div>
              <div class="color-dot" style="background-color: #f4d03f;"></div>
            </div>
            <span class="stock-badge out">OUT OF STOCK</span>
            <div class="price-row">
              <div class="price-container">
                <span class="current-price-v">$10.00</span>
                <span class="original-price-v">$15.00</span>
              </div>
              <button class="add-to-cart">
                <svg viewBox="0 0 24 24">
                  <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <div class="promo-card-v"
    style="background-image: linear-gradient(135deg, rgba(142, 188, 78, 0) 0%, rgba(167, 204, 108, 0) 100%), url('{{asset('assets/images/best-sales.jpg')}}'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;">
    <h2>Tasty Cheeses From Farm Vendors</h2>
    <button class="shop-now-btn">Shop Now</button>
  </div>

</div>


<div class="discount-section">
  <div class="discount-card" style="background-image: url('{{asset('assets/images/egg.jpg')}}');">
    <span class="discount-badge">-33%</span>
    <h3>For Ten<br>Chicken Eggs</h3>
  </div>

  <div class="discount-card" style="background-image: url('{{asset('assets/images/crab.jpg')}}');">
    <span class="discount-badge">-25%</span>
    <h3>Every Friday<br>Big Discounts<br>for Seafood</h3>
  </div>

  <div class="discount-card" style="background-image: url('{{asset('assets/images/cake.jpg')}}');">
    <span class="discount-badge">-15%</span>
    <h3>Excellent Bread<br>From Our<br>Bakers</h3>
  </div>

  <div class="discount-card" style="background-image: url('{{asset('assets/images/burger.jpg')}}');">
    <span class="discount-badge red">-50%</span>
    <h3>Order Burger<br>with Great<br>Meat</h3>
  </div>
</div>



<!-- 🟢 Product Lists Section -->
<div class="product-lists">
  <!-- Sale Products -->
  <div class="product-column">
    <h3>Sale Products</h3>
    <div class="product-item">
      <img src="{{asset('assets/images/mint.jpg')}}" alt="Mint">
      <div>
        <p class="title">Mint</p>
        <p class="price">$13.00 – $22.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/basil.jpg')}}" alt="Basil">
      <div>
        <p class="title">Basil</p>
        <p class="price">$8.00 – $16.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/oister.jpg')}}" alt="Oyster Mushroom 500 gr">
      <div>
        <p class="title">Oyster Mushroom 500 gr</p>
        <p class="price">$12.00 – $15.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/kiwi.jpg')}}" alt="Kiwi">
      <div>
        <p class="title">Kiwi</p>
        <p class="price">$10.00 – $15.00</p>
      </div>
    </div>
  </div>

  <!-- Top Selling -->
  <div class="product-column">
    <h3>Top Selling</h3>
    <div class="product-item">
      <img src="{{asset('assets/images/evian.jpg')}}" alt="Evian Still Water">
      <div>
        <p class="title">Evian Still Water in 500 ml × 12</p>
        <p class="price">$20.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/spring.jpg')}}" alt="Spring Onions 1 bunch">
      <div>
        <p class="title">Spring Onions 1 bunch</p>
        <p class="price">$10.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/redish.jpg')}}" alt="Red Radish 1 pack">
      <div>
        <p class="title">Red Radish 1 pack</p>
        <p class="price">$20.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/basil.jpg')}}" alt="Basil">
      <div>
        <p class="title">Basil</p>
        <p class="price">$8.00 – $16.00</p>
      </div>
    </div>
  </div>

  <!-- Recently Added -->
  <div class="product-column">
    <h3>Recently Added</h3>
    <div class="product-item">
      <img src="{{asset('assets/images/spring.jpg')}}" alt="Spring Onions">
      <div>
        <p class="title">Spring Onions 1 bunch</p>
        <p class="price">$10.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/mint.jpg')}}" alt="Mint">
      <div>
        <p class="title">Mint</p>
        <p class="price">$13.00 – $22.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/basil.jpg')}}" alt="Basil">
      <div>
        <p class="title">Basil</p>
        <p class="price">$8.00 – $16.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/carot.jpg')}}" alt="Carrots 1 kg">
      <div>
        <p class="title">Carrots 1 kg</p>
        <p class="price">$10.00</p>
      </div>
    </div>
  </div>

  <!-- Top Rated -->
  <div class="product-column">
    <h3>Top Rated</h3>
    <div class="product-item">
      <img src="{{asset('assets/images/menisez.jpg')}}" alt="Menissez Mini Pains Bake At Home">
      <div>
        <p class="title">Menissez Mini Pains Bake At Home</p>
        <p class="stars">★★★★★</p>
        <p class="price">$15.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/grapes.jpg')}}" alt="Delicious Grapes">
      <div>
        <p class="title">Delicious Grapes</p>
        <p class="stars">★★★★★</p>
        <p class="price">$14.00 – $16.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/avacado.jpg')}}" alt="Avocados 2 Units">
      <div>
        <p class="title">Avocados 2 Units</p>
        <p class="stars">★★★★★</p>
        <p class="price">$60.00</p>
      </div>
    </div>
    <div class="product-item">
      <img src="{{asset('assets/images/meat.jpg')}}" alt="Halal Chuck Steak 500 gr">
      <div>
        <p class="title">Halal Chuck Steak 500 gr</p>
        <p class="stars">★★★★★</p>
        <p class="price">$350.00</p>
      </div>
    </div>
  </div>
</div>



<!-- Welcome Modal -->
<div id="welcomeModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="Welcome" class="modal-image">
    <h2>Welcome to <span>Christelle Store!</span> 🍎</h2>
    <p>Enjoy fresh fruits, vegetables, and get <strong>free delivery</strong> on your first order!</p>
    <a href="/shop" class="explore-btn">Explore Shop</a>
  </div>
</div>


@endsection
@section('css')
    <style type="text/css">
        /* Video Section Styling */
        .video-cont {
            background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%);
            padding: 80px 20px;
            margin: 60px 0;
        }

        .video-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .video-thumbnail {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .thumbnail-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .video-thumbnail:hover .thumbnail-image {
            transform: scale(1.05);
        }

        .play-button-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
            cursor: pointer;
        }

        .video-thumbnail:hover .play-button-overlay {
            background: rgba(0, 0, 0, 0.5);
        }

        .play-button {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8fbc4e 0%, #7aa844 100%);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 12px 40px rgba(143, 188, 78, 0.5);
        }

        .play-button:hover {
            transform: scale(1.15);
            box-shadow: 0 15px 50px rgba(143, 188, 78, 0.7);
        }

        .play-button svg {
            margin-left: 5px;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.2));
        }

        .video-element {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 16px;
        }

        .video-info {
            text-align: center;
            animation: fadeInUp 0.6s ease;
        }

        .video-info h3 {
            font-size: 32px;
            font-weight: 600;
            color: #2c2c2c;
            margin: 0 0 18px 0;
            letter-spacing: -0.5px;
        }

        .video-info p {
            font-size: 17px;
            color: #666;
            line-height: 1.7;
            max-width: 700px;
            margin: 0 auto;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .video-cont {
                padding: 40px 15px;
                margin: 30px 0;
            }

            .video-wrapper {
                border-radius: 12px;
                margin-bottom: 20px;
            }

            .play-button {
                width: 70px;
                height: 70px;
            }

            .play-button svg {
                width: 50px;
                height: 50px;
            }

            .video-info h3 {
                font-size: 22px;
                margin-bottom: 12px;
            }

            .video-info p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .video-cont {
                padding: 30px 10px;
            }

            .play-button {
                width: 60px;
                height: 60px;
            }

            .video-info h3 {
                font-size: 18px;
            }

            .video-info p {
                font-size: 13px;
            }
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            function playVideo() {
                const thumbnail = document.querySelector('.video-thumbnail');
                const videoElement = document.getElementById('mainVideo');
                
                thumbnail.style.display = 'none';
                videoElement.style.display = 'block';
                videoElement.play();
            }

            window.playVideo = playVideo;

            // Reset video to thumbnail when it ends
            const videoElement = document.getElementById('mainVideo');
            if (videoElement) {
                videoElement.addEventListener('ended', function() {
                    document.querySelector('.video-thumbnail').style.display = 'flex';
                    videoElement.style.display = 'none';
                });
            }
        })()
    </script>
@endsection