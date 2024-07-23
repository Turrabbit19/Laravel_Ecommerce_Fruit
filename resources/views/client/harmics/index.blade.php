@extends('client.layouts.master')

@section('content')
<!-- Begin Slider Area -->
<div class="slider-area">

    <!-- Main Slider -->
    <div class="swiper-container main-slider-2 swiper-arrow with-bg_white">
        <div class="swiper-wrapper">
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner bg-height" data-bg-image="{{ asset('style/client/images/slider/bg/2-1.jpg') }}">
                    <div class="container">
                        <div class="slide-content">
                            <h2 class="title font-weight-bold mb-4">Fresh Organic <br> Products</h2>
                            <p class="short-desc different-width mb-9">Best Offer Products 100% Naturan Healthy Food For Your Life</p>
                            <div class="button-wrap">
                                <a class='btn btn-custom-size lg-size btn-primary btn-white-hover rounded-0' href='shop.html'>Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner bg-height" data-bg-image="{{ asset('style/client/images/slider/bg/2-2.jpg') }}">
                    <div class="container">
                        <div class="slide-content">
                            <h2 class="title font-weight-bold mb-4">Fresh Organic <br> Products</h2>
                            <p class="short-desc different-width mb-9">Best Offer Products 100% Naturan Healthy Food For Your Life</p>
                            <div class="button-wrap">
                                <a class='btn btn-custom-size lg-size btn-primary btn-white-hover rounded-0' href='shop.html'>Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination with-bg d-md-none"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</div>
<!-- Slider Area End Here -->

<!-- Begin Banner With Category -->
<div class="banner-with-category">
    <div class="product-category-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center pb-55">
                        <span class="sub-title text-primary">See Our Latest</span>
                        <h2 class="title mb-0">Shop By Category</h2>
                    </div>
                    <div class="product-category-item text-center">
                        <ul>
                            <li>
                                <a href='shop.html'>
                                    <img src="{{ asset('style/client/images/banner/category-icon/1.png') }}" alt="Product Category" width="170">
                                    All Items
                                </a>
                            </li>
                            @foreach ($categories as $cgrs)
                            <li>
                                <a href='shop.html'>
                                    <img src="{{ Storage::url($cgrs->image) }}" alt="Product Category" width="170">
                                    {{$cgrs->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area section-space-top-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item">
                        <div class="banner-img img-zoom-effect">
                            <img class="img-full" src="{{ asset('style/client/images/banner/1-1-370x250.jpg') }}" alt="Banner Image">
                            <div class="inner-content">
                                <h5 class="offer">-10% Off</h5>
                                <h4 class="title mb-5">Bell Pepper<br>Orange</h4>
                                <div class="button-wrap">
                                    <a class='btn btn-primary btn-white-hover rounded-0' href='shop.html'>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                    <div class="banner-item">
                        <div class="banner-img img-zoom-effect">
                            <img class="img-full" src="{{ asset('style/client/images/banner/1-2-370x250.jpg') }}" alt="Banner Image">
                            <div class="inner-content">
                                <h5 class="offer">-20% Off</h5>
                                <h4 class="title mb-5">Fruit Juice<br>Package</h4>
                                <div class="button-wrap">
                                    <a class='btn btn-custom-size btn-primary btn-white-hover rounded-0' href='shop.html'>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                    <div class="banner-item">
                        <div class="banner-img img-zoom-effect">
                            <img class="img-full" src="{{ asset('style/client/images/banner/1-3-370x250.jpg') }}" alt="Banner Image">
                            <div class="inner-content">
                                <h5 class="offer">-30% Off</h5>
                                <h4 class="title mb-5">Full Fresh<br>Vegetable</h4>
                                <div class="button-wrap">
                                    <a class='btn btn-custom-size btn-primary btn-white-hover rounded-0' href='shop.html'>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner With Category End Here -->

<!-- Begin Product Area -->
<div class="product-area product-style-2 section-space-y-axis-100">
    <div class="container">
        <div class="section-title text-center pb-55">
            <span class="sub-title text-primary">See Our Latest</span>
            <h2 class="title mb-0">Organic Products</h2>
        </div>
        <div class="row">
            @foreach ($products as $pros)
            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                <div class="product-item">
                    <div class="product-img img-zoom-effect">
                        <a href='{{ route('product', ['product' => $pros->slug]) }}'>
                            <img class="img-full" src="{{ Storage::url($pros->img_thumb) }}" alt="{{$pros->name}}">
                        </a>
                        <div class="product-add-action">
                            <ul>
                                <li>
                                    <form action="{{ route('addToCart', $pros->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <a href=""><button type="submit" class="btn">
                                            <i class="pe-7s-cart"></i>  
                                        </button></a>
                                    </form>
                                </li>
                                <li>
                                    <a href='compare.html'>
                                        <i class="pe-7s-shuffle"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href='wishlist.html'>
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <a class='product-name' href='single-product.html'>{{$pros->name}}</a>
                        <div class="price-box pb-1">
                            <span class="new-price">{{number_format($pros->price)}}đ</span>
                        </div>
                        <div class="rating-box">
                            <ul>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach      
        </div>
    </div>
</div>
<!-- Product Area End Here -->

<!-- Begin Banner Area -->
<div class="banner-area banner-style-2 section-space-y-axis-100" data-bg-image="{{ asset('style/client/images/banner/3-1-1920x582.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <div class="section-title">
                        <span class="sub-title text-primary">Special Sale</span>
                        <h2 class="title font-size-60 mb-7">Kashmiri Saffron Powder</h2>
                    </div>
                    <div class="price-box pb-6">
                        <span class="old-price text-danger">$321</span>
                        <span class="new-price text-primary">-$123</span>
                    </div>
                    <div class="countdown-wrap with-dark-border">
                        <div class="countdown item-4" data-countdown="2024/07/20" data-format="short">
                            <div class="countdown__item me-3">
                                <span class="countdown__time daysLeft"></span>
                                <span class="countdown__text daysText"></span>
                            </div>
                            <div class="countdown__item me-3">
                                <span class="countdown__time hoursLeft"></span>
                                <span class="countdown__text hoursText"></span>
                            </div>
                            <div class="countdown__item me-3">
                                <span class="countdown__time minsLeft"></span>
                                <span class="countdown__text minsText"></span>
                            </div>
                            <div class="countdown__item">
                                <span class="countdown__time secsLeft"></span>
                                <span class="countdown__text secsText"></span>
                            </div>
                        </div>
                    </div>
                    <div class="button-wrap pt-10">
                        <a class='btn btn-custom-size lg-size btn-primary btn-dark-hover rounded-0' href='shop.html'>Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->

<!-- Begin Shipping Area -->
<div class="shipping-area section-space-top-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="shipping-item">
                    <div class="shipping-img">
                        <img src="{{ asset('style/client/images/shipping/icon/plane.png') }}" alt="Shipping Icon">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Free Shipping</h5>
                        <p class="short-desc mb-0">Free Home Delivery Offer</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                <div class="shipping-item">
                    <div class="shipping-img">
                        <img src="{{ asset('style/client/images/shipping/icon/earphones.png') }}" alt="Shipping Icon">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Online Support</h5>
                        <p class="short-desc mb-0">24/7 Online Support Provide</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                <div class="shipping-item">
                    <div class="shipping-img">
                        <img src="{{ asset('style/client/images/shipping/icon/shield.png') }}" alt="Shipping Icon">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Secure Payment</h5>
                        <p class="short-desc mb-0">Fully Secure Payment System</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shipping Area End Here -->

<!-- Begin Product Area -->
<div class="product-area section-space-y-axis-100 product-style-2">
    <div class="container">
        <div class="section-title text-center pb-55">
            <span class="sub-title text-primary">See Our Latest</span>
            <h2 class="title mb-0">Arrival Products</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container product-slider swiper-arrow with-radius border-issue">
                    <div class="swiper-wrapper">
                        @foreach ($products as $pros)
                        <div class="swiper-slide">
                            <div class="product-item">
                                <div class="product-img img-zoom-effect">
                                    <a href='{{ route('product', ['product' => $pros->slug]) }}'>
                                        <img class="img-full" src="{{ Storage::url($pros->img_thumb) }}" alt="Product Images">
                                    </a>
                                    <div class="product-add-action">
                                        <ul>
                                            <li>
                                                <form action="{{ route('addToCart', $pros->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1">
                                                    <a href=""><button type="submit" class="btn">
                                                        <i class="pe-7s-cart"></i>  
                                                    </button></a>
                                                </form>
                                            </li>
                                            <li>
                                                <a href='compare.html'>
                                                    <i class="pe-7s-shuffle"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href='wishlist.html'>
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <a class='product-name' href='single-product.html'>{{$pros->name}}</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">{{number_format($pros->price)}}đ</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-nav-wrap">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

<!-- Begin Banner Area -->
<div class="banner-with-testimonial py-10" data-bg-image="{{ asset('style/client/images/banner/2-1-1920x523.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="parallax-img-wrap">
                    <div class="papaya">
                        <div class="scene fill">
                            <div class="expand-width" data-depth="0.2">
                                <img src="{{ asset('style/client/images/banner/inner-img/2-1-503x430.png') }}" alt="Banner Images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 align-self-center">
                <div class="swiper-container testimonial-slider text-white">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-content section-title">
                                    <span class="sub-title">What People Say</span>
                                    <h2 class="title mb-6">Client Feedback</h2>
                                    <p class="short-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu tempor incididj ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                    <div class="user-info">
                                        <div class="user-img">
                                            <img src="{{ asset('style/client/images/testimonial/user/1.png') }}" alt="User Image">
                                        </div>
                                        <div class="user-content">
                                            <span class="user-name">Oscar Thomsen</span>
                                            <span class="user-occupation">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-content section-title">
                                    <span class="sub-title">What People Say</span>
                                    <h2 class="title mb-6">Client Feedback</h2>
                                    <p class="short-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiu tempor incididj ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                    <div class="user-info">
                                        <div class="user-img">
                                            <img src="{{ asset('style/client/images/testimonial/user/1.png') }}" alt="User Image">
                                        </div>
                                        <div class="user-content">
                                            <span class="user-name">Oscar Thomsen</span>
                                            <span class="user-occupation">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="testimonial-button-next"></div>
                    <div class="testimonial-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->

<!-- Begin Product Area -->
<div class="product-area section-space-top-100 product-style-2">
    <div class="container">
        <div class="section-title text-center pb-55">
            <span class="sub-title text-primary">See Our Latest</span>
            <h2 class="title mb-0">Arrival Products</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container product-list-slider border-issue">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product-list-item">
                                <div class="product-img img-zoom-effect">
                                    <a href='single-product.html'>
                                        <img class="img-full" src="{{ asset('style/client/images/product/small-size/1-1-112x124.jpg') }}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <a class='product-name' href='single-product.html'>Black Pepper Grains</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href='cart.html'>
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-list-item">
                                <div class="product-img img-zoom-effect">
                                    <a href='single-product.html'>
                                        <img class="img-full" src="{{ asset('style/client/images/product/small-size/1-2-112x124.jpg') }}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <a class='product-name' href='single-product.html'>Peanut Big Bean</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href='cart.html'>
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-list-item">
                                <div class="product-img img-zoom-effect">
                                    <a href='single-product.html'>
                                        <img class="img-full" src="{{ asset('style/client/images/product/small-size/1-3-112x124.jpg') }}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <a class='product-name' href='single-product.html'>Dried Lemon Green</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href='cart.html'>
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-list-item">
                                <div class="product-img img-zoom-effect">
                                    <a href='single-product.html'>
                                        <img class="img-full" src="{{ asset('style/client/images/product/small-size/1-4-112x124.jpg') }}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <a class='product-name' href='single-product.html'>Natural Coconut</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href='cart.html'>
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-list-item">
                                <div class="product-img img-zoom-effect">
                                    <a href='single-product.html'>
                                        <img class="img-full" src="{{ asset('style/client/images/product/small-size/1-5-112x124.jpg') }}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <a class='product-name' href='single-product.html'>Black Peppepr Read</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href='cart.html'>
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-list-item">
                                <div class="product-img img-zoom-effect">
                                    <a href='single-product.html'>
                                        <img class="img-full" src="{{ asset('style/client/images/product/small-size/1-6-112x124.jpg') }}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <a class='product-name' href='single-product.html'>Green Vegetable</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href='cart.html'>
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

<!-- Begin Brand Area -->
<div class="brand-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container brand-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a class="brand-item" href="javascript:void(0)">
                                <img src="{{ asset('style/client/images/brand/1-1.png') }}" alt="Brand Image">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="javascript:void(0)">
                                <img src="{{ asset('style/client/images/brand/1-2.png') }}" alt="Brand Image">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="javascript:void(0)">
                                <img src="{{ asset('style/client/images/brand/1-3.png') }}" alt="Brand Image">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="javascript:void(0)">
                                <img src="{{ asset('style/client/images/brand/1-4.png') }}" alt="Brand Image">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="javascript:void(0)">
                                <img src="{{ asset('style/client/images/brand/1-5.png') }}" alt="Brand Image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Area End Here -->
@endsection