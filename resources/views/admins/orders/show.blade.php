@extends('adminlte::page')

@section('title', 'Chi tiết đơn đặt hàng')

{{-- @section('content_header')
    <h1>Xem chi tiết đơn đặt hàng</h1>
@stop --}}

@section('content')
    
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
 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID đơn hàng:</strong>
            {{ $order->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mã đơn hàng:</strong>
            {{ $order->code }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Trạng thái đơn hàng:</strong>
            {{ $order->status }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tổng tiền:</strong>
            {{ $order->total_price }}
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên khách hàng:</strong>
            {{ $order->user_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Số điện thoại:</strong>
            {{ $order->phone }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Địa chỉ giao hàng:</strong>
            {{ $order->address }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ngày tạo đơn hàng:</strong>
            {{ $order->created_at }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ngày sửa đổi:</strong>
            {{ $order->updated_at }}
        </div>
    </div>

    
</div>
        
@endsection
@endsection