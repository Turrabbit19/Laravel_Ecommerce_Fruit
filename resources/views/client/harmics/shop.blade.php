@extends('client.layouts.master')

@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Cửa hàng</h2>
                        <ul>
                            <li>
                                <a href='index.html'>Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Cửa hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2 pt-10 pt-lg-0">
                    <div class="sidebar-area">
                        <div class="widgets-searchbox mb-9">
                            <form id="widgets-searchbox" action="#">
                                <input class="input-field" type="text" placeholder="Tìm kiếm">
                                <button class="widgets-searchbox-btn" type="submit">
                                    <i class="pe-7s-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Refine By</h2>
                            <div class="widgets-item">
                                <ul class="widgets-checkbox">
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="refine-item">
                                        <label class="label-checkbox mb-0" for="refine-item">On Sale
                                            <span>4</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="refine-item-2" checked>
                                        <label class="label-checkbox mb-0" for="refine-item-2">New
                                            <span>4</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="refine-item-3">
                                        <label class="label-checkbox mb-0" for="refine-item-3">In Stock
                                            <span>4</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets-area widgets-filter mb-9">
                            <h2 class="widgets-title mb-5">Price Filter</h2>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <button class="btn btn-primary btn-secondary-hover">Filter</button>
                                    <div class="label-input position-relative">
                                        <label>price : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Color</h2>
                            <div class="widgets-item">
                                <ul class="widgets-checkbox">
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-1">
                                        <label class="label-checkbox mb-0" for="color-selection-1">Green
                                            <span>7</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-2" checked>
                                        <label class="label-checkbox mb-0" for="color-selection-2">Cream
                                            <span>3</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-3">
                                        <label class="label-checkbox mb-0" for="color-selection-3">Blue
                                            <span>4</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-4">
                                        <label class="label-checkbox mb-0" for="color-selection-4">Black
                                            <span>6</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Size</h2>
                            <div class="widgets-item">
                                <ul class="widgets-checkbox">
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-1">
                                        <label class="label-checkbox mb-0" for="size-selection-1">XL</label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-2" checked>
                                        <label class="label-checkbox mb-0" for="size-selection-2">L</label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-3">
                                        <label class="label-checkbox mb-0" for="size-selection-3">SM</label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-4">
                                        <label class="label-checkbox mb-0" for="size-selection-4">XXL</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Top Rated Products</h2>
                            <div class="widgets-item">
                                <div class="swiper-container widgets-list-slider">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widgets-area">
                            <h2 class="widgets-title mb-5">Tag</h2>
                            <div class="widgets-item">
                                <ul class="widgets-tags">
                                    <li>
                                        <a href="javascript:void(0)">Clothing</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Accessories</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">For Men</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Women</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Fashion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="product-topbar">
                        <ul>
                            <li class="product-view-wrap">
                                <ul class="nav" role="tablist">
                                    <li class="grid-view" role="presentation">
                                        <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                            <i class="fa fa-th"></i>
                                        </a>
                                    </li>
                                    <li class="list-view" role="presentation">
                                        <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                            <i class="fa fa-th-list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="page-count">
                                Tổng số sản phẩm: <span>{{count($products)}}</span>
                            </li>
                            <li class="short">
                                <select class="nice-select wide rounded-0">
                                    <option value="1">Xếp theo mặc định</option>
                                    <option value="2">Phổ biến</option>
                                    <option value="3">Được đánh giá cao</option>
                                    <option value="4">Mới nhất</option>
                                    <option value="5">Giá: Thấp đến cao</option>
                                    <option value="6">Giá: Cao đến thấp</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content text-charcoal pt-8">
                        <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                            <div class="product-grid-view row">
                                @foreach ($products as $pros)
                                <div class="col-lg-4 col-sm-6 pt-6">
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
                                            <a class='product-name' href='{{ route('product', ['product' => $pros->slug]) }}'>{{$pros->name}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{number_format($pros->price)}} VND</span>
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
                        <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                            <div class="product-list-view row">
                                @foreach ($products as $pros)
                                <div class="col-12 pt-6">
                                    <div class="product-item">
                                        <div class="product-img img-zoom-effect">
                                            <a href='{{ route('product', ['product' => $pros->slug]) }}'>
                                                <img class="img-full" src="{{ Storage::url($pros->img_thumb) }}" alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href='cart.html'>
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
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
                                        <div class="product-content align-self-center">
                                            <a class='product-name pb-2' href='{{ route('product', ['product' => $pros->slug]) }}'>{{$pros->name}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{number_format($pros->price)}} VNĐ</span>
                                            </div>
                                            <div class="rating-box pb-2">
                                                <ul>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                </ul>
                                            </div>
                                            <p class="short-desc mb-0">{{$pros->description}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach  
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area pt-10">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @if ($products->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span class="fa fa-chevron-left"></span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                            <span class="fa fa-chevron-left"></span>
                                        </a>
                                    </li>
                                @endif

                                @foreach ($products->links()->elements[0] as $page => $url)
                                    @if ($page == $products->currentPage())
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                    
                                @if ($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span class="fa fa-chevron-right"></span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span class="fa fa-chevron-right"></span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
