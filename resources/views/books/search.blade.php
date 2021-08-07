@extends('layouts.myapp')

@section('title', 'Kết quả tìm kiếm')

@section('content')
<div class="products-box">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Kết quả tìm kiếm</h1>
                </div>
            </div>
        </div>
       
        <div class="row special-list">
            @if ($books)
                @foreach ($books as $book)
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                                                     
                            <img src="/image/{{ $book->image }}" class="img-fluid" style="height: 350px !important">
                            <div class="mask-icon">
                            
                                <a class="btn hvr-hover add-to-card cart" data-fancybox-close="" href="" data-book_id="{{ $book->id }}">Thêm giỏ hàng</a>

                            </div>
                        </div>
                        <div class="why-text" style="height: 106px !important">
                            <h4><a href="{{ route('books.detail', ['id' => $book->id])  }}">{{ $book->name }}</a></h4>
                            <h5> {{ $book->price }} vnđ</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center">
                    <h3>Không có kết quả nào phù hợp!</h3>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection