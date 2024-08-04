@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
<form>
    <fieldset disabled>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" class="form-control" placeholder="{{$banner->name}}">
                </div>
            </div>
            <div class="col-md-6">              
                <div class="mb-3">
                    <label for="is_active" class="form-label">Trạng thái:</label>
                    <input type="text" id="is_active" class="form-control" placeholder="{{$banner->is_active == 1 ? "Online" : "Offline"}}">
                </div>
            </div>
          </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image:</label>
        <div class="text-center">
            @if($banner->image)
              <img src="{{Storage::url($banner->image)}}" alt="{{$banner->name}}" width="321">
            @else
              <p></p>
            @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="created_at" class="form-label">created_at:</label>
                <input type="datetime" id="created_at" class="form-control" placeholder="{{date_format($banner->created_at, 'd/m/Y H:i:s')}}">
            </div>
        </div>
        <div class="col-md-6">              
            <div class="mb-3">
                <label for="updated_at" class="form-label">updated_at:</label>
                <input type="datetime" id="updated_at" class="form-control" placeholder="{{$banner->updated_at == $banner->created_at ? "" : date_format($banner->updated_at, 'd/m/Y H:i:s')}}">
            </div>
        </div>
      </div>
    </fieldset>

    <button class="btn btn-success"><a href="{{route('admin.banners.index')}}" class="text-decoration-none text-white">Danh sách</a></button>
  </form>
    </div>
  </div>
@endsection