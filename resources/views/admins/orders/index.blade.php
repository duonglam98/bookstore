@extends('adminlte::page')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <input type="text" placeholder="Tìm theo tên khách hàng..." id="search" name="search">
        </div>

        <div class="col-4">
            <div class="form-group" >
                <select id='status' class="form-control" value = "" style="width: 297px">
                    <option class="one" value="1">1. Đơn hàng được tạo  </option>
                    <option class="two" value="2">2. Đơn hàng đã xác nhận và chờ xử lý</option>
                    <option class="three" value="3">3. Đơn hàng đã hoàn thành</option>
                    <option class="four" value="4">4. Đơn hàng đã huỷ</option>
                </select>
               
            </div>
        </div>    
        
        <div class="col-3">
            {{-- Prepend slot and custom ranges enables --}}
            <x-adminlte-date-range name="drCustomRanges" enable-default-ranges="Last 30 Days">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-date-range>
        </div>
    </div>

    <div class="row">
        @if ($message = Session::get('Thành công'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-12">
            <table id="orders-table" class="table table-bordered" >
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th  style="width: 23%">Trạng thái đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th width="193px">Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tbody id="order-table">
                    
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ ($orders->perPage() * ($orders->currentPage() - 1)) + ($loop->index + 1) }}</td>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->user_name }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>
                            <select class="form-control" name="status" value="{{ $order->status }}">
                                {{-- check status khi get về --}}
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
                                @endif
                            
                                <option value="{{ old('status',$order->status = 1) }}">1. Đơn hàng được tạo  </option>
                                <option value="{{ old('status',$order->status = 2) }}">2. Đơn hàng đã xác nhận và chờ xử lý</option>
                                <option value="{{ old('status',$order->status = 3) }}">3. Đơn hàng đã hoàn thành</option>
                                <option value="{{ old('status',$order->status = 4) }}">4. Đơn hàng đã huỷ</option>
                            </select>
                            <a class="btn btn-success update-status" data-book_order_id="{{ $order->id }}"><i class="fas fa-sync-alt"></i></a>
                        </td>
                        <td>{{ $order->created_at }}</td>
                        
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.orders.show',$order->id) }}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="{{ route('admin.orders.edit',$order->id) }}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger delete-order" data-order_id="{{ $order->id }}"><i class="far fa-trash-alt"></i></a>
                        
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="row paginate-box">
                    {!! $orders->links() !!}
                </div>
            </div>

           
        </div>
    
        <div class="row text-center">
            <div class="footer-copyright" style="margin-left: 25%">
                <p class="footer-company" style="margin-top: 40px;">Đã đăng kí bản quyền &copy; 2021 <a href="#">NHANDANBOOK</a> Thiết kế bởi :
                    <a href="https://html.design/">Nhà sách Nhân Dân</a>
                </p> 
            </div>
        </div>
</div>   
@endsection

@section('plugins.DateRangePicker', true)
@section('js')  
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $('.delete-order').click(function(event) {
                console.log('ok')
                event.preventDefault();
                var bookElement = $(this).closest('tr');
                var orderId = $(this).data('order_id');
                var url = '/admin/orders/' + orderId;
                console.log(url);
                $.ajax(url, {
                    type: 'DELETE',
                    success: function (result) {
                        var resultObj = JSON.parse(result);
                        if (resultObj.status) {
                            alert(resultObj.msg);
                            bookElement.remove();
                           
                        } else {
                            alert(resultObj.msg);
                            
                        }
                        location.reload();
                    },
                    error: function () {
                        alert('Có lỗi ở nút xoá!');
                    }
                });
            });


            $('#search').keyup(function() {
                var keyWord = $(this).val();
                var url = '/admin/orders/search?keyword=' + keyWord;
                console.log(keyWord);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        displayOrder(result);
                    },
                    error: function() {
                        location.reload();
                    }
                });
            });
            
            function displayOrder(orders) {
                $('#order-table').html('');
                $('.paginate-box').html('');
                $.each(orders, function(index, order) {
                    var option = '';
                    var selected = '';
                    var list = [
                        '1. Đơn hàng được tạo',
                        '2. Đơn hàng đã xác nhận và chờ xử lý',
                        '3. Đơn hàng đã hoàn thành',
                        '4. Đơn hàng đã huỷ',
                    ];
                    for (var i = 0; i < list.length; i++) {
                        var value = i + 1;
                        selected = (value == order.status) ? 'selected' : '';
                        option += '<option value="' + value + '" ' + selected + '>';
                        option += list[i];
                        option += '</option>';
                    }
                    var stt = index + 1;
                    var row = '<tr>'
                                + '<td>' + stt + '</td>'
                                + '<td>' + order.code + '</td>'
                                + '<td>' + order.user_name + '</td>'
                                + '<td>' + order.total_price + '</td>'
                                + '<td>'
                                   + '<select class="form-control" name="status" value="' + order.status + '">'
                                    + option 
                                    + '</select>'
                                    + '<a class="btn btn-success update-status" data-book_order_id="' + order.id + '"><i class="fas fa-sync-alt"></i></a>'
                                + '</td>'
                                + '<td>' + order.created_at + '</td>'
                                + '<td>'
                                    + '<a class="btn btn-info" href="/admin/orders/' + order.id + '"><i class="fas fa-eye"></i></a> '
                                    + '<a class="btn btn-primary" href="/admin/orders/' + order.id + '/edit"><i class="fas fa-edit"></i></a> '
                                    + '<a class="btn btn-danger delete-order" data-order_id="' + order.id + '"><i class="far fa-trash-alt"></i></a>'
                                + '</td>';
                            + '</tr>';
                    $('#order-table').append(row);
                });
            }

            $("#status").change(function(){
                var keyWord = $(this).val();
                var url = '/admin/orders/search-status?keyword=' + keyWord;
                console.log(url);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        displayOrder(result);
                    },
                    error: function() {
                        location.reload();
                    }
                });
            });

            $('.update-status').click(function(event) {
                console.log('ok');
                event.preventDefault();
                var status = parseInt($(this).parent().find('select').val());
                var orderId = $(this).closest('tr').find('.update-status').data('book_order_id');
                var url = '/admin/orders/' + orderId;
                console.log(status);
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

            $('#drCustomRanges').addClass('datetime');
            $('.datetime').change(function(event) {
                var firstDate = $(this).val().substring(0, 10).replace("/","-").replace("/","-");
                var lastDate = $(this).val().substring(13, 23).replace("/","-").replace("/","-");
                var url = '/admin/orders/date?keyword=' + firstDate + '-' + lastDate;
                console.log(url);
                $.ajax({
                    url: url,
                    type: 'GET',
                    
                });
                
            });
        });
    </script>
@endsection

