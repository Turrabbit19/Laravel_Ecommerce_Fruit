@extends('admin.layouts.master')

@section('title')
    Xem sản phẩm
@endsection

@section('content')
<form action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseProductInfo">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm chính</h6>
                </a>
                <div class="collapse show" id="collapseProductInfo">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá bán</label>
                            <input type="number" id="price" class="form-control" name="price" value="{{ $product->price }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="price_sale" class="form-label">Giá gốc</label>
                            <input type="number" id="price_sale" class="form-control" name="price_sale" value="{{ $product->price_sale }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <div id="ckeditor-classic">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product gallery -->
            <div class="card shadow mb-4">
                <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseProductGallery">
                    <h6 class="m-0 font-weight-bold text-primary">Hình ảnh sản phẩm</h6>
                </a>
                <div class="collapse show" id="collapseProductGallery">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5 class="fs-14 mb-1">Hình ảnh chính</h5>
                                    <p class="text-muted">Hình ảnh chính của sản phẩm.</p>
                                    @if($product->img_thumb)
                                        <img src="{{ asset('storage/' . $product->img_thumb) }}" alt="{{$product->name}}" class="img-fluid my-2">
                                    @else
                                        <p>Chưa có hình ảnh chính.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5 class="fs-14 mb-1">Thư viện hình ảnh</h5>
                                    <p class="text-muted">Hình ảnh thư viện của sản phẩm.</p>
                                    <div class="mt-3">
                                        @if ($product->galleries->isNotEmpty())
                                            @foreach($product->galleries as $gallery)
                                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Product Gallery" class="img-thumbnail my-2" style="max-height: 100px;">
                                            @endforeach
                                        @else
                                            <p>Chưa có hình ảnh thư viện.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <a href="#collapseProductVariants" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseProductVariants">
                    <h6 class="m-0 font-weight-bold text-primary">Biến thể sản phẩm</h6>
                </a>
                <div class="collapse show" id="collapseProductVariants">
                    <div class="card-body">
                        <div class="mb-4">
                            @if ($product->variants->isNotEmpty())
                            <table class="table variant-table">
                                <thead>
                                    <tr>
                                        <th>Kích thước</th>
                                        <th>Màu sắc</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product->variants as $variant)
                                    <tr>
                                        <td>
                                            <select name="product_variants[{{ $loop->index + 1 }}][size]" class="form-control" disabled>
                                                @foreach($sizes as $size_id => $size_name)
                                                    <option value="{{ $size_id }}" {{ $size_id == $variant->product_size_id ? 'selected' : '' }}>{{ $size_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="product_variants[{{ $loop->index + 1 }}][color]" class="form-control" disabled>
                                                @foreach($colors as $color_id => $color_name)
                                                    <option value="{{ $color_id }}" {{ $color_id == $variant->product_color_id ? 'selected' : '' }}>{{ $color_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="product_variants[{{ $loop->index + 1 }}][quantity]" class="form-control" value="{{ $variant->quantity }}" disabled>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <p class="text-center">Hiện chưa có biến thể nào.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <a href="#collapseStatus" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseStatus">
                    <h6 class="m-0 font-weight-bold text-primary">Trạng thái sản phẩm</h6>
                </a>
                <div class="collapse show" id="collapseStatus">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="categories" class="form-label">Danh mục sản phẩm</label>
                            <div id="categories">
                                @foreach($categories as $id => $name)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="category{{ $id }}" disabled
                                            {{ in_array($id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="category{{ $id }}">{{ $name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Trạng thái</label>
                            <select class="form-control form-select-lg mb-3" id="choices-publish-status-input" name="is_active" disabled>
                                <option value="1" {{ $product->is_active ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sku" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" disabled>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-success">Danh sách</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
