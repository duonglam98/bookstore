@component('mail::message')
# Introduction

{{-- <div>
    <!-- AE nhớ thêm thông tin order vào cho đẹp nhé -->
    @foreach ($order->books as $book)
        <p>{{ $book->name }}</p>
    @endforeach
</div> --}}

@component('mail::button', ['url' => $order['url']])

Xem chi tiết đơn hàng
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent