@extends('client.layouts.master')

@section('content')
<style>
    .cart-plus-minus-box::-webkit-inner-spin-button,
    .cart-plus-minus-box::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .cart-plus-minus-box {
        -moz-appearance: textfield; /* Firefox */
        appearance: textfield; /* IE10+, Edge */
    }
</style>

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">{{$product->name}}</h2>
                        <ul>
                            <li>
                                <a href='index.html'>Shop <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>{{$product->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-product-img">
                        <div class="swiper-container single-product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="{{Storage::url($product->img_thumb)}}" class="single-img gallery-popup">
                                        <img class="img-full" src="{{Storage::url($product->img_thumb)}}" alt="Product Image">
                                    </a>
                                </div>
                                @foreach ($imageProduct as $imgP)
                                <div class="swiper-slide">
                                    <a href="{{Storage::url($imgP->image)}}" class="single-img gallery-popup">
                                        <img class="img-full" src="{{Storage::url($imgP->image)}}" alt="Product Image">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-container single-product-thumbs pt-6">
                            <div class="swiper-wrapper">
                                <a href="javascript:void(0)" class="swiper-slide">
                                    <img class="img-full" src="{{Storage::url($product->img_thumb)}}" alt="Product Thumnail">
                                </a>
                                @foreach ($imageProduct as $imgP)
                                <a href="javascript:void(0)" class="swiper-slide">
                                    <img class="img-full" src="{{Storage::url($imgP->image)}}" alt="Product Thumnail">
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-9 pt-lg-0">
                    <div class="single-product-content">
                        <h2 class="title">{{$product->name}}</h2>
                        <div class="price-box pb-1">
                            <span class="new-price text-danger">{{number_format($product->price)}} VND</span>
                            <span class="old-price text-primary">{{number_format($product->price_sale)}} VND</span>
                        </div>
                        <div class="rating-box-wrap pb-7">
                            <div class="rating-box">
                                <ul>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                </ul>
                            </div>
                            <div class="review-status ps-4">
                                <a href="javascript:void(0)">( {{$product->quantity}} )</a>
                            </div>
                        </div>
                        <p class="short-desc mb-6">{{$product->description}}</p>

                        <form action="{{ route('addToCart', $product->id) }}" method="POST">
                            @csrf
                            @if ($sizes->isNotEmpty() && $colors->isNotEmpty())
                                <div class="selector-wrap size-option pb-2">
                                    <span>Kích thước</span>
                                    <select class="nice-select wide rounded-0" id="size-select" name="size">
                                        <option value="default">Lựa chọn...</option>
                                        @foreach ($sizes as $size_id => $size_name)
                                            <option value="{{ $size_id }}">{{ $size_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="selector-wrap color-option pb-6">
                                    <span>Màu sắc</span>
                                    <select class="nice-select wide rounded-0" id="color-select" name="color">
                                        <option value="default">Lựa chọn...</option>
                                        @foreach ($colors as $color_id => $color_name)
                                            <option value="{{ $color_id }}">{{ $color_name }}</option>
                                        @endforeach
                                    </select>
                                </div>       
                            @endif      

                            <ul class="quantity-with-btn pb-7">
                                <li class="quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="number" name="quantity" min="1" max="{{$product->quantity}}" value="1">
                                    </div>
                                </li>
                                <li class="add-to-cart">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0">Thêm vào giỏ</button>
                                </li>
                                <li class="wishlist-btn-wrap">
                                    <a class='btn rounded-0' href='wishlist.html'>
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                            </ul>
                        </form>   
                        @if (session('success'))
                            <div class="text-start text-success mb-3">        
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="text-start text-danger mb-3">        
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif                              

                        <div class="product-category text-matterhorn pb-2">
                            <span class="title">Danh mục:</span>
                            <ul>
                                @foreach ($product->categories as $proCgr)
                                <li>
                                    <a href="javascript:void(0)">{{$proCgr->name}},</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-category product-tags text-matterhorn pb-4">
                            <span class="title">Product Tags :</span>
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">Organic,</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Vegetable,</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Fruits</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-link align-items-center">
                            <span class="title pe-3">Share:</span>
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-tumblr"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-tab-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav product-tab-nav product-tab-style-2" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active btn btn-custom-size" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">
                                Description
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="btn btn-custom-size" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="btn btn-custom-size" id="shipping-tab" data-bs-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">
                                Shipping
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content product-tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="product-description-body">
                                <p class="short-desc mb-0">{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="product-review-body">
                                <h4 class="heading mb-5">3 Review Items</h4>
                                <ul class="user-info-wrap">
                                    <li>
                                        <ul class="user-info">
                                            <li class="user-avatar">
                                                <img src="{{ asset('style/client/images/testimonial/user/1.png') }}" alt="User Image">
                                            </li>
                                            <li class="user-comment">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="meta">
                                                    <span><strong>Oscar -</strong> March 15, 2021</span>
                                                </div>
                                                <p class="short-desc mb-0">“Sed ligula sapien, fermentum id est eget,
                                                    viverra auctor sem. Vivamus maximus enim vitae urna porta, ut
                                                    euismod nibh lacinia ellentesque at diam voluptas quas nisi, culpa
                                                    in accusantium“</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="user-info">
                                            <li class="user-avatar">
                                                <img src="{{ asset('style/client/images/testimonial/user/1.png') }}" alt="User Image">
                                            </li>
                                            <li class="user-comment">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="meta">
                                                    <span><strong>Oscar -</strong> March 15, 2021</span>
                                                </div>
                                                <p class="short-desc mb-0">“Sed ligula sapien, fermentum id est eget,
                                                    viverra auctor sem. Vivamus maximus enim vitae urna porta, ut
                                                    euismod nibh lacinia ellentesque at diam voluptas quas nisi, culpa
                                                    in accusantium“</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="user-info">
                                            <li class="user-avatar">
                                                <img src="{{ asset('style/client/images/testimonial/user/1.png') }}" alt="User Image">
                                            </li>
                                            <li class="user-comment">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="meta">
                                                    <span><strong>Oscar -</strong> March 15, 2021</span>
                                                </div>
                                                <p class="short-desc mb-0">“Sed ligula sapien, fermentum id est eget,
                                                    viverra auctor sem. Vivamus maximus enim vitae urna porta, ut
                                                    euismod nibh lacinia ellentesque at diam voluptas quas nisi, culpa
                                                    in accusantium“</p>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="feedback-area pt-5">
                                    <h2 class="heading mb-1">Add a review</h2>
                                    <p class="short-desc mb-3">Your email address will not be published.</p>
                                    <div class="rating-box">
                                        <span>Your rating</span>
                                        <ul class="ps-4">
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                        </ul>
                                    </div>
                                    <form class="feedback-form pt-8" action="#">
                                        <div class="group-input">
                                            <div class="form-field me-md-6 mb-6 mb-md-0">
                                                <input type="text" name="name" placeholder="Your Name*" class="input-field">
                                            </div>
                                            <div class="form-field me-md-6 mb-6 mb-md-0">
                                                <input type="text" name="email" placeholder="Your Email*" class="input-field">
                                            </div>
                                            <div class="form-field">
                                                <input type="text" name="number" placeholder="Phone number" class="input-field">
                                            </div>
                                        </div>
                                        <div class="form-field mt-6">
                                            <textarea name="message" placeholder="Message" class="textarea-field"></textarea>
                                        </div>
                                        <div class="button-wrap mt-8">
                                            <button type="submit" value="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover btn-lg rounded-0" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                            <div class="product-shipping-body">
                                <h4 class="title">Shipping</h4>
                                <p class="short-desc mb-4">The item will be shipped from China. So it need 15-20 days to
                                    deliver. Our product is good with reasonable price and we believe you will worth it.
                                    So please wait for it patiently! Thanks.Any question please kindly to contact us and
                                    we promise to work hard to help you to solve the problem</p>
                                <h4 class="title">About return request</h4>
                                <p class="short-desc mb-4">If you don't need the item with worry, you can contact us
                                    then we will help you to solve the problem, so please close the return request!
                                    Thanks</p>
                                <h4 class="title">Guarantee</h4>
                                <p class="short-desc mb-0">If it is the quality question, we will resend or refund to
                                    you; If you receive damaged or wrong items, please contact us and attach some
                                    pictures about product, we will exchange a new correct item to you after the
                                    confirmation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-slider-area section-space-top-95 section-space-bottom-100">
        <div class="container">
            <div class="section-title text-center pb-55">
                <span class="sub-title text-primary">Có thể bạn cũng thích</span>
                <h2 class="title mb-0">NHỮNG SẢM PHẨM TƯƠNG TỰ</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-slider-holder swiper-arrow">
                        <div class="swiper-container product-slider border-issue">
                            <div class="swiper-wrapper">
                                @foreach ($products as $pros)
                                <div class="swiper-slide">
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
                                        <div class="product-content texx">
                                            <a class='product-name' href='{{ route('product', ['product' => $pros->slug]) }}'>{{$pros->name}}</a>
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
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection