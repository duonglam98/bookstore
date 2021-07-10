@extends('layouts.myapp')

@section('title', 'Tài Khoản Của Bạn')

@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tài khoản</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
                        <li class="breadcrumb-item active">Tài khoản của tôi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start My Account  -->
    <div class="my-account-box-main">
        <div class="container">
            <div class="my-account-page">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="{{ route('users.accounts.yourOrder') }}"> <i class="fa fa-gift"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>Đơn hàng của bạn</h4>
                                    <p>Theo dõi đơn hàng, trả lại hoặc đặt lại đơn hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="{{ route('profile.show') }}"> <i class="fa fa-lock"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>Đăng nhập &amp; Bảo mật</h4>
                                    <p>Chỉnh sửa thông tin cá nhân và đăng nhập</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="#"> <i class="fa fa-location-arrow"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>Sổ địa chỉ</h4>
                                    <p>Chỉnh sửa địa chỉ nhận hàng</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="{{ route('users.accounts.wishList') }}"> <i class="fa fa-credit-card"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>Danh sách yêu thích</h4>
                                    <p>Lưu trữ những sản phẩm yêu thích của bạn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End My Account -->



@endsection

@section('style')

 