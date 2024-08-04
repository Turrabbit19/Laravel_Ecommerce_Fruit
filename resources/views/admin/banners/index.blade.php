@extends('admin.layouts.master')

@section('title')
    Banner
@endsection

@section('create-btn')
    <a href="{{route("admin.banners.create")}}" class="btn btn-primary btn-icon-split">
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
            <th>image</th>
            <th>is_active</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>
        </thead>

        <tbody>
            @foreach ($data as $index => $bans)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$bans->name}}</td>
                    <td>
                        @if($bans->image)
                        <img src="{{Storage::url($bans->image)}}" alt="{{$bans->name}}" width="123">

                        @else
                        <p></p>
                        @endif                        
                    </td>
                    <td>
                        {!! $bans->is_active ? '<span class="badge bg-success text-white">Hoạt động</span>'
                        : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                    </td>
                    <td>{{date_format($bans->created_at, 'd/m/Y H:i:s')}}</td>
                    <td>{{$bans->updated_at == $bans->created_at ? "" : date_format($bans->updated_at, 'd/m/Y H:i:s')}}</td>
                    <td><a href="{{route('admin.banners.show', $bans)}}"><button class="btn btn-info">
                        <span class="icon text-white-50">
                            <i class="fas fa-eye"></i>
                        </span>    
                    </button></a></td>
                    <td><a href="{{route('admin.banners.edit', $bans)}}"><button class="btn btn-warning">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </button></a></td>
                    <td>
                        <form action="{{route('admin.banners.destroy', $bans)}}" method="POST">
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
                <p>Không có banner nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection