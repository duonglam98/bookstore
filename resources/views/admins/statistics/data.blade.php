@extends('adminlte::page')

@section('title', 'Quản lý sách')

@section('content_header')
    <h1>Số liệu báo cáo</h1>
@stop

@section('content')

   <table class="table table-bordered">
       <tr>
           {{-- <th>Loại thống kê</th> --}}
           <th>Loại thống kê</th>
           <th>Giá trị</th>
       </tr>


       <tr>
           <td>Giá trị các đơn hàng đã đặt</td>
           <td></td>
       </tr>

       <tr>
            <td>Giá trị các đơn hàng đã hoàn thành</td>
            <td></td>
       </tr>

       <tr>
            <td>Tổng số sản phẩm trong kho</td>
            <td></td>
       </tr>

       <tr>
            <td>Tổng số sản phẩm đã bán</td>
            <td></td>
       </tr>
   </table>
    
    {{-- {!! $statistic->links() !!} --}}
        
@endsection
