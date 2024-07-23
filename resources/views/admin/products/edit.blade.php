@extends('admin.layouts.master')

@section('title')
    Sửa sản phẩm
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
<form action="{{route('admin.products.update', $product)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Tên:</label>
        <input type="text" id="name" class="form-control" name="name" value="{{$product->name}}">
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Đường dẫn:</label>
        <input type="text" id="slug" class="form-control" name="slug" value="{{$product->slug}}">
      </div>
      <div class="mb-3">
        <label for="sku" class="form-label">Mã:</label>
        <input type="text" id="sku" class="form-control" name="sku" value="{{$product->sku}}">
      </div>
      <div class="mb-3">
        <label for="img_thumb" class="form-label">Ảnh:</label>
        <input type="file" id="image" class="form-control-file" name="img_thumb">
        <div class="text-center mt-3">
            @if($product->img_thumb)
                <img src="{{Storage::url($product->img_thumb)}}" alt="{{$product->name}}" width="321">
            @else
                <p></p>
            @endif
        </div>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Giá bán:</label>
        <input type="number" id="price" class="form-control" name="price" value="{{$product->price}}">
      </div>
      <div class="mb-3">
        <label for="price_sale" class="form-label">Giá gốc:</label>
        <input type="number" id="price_sale" class="form-control" name="price_sale" value="{{$product->price_sale}}">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Mô tả:</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
      </div>
      <div class="mb-3">
        <label for="quantity" class="form-label">Số lượng:</label>
        <input type="number" id="quantity" class="form-control" name="quantity" value="{{$product->quantity}}">
      </div>
      <div class="mb-3">
        <label for="is_active" class="form-label">Trạng thái:</label>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" {{ $product->is_active == 1 ? 'checked' : '' }}>
          <label class="form-check-label" for="inlineRadio1">Hoạt động</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="0" {{ $product->is_active == 0 ? 'checked' : '' }}>
          <label class="form-check-label" for="is_active">Không hoạt động</label>
        </div>
      </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
    <button class="btn btn-success"><a href="{{route('admin.products.index')}}" class="text-decoration-none text-white">Danh sách</a></button>
  </form>
    </div>
</div>
@endsection