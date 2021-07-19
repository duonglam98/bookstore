@extends('layouts.myapp')

@section('title', 'Danh sách yêu thích')

@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Danh sách yêu thích</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('books.index') }}">NSND</a></li>
                        <li class="breadcrumb-item active">Danh sách yêu thích</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                       
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th style="text-align: center;">Tên sách</th>
                                    <th>Giá </th>
                                    <th style="text-align: center;">Số lượng trong kho</th>
                                    <th style="width: 31%; text-align: center;">Thêm vào giỏ hàng</th>
                                    <th style="text-align: center;">Xoá</th>
                                </tr>
                            </thead>
                            @if (Auth::user()->wishlist->count() )
                            @foreach ($wishlists as $wishlist)
                            <tbody>
                                
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{ $wishlist->image }}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									{{ $wishlist->name }}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{ $wishlist->price }}</p>
                                    </td>
                                    <td class="quantity-box" style="text-align: center;">
                                        {{ $wishlist->quantity }}
                                    </td>
                                    <td class="add-pr" style="text-align: center;">
                                        <a class="btn hvr-hover add-to-card" href="#" data-book_id="{{ $wishlist->book_id }}">Thêm giỏ hàng</a>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
									<i class="fas fa-times delete-product"  data-book_wish_id="{{ $wishlist->id }}"></i>
								</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist -->

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

        $('.delete-product').click(function(event) {
            event.preventDefault();
            var bookElement = $(this).parent().parent().parent().parent()
            ;           
            var bookWishId = $(this).data('book_wish_id');
            var url = '/users/account/' + bookWishId;
            console.log(bookElement);
            $.ajax(url, {
                type: 'DELETE',
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    if (resultObj.status) {
                        alert(resultObj.msg);
                        bookElement.remove();
                    } else {
                        alert(resultObj.msg);
                        location.reload();
                    }
                },
                error: function () {
                    alert('Có lỗi ở nút xoá!');
                }
            });
        });
       
        $('.add-to-card').click(function(event) {
            event.preventDefault();
            var book_id = $(this).data('book_id'); // data-book_id="value"
            var quantity = 1;
            var image = $(this).parent().parent().find('img').attr('src');             
            console.log(image);
            // return ;

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

