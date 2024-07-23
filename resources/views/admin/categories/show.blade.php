@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
<form>
    <fieldset disabled>
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" class="form-control" placeholder="{{$category->name}}">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image:</label>
        <div class="text-center">
            @if($category->image)
              <img src="{{Storage::url($category->image)}}" alt="{{$category->name}}" width="321">
            @else
              <p></p>
            @endif
        </div>
      </div>
      <div class="mb-3">
        <label for="is_active" class="form-label">Trạng thái:</label>
        <input type="text" id="is_active" class="form-control" placeholder="{{$category->is_active == 1 ? "Online" : "Offline"}}">
      </div>
      <div class="mb-3">
        <label for="created_at" class="form-label">created_at:</label>
        <input type="datetime" id="created_at" class="form-control" placeholder="{{date_format($category->created_at, 'd/m/Y H:i:s')}}">
      </div>
      <div class="mb-3">
        <label for="updated_at" class="form-label">updated_at:</label>
        <input type="datetime" id="updated_at" class="form-control" placeholder="{{$category->updated_at == $category->created_at ? "" : date_format($category->updated_at, 'd/m/Y H:i:s')}}">
      </div>
    </fieldset>

    <button class="btn btn-success"><a href="{{route('admin.categories.index')}}" class="text-decoration-none text-white">Danh sách</a></button>
  </form>
    </div>
  </div>
@endsection