@extends('admin.layouts.master')

@section('title')
    Sửa sản phẩm
@endsection

@section('content')
<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}" placeholder="Nhập tên sản phẩm" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá bán</label>
                            <input type="number" id="price" class="form-control" name="price" value="{{ $product->price }}" placeholder="Nhập giá bán" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_sale" class="form-label">Giá gốc</label>
                            <input type="number" id="price_sale" class="form-control" name="price_sale" value="{{ $product->price_sale }}" placeholder="Nhập giá gốc" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <div id="ckeditor-classic" name="description">
                                {{ $product->description }}
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
                            <p class="text-muted">Thay đổi hình ảnh chính của sản phẩm.</p>
                            <input type="file" id="img_thumb" class="form-control-file" name="img_thumb">
                            @if($product->img_thumb)
                              <img src="{{ asset('storage/' . $product->img_thumb) }}" alt="Product Thumbnail" class="img-fluid my-2">
                            @endif
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-4">
                            <h5 class="fs-14 mb-1">Thư viện hình ảnh</h5>
                            <p class="text-muted">Thay đổi hình ảnh thư viện sản phẩm.</p>
                            <input type="file" name="product_galleries[]" multiple class="form-control-file">
                            <div class="mt-3">
                              @if (isset($product->galleries))
                                @foreach($product->galleries as $gallery)
                                  <img src="{{ asset('storage/' . $gallery->image) }}" alt="Product Gallery" class="img-thumbnail mb-2" style="max-height: 100px;">
                                @endforeach
                              @else 
                              
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
                            <table class="table variant-table">
                                <thead>
                                    <tr>
                                        <th>Kích thước</th>
                                        <th>Màu sắc</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if (isset($product->variants))
                                    @foreach($product->variants as $key => $variant)
                                    <tr>
                                        <td>
                                            <select name="product_variants[{{ $key + 1 }}][size]" class="form-control" required>
                                                @foreach($sizes as $size_id => $size_name)
                                                    <option value="{{ $size_id }}" {{ $size_id == $variant->product_size_id ? 'selected' : '' }}>{{ $size_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="product_variants[{{ $key + 1 }}][color]" class="form-control" required>
                                                @foreach($colors as $color_id => $color_name)
                                                    <option value="{{ $color_id }}" {{ $color_id == $variant->product_color_id ? 'selected' : '' }}>{{ $color_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="product_variants[{{ $key + 1 }}][quantity]" class="form-control" value="{{ $variant->quantity }}" required>
                                        </td>
                                    </tr>
                                    @endforeach
                                  @else
                                    <tr>
                                      <td>
                                          <select name="product_variants[1][size]" class="form-control">
                                              @foreach($sizes as $size_id => $size_name)
                                                  <option value="{{ $size_id }}">{{ $size_name }}</option>
                                              @endforeach
                                          </select>
                                      </td>
                                      <td>
                                          <select name="product_variants[1][color]" class="form-control">
                                              @foreach($colors as $color_id => $color_name)
                                                  <option value="{{ $color_id }}">{{ $color_name }}</option>
                                              @endforeach
                                          </select>
                                      </td>
                                      <td>
                                          <input type="number" name="product_variants[1][quantity]" class="form-control">
                                      </td>
                                    </tr>
                                  @endif
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
                                        <input type="checkbox" class="form-check-input" id="category{{ $id }}" name="categories[]" value="{{ $id }}"
                                            @if(in_array($id, old('categories', $product->categories->pluck('id')->toArray())))
                                                checked
                                            @endif>
                                        <label class="form-check-label" for="category{{ $id }}">{{ $name }}</label>
                                    </div>
                                @endforeach
                            </div>                            
                        </div>                        
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Trạng thái</label>
                            <select class="form-control form-select-lg mb-3" id="choices-publish-status-input" name="is_active" required>
                                <option value="1" {{ $product->is_active ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sku" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                      <button type="submit" class="btn btn-warning">Cập nhật</button>
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
