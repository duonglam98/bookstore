@extends('adminlte::page')

@section('title', 'Quản lý người dùng')

@section('content_header')
    <h1>Quản lý người dùng</h1>
@stop

@section('content')
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <p>Chào mừng đến trang quản lý người dùng dành cho Admin</p>           
            </div>
            <div class="pull-right">
                <a class="btn btn-success" style="background-color: #b0b435" href="{{ route('admin.users.create') }}"> Thêm người dùng mới</a>
            </div>
        </div>
    </div>
     --}}
    @if ($message = Session::get('Thành công'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     

   
    <table class="table table-bordered">
       
        <tr>
            <th>STT</th>
            <th>ID người dùng</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            {{-- <th>Mật khẩu</th> --}}
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Đơn hàng đã đặt</th>
            <th width="280px">Tuỳ chỉnh</th>
        </tr>
        
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            {{-- <td>{{ $user->password }}</td> --}}
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td></td>
            <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">      
                    <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   
    
    {!! $users->links() !!}
        
@endsection
{{-- @endsection --}}