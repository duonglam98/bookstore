@extends('adminlte::page')

@section('title', 'Chỉnh sửa đơn hàng')

@section('content_header')
    <h1>Chỉnh sửa đơn hàng</h1>
@stop

@section('content')
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" style="background-color: #b0b435" href="{{ route('admin.orders.index') }}"> Trở về</a>
            </div>
            <div class="pull-right">
                <h5>Trạng thái đơn hàng:</h5>
                <p>1. Đơn hàng được tạo   |   2. Đơn hàng đã xác nhận và chờ xử lý   |   3. Đơn hàng đã hoàn thành   |   4. Đơn hàng đã huỷ</p>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Lỗi!</strong> Có vấn đề xảy ra với dữ liệu nhập vào.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- {{ $order->id }}  --}}
    <form action="{{ route('admin.orders.update',$order->id) }}" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('PUT')
    
     <div class="row">
        
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tên khách hàng:</strong>
                <input type="text" name="user_name" class="form-control" placeholder="Tên khách hàng" value="{{ $order->user_name }}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Số điện thoại:</strong>
                <input type="text" name="phone" class="form-control" placeholder="Tên khách hàng" value="{{ $order->phone }}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Địa chỉ:</strong>
                <input type="text" name="address" class="form-control" placeholder="Tên khách hàng" value="{{ $order->address }}">
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="control-block">Trạng thái đơn hàng:</label>
            <select class="form-control" name="status" value="{{ old('status', $order->status) }}">
                @if ($order->status == 1)
                <option value="{{ old('status',$order->status = 1) }}">1. Đơn hàng được tạo  </option>

                @elseif ($order->status == 2)
                <option value="{{ old('status',$order->status = 2) }}">2. Đơn hàng đã xác nhận và chờ xử lý</option>

                @elseif ($order->status == 3)
                <option value="{{ old('status',$order->status = 3) }}">3. Đơn hàng đã hoàn thành</option>

                @elseif ($order->status == 4)
                <option value="{{ old('status',$order->status = 4) }}">4. Đơn hàng đã huỷ</option>

                @else
                <option value="{{ old('status',$order->status = 1) }}">1. Đơn hàng được tạo  </option>
                <option value="{{ old('status',$order->status = 2) }}">2. Đơn hàng đã xác nhận và chờ xử lý</option>
                <option value="{{ old('status',$order->status = 3) }}">3. Đơn hàng đã hoàn thành</option>
                <option value="{{ old('status',$order->status = 4) }}">4. Đơn hàng đã huỷ</option>
                @endif
               
                <option value="{{ old('status',$order->status = 1) }}">1. Đơn hàng được tạo  </option>
                <option value="{{ old('status',$order->status = 2) }}">2. Đơn hàng đã xác nhận và chờ xử lý</option>
                <option value="{{ old('status',$order->status = 3) }}">3. Đơn hàng đã hoàn thành</option>
                <option value="{{ old('status',$order->status = 4) }}">4. Đơn hàng đã huỷ</option>
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="height: 50px">
                <button type="submit" class="btn btn-primary" style="background-color: #b0b435">Cập nhật đơn hàng</button>
        </div>
    </div>
     
</form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@section('js')
    <script> console.log('Hi!'); </script>