@extends('layouts.myapp')

@section('title', 'Chỉnh Sửa Sách')

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
                <h2>Edit Book</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Store</a></li>
                    <li class="breadcrumb-item active">Edit Book</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
            {{-- <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Account Login</h3>
                </div>
                <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                <form class="mt-3 collapse review-form-box" id="formLogin">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputEmail" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword" class="mb-0">Password</label>
                            <input type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Login</button>
                </form>
            </div> --}}
            {{-- <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Create New Account</h3>
                </div>
                <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                <form class="mt-3 collapse review-form-box" id="formRegister">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputName" class="mb-0">First Name</label>
                            <input type="text" class="form-control" id="InputName" placeholder="First Name"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputLastname" class="mb-0">Last Name</label>
                            <input type="text" class="form-control" id="InputLastname" placeholder="Last Name"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputEmail1" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Password</label>
                            <input type="password" class="form-control" id="InputPassword1" placeholder="Password"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Register</button>
                </form>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Chỉnh sửa sản phẩm</h3>
                    </div>
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
                <form action="/books/{{ $book->id }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Tên Sản Phẩm *</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value=" {{ old('name', $book->name) }} " required>
                                <div class="invalid-feedback"> Valid first name is required. </div>
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <label for="code">Mã Sách *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="code" name="code" placeholder="" value="{{ old('code', $book->code) }}" required>
                                <div class="invalid-feedback" style="width: 100%;"> Your code is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="author">Tác Giả *</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="" value="{{ old('author', $book->author) }}" required>
                            <div class="invalid-feedback"> Please enter your checkout address. </div>
                        </div>
                        <div class="mb-3">
                            <label for="price">Giá Tiền *</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="" value="{{ old('price', $book->price) }}">
                            <div class="invalid-feedback"> Please enter a valid price for checkout updates. </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="quantity">Số Lượng *</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="" value="{{ old('quantity', $book->quantity) }}">
                            <div class="invalid-feedback"> Please enter a number for checkout updates. </div>
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô Tả *</label>
                            <textarea placeholder="Product detail" name="description">{{ old('description', $book->description) }}</textarea> </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="images">Ảnh Bìa Sách *</label>
                                <form action="/action_page.php">
                                    <input type="file" id="myFile" name="images" value="{{ old('images', $book->images) }}">                                 
                                </form>
                            <div class="invalid-feedback"> Please select a valid file. </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="weight">Trọng lượng Sách *</label>
                            
                            <input type="text" class="form-control" id="weight" name="weight" placeholder="" value="{{ old('weight', $book->weight) }}" required>
                                <div class="invalid-feedback"> This input required. </div>
                                <div class="invalid-feedback"> Please provide a valid state. </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="NXB">Tên NXB *</label>
                                <input type="text" class="form-control" id="NXB" name="NXB" placeholder="" value=" {{ old('NXB', $book->NXB) }} " required>
                                <div class="invalid-feedback"> NXB is required!. </div>
                            </div>
                            <div class="checkout__input text-center">
                                <button type="submit" class="site-btn">Update</button>
                            </div>
                        </div>                  

                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    {{-- <div class="col-md-12 col-lg-12">
                        <div class="shipping-method-box">
                            <div class="title-left"> --}}
                                {{-- <h3>Shipping Method</h3> --}}
                            {{-- </div>
                            <div class="mb-4"> --}}
                                {{-- {{-- <div class="custom-control custom-radio">
                                    <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                    <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                <div class="custom-control custom-radio">
                                    <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                    <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">$10.00</span> </div>
                                <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                <div class="custom-control custom-radio"> --}}
                                    {{-- <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                    <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">$20.00</span> </div> --}}
                            {{-- </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Shopping cart</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                <div class="media mb-2 border-bottom">
                                    <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                        <div class="small text-muted">Price: $80.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $80.00</div>
                                    </div>
                                </div>
                                <div class="media mb-2 border-bottom">
                                    <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                        <div class="small text-muted">Price: $60.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $60.00</div>
                                    </div>
                                </div>
                                <div class="media mb-2">
                                    <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                        <div class="small text-muted">Price: $40.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $40.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box"> --}}
                            {{-- <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">book</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"> $ 440 </div>
                            </div>
                            <div class="d-flex">
                                <h4>Discount</h4>
                                <div class="ml-auto font-weight-bold"> $ 40 </div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Coupon Discount</h4>
                                <div class="ml-auto font-weight-bold"> $ 10 </div>
                            </div>
                            <div class="d-flex">
                                <h4>Tax</h4>
                                <div class="ml-auto font-weight-bold"> $ 2 </div>
                            </div>
                            <div class="d-flex">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Free </div>
                            </div> --}}
                            {{-- <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> $ 388 </div>
                            </div>
                            <hr> </div> --}}
                    </div>
                    
                </div>
            </div>
        </div>
 </form> 
    </div>
</div>
<!-- End Cart -->


@endsection
@section('style')
<style>
    textarea {
        width: 100%;
        height: 150px;
        font-size: 16px;
        color: #6f6f6f;
        padding-left: 20px;
        margin-bottom: 24px;
        border: 1px solid #ebebeb;
        border-radius: 4px;
        padding-top: 12px;
        resize: none;
    }
</style>