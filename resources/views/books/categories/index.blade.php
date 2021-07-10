@extends('layouts.myapp')


@section('title', 'Danh mục')


@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{-- <h2>{{ $category->name }}</h2> --}}
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Books</a></li>
                    {{-- <li class="breadcrumb-item active">{{ $category->name }}</li>  --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sắp xếp: </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Không</option>
									<option value="1">Phổ biến</option>
									<option value="2">Giá cao → Giá thấp</option>
									<option value="3">Giá thấp → Giá cao</option>
									<option value="4">Bán chạy nhất</option>
								</select>
                                </div>
                                {{-- <p>Showing all 4 results</p> --}}
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    {{-- @if ($category == $book->category) --}}
                                    <div class="row">
                                        @foreach ($books as $book)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            {{-- @foreach ($category as $cate) --}}
                                            
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        {{-- <p class="sale">Sale</p> --}}
                                                    </div>
                                                    <img src="/image/{{ $book->image }}" class="img-fluid" style="height: 350px !important">
                                                    <div class="mask-icon">
                                                        {{-- <ul>
                                                            <li><a href="{{ route('books.detail', ['id' => $book->id])  }}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul> --}}
                                                        <a class="btn hvr-hover add-to-card cart" data-fancybox-close="" href="" data-book_id="{{ $book->id }}">Thêm giỏ hàng</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><a href="{{ route('books.detail', ['id' => $book->id])  }}">{{ $book->name }}</a></h4>
                                                    <h5> {{ $book->price }}</h5>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                    {{-- @endif --}}
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img src="/image/{{ $book->image }}" class="img-fluid" style="height: 300px !important">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                {{-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li> --}}
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Thêm vào danh sách yêu thích"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width" style="height: 300px !important">
                                                    <h4><a href="{{ route('books.detail', ['id' => $book->id])  }}">{{ $book->name }}</a></h4>
                                                    <h5> {{ $book->price }}</h5>
                                                    <p>Tác giả: {{ $book->author }}</p>
                                                    <p>Nhà xuất bản: {{ $book->NXB }}</p>
                                                    <p>{{ $book->description }}</p>
                                                    <a class="btn hvr-hover" href="#">Thêm giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                
                                @foreach ($category as $cate)
                                    <a href="{{ route('books.index') . '?category=' . $cate->sub_name  }}" class="list-group-item list-group-item-action"> {{ $cate->name }}  <small class="text-muted"> </small></a>
                                @endforeach
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


@endsection


@section('style')
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.add-to-card').click(function(event) {
            event.preventDefault();
            var book_id = $(this).data('book_id'); // data-book_id="value"
            var quantity = 1;
            var image = "/image/{{ $book->image }}";

            var url = '/orders';

            $.ajax(url, {
                type: 'POST',
                data: {
                    book_id: book_id,
                    quantity: quantity,
                    image: image,
                },
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    alert(resultObj.msg);
                    $('#cart-number').text(resultObj.quantity);
                },
                error: function () {
                    alert('Vui lòng đăng nhập để thêm giỏ hàng!');
                }
            });
        });

    });
</script>
@endsection