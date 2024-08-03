@extends('admin.layouts.master')

@section('title')
    Đơn hàng
@endsection

@section('content')
    @if (session('success'))
        <div class="text-center text-success mb-3">        
            <span>{{session('success')}}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="text-center text-danger mb-3">        
            <span>{{session('error')}}</span>
        </div>
    @endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">    
    @if (count($data) > 0)
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <th>#</th>
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>note</th>
            <th>Phương thức thanh toán</th>
            <th>Trạng thái</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>show</th>
            <th>update</th>
            <th>delete</th>
        </thead>

        <tbody>
            @foreach ($data as $index => $ords)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$ords->sku}}</td>
                    <td>{{$ords->user_name}}</td>
                    <td>{{$ords->user_address}}</td>
                    <td>{{$ords->user_email}}</td>
                    <td>{{$ords->user_phone}}</td>
                    <td>{{$ords->note}}</td>
                    <td>
                        {{$ords->payment_method == 1 
                            ? "Thanh toán trực tiếp" 
                            : ($ords->payment_method == 2 
                                ? "Thanh toán qua ngân hàng" 
                                : ($ords->payment_method == 3 
                                    ? "Momo" 
                                    : "Không xác định"))}}
                    </td>
                    <td>
                        {{$ords->status == 1 
                        ? "Chờ xác nhận" 
                            : ($ords->status == 2 
                            ? "Đang xử lý" 
                                : ($ords->status == 3 
                                ? "Đang giao hàng" 
                                    : ($ords->status == 4 
                                    ? "Hoàn thành" 
                                        : "Đã hủy")))}} 
                    </td>                    
                    <td>{{date_format($ords->created_at, 'd/m/Y H:i:s')}}</td>
                    <td>{{$ords->updated_at == $ords->created_at ? "" : date_format($ords->updated_at, 'd/m/Y H:i:s')}}</td>
                    <td><a href="{{route('admin.orders.show', $ords)}}"><button class="btn btn-info">
                        <span class="icon text-white">
                            <i class="fas fa-eye"></i>
                        </span>    
                    </button></a></td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $ords) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">
                                <span class="icon text-white">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.orders.destroy', $ords)}}" method="POST">
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
                <p>Không có đơn hàng nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection