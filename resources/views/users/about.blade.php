@extends('layouts.myapp')

@section('title', 'Giới Thiệu')

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
                    <h2>TỔNG QUAN VỀ CHÚNG TÔI</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">NSND</a></li>
                        <li class="breadcrumb-item active">TỔNG QUAN VỀ CHÚNG TÔI</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="/bookstore/images/about-img.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">Chúng tôi là <span>Nhà sách Nhân Dân</span></h2>
                    <p>Nhà sách Nhân Dân được thành lập ngày 30/4/2000 và nhanh chóng được giới học sinh sinh viên ở TP Thanh Hoá biết đến. 
                        Nhờ những thể loại sách thú vị, giá cả phải chăng phù hợp với các em học sinh sinh viên kinh tế khó khăn. 
                        Nhà sách vô cùng tự hào là một địa chỉ bán sách uy tín và được đông đảo người dân tin dùng.
                    </p>
                    <p>Nhằm đưa những cuốn sách hay và ý nghĩa đến với nhiều khách hàng trên toàn thành phố cả nước, 
                        website của Nhà sách Nhân Dân đã ra đời với những tính năng đầy đủ của thương mại điện tử, giao diện đẹp mắt,
                    dễ sử dụng.</p>
					{{-- <a class="btn hvr-hover" href="#">Read More</a> --}}
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Niềm tin</h3>
                        <p>Với lịch sử lâu năm hoạt động kinh doanh, Nhà sách luôn giữ vững vị thế của mình nhờ sự tin tưởng của khách hàng với nhà sách khi đến mua sách. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Chất lượng</h3>
                        <p>Nhà sách luôn cố gắng cập nhật những cuốn sách hay, ý nghĩa nhất đến cho khách hàng một cách nhanh nhất. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Chuyện nghiệp</h3>
                        <p>Với sự ra đời của website bán sách online, Nhà sách Nhân Dân đã đầu tư cơ sở hạ tầng hiện đại phục vụ cho việc bán sách trực tuyến để Nhà sách được nhiều đối tượng khách hàng biết đến hơn.</p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Gặp gỡ ban quản lý</h2>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="/bookstore/images/img-1.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Nguyễn Thanh Bình</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="/bookstore/images/img-2.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Dương Nhật Lam</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="/bookstore/images/img-3.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Trịnh Anh Tú</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="/bookstore/images/img-1.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Cao Văn Du</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->


@endsection

@section('style')
