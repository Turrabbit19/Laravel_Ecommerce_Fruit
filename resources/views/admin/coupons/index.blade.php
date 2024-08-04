@extends('admin.layouts.master')

@section('title')
    Coupon  
@endsection

@section('create-btn')
    <a href="{{route("admin.coupons.create")}}" class="btn btn-primary btn-icon-split">
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
    @if (count($data) > 0)
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <th>#</th>
            <th>name</th>
            <th>sku</th>
            <th>discount</th>
            <th>start_date</th>
            <th>end_date</th>
            <th>is_active</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>
        </thead>

        <tbody>
            @foreach ($data as $index => $cous)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$cous->name}}</td>
                    <td>{{$cous->sku}}</td>
                    <td>{{$cous->discount}}</td>
                    <td>
                        {!! $cous->is_active ? '<span class="badge bg-success text-white">Hoạt động</span>'
                        : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                    </td>
                    <td>{{\DateTime::createFromFormat('Y-m-d', $cous->start_date)->format('d/m/Y')}}</td>
                    <td>{{\DateTime::createFromFormat('Y-m-d', $cous->end_date)->format('d/m/Y')}}</td>
                    
                    <td>{{date_format($cous->created_at, 'd/m/Y H:i:s')}}</td>
                    <td>{{$cous->updated_at == $cous->created_at ? "" : date_format($cous->updated_at, 'd/m/Y H:i:s')}}</td>
                    <td><a href="{{route('admin.coupons.show', $cous)}}"><button class="btn btn-info">
                        <span class="icon text-white-50">
                            <i class="fas fa-eye"></i>
                        </span>    
                    </button></a></td>
                    <td><a href="{{route('admin.coupons.edit', $cous)}}"><button class="btn btn-warning">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </button></a></td>
                    <td>
                        <form action="{{route('admin.coupons.destroy', $cous)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?!??')">
                                <span class="icon text-white-50">
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
                <p>Không có phiếu giảm giá nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection