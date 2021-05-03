@extends('layouts.myapp')

@section('title', 'Home page')

@section('content')
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>¥ JPY</option>
							<option>$ USD</option>
							<option>€ EUR</option>
						</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<option>Register Here</option>
							<option>Sign In</option>
						</select>
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->


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
                    <h2>Wishlist</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
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
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Unit Price </th>
                                    <th>Stock</th>
                                    <th>Add Item</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="/bookstore/images/img-pro-01.jpg" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									Lorem ipsum dolor sit amet
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ 80.0</p>
                                    </td>
                                    <td class="quantity-box">In Stock</td>
                                    <td class="add-pr">
                                        <a class="btn hvr-hover" href="#">Add to Cart</a>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="/bookstore/images/img-pro-02.jpg" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									Lorem ipsum dolor sit amet
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ 60.0</p>
                                    </td>
                                    <td class="quantity-box">In Stock</td>
                                    <td class="add-pr">
                                        <a class="btn hvr-hover" href="#">Add to Cart</a>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="/bookstore/images/img-pro-03.jpg" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									Lorem ipsum dolor sit amet
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ 30.0</p>
                                    </td>
                                    <td class="quantity-box">In Stock</td>
                                    <td class="add-pr">
                                        <a class="btn hvr-hover" href="#">Add to Cart</a>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/bookstore/images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

@endsection

@section('style')
 