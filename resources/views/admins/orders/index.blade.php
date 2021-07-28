@extends('adminlte::page')

@section('title', 'Quản lý đơn hàng')

{{-- @section('content_header')
    <h1>Quản lý đơn hàng</h1>
@stop --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <form class="card-body" action="/filter" method="GET" role="search">
                {{ csrf_field() }}
                <input type="text" placeholder="Tìm kiếm.." id="myInput" onkeyup="filterFunction()" name="search"><span style="border: 1px solid black; padding:4px" ><i class="fas fa-search" ></i></span>
                
            </form>
        </div>

        <div class="col-3">
            <div class="form-group" style="margin-top: 17px">
                <form action="" method="GET">
                    <select id='status' class="form-control" style="width: 200px">
                        <option value="1">1. Đơn hàng được tạo  </option>
                        <option value="2">2. Đơn hàng đã xác nhận và chờ xử lý</option>
                        <option value="3">3. Đơn hàng đã hoàn thành</option>
                        <option value="4">4. Đơn hàng đã huỷ</option>
                    </select>
                    {{-- <button class="btn btn-primary" type="submit" style="background-color: #b0b435 !important">Lọc</button> --}}
                </form>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                    url: "{{ route('admins.orders.index') }}",
                    data: function (d) {
                            d.status = $('#status').val(),
                            d.search = $('input[type="search"]').val()
                        }
                    },
                    columns: [
                    //   {data: 'id', name: 'id'},
                        {data: 'code', name: 'code'},
                        {data: 'user_name', name: 'user_name'},
                        {data: 'total_price', name: 'total_price'},
                        {data: 'status', name: 'status'},
                    ]
                });
            
                $('#status').change(function(){
                    table.draw();
                });
                
            });
            </script>
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
                        <th  style="width: 27%">Trạng thái đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th width="193px">Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->user_name }}</td>
                        <td>{{ $order->total_price }}</td>
                        <form action="{{ route('admin.orders.update',$order->id) }}" method="POST" enctype="multipart/form-data">
            
                            @csrf
                            @method('PUT')
                        <td>
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
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i></button>
                        </form>
                        </td>
                        <td>{{ $order->created_at }}</td>
                        
                        <td>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('admin.orders.show',$order->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-primary" href="{{ route('admin.orders.edit',$order->id) }}"><i class="fas fa-edit"></i></a>
                
                                @csrf
                                @method('DELETE')
                    
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="row">
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
