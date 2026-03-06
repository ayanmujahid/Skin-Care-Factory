@extends('layouts.main')
@section('content')
     <!-- Bradcrumb Area -->
        <div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
            <div class="container">
				<div class="sf-breadcrumb">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="shop.html">Shop</a></li>
						<li>Shopping Cart</li>
					</ul>
				</div>
            </div>
        </div>
        <!--// Bradcrumb Area -->

		<!-- Page Conttent -->
		<main class="page-content">

			<!-- Shopping Cart Area -->
			<div class="cart-page-area section-padding-lg bg-white">
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
									<th class="cart-column-total" scope="col">TOTAL</th>
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
										<span class="total-price">£75.00</span>
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
										<span class="total-price">£75.00</span>
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
										<span class="total-price">£75.00</span>
									</td>
									<td>
										<button class="remove-product"><i class="ti ti-close"></i></button>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					<!--// Cart Products -->

					<!-- Cart Content -->
					<div class="cart-content">
						<div class="row justify-content-between">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="cart-content-left">
									<div class="button-group">
										<button class="sf-button sf-button-transparent">
											<span>UPDATE CART</span>
										</button>
										<button class="sf-button sf-button-dark">
											<span>CONTINUE SHOPPING</span>
										</button>
									</div>
									<div class="cart-content-coupon">
										<h6>COUPON</h6>
										<p>Enter your coupon code if you have one.</p>
										<form action="#" class="coupon-form">
											<input type="text" placeholder="Coupon code">
											<button class="sf-button">
												<span>APPLY COUPON</span>
											</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="cart-content-right">
									<h2>CART TOTALS</h2>
									<table class="cart-pricing-table">
										<tbody>
											<tr class="cart-subtotal">
												<th>SUBTOTAL</th>
												<td>£715.00</td>
											</tr>
											<tr class="cart-shipping">
												<th>SHIPPING</th>
												<td>£7.00</td>
											</tr>
											<tr class="cart-total">
												<th>Total</th>
												<td>£722.00</td>
											</tr>
										</tbody>
									</table>
									<a href="#" class="sf-button sf-button">
										<span>Proceed to Checkout</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!--// Cart Content -->

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
    <script>
        $(document).on('change', '.cart-qty', function() {
            let id = $(this).data('id');
            let qty = $(this).val();
            let row = $(this).closest('tr');

            $.post('/cart/update', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                quantity: qty
            }, function(res) {

                // update row subtotal
                row.find('.product-subtotal').text('Rs ' + res.item_total.toFixed(2));

                // update totals
                $('#cart-subtotal').text('Rs ' + res.cart_total.toFixed(2));
                $('#cart-total').text('Rs ' + res.cart_total.toFixed(2));
            });
        });

        $(document).on('click', '.remove-cart', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let row = $(this).closest('tr');

            $.post('/cart/remove', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            }, function(res) {

                // remove row
                row.remove();

                // update totals
                $('#cart-subtotal').text('Rs ' + res.cart_total.toFixed(2));
                $('#cart-total').text('Rs ' + res.cart_total.toFixed(2));

                // if cart empty
                if (res.cart_count === 0) {
                    $('#cart-table-body').html(
                        '<tr><td colspan="6" class="text-center">Cart is empty</td></tr>'
                    );

                    // optional: disable checkout
                    $('.wc-proceed-to-checkout').hide();
                }
            });
        });
    </script>
@endsection
