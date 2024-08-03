@extends('admin.layouts.master')

@section('title')
    Thêm sản phẩm
@endsection

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <!-- Left content -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseProductInfo">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm chính</h6>
                </a>
                <div class="collapse show" id="collapseProductInfo">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Nhập tên sản phẩm" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá bán</label>
                            <input type="number" id="price" class="form-control" name="price" placeholder="Nhập giá bán" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_sale" class="form-label">Giá gốc</label>
                            <input type="number" id="price_sale" class="form-control" name="price_sale" placeholder="Nhập giá gốc" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <div id="ckeditor-classic" name="description">
                              <ul>
                                  <li>Xuất xứ</li>
                                  <li>Chất lượng</li>
                                  <li>Đặc điểm sản phẩm</li>
                                  <li>Bảo quản và sử dụng</li>
                                  <li>Lợi ích</li>
                              </ul>
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
                            <p class="text-muted">Thêm hình ảnh chính của sản phẩm.</p>
                            <input type="file" id="img_thumb" class="form-control-file" name="img_thumb" required>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-4">
                            <h5 class="fs-14 mb-1">Thư viện hình ảnh</h5>
                            <p class="text-muted">Thêm hình ảnh thư viện sản phẩm.</p>
                            <input type="file" name="product_galleries[]" multiple class="form-control-file">
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
                            <table class="table variant-table">
                                <thead>
                                    <tr>
                                        <th>Kích thước</th>
                                        <th>Màu sắc</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="product_variants[1][size]" class="form-control" required>
                                                @foreach($sizes as $size_id => $size_name)
                                                    <option value="{{ $size_id }}">{{ $size_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="product_variants[1][color]" class="form-control" required>
                                                @foreach($colors as $color_id => $color_name)
                                                    <option value="{{ $color_id }}">{{ $color_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="product_variants[1][quantity]" class="form-control" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                              <button class="btn btn-success add-variant">Thêm biến thể</button>
                            </div>
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
                                        <input class="form-check-input" type="checkbox" id="{{ $id }}" name="categories[]" value="{{ $id }}">
                                        <label class="form-check-label" for="{{ $id }}">
                                            {{ $name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>                                                                                     
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Trạng thái</label>
                            <select class="form-control form-select-lg mb-3" id="choices-publish-status-input" name="is_active" required>
                                <option value="" selected>------- Trạng thái -------</option>
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sku" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control" name="sku" value="{{ strtoupper(\Str::random(7)) }}" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                      <button type="submit" class="btn btn-primary">Thêm mới</button>
                      <a href="{{ route('admin.products.index') }}" class="btn btn-success ml-2">Danh sách</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    let variantCount = 1;
    const addVariantButton = document.querySelector('.add-variant');
    const variantTableBody = document.querySelector('.variant-table tbody');

    addVariantButton.addEventListener('click', function (e) {
        e.preventDefault();
        variantCount++;
        const newRow = `
            <tr>
                <td>
                    <select name="product_variants[${variantCount}][size]" class="form-control" required>
                        @foreach($sizes as $size_id => $size_name)
                            <option value="{{ $size_id }}">{{ $size_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="product_variants[${variantCount}][color]" class="form-control" required>
                        @foreach($colors as $color_id => $color_name)
                            <option value="{{ $color_id }}">{{ $color_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="product_variants[${variantCount}][quantity]" class="form-control" required>
                </td>
            </tr>
        `;
        variantTableBody.insertAdjacentHTML('beforeend', newRow);
    });
});
</script>
@endsection
