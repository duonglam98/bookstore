@extends('layouts.myapp')

@section('title', 'Tạo Sách')

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
                <h2>Tạo sách mới</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Kho sách</a></li>
                    <li class="breadcrumb-item active">Tạo sách mới</li>
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
        <form action="/books" method="POST">
                   
            @csrf
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Tạo sản phẩm</h3>
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
                
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Tên Sách *</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value=" {{ old('name') }} " required>
                            </div>                            
                        </div>
                        <div class="mb-3">
                            <label for="code">Mã Sách *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="code" name="code" placeholder="" value="{{ old('code') }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="author">Tác Giả *</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="" value="{{ old('author') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price">Giá Tiền *</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="" value="{{ old('price') }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="quantity">Số Lượng *</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="" value="{{ old('quantity') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô Tả *</label>
                            <textarea placeholder="Product detail" name="description">{{ old('description') }}</textarea> 
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="images">Ảnh Bìa Sách *</label>
                                <form action="/action_page.php">
                                    <input type="file" id="myFile" name="images" value="{{ old('images') }}">                                 
                                </form>
                                <div class="invalid-feedback"> Vui lòng chọn file tải lên. </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="weight">Trọng lượng Sách *</label>
                                <input type="text" class="form-control" id="weight" name="weight" placeholder="" value="{{ old('weight') }}" required>                             
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="NXB">Tên NXB *</label>
                                <input type="text" class="form-control" id="NXB" name="NXB" placeholder="" value=" {{ old('NXB') }} " required>
                            </div>
                        </div>
                    
                        <div class="checkout__input text-center">
                            <button type="submit" class="site-btn hvr-hover">Create</button>
                        </div>
              
            </div>
        </form> 
        </div>
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
        color: #78c025;
        padding-left: 20px;
        margin-bottom: 24px;
        border: 1px solid #ebebeb;
        border-radius: 4px;
        padding-top: 12px;
        resize: none;
    }
</style>