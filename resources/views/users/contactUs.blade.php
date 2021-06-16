@extends('layouts.myapp')

@section('title', 'Góp Ý Với Chúng Tôi')

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
                    <h2>LIÊN HỆ</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">BOOKS</a></li>
                        <li class="breadcrumb-item active"> LIÊN HỆ VỚI CHÚNG TÔI </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Cung cấp thông tin về bạn?</h2>
                        <p>Bạn có thể cung cấp một số thông tin cụ thể cho chúng tôi và chúng tôi sẽ cố gắng phản hồi bạn sớm nhất. Hãy yên tâm vì điều này hoàn toàn bảo mật!</p>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên của bạn" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="name" placeholder="Chủ đề bạn muốn hỏi?" required data-error="Please enter your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Nhập tin nhắn" rows="4" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Gửi phản hồi</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>Thông tin liên hệ</h2>
                        <p>Nếu bạn gặp bất kì vấn đề nào với trang web, hãy liên hệ với chúng tôi qua các kênh dưới đây. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i><b>Address: Đường Ngô Xuân Quảng, <br> TT Trâu Quỳ </b></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i><b>Phone: <a href="tel:+84-339698977">+84-339698977</a></b></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i><b>Email: <a href="mailto:duongthixinh@gmail.com">duongthixinh@gmail.com</a></b></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->



@endsection

@section('style')
 