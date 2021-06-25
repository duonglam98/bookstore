@component('mail::message')
Nhà sách Nhân Dân cảm ơn quý khách đã đặt hàng

Đơn hàng của quý khách đã được tiếp nhận, xem chi tiết tại đơn hàng tại website của Nhà sách Nhân Dân.

@component('mail::button', ['url' => 'localhost:3000/books'])
Chi tiết đơn hàng
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
