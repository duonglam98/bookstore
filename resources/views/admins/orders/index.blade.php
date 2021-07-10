@extends('adminlte::page')

@section('title', 'Quản lý sách')

@section('content_header')
    <h1>Quản lý đơn hàng</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <h5>Trạng thái đơn hàng:</h5>
                <p>1. Đơn hàng được tạo   |   2. Đơn hàng đã xác nhận và chờ xử lý   |   3. Đơn hàng đã hoàn thành   |   4. Đơn hàng đã huỷ</p>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('Thành công'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>ID đơn hàng</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái đơn hàng</th>
            <th>Ngày đặt</th>
            <th width="280px">Tuỳ chỉnh</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->code }}</td>
            <td>{{ $order->user_name }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
            
            <td>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin.orders.show',$order->id) }}">Xem</a>
                    <a class="btn btn-primary" href="{{ route('admin.orders.edit',$order->id) }}">Sửa</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $orders->links() !!}
        
@endsection
{{-- @endsection --}}