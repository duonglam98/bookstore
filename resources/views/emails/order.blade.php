<div>
    <!-- AE nhớ thêm thông tin order vào cho đẹp nhé -->
    @foreach ($order->books as $book)
        <p>{{ $book->name }}</p>
        <p>{{ $book->price }}</p>
    @endforeach
</div>
