@extends('admin.layouts.master')

@section('title')
    Thêm Coupon
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
<form action="{{route('admin.coupons.store')}}" method="POST">
    @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="sku" class="form-label">Mã giảm giá:</label>
            <input type="text" id="sku" class="form-control" name="sku">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="discount" class="form-label">Ưu đãi:</label>
            <input type="number" id="discount" class="form-control" name="discount">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu:</label>
            <input type="date" id="start_date" class="form-control" name="start_date">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc:</label>
            <input type="date" id="end_date" class="form-control" name="end_date">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="is_active" class="form-label">Trạng thái:</label>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1">
          <label class="form-check-label" for="inlineRadio1">Hoạt động</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="0">
          <label class="form-check-label" for="is_active">Không hoạt động</label>
        </div>
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <button class="btn btn-success"><a href="{{route('admin.coupons.index')}}" class="text-decoration-none text-white">Danh sách</a></button>
  </form>
    </div>
</div>
@endsection