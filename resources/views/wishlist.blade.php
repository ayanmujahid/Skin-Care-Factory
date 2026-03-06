@extends('layouts.main')
@section('content')
<!-- ================= Wishlist Banner ================= -->
 <!-- Bradcrumb Area -->
        <div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
            <div class="container">
				<div class="sf-breadcrumb">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="shop.html">Shop</a></li>
						<li>Wishlist</li>
					</ul>
				</div>
            </div>
        </div>
        <!--// Bradcrumb Area -->

		<!-- Page Conttent -->
		<main class="page-content">

			<!-- Shopping Cart Area -->
			<div class="wishlist-page-area section-padding-lg bg-white">
				<div class="container">
					
					<!-- Cart Products -->
					<div class="cart-table table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>			
									<th class="cart-column-image" scope="col">IMAGE</th>
									<th class="cart-column-productname" scope="col">PRODUCT</th>
									<th class="cart-column-price" scope="col">PRICE</th>
									<th class="cart-column-quantity" scope="col">QUANTITY</th>
									<th class="cart-column-addtocart" scope="col">ADD TO CART</th>
									<th class="cart-column-remove" scope="col">REMOVE</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>
										<a href="product-details-right-sidebar.html" class="product-image">
											<img src="{{asset('assets/img/product/small-size/product-image-1.jpg')}}" alt="product image">
										</a>
									</td>
									<td>
										<a href="product-details-right-sidebar.html" class="product-title">Aenean sagittis</a>
									</td>
									<td>£75.00</td>
									<td>
										<div class="quantity-select">
											<input type="text" value="1">
										</div>
									</td>
									<td>
										<a href="#" class="sf-button sf-button-sm">
                                            <span>ADD TO CART</span>
                                        </a>
									</td>
									<td>
										<button class="remove-product"><i class="ti ti-close"></i></button>
									</td>
								</tr>

								<tr>
									<td>
										<a href="product-details-right-sidebar.html" class="product-image">
											<img src="{{asset('assets/img/product/small-size/product-image-2.jpg')}}" alt="product image">
										</a>
									</td>
									<td>
										<a href="product-details-right-sidebar.html" class="product-title">Elementum felis</a>
									</td>
									<td>£75.00</td>
									<td>
										<div class="quantity-select">
											<input type="text" value="1">
										</div>
									</td>
									<td>
										<a href="#" class="sf-button sf-button-sm">
                                            <span>ADD TO CART</span>
                                        </a>
									</td>
									<td>
										<button class="remove-product"><i class="ti ti-close"></i></button>
									</td>
								</tr>

								<tr>
									<td>
										<a href="product-details-right-sidebar.html" class="product-image">
											<img src="{{asset('assets/img/product/small-size/product-image-3.jpg')}}" alt="product image">
										</a>
									</td>
									<td>
										<a href="product-details-right-sidebar.html" class="product-title">Aenean sagittis</a>
									</td>
									<td>£75.00</td>
									<td>
										<div class="quantity-select">
											<input type="text" value="1">
										</div>
									</td>
									<td>
										<a href="#" class="sf-button sf-button-sm">
                                            <span>ADD TO CART</span>
                                        </a>
									</td>
									<td>
										<button class="remove-product"><i class="ti ti-close"></i></button>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					<!--// Cart Products -->

					<!-- Similliar Products -->
					<div class="similliar-products section-padding-top-lg">
						<h4 class="small-title">SIMILLIAR PRODUCTS</h4>
						<div class="row products-slider-active slider-navigation-1 products-wrapper">

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
										<h6><a href="product-details.html">Full Body Shapewear</a></h6>
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
										<h6><a href="product-details.html">Full Body Shapewear</a></h6>
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
										<h6><a href="product-details.html">Full Body Shapewear</a></h6>
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
										<h6><a href="product-details.html">Full Body Shapewear</a></h6>
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
										<h6><a href="product-details.html">Full Body Shapewear</a></h6>
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
										<h6><a href="product-details.html">Full Body Shapewear</a></h6>
										<span class="pricebox">$50.00</span>
									</div>
								</div>	
							</div>
							<!--// Single product -->
	
						</div>
					</div>
					<!--// Similliar Products -->

				</div>
			</div>
			<!--// Shopping Cart Area -->

		</main>
		<!--// Page Conttent -->
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection