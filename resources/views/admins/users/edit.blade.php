@extends('adminlte::page')

@section('title', 'Chỉnh sửa sách')

@section('content_header')
    <h1>Chỉnh sửa thông tin người dùng</h1>
@stop

@section('content')
<form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tên ngưỜi dùng:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng" value="{{ $user->name }}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Nhập email" value="{{ $book->email }}">
            </div>
        </div>
            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Số điện thoại:</strong>
                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{ $book->phone }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Địa chỉ:</strong>
                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value="{{ $book->address }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="height: 50px">
                <button type="submit" class="btn btn-primary" style="background-color: #b0b435">Cập nhật thông tin</button>
        </div>
    </div>
     
</form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@section('js')
    <script> console.log('Hi!'); </script>