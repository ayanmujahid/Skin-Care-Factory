@extends('layouts.main')
@section('content')

<div class="hero-area slider-navigation-1">

			<!-- Single Slide Item -->
			<div class="single-hero-item bg-grey d-flex align-items-center">
				<div class="container">
					<div class="hero-item-inner">
						<div class="row align-items-center justify-content-center">
							<div class="col-xl-6 col-lg-7 col-md-7 col-12 order-2 order-md-1">
								<div class="hero-content">
									<h1><span>SHAPE UP YOU</span> GET YOUR BODY SLIMFIT</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiunt ut labore et dmagna aliqua. Ut enim ad minim veniam, quis nostrud .</p>
									<a href="shop-right-sidebar.html" class="sf-button">
										<span>Shop Now</span>
									</a>
								</div>
							</div>
							<div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 order-1 order-md-2 align-self-end">
								<div class="hero-image">
									<img src="{{asset('assets/img/hero-image/hero-image-1.png')}}" alt="hero image">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Single Slide Item -->

			<!-- Single Slide Item -->
			<div class="single-hero-item bg-grey d-flex align-items-center">
				<div class="container">
					<div class="hero-item-inner">
						<div class="row align-items-center justify-content-center">
							<div class="col-xl-6 col-lg-7 col-md-7 col-12 order-2 order-md-1">
								<div class="hero-content">
									<h1><span>AWESOME SHAPE</span>SLIMFIT BODY MAKER</h1>
									<p>Amet, a ratione sunt quia accusantium labore. Magni quas error, voluptatum beatae saepe magnam commodi possimus ex impedit aliquam.</p>
									<a href="shop-right-sidebar.html" class="sf-button">
										<span>Shop Now</span>
									</a>
								</div>
							</div>
							<div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 order-1 order-md-2 align-self-end">
								<div class="hero-image">
									<img src="{{asset('assets/img/hero-image/hero-image-2.png')}}" alt="hero image">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Single Slide Item -->

			<!-- Single Slide Item -->
			<div class="single-hero-item bg-grey d-flex align-items-center">
				<div class="container">
					<div class="hero-item-inner">
						<div class="row align-items-center justify-content-center">
							<div class="col-xl-6 col-lg-7 col-md-7 col-12 order-2 order-md-1">
								<div class="hero-content">
									<h1><span>BEAUTIFUL SHAPE</span>STAY SLIMFIT FOREVER</h1>
									<p>Magni cupiditate soluta omnis dicta recusandae pariatur laboriosam obcaecati explicabo consequatur doloribus, molestias a, esse officia.</p>
									<a href="shop-right-sidebar.html" class="sf-button">
										<span>Shop Now</span>
									</a>
								</div>
							</div>
							<div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 order-1 order-md-2 align-self-end">
								<div class="hero-image">
									<img src="{{asset('assets/img/hero-image/hero-image-3.png')}}" alt="hero image">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Single Slide Item -->

		</div>
		<!--// Hero Area -->

		<!-- Page Conttent -->
		<main class="page-content">

			<!-- Banner Area -->
			<div class="banners-area bg-white">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-7 col-12 mt-30">
							<div class="image-banner">
								<a href="{{route('productDetails')}}">
									<img src="{{asset('assets/img/banners/banner-image-1.jpg')}}" alt="Banner Image 1">
								</a>
							</div>
						</div>
						<div class="col-lg-5 col-md-5 col-12 mt-30">
							<div class="image-banner">
								<a href="{{route('productDetails')}}">
									<img src="{{asset('assets/img/banners/banner-image-2.jpg')}}" alt="Banner Image 2">
								</a>
							</div>
						</div>
						<div class="col-12 mt-30">
							<div class="image-banner">
								<a href="{{route('productDetails')}}">
									<img src="{{asset('assets/img/banners/banner-image-3.jpg')}}" alt="Banner Image 3">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Banner Area -->

			<!-- Section New Arrival -->
			<div class="sf-section new-arrival-area section-padding-lg bg-white">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="section-title text-center">
								<h6>BE THE HOURGLASS</h6>
								<h3>NEW ARRIVAL</h3>
							</div>
						</div>
					</div>
					<div class="row products-wrapper products-slider-active slider-navigation-1">

						<!-- Single product -->
						<div class="col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-1.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-5.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">New</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-2.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-6.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">New</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-3.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-7.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox"><del>$60.00</del> $50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-4.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-8.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">Sale</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-9.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-13.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">Sale</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox"><del>$60.00</del> $50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-10.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-14.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">New</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-11.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-15.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox"><del>$60.00</del> $50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

					</div>
				</div>
			</div>
			<!--// Section New Arrival -->

			<!-- Fullwidth Banner -->
			<div class="sf-section fullwidth-banner-area section-padding-lg bg-banner-1" data-white-overlay="7">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-8 col-sm-10 col-12">
							<div class="banner-content text-center">
								<h6>NEW ARRIVAL</h6>
								<h2><span>40%</span> OFF FOR ALL</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiunt ut labore et dmagna aliqua.</p>
								<a href="shop.html" class="sf-button">
									<span>Shop Now</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Fullwidth Banner -->

			<!-- Featured Shop Item -->
			<div class="sf-section featured-shop-item section-padding-lg bg-white">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="section-title text-center">
								<h6>FEATURED SHOP ITEM</h6>
								<h3>FEATURED PRODUCT</h3>
							</div>
						</div>
					</div>

					<div class="row products-wrapper">

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-9.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-13.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">Sale</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox"><del>$60.00</del> $50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-10.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-14.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">New</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-11.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-15.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox"><del>$60.00</del> $50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-12.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-16.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-1.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-5.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">New</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-2.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-6.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">New</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox"><del>$60.00</del> $50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-3.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-7.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox"><del>$60.00</del> $50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

						<!-- Single product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product-item">
								<div class="product-item-topside">
									<div class="product-item-images">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-4.jpg')}}" alt="product image">
										<img src="{{asset('assets/img/product/thumbnail-size/product-image-8.jpg')}}" alt="product image">
									</div>
									<ul class="product-item-actions">
										<li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a></li>
										<li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
										<li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a></li>
										<li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a></li>
									</ul>
									<span class="product-item-badge">Sale</span>
								</div>
								<div class="product-item-bottomside">
									<div class="ratting-box">
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span class="active"><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
										<span><i class="ti ti-star"></i></span>
									</div>
									<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
									<span class="pricebox">$50.00</span>
								</div>
							</div>	
						</div>
						<!--// Single product -->

					</div>

				</div>
			</div>
			<!--// Featured Shop Item -->

			<!-- Banner Area -->
			<div class="sf-section banners-area bg-white section-padding-bottom-lg">
				<div class="container">
					<div class="image-banner-wrapper">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="image-banner mt-30">
									<a href="{{route('productDetails')}}">
										<img src="{{asset('assets/img/banners/banner-image-4.jpg')}}" alt="Banner Image 4">
									</a>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="image-banner mt-30">
									<a href="{{route('productDetails')}}">
										<img src="{{asset('assets/img/banners/banner-image-5.jpg')}}" alt="Banner Image 5">
									</a>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="image-banner mt-30">
									<a href="{{route('productDetails')}}">
										<img src="{{asset('assets/img/banners/banner-image-6.jpg')}}" alt="Banner Image 6">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Banner Area -->

			<!-- Random Products View -->
			<div class="sf-section random-products-view bg-grey section-padding-lg">
				<div class="container">
					<div class="random-products-margin-fix">
						<div class="row">

							<!-- Single Column -->
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="random-products-column">
									<h6>RANDOM PRODUCTS</h6>
									<div class="random-products-wrapper">

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-1.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-2.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox"><del>$60.00</del> $50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-3.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

									</div>
								</div>
							</div>
							<!--// Single Column -->

							<!-- Single Column -->
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="random-products-column">
									<h6>NEW ARRIVAL PRODUCT</h6>
									<div class="random-products-wrapper">

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-4.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-5.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox"><del>$60.00</del> $50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-6.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

									</div>
								</div>
							</div>
							<!--// Single Column -->

							<!-- Single Column -->
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="random-products-column">
									<h6>BEST SELLER PRODUCT</h6>
									<div class="random-products-wrapper">

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-7.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox"><del>$60.00</del> $50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-8.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-9.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

									</div>
								</div>
							</div>
							<!--// Single Column -->

							<!-- Single Column -->
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="random-products-column">
									<h6>ON SALE PRODUCT</h6>
									<div class="random-products-wrapper">

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-10.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox"><del>$60.00</del> $50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-11.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

										<!-- Single product -->
										<div class="product-item product-item-mini">
											<div class="product-item-topside">
												<div class="product-item-images">
													<img src="{{asset('assets/img/product/mini-size/product-image-mini-12.png')}}" alt="product image">
												</div>
												<ul class="product-item-actions">
													<li><a href="{{route('productDetails')}}"><i class="ti ti-share"></i></a></li>
												</ul>
											</div>
											<div class="product-item-bottomside">
												<h6><a href="{{route('productDetails')}}">Full Body Shapewear</a></h6>
												<div class="ratting-box">
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span class="active"><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
													<span><i class="ti ti-star"></i></span>
												</div>
												<span class="pricebox">$50.00</span>
											</div>
										</div>
										<!--// Single product -->

									</div>
								</div>
							</div>
							<!--// Single Column -->

						</div>
					</div>
				</div>
			</div>
			<!--// Random Products View -->

			<!-- Blog Area -->
			<div class="sf-section blog-area bg-white section-padding-lg">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="section-title text-center">
								<h6>FEATURED SHOP ITEM</h6>
								<h3>FROM OUR LATEST BLOG</h3>
							</div>
						</div>
					</div>

					<div class="row blog-slider-active slider-navigation-1">

						<!-- Single Blog -->
						<div class="col-12">
							<div class="blog-item">
								<div class="blog-item-image">
									<img src="{{asset('assets/img/blog/blog-image-1.jpg')}}" alt="blog image">
								</div>
								<div class="blog-item-content">
									<div class="blog-item-content-inner">
										<span class="blog-item-author">By: <a href="blog.html">Denial Mikko</a></span>
										<h6 class="blog-item-title"><a href="blog-details.html">NAOMI & NICOLE CLASSIC BODYSHORT </a></h6>
										<p>Lorem ipsum or sit amet, consectetur adipisicing elit, sed por incididunt ut laborer.</p>
										<div class="blog-item-meta">
											<span>20th July, 2018</span>
											<span><a href="#">Comment’s : 05</a></span>
											<span><a href="#">Like : 08</a></span>
										</div>
										<a href="blog-details.html" class="sf-button sf-button-transparent sf-button-sm">
											<span>Read More</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--// Single Blog -->

						<!-- Single Blog -->
						<div class="col-12">
							<div class="blog-item">
								<div class="blog-item-image">
									<img src="{{asset('assets/img/blog/blog-image-2.jpg')}}" alt="blog image">
								</div>
								<div class="blog-item-content">
									<div class="blog-item-content-inner">
										<span class="blog-item-author">By: <a href="blog.html">Denial Mikko</a></span>
										<h6 class="blog-item-title"><a href="blog-details.html">NAOMI & NICOLE CLASSIC BODYSHORT </a></h6>
										<p>Lorem ipsum or sit amet, consectetur adipisicing elit, sed por incididunt ut laborer.</p>
										<div class="blog-item-meta">
											<span>20th July, 2018</span>
											<span><a href="#">Comment’s : 05</a></span>
											<span><a href="#">Like : 08</a></span>
										</div>
										<a href="blog-details.html" class="sf-button sf-button-transparent sf-button-sm">
											<span>Read More</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--// Single Blog -->

						<!-- Single Blog -->
						<div class="col-12">
							<div class="blog-item">
								<div class="blog-item-image">
									<img src="{{asset('assets/img/blog/blog-image-3.jpg')}}" alt="blog image">
								</div>
								<div class="blog-item-content">
									<div class="blog-item-content-inner">
										<span class="blog-item-author">By: <a href="blog.html">Denial Mikko</a></span>
										<h6 class="blog-item-title"><a href="blog-details.html">NAOMI & NICOLE CLASSIC BODYSHORT </a></h6>
										<p>Lorem ipsum or sit amet, consectetur adipisicing elit, sed por incididunt ut laborer.</p>
										<div class="blog-item-meta">
											<span>20th July, 2018</span>
											<span><a href="#">Comment’s : 05</a></span>
											<span><a href="#">Like : 08</a></span>
										</div>
										<a href="blog-details.html" class="sf-button sf-button-transparent sf-button-sm">
											<span>Read More</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--// Single Blog -->

						<!-- Single Blog -->
						<div class="col-12">
							<div class="blog-item">
								<div class="blog-item-image">
									<img src="{{asset('assets/img/blog/blog-image-4.jpg')}}" alt="blog image">
								</div>
								<div class="blog-item-content">
									<div class="blog-item-content-inner">
										<span class="blog-item-author">By: <a href="blog.html">Denial Mikko</a></span>
										<h6 class="blog-item-title"><a href="blog-details.html">NAOMI & NICOLE CLASSIC BODYSHORT </a></h6>
										<p>Lorem ipsum or sit amet, consectetur adipisicing elit, sed por incididunt ut laborer.</p>
										<div class="blog-item-meta">
											<span>20th July, 2018</span>
											<span><a href="#">Comment’s : 05</a></span>
											<span><a href="#">Like : 08</a></span>
										</div>
										<a href="blog-details.html" class="sf-button sf-button-transparent sf-button-sm">
											<span>Read More</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--// Single Blog -->

					</div>
				</div>
			</div>
			<!--// Blog Area -->

			<!-- Supports Area -->
			<div class="sf-section supports-area bg-white section-padding-bottom-lg">
				<div class="container">
					<div class="support-items-wrapper">
						<div class="support-item">
							<span class="support-item-icon">
								<img src="{{asset('assets/img/icons/icon-reload.png')}}" alt="return">
							</span>
							<h5>90 DAYS RETURN</h5>
							<p>30 days for free return</p>
						</div>
						<div class="support-item">
							<span class="support-item-icon">
								<img src="{{asset('assets/img/icons/icon-support.png')}}" alt="return">
							</span>
							<h5>24/7 SUPPORT</h5>
							<p>30 days for free return</p>
						</div>
						<div class="support-item">
							<span class="support-item-icon">
								<img src="{{asset('assets/img/icons/icon-origami.png')}}" alt="return">
							</span>
							<h5>FREE SHIPPING</h5>
							<p>Gift card on 2 purchase</p>
						</div>
						<div class="support-item">
							<span class="support-item-icon">
								<img src="{{asset('assets/img/icons/icon-present.png')}}" alt="return">
							</span>
							<h5>GIFT CARD</h5>
							<p>Gift card on 2 purchase</p>
						</div>
					</div>
				</div>
			</div>
			<!--// Supports Area -->

		</main>
		<!--// Page Conttent -->

@endsection
@section('css')
    <style type="text/css">
        /* Video Section Styling */
    </style>
@endsection
@section('js')
    <script type="text/javascript"></script>
@endsection
