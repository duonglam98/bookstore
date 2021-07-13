@extends('adminlte::page')

@section('title', 'Quản lý đơn hàng')

@section('content_header')
    <h1>Quản lý đơn hàng</h1>
@stop

@section('content')
    
    
    @if ($message = Session::get('Thành công'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    
    <div class="row">
        <div class="col-10">
            
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th  style="width: 27%">Trạng thái đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th width="280px">Tuỳ chỉnh</th>
                </tr>
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
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </form>
                    </td>
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
            
        </div>
        <div class="col-2">
                <h3>Bộ lọc</h3>
              {{-- SM size with single date/time config --}}
                {{-- @php
                $config = [
                    "singleDatePicker" => true,
                    "showDropdowns" => true,
                    "startDate" => "js:moment()",
                    "minYear" => 2000,
                    "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
                    "timePicker" => true,
                    "timePicker24Hour" => true,
                    "timePickerSeconds" => true,
                    "cancelButtonClasses" => "btn-danger",
                    "locale" => ["format" => "YYYY-MM-DD HH:mm:ss"],
                ];
                @endphp
                <x-adminlte-date-range name="drSizeSm" label="Date/Time" igroup-size="sm" :config="$config">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </x-slot>
                </x-adminlte-date-range> --}}
        
                <div class="form-group">
                    <form action="" method="GET">
                    <label for="title" class="control-block">Trạng thái đơn hàng:</label>
                    <select class="form-control" name="status" value="">
                        <option value="">1. Đơn hàng được tạo  </option>
                        <option value="">2. Đơn hàng đã xác nhận và chờ xử lý</option>
                        <option value="">3. Đơn hàng đã hoàn thành</option>
                        <option value="">4. Đơn hàng đã huỷ</option>
            
                    </select>
                    <button class="btn btn-primary" type="submit" style="background-color: #b0b435 !important">Lọc</button>
                </form>
                </div>
           
            
        </div>
    </div>
    
    
    {!! $orders->links() !!}
        
@endsection
@section('plugins.DateRangePicker', true)
{{-- @endsection --}}