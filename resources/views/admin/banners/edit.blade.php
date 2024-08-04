@extends('admin.layouts.master')

@section('title')
    Sửa Banner
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
<form action="{{route('admin.banners.update', $banner)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" class="form-control" name="name" value="{{$banner->name}}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image:</label>
        <input type="file" id="image" class="form-control-file" name="image">
        <div class="text-center mt-3">
            @if($banner->image)
              <img src="{{Storage::url($banner->image)}}" alt="{{$banner->name}}" width="321">
            @else
              <p></p>
            @endif
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Trạng thái:</label>
          <br>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" {{ $banner->is_active == 1 ? 'checked' : '' }}>
              <label class="form-check-label" for="is_active1">Hoạt động</label>
          </div>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="is_active" id="is_active" value="0" {{ $banner->is_active == 0 ? 'checked' : '' }}>
              <label class="form-check-label" for="is_active2">Không hoạt động</label>
          </div>
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>      
      </div>

    <button type="submit" class="btn btn-warning">Cập nhật</button>
    <button class="btn btn-success"><a href="{{route('admin.banners.index')}}" class="text-decoration-none text-white">Danh sách</a></button>
  </form>
    </div>
</div>
@endsection