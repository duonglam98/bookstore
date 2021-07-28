@extends('adminlte::page')

@section('title', 'Trang quản trị')

{{-- @section('content_header')
    <h1 style="text-align: center">Nhà Sách Nhân Dân</h1>
@stop --}}

@section('content')
{{-- Minimal with title, text and icon --}}
{{-- <x-adminlte-info-box title="Title" text="some text" icon="far fa-lg fa-star"/> --}}

<div class="row">
    <div class="col-3">
        {{-- <x-adminlte-info-box title="Tổng số đơn hàng" text="4" icon="fas fa-cart-arrow-down text-dark" theme="gradient-teal" url="#" url-text="View details"/> --}}
        {{-- Themes --}}
        <x-adminlte-small-box title="Tổng số đơn hàng" text="{{ $count_order }}" icon="fas fa-cart-arrow-down text-dark"
        theme="teal" url="/admin/orders" url-text="Xem chi tiết"/>

    </div>
    <div class="col-3">
        <x-adminlte-info-box title="Tổng doanh thu" text="{{ $orderPrices }}.00" icon="fas fa-table text-dark" theme="gradient-teal" />

    </div>
    <div class="col-3">
        <x-adminlte-info-box title="Khách hàng trực tuyến" text="{{ $dem }}" icon="fas fa-user-alt text-dark" theme="gradient-teal" />
    </div>
    <div class="col-3">
        <x-adminlte-info-box title="Tổng số khách hàng" text="{{ $userAuth }}" icon="fas fa-lg fa-user-plus text-primary"
        theme="gradient-primary" icon-theme="white"/>
    </div>
</div>

<div class="row">
    <div class="col-9">
        <h3>Các đơn hàng mới nhất</h3>
        <table class="table table-bordered">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái đơn hàng</th>
                <th>Ngày đặt</th>
                <th width="280px">Tuỳ chỉnh</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->code }}</td>
                <td>{{ $order->user_name }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at }}</td>
                
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.orders.show',$order->id) }}">Xem</a>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@push('js')
<script>

    $(document).ready(function() {

        let iBox = new _AdminLTE_InfoBox('ibUpdatable');

        let updateIBox = () =>
        {
            // Update data.
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let progress = Math.round(rep * 100 / 1000);
            let text = rep + '/1000';
            let icon = 'fas fa-lg fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
            let description = progress + '% reputation completed to reach next level';

            let data = {text, icon, description, progress};
            iBox.update(data);
        };

        setInterval(updateIBox, 5000);
    })

    $(document).ready(function() {

let sBox = new _AdminLTE_SmallBox('sbUpdatable');

let updateBox = () =>
{
    // Stop loading animation.
    sBox.toggleLoading();

    // Update data.
    let rep = Math.floor(1000 * Math.random());
    let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
    let text = 'Reputation - ' + ['Basic', 'Silver', 'Gold'][idx];
    let icon = 'fas fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
    let url = ['url1', 'url2', 'url3'][idx];

    let data = {text, title: rep, icon, url};
    sBox.update(data);
};

let startUpdateProcedure = () =>
{
    // Simulate loading procedure.
    sBox.toggleLoading();

    // Wait and update the data.
    setTimeout(updateBox, 2000);
};

setInterval(startUpdateProcedure, 10000);
})

</script>
@endpush

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop   


{{-- @section('js')
<script>

    $(document).ready(function() {

        let sBox = new _AdminLTE_SmallBox('sbUpdatable');

        let updateBox = () =>
        {
            // Stop loading animation.
            sBox.toggleLoading();

            // Update data.
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let text = 'Reputation - ' + ['Basic', 'Silver', 'Gold'][idx];
            let icon = 'fas fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
            let url = ['url1', 'url2', 'url3'][idx];

            let data = {text, title: rep, icon, url};
            sBox.update(data);
        };

        let startUpdateProcedure = () =>
        {
            // Simulate loading procedure.
            sBox.toggleLoading();

            // Wait and update the data.
            setTimeout(updateBox, 2000);
        };

        setInterval(startUpdateProcedure, 10000);
    })

</script>
@stop --}}

