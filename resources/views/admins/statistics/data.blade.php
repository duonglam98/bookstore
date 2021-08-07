@extends('adminlte::page')

@section('title', 'Thống kê - Báo cáo')

@section('content')
<div class="container">
    <div class="row">
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
        <div class="col-8">
            <table class="table table-bordered">
                <tr>
                    {{-- <th>Loại thống kê</th> --}}
                    <th>Loại thống kê</th>
                    <th>Giá trị</th>
                </tr>
         
                <tr>
                     <td>Tổng số sản phẩm trong kho</td>
                     <td>{{ $totalQuantityBook }}</td>
                </tr>
         
                <tr>
                     <td>Tổng số sản phẩm đã bán</td>
                     <td>{{ $orderBought }}</td>
                </tr>
            </table>
    
            {{-- <h3>Sản phẩm bán chạy</h3>
            <table class="table table-bordered">
                <tr>
                    <th>ID sách</th>
                    <th>Tên sách</th>
                    <th>Số lượng bán</th>
                </tr>
                @foreach ($bookSales as $bookSale) 
                    @foreach ($bookCountSales as $bookCountSale) 
                        @if($bookSale->book_id == $bookCountSale->id) 
                            <tr>
                                <td>{{ $bookSale->book_id }}</td>
                                <td>{{ $bookCountSale->name }}</td>
                                <td>{{ $bookSale->count }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
                
            </table> --}}
        </div>
        
                    
    </div>
</div>

@endsection
@section('plugins.DateRangePicker', true)

