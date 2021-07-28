@extends('layouts.myapp')

@section('title', 'Đơn hàng của bạn')

@section('content')
{{-- {{ route('users.acc.update', $user->id) }} --}}

{{-- <form action="" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method('PUT') --}}
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
                <td>
                @if ($order->status==1)
                    1 - Đơn hàng vừa tạo
                @elseif($order->status==2)
                    2 - Đơn hàng xác nhận & chờ xử lý
                @elseif($order->status==3)
                    3 - Đơn hàng đã hoàn thành
                @else
                    4 - Đơn hàng đã huỷ 
                @endif

                </td>
                <td>{{ $order->created_at }}</td>
                
                <td>
                    @if ($order->status==4 || $order->status==3)
                        <a class="btn btn-danger" disabled style="opacity: 0.6">Huỷ đơn</a>
                    @else
                        <a class="btn btn-danger cancel" value="{{ $order->status = 4 }} " data-order_id="{{ $order->id }}" style="color: white">Huỷ đơn</a>

                    @endif
                       
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>
     
{{-- </form> --}}

@endsection
@section('style')
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.cancel').click(function(event) {
                // console.log('ok');
                event.preventDefault();
                var status = 4;
                var bookOrderId = $(this).closest('tr').find('.cancel').data('order_id');
                
                var url = 'users/' + bookOrderId;
                $.ajax(url, {
                    type: 'PUT',
                    data: {
                        status: status,
                    },
                    success: function (result) {
                        var resultObj = JSON.parse(result);
                        if (resultObj.status) {
                            alert(resultObj.msg);
                            location.reload();
                        }
                    
                    },
                    error: function () {
                        alert('Lỗi cập nhật trạng thái đơn hàng!');
                    }
                });
            });
    });
</script>
@endsection