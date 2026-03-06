@extends('layouts.main')
@section('content')
  <!-- Bradcrumb Area -->
        <div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
            <div class="container">
				<div class="sf-breadcrumb">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>Shop</li>
					</ul>
				</div>
            </div>
        </div>
        <!--// Bradcrumb Area -->

        <!-- Page Conttent -->
		<main class="page-content">

            <!-- Shop Grid Area -->
            <div class="shop-grid-area section-padding-lg bg-white">
                <div class="container">
                    <div class="toolbox">
                        <div class="toolbox-view">
                            <button class="active" data-product-view="grid"><i class="ti ti-layout-grid3"></i></button>
                            <button data-product-view="list"><i class="ti ti-list"></i></button>
                        </div>
                        <div class="toolbox-productcount">
                            <span>SHOWING 16 PRODUCT</span>
                        </div>
                        <div class="toolbox-sorting">
                            <select name="" id="">
                                <option value="default">Default Sorting</option>
                                <option value="name">Name</option>
                                <option value="price">Price</option>
                                <option value="date">Date</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>
                    </div>

                    <div class="row products-wrapper shop-page-products">

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
                                    <span class="pricebox"><del>$60.00</del> $50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox">$50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
                                </div>
                            </div>	
                        </div>
                        <!--// Single product -->

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
                                    <span class="pricebox">$50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox"><del>$60.00</del> $50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox">$50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
                                </div>
                            </div>	
                        </div>
                        <!--// Single product -->

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
                                    <span class="pricebox">$50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox"><del>$60.00</del> $50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox">$50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox">$50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox"><del>$60.00</del> $50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
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
                                    <span class="pricebox"><del>$60.00</del> $50.00</span>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eaque cumque provident sed, nemo amet iure neque excepturi minus et quos recusandae enim praesentium laudantium sapiente voluptates facere impedit ab!</p>
                                </div>
                            </div>	
                        </div>
                        <!--// Single product -->

                    </div>

                    <div class="sf-pagination text-center">
                        <ul>
                            <li><a href="#"><<</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--// Shop Grid Area -->

            <!-- Popular products -->
            <div class="popular-products-area bg-white section-padding-bottom-lg">
                <div class="container">
                    <h3 class="small-title">POPULAR PRODUCTS</h3>

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
            <!--// Popular products -->

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
    <script>
        function applySort(sortOption) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('sort', sortOption);
            window.location.href = currentUrl.toString();
        }
    </script>
@endsection
