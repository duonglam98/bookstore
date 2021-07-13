@extends('layouts.myapp')

@section('title', 'Xác nhận thanh toán')

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
                    <h2>Xác nhận đặt hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Đặt hàng</a></li>
                        <li class="breadcrumb-item active">Xác nhận đặt hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            
           
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Thông tin thanh toán</h3>
                            </div>
                            {{-- <f/orm action="{{ route('orders.payment') }}" method="POST"> --}}
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label for="firstName">Họ và tên *</label>
                                        <input type="text" class="form-control" name="user_name" placeholder="Nhập họ và tên..." value="" required>
                                        <div class="invalid-feedback"> Họ và tên là bắt buộc. </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email">Số điện thoại *</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại...">
                                    <div class="invalid-feedback"> Vui lòng nhập số điện thoại của bạn. </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address">Địa chỉ *</label>
                                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ nhận hàng..." required>
                                    <div class="invalid-feedback"> Vui lòng nhập địa chỉ giao hàng. </div>
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="address2">Địa chỉ 2 *</label>
                                    <input type="text" class="form-control" id="address2" placeholder=""> </div> --}}
                                {{-- <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="country">Country *</label>
                                        <select class="wide w-100" id="country">
                                        <option value="Choose..." data-display="Select">Choose...</option>
                                        <option value="United States">United States</option>
                                    </select>
                                        <div class="invalid-feedback"> Please select a valid country. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State *</label>
                                        <select class="wide w-100" id="state">
                                        <option data-display="Select">Choose...</option>
                                        <option>California</option>
                                    </select>
                                        <div class="invalid-feedback"> Please provide a valid state. </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip">Zip *</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required>
                                        <div class="invalid-feedback"> Zip code required. </div>
                                    </div>
                                </div> --}}
                                {{-- <hr class="mb-4"> --}}
                                {{-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="same-address">
                                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="save-info">
                                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                </div> --}}
                                <hr class="mb-4">
                                <div class="title"> <span>Thanh toán</span> </div>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                                    </div>
                                
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Phương thức giao hàng</h3>
                                    </div>
                                    <div class="mb-4">
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                            <label class="custom-control-label" for="shippingOption1">Giao hàng tiêu chuẩn</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                        <div class="ml-4 mb-2 small">(3-7 ngày làm việc)</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Giỏ hàng đã xác nhận</h3>
                                    </div>
                                    <div class="rounded p-2 bg-light">
                                        @foreach ($bookOrders as $bookOrder)
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <a href=""> {{ $bookOrder->book->name }}</a>
                                                <div class="small text-muted">
                                                    <span>Giá: {{ $bookOrder->price }}</span> 
                                                    <span class="mx-2">|</span>
                                                    <span class="total-price1 book-quantity" > {{ $bookOrder->quantity }}</span>
                                                    <span class="mx-2">|</span>
                                                    <span class="total-pr total-product-price"> Tạm tính: <span class="abc">{{ $bookOrder->price * $bookOrder->quantity }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <div class="title-left">
                                        <h3>Hoá đơn của bạn</h3>
                                    </div>
                                    {{-- <div class="d-flex">
                                        <div class="font-weight-bold">Sản phẩm</div>
                                        <div class="ml-auto font-weight-bold">Tổng tiền</div>
                                    </div> --}}
                                    {{-- <hr class="my-1"> --}}
                                    <div class="d-flex">
                                        <h4>Tạm tính</h4>
                                        <div class="ml-auto font-weight-bold total-price"> </div>
                                    </div>
                                    
                                    <hr class="my-1">
                                    
                                    <div class="d-flex">
                                        <h4>Phí giao hàng</h4>
                                        <div class="ml-auto font-weight-bold"> Free </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex gr-total">
                                        <h5>Tổng cộng</h5>
                                        <div class="ml-auto h5 total-price">  </div>
                                    </div>
                                    <hr> </div>
                            </div>
                            <div class="col-12 d-flex shopping-box"> 
                                <div class="spinner-border text-success" role="status">
                                    <span class="sr-only">Loading...</span>
                                  </div> 
                                <button class="ml-auto btn hvr-hover cart-checkout" > Đặt hàng </button>  

                               
                            </div> 
                        </div>
                   
                    </div>
                </div>
            {{-- </form> --}}
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

        $('.cart-checkout').click(function(event) {
            
            event.preventDefault();
            console.log('ok');
            var url = '/orders/checkout';

            $.ajax(url, {
                data :{
                    user_name: $('input[name="user_name"]').val(),
                    phone: $('input[name="phone"]').val(),
                    address: $('input[name="address"]').val(),

                },
                type: 'POST',
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    alert(resultObj.msg);
                    // location.reload();
                    window.history.go(-2);
                },
                error: function () {
                    alert('Lỗi class cart-checkout!');
                }
            });
        });
        calculatePrice();
        function calculatePrice()
        {
            var totalPrice = 0;
            $('.abc').each(function() {
                console.log($(this).text());
                var price = parseInt($(this).text());
                totalPrice += price;
            });

            // console.log(totalPrice);
            $('.total-price').text(totalPrice);

            var totalQuantity = 0;
            $('.total-price1').each(function() {
                var quantity = parseInt($(this).text());
                totalQuantity += quantity;
            });

            // console.log(totalQuantity);
            
            $('#cart-number').text(totalQuantity);
        }
    });
</script>
@endsection