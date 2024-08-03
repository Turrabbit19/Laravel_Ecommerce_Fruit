@extends('admin.layouts.master')

@section('title')
    Sản phẩm
@endsection

@section('create-btn')
    <a href="{{route("admin.products.create")}}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
        </span>
            <span class="text">Thêm</span>
    </a>
@endsection

@section('content')
    @if (session('success'))
        <div class="text-center text-success">        
            <span>{{session('success')}}</span>
        </div>
    @endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">    
    @if (count($products) > 0)
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <th>#</th>
            <th>name</th>
            <th>slug</th>
            <th>sku</th>
            <th>img_thumb</th>
            <th>price</th>
            <th>price_sale</th>
            <th>quantity</th>
            <th>view</th>
            <th>is_active</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>
        </thead>

        <tbody>
            @foreach ($products as $index => $pros)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$pros->name}}</td>
                    <td>{{$pros->slug}}</td>
                    <td>{{$pros->sku}}</td>
                    <td>
                        @if($pros->img_thumb)
                        <img src="{{Storage::url($pros->img_thumb)}}" alt="{{$pros->name}}" width="123">

                        @else
                        <p></p>
                        @endif
                    </td>
                    <td>{{number_format($pros->price)}}</td>
                    <td>{{number_format($pros->price_sale)}}</td>
                    <td>{{$pros->quantity}}</td>
                    <td>{{$pros->view}}</td>
                    <td>
                        {!! $pros->is_active ? '<span class="badge bg-success text-white">Hoạt động</span>'
                        : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                    </td>
                    <td>{{date_format($pros->created_at, 'd/m/Y H:i:s')}}</td>
                    <td>{{$pros->updated_at == $pros->created_at ? "" : date_format($pros->updated_at, 'd/m/Y H:i:s')}}</td>
                    <td><a href="{{route('admin.products.show', $pros)}}"><button class="btn btn-info">
                        <span class="icon text-white">
                            <i class="fas fa-eye"></i>
                        </span>    
                    </button></a></td>
                    <td><a href="{{route('admin.products.edit', $pros)}}"><button class="btn btn-warning">
                        <span class="icon text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </button></a></td>
                    <td>
                        <form action="{{route('admin.products.destroy', $pros)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?!??')">
                                <span class="icon text-white">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </button>
                        </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
            @else
            <div class="d-flex justify-content-center align-items-center">
                <p>Không có sản phẩm nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection