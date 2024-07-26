<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Harmic</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('client.layouts.style')
</head>

<body>

    <div class="main-wrapper">

        <!-- Begin Main Header Area -->
        <header class="main-header_area position-relative">
            <div class="header-top border-bottom d-none d-md-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="header-top-left">
                                <ul class="dropdown-wrap text-matterhorn">
                                    <li class="dropdown">
                                        <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Tiếng Việt
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="languageButton">
                                            <li><a class="dropdown-item" href="#">English</a></li>
                                            <li><a class="dropdown-item" href="#">Chinese</a></li>
                                            <li><a class="dropdown-item" href="#">Spanish</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="currencyButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            VND
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="currencyButton">
                                            <li><a class="dropdown-item" href="#">USD</a></li>
                                            <li><a class="dropdown-item" href="#">ISO</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        Gọi cho chúng tôi
                                        <a href="tel://0386596511">0386596511</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-top-right text-matterhorn">
                                <p class="shipping mb-0">Miễn phí ship cho đơn hàng từ <span>1 triệu đồng</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap">
                                <a class='header-logo' href='{{route('home')}}'>
                                    <img src="{{ asset('style/client/images/logo/dark.png') }}" alt="Header Logo">
                                </a>
                                <div class="header-search-area d-none d-lg-block">
                                    <form action="#" class="header-searchbox">
                                        <select class="nice-select select-search-category wide">
                                            <option value="all">Tất cả danh mục</option>
                                            @foreach ($categories as $cgrs)
                                            <option value="{{$cgrs->id}}">{{$cgrs->name}}</option>
                                            @endforeach
                                        </select>
                                        <input class="input-field" type="text" placeholder="Tìm kiếm sản phẩm">
                                        <button class="btn btn-outline-whisper btn-primary-hover" type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-right">
                                    <ul>
                                        <li class="dropdown d-none d-md-block">
                                            <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="pe-7s-users"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButton">
                                                <li><a class='dropdown-item' href='my-account.html'>Tài khoản của tôi</a></li>
                                                <li><a class='dropdown-item' href='login-register.html'>Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                        <li class="d-none d-md-block">
                                            <a href='wishlist.html'>
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        </li>
                                        <li class="d-block d-lg-none">
                                            <a href="#searchBar" class="search-btn toolbar-btn">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </li>
                                        <li class="minicart-wrap me-3 me-lg-0">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <span class="quantity">
                                                    @if (session()->has('cart'))
                                                    {{ count(session('cart')) }}
                                                    @else
                                                    0
                                                    @endif
                                                </span>
                                            </a>
                                        </li>
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header header-sticky" data-bg-color="#bac34e">
                <div class="container">
                    <div class="main-header_nav position-relative">
                        <div class="row align-items-center">
                            <div class="col-lg-12 d-none d-lg-block">
                                <div class="main-menu">
                                    <nav class="main-nav">
                                        <ul>
                                            <li class="drop-holder">
                                                <a href="{{route('home')}}">Trang chủ
                                                </a>
                                            </li>
                                            <li>
                                                <a href='about.html'>Về chúng tôi</a>
                                            </li>
                                            <li class="megamenu-holder">
                                                <a href="{{route('shop')}}">Cửa hàng
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                <ul class="drop-menu megamenu">
                                                    <li>
                                                        <span class="title"></span>
                                                        <ul>
                                                            <li>
                                                                <a href='shop.html'>Shop Default</a>
                                                            </li>
                                                            <li>
                                                                <a href='shop-left-sidebar.html'>Shop Left Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href='shop-right-sidebar.html'>Shop Right Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href='shop-list-fullwidth.html'>Shop List Fullwidth</a>
                                                            </li>
                                                            <li>
                                                                <a href='shop-list-left-sidebar.html'>Shop List Left Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href='shop-list-right-sidebar.html'>Shop List Right Sidebar</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <span class="title">Product Style</span>
                                                        <ul>
                                                            <li>
                                                                <a href='single-product.html'>Single Product Default</a>
                                                            </li>
                                                            <li>
                                                                <a href='single-product-group.html'>Single Product Group</a>
                                                            </li>
                                                            <li>
                                                                <a href='single-product-variable.html'>Single Product Variable</a>
                                                            </li>
                                                            <li>
                                                                <a href='single-product-sale.html'>Single Product Sale</a>
                                                            </li>
                                                            <li>
                                                                <a href='single-product-sticky.html'>Single Product Sticky</a>
                                                            </li>
                                                            <li>
                                                                <a href='single-product-affiliate.html'>Single Product Affiliate</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <span class="title">Product Related</span>
                                                        <ul>
                                                            <li>
                                                                <a href='my-account.html'>My Account</a>
                                                            </li>
                                                            <li>
                                                                <a href='login-register.html'>Login | Register</a>
                                                            </li>
                                                            <li>
                                                                <a href='cart.html'>Shopping Cart</a>
                                                            </li>
                                                            <li>
                                                                <a href='wishlist.html'>Wishlist</a>
                                                            </li>
                                                            <li>
                                                                <a href='compare.html'>Compare</a>
                                                            </li>
                                                            <li>
                                                                <a href='checkout.html'>Checkout</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-slider-wrap">
                                                        <div class="swiper-container menu-slider">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide img-zoom-effect with-overlay">
                                                                    <a href="#" class="single-item">
                                                                        <img class="img-full" src="{{ asset('style/client/images/megamenu/slider/1.jpg') }}" alt="Megamenu Slider">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide img-zoom-effect with-overlay">
                                                                    <a href="#" class="single-item">
                                                                        <img class="img-full" src="{{ asset('style/client/images/megamenu/slider/2.jpg') }}" alt="Megamenu Slider">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="drop-holder">
                                                <a href="javascript:void(0)">Pages
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                <ul class="drop-menu">
                                                    <li>
                                                        <a href='faq.html'>Frequently Questions</a>
                                                    </li>
                                                    <li>
                                                        <a href='404.html'>Error 404</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="drop-holder">
                                                <a href="javascript:void(0)">Bài viết
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                <ul class="drop-menu">
                                                    <li class="sub-dropdown-holder">
                                                        <a href="javascript:void(0)">Blog Holder</a>
                                                        <ul class="drop-menu sub-dropdown">
                                                            <li>
                                                                <a href='blog.html'>Blog Default</a>
                                                            </li>
                                                            <li>
                                                                <a href='blog-left-sidebar.html'>Blog Left Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href='blog-right-sidebar.html'>Blog Right Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href='blog-list-left-sidebar.html'>Blog List Left Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href='blog-list-right-sidebar.html'>Blog List Right Sidebar</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-holder">
                                                        <a href="javascript:void(0)">Blog Detail Holder</a>
                                                        <ul class="drop-menu sub-dropdown">
                                                            <li>
                                                                <a href='blog-detail.html'>Blog Detail Default</a>
                                                            </li>
                                                            <li>
                                                                <a href='blog-detail-left-sidebar.html'>Blog Detail Left Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href='blog-detail-right-sidebar.html'>Blog Detail Right Sidebar</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href='contact.html'>Liên hệ</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="harmic-offcanvas-body">
                    <div class="inner-body">
                        <div class="harmic-offcanvas-top">
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="offcanvas-user-info text-center px-6 pb-5">
                            <div class=" text-silver">
                                <p class="shipping mb-0">Free delivery on order over <span class="text-primary">$200</span></p>
                            </div>
                            <ul class="dropdown-wrap justify-content-center text-silver">
                                <li class="dropdown dropup">
                                    <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                        English
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="languageButtonTwo">
                                        <li><a class="dropdown-item" href="#">French</a></li>
                                        <li><a class="dropdown-item" href="#">Italian</a></li>
                                        <li><a class="dropdown-item" href="#">Spanish</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropup">
                                    <button class="btn btn-link dropdown-toggle ht-btn usd-dropdown" type="button" id="currencyButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                        USD
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="currencyButtonTwo">
                                        <li><a class="dropdown-item" href="#">GBP</a></li>
                                        <li><a class="dropdown-item" href="#">ISO</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropup">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
                                        <li><a class='dropdown-item' href='my-account.html'>My account</a></li>
                                        <li><a class='dropdown-item' href='login-register.html'>Login | Register</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href='wishlist.html'>
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Home 
                                            <i class="pe-7s-angle-down"></i>
                                        </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href='index.html'>
                                                    <span class="mm-text">Home One</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href='index-2.html'>
                                                    <span class="mm-text">Home Two</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href='about.html'>
                                            <span class="mm-text">About Us</span>
                                        </a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{route('shop')}}">
                                            <span class="mm-text">Shop 
                                            <i class="pe-7s-angle-down"></i>
                                        </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">
                                                    <span class="mm-text">Shop Layout 
                                                    <i class="pe-7s-angle-down"></i>
                                                </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href='shop.html'>
                                                            <span class="mm-text">Shop Default</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-leftsidebar.html">
                                                            <span class="mm-text">Shop Left Sidebar</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-rightsidebar.html">
                                                            <span class="mm-text">Shop Right Sidebar</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='shop-list-fullwidth.html'>
                                                            <span class="mm-text">Shop List Fullwidth</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='shop-list-left-sidebar.html'>
                                                            <span class="mm-text">Shop List Left Sidebar</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='shop-list-right-sidebar.html'>
                                                            <span class="mm-text">Shop List Right Sidebar</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">
                                                    <span class="mm-text">Product Style
                                                    <i class="pe-7s-angle-down"></i>
                                                </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href='single-product.html'>
                                                            <span class="mm-text">Single Product Default</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='single-product-group.html'>
                                                            <span class="mm-text">Single Product Group</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='single-product-variable.html'>
                                                            <span class="mm-text">Single Product Variable</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='single-product-sale.html'>
                                                            <span class="mm-text">Single Product Sale</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='single-product-sticky.html'>
                                                            <span class="mm-text">Single Product Sticky</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='single-product-affiliate.html'>
                                                            <span class="mm-text">Single Product Affiliate</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">
                                                    <span class="mm-text">Product Related
                                                    <i class="pe-7s-angle-down"></i>
                                                </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href='my-account.html'>
                                                            <span class="mm-text">My Account</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='login-register.html'>
                                                            <span class="mm-text">Login | Register</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='cart.html'>
                                                            <span class="mm-text">Shopping Cart</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='wishlist.html'>
                                                            <span class="mm-text">Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='compare.html'>
                                                            <span class="mm-text">Compare</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='checkout.html'>
                                                            <span class="mm-text">Checkout</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Pages 
                                            <i class="pe-7s-angle-down"></i>
                                        </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href='faq.html'>
                                                    <span class="mm-text">Frequently Questions</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href='404.html'>
                                                    <span class="mm-text">Error 404</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Blog 
                                            <i class="pe-7s-angle-down"></i>
                                        </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">
                                                    <span class="mm-text">Blog Holder
                                                    <i class="pe-7s-angle-down"></i>
                                                </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href='blog.html'>
                                                            <span class="mm-text">Blog Default</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='blog-left-sidebar.html'>
                                                            <span class="mm-text">Blog Left Sidebar</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='blog-right-sidebar.html'>
                                                            <span class="mm-text">Blog Right Sidebar</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='blog-list-left-sidebar.html'>
                                                            <span class="mm-text">Blog List Left Sidebar</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='blog-list-right-sidebar.html'>
                                                            <span class="mm-text">Blog List Right Sidebar</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">
                                                    <span class="mm-text">Blog Detail Holder
                                                    <i class="pe-7s-angle-down"></i>
                                                </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href='blog-detail.html'>
                                                            <span class="mm-text">Blog Detail Default</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='blog-detail-left-sidebar.html'>
                                                            <span class="mm-text">Blog Detail Left Sidebar</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='blog-detail-right-sidebar.html'>
                                                            <span class="mm-text">Blog Detail Right Sidebar</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href='contact.html'>
                                            <span class="mm-text">Contact</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-search_wrapper" id="searchBar">
                <div class="harmic-offcanvas-body">
                    <div class="container h-100">
                        <div class="offcanvas-search">
                            <div class="harmic-offcanvas-top">
                                <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                            </div>
                            <span class="searchbox-info">Start typing and press Enter to search</span>
                            <form action="#" class="hm-searchbox">
                                <input type="text" placeholder="Search">
                                <button class="search-btn" type="submit"><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="harmic-offcanvas-body">
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4 class="mb-0">Giỏ hàng</h4>
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <ul class="minicart-list">
                            @php
                                $subtotal = 0;
                            @endphp
                            @if(session('cart') && count(session('cart')) > 0)
                                @foreach (session('cart') as $id => $items)
                                    @php
                                        $lineTotal = $items['price'] * $items['quantity'];
                                        $subtotal += $lineTotal;
                                    @endphp
                                    <li class="minicart-product">
                                        <a class="product-item_remove" href="{{ route('removeFromCart', $id) }}"><i class="pe-7s-close"></i></a>
                                        <a class='product-item_img' href='shop.html'>
                                            <img class="img-full" src="{{ Storage::url($items['image']) }}" alt="Product Image">
                                        </a>
                                        <div class="product-item_content">
                                            <a class='product-item_title' href='shop.html'>{{ $items['name'] }}</a>
                                            <span class="product-item_quantity">{{$items['quantity']}} * {{ number_format($items['price']) }}đ</span>
                                        </div>
                                    </li>
                                @endforeach
                            
                            </ul>
                        </div>
                        <div class="minicart-item_total">
                            <span>Tổng</span>
                            <span class="ammount">{{ number_format($subtotal) }}đ</span>
                        </div>
                        <div class="group-btn_wrap d-grid gap-2">
                            <a class='btn btn-secondary btn-primary-hover' href='{{route('cart')}}'>Xem giỏ hàng</a>
                            <a class='btn btn-secondary btn-primary-hover' href='{{route('checkout')}}'>Thanh toán</a>
                        </div>
                        @else
                                <li class="text-center">Giỏ hàng trống</li>
                            @endif
                </div>
            </div>
            
            <div class="global-overlay"></div>
        </header>
        <!-- Main Header Area End Here -->

        {{-- Begin Main Content Area --}}

        @yield('content')

        <!-- Main Content Area End Here -->

        <!-- Begin Footer Area -->
        <div class="footer-area">
            <div class="footer-top section-space-y-axis-100 text-black" data-bg-color="#e5ddcc">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget-item">
                                <div class="footer-logo pb-4">
                                    <a href='index.html'>
                                        <img src="{{ asset('style/client/images/logo/dark.png') }}" alt="Logo">
                                    </a>
                                </div>
                                <p class="short-desc mb-2">Lorem ipsum dolor sit amet, consectet adipi elit, sed do eius tempor incididun ut labore gthydolore. </p>
                                <div class="widget-contact-info pb-6">
                                    <ul>
                                        <li>
                                            <i class="pe-7s-map-marker"></i>
                                            184 Main Rd E, St Albans VIC 3021,
                                        </li>
                                        <li>
                                            <i class="pe-7s-mail"></i>
                                            <a href="mailto://info@example.com">info@example.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="payment-method">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('style/client/images/payment/1.png') }}" alt="Payment Method">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 offset-lg-1 col-md-6 pt-10 pt-lg-0">
                            <div class="widget-item">
                                <h3 class="widget-title mb-5">Information</h3>
                                <ul class="widget-list-item">
                                    <li>
                                        <a href="javascript:void(0)">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Returns</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Order Status</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Gift Card Balance</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Accessibility</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 offset-lg-1 col-md-6 pt-10 pt-lg-0">
                            <div class="widget-item">
                                <h3 class="widget-title mb-5">My Account</h3>
                                <ul class="widget-list-item">
                                    <li>
                                        <a href="javascript:void(0)">My Account</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Checkout</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Validation</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Terms of Use</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 pt-10 pt-lg-0">
                            <div class="widget-item">
                                <h3 class="widget-title mb-5">Newsletters</h3>
                                <p class="short-desc">Lorem ipsum dolor sit amet, consectet adipi elit, sed do eius tempor.</p>
                            </div>
                            <div class="widget-form-area">
                                <form class="widget-form" action="#">
                                    <input class="input-field" type="email" autocomplete="off" placeholder="Your Email">
                                    <div class="button-wrap pt-5">
                                        <button class="btn btn-custom-size btn-primary btn-secondary-hover rounded-0" id="mc-submit">Send Mail</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom py-3" data-bg-color="#bac34e">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <span class="copyright-text text-white">© 2021 Harmic Made with <i class="fa fa-heart text-danger"></i> by  <a href="https://hasthemes.com/" target="_blank">HasThemes</a> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End Here -->

        <!-- Begin Scroll To Top -->
        <a class="scroll-to-top" href="#">
            <i class="fa fa-chevron-up"></i>
        </a>
        <!-- Scroll To Top End Here -->

    </div>

    @include('client.layouts.script')
</body>

</html>