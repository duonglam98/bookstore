@extends('layouts.myapp')

@section('title', 'Giỏ Hàng')

@section('content')
   

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Giỏ hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">NSND</a></li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        @if ($bookOrders)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ảnh Bìa</th>
                                    <th>Tên Sách</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($bookOrders as $bookOrder)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{ $bookOrder->image }}" alt="" style="width: 100px !important;
                                    height: 102px !important;" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <h5>{{ $bookOrder->book->name }}</h5>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{ $bookOrder->price }}</p>
                                    </td>
                                    <td class="quantity-box quantity" >
                                        <input type="number"  min="1"  class="c-input-text qty text book-quantity" value="{{ $bookOrder->quantity }}" style="width:20%">
                                    </td>
                                    <td class="total-pr total-product-price">
                                        <p>{{ $bookOrder->price * $bookOrder->quantity }}</p>
                                    </td>
                                    <td class="remove-pr ">
                                        
									<i class="fas fa-times delete-product" data-book_order_id="{{ $bookOrder->id }}"></i>
							
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @else
                            
                            <h2 style="text-align: center">Giỏ hàng trống!</h2>
                            
                        @endif
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        {{-- <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Nhập mã giảm giá" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Kiểm tra mã giảm giá</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div> --}}
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Tổng hóa đơn</h3>
                        <div class="d-flex">
                            <h4>Tạm Tính</h4>
                            <div class="ml-auto font-weight-bold total-price">  </div>
                        </div>
                        
                        <hr class="my-1">
                        {{-- <div class="d-flex">
                            <h4>Phiếu giảm giá</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div> --}}
                       
                        <div class="d-flex">
                            <h4>Phí Ship</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Tổng Tiền</h5>
                            <div class="ml-auto h5 total-price">  </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box t">
                    @if (!$bookOrders)
                    <a href="{{ route('orders.checkOut') }}" class="ml-auto btn hvr-hover cart-checkout" hidden>Xác nhận giỏ hàng</a>
                    @else 
                    <a href="{{ route('orders.checkOut') }}" class="ml-auto btn hvr-hover cart-checkout" >Xác nhận giỏ hàng</a>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->


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
            var bookElement = $(this).parent().parent();
            var bookOrderId = $(this).data('book_order_id');
            var url = '/orders/' + bookOrderId;
            console.log(url);
            $.ajax(url, {
                type: 'DELETE',
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    if (resultObj.status) {
                        alert(resultObj.msg);
                        bookElement.remove();
                    } else {
                        alert(resultObj.msg);
                        
                    }
                    location.reload();
                },
                error: function () {
                    alert('Có lỗi ở nút xoá!');
                }
            });
        });

        $('.qty').addClass('update-quantity');
        $('.update-quantity').click(function(event) {
            // console.log('ok')
            event.preventDefault();
            var quantity = parseInt($(this).parent().find('input').val());
            var totalBookPrice = $(this).closest('tr').find('.total-product-price');
            var bookOrderId = $(this).closest('tr').find('.delete-product').data('book_order_id');
            var url = 'orders/' + bookOrderId;
            $.ajax(url, {
                type: 'PUT',
                data: {
                    quantity: quantity,
                },
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    if (!resultObj.status) {
                        alert(resultObj.msg);
                        location.reload();
                    }
                    totalBookPrice.text(resultObj.price);
                    calculatePrice();
                },
                error: function () {
                    alert('Lỗi cập nhật số lượng sách!');
                }
            });
        });

        calculatePrice();
        function calculatePrice()
        {
            var totalPrice = 0;
            $('.total-product-price').each(function() {
                var price = parseInt($(this).text().replace('$', ''));
                totalPrice += price;
            });
            $('.total-price').text(totalPrice);
            var totalQuantity = 0;
            $('.book-quantity').each(function() {
                totalQuantity += parseInt($(this).val());
            });
            $('#cart-number').text(totalQuantity);
        }
    });
</script>
@endsection