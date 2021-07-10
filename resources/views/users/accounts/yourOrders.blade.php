@extends('layouts.myapp')

@section('title', 'Đơn hàng của bạn')

@section('content')
{{-- {{ route('users.acc.update', $user->id) }} --}}

<form action="" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái đơn hàng</th>
                <th>Ngày đặt</th>
                <th width="280px">Tuỳ chỉnh</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $order->code }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at }}</td>
                
                <td>
                    <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                        
                        @csrf
                        @method('DELETE')
           
            @if ($order->status==4 || $order->status==3 || $order->status==2)
                <button type="submit" class="btn btn-danger" disabled>Huỷ đơn</button>
            @else
                <button type="submit" class="btn btn-danger">Huỷ đơn</button>

            @endif
                       
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>
     
</form>

@endsection
@section('style')
