   <!-- Start Main Top -->
   <div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                {{-- <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                        <option>¥ JPY</option>
                        <option>$ USD</option>
                        <option>€ EUR</option>
                    </select>
                </div> --}}
                <div class="right-phone-box">
                    <p>Call US :- <a href="#"> +84 033 969 8977</a></p>
                </div>
                <div class="our-link">
                    <ul>

                        @auth
                        @if ($user->name != 'Admin')
                        <a href="{{ route('users.index') }}" class="acc"><i class="fa fa-user"></i>
                            {{ $user->name }}
                        </a>
                           
                        @else 
                        <a href="{{ route('admin.index') }}" class="acc"><i class="fa fa-user"></i>
                            {{ $user->name }}
                        </a>

                        @endif
                        @endauth

                        @guest
                        <li><a href="#"><i class="fa fa-user s_color"></i> Tài khoản</a></li>
                        @endguest
                        {{-- <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li> --}}
                        <li><a href="{{ route('users.contact') }}"><i class="fas fa-headset"></i> Tư vấn</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @if (auth()->id())
                {{-- <div class="login-box" hidden>
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                        <option>Đăng Ký</option>
                        
                        <option>Đăng Nhập</option>
                        
                    </select>
                </div> --}}

                <div class="login-box">
                    
                    <button id="basic" class="selectpicker form-control"  data-placeholder="Log out" style="background-color: #b0b435 ">
                        <span><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                             {{ __('Đăng xuất') }}
                             </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form></span>                        
                    </button>
                </div>
                    
                @else
                <div class="login-box" >
                   
                    <div class="dropdown">
                        <button class="btn btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Đăng Nhập
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                          @if (Route::has('register'))
                          <a class="dropdown-item" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                          @endif
                        </div>
                      </div>
                   
                </div>

               
                
                @endif
               
            </div>
            
                
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->
 
 
 <!-- Start Main Top -->
 <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{ route('books.index') }}"><img src="/bookstore/images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        {{-- <li class="nav-item active"><a class="nav-link" href="index.html"></a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.about') }}">Giới Thiệu</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link arrow  dropdown-toggle " data-toggle="dropdown"> DANH MỤC <i class="fas fa-caret-down"></i></a> 
                            <ul class="dropdown-menu ">
								<li><a href="{{ route('categories.newbook') }}">Sách Mới Nhất</a></li>
                                <li><a href="{{ route('categories.textbook') }}">Sách Giáo Khoa</a></li>
								<li><a href="{{ route('categories.domestic') }}">Văn Học Trong Nước</a></li>
                                <li><a href="{{ route('categories.foreign') }}">Văn Học Nước Ngoài</a></li>
                                <li><a href="{{ route('categories.economy') }}">Kinh Tế</a></li>
                                <li><a href="{{ route('categories.dictionary') }}">Từ Điển</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.contact') }}">Liên Hệ</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#">
                            <div class="dropdown">
                               <i class="fa fa-search" onclick="myFunction()" class="dropbtn" style="position: absolute;
                               top: -41px; "></i>
                                <div id="myDropdown" class="dropdown-content">
                                  <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                  <a href="#">Tìm tên sách</a>
                                  <a href="#">Tìm tên tác giả</a>
                                  <a href="#">Tìm tên Nhà xuất bản</a>
                                  
                                </div>
                              </div></a>
                        </li>
                        <script>
                            /* When the user clicks on the button,
                            toggle between hiding and showing the dropdown content */
                            function myFunction() {
                              document.getElementById("myDropdown").classList.toggle("show");
                            }
                            
                            function filterFunction() {
                              var input, filter, ul, li, a, i;
                              input = document.getElementById("myInput");
                              filter = input.value.toUpperCase();
                              div = document.getElementById("myDropdown");
                              a = div.getElementsByTagName("a");
                              for (i = 0; i < a.length; i++) {
                                txtValue = a[i].textContent || a[i].innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                  a[i].style.display = "";
                                } else {
                                  a[i].style.display = "none";
                                }
                              }
                            }
                            </script>


                        <li class="side-menu">
							<a href="{{ route('orders.cart') }}">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge" id="cart-number">{{ showCartNumber() }}</span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="/bookstore/images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="/bookstore/images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="/bookstore/images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

     <!-- Start Top Search -->
     <div class="top-search" >
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    
    <style>
        .acc {
            color: rgb(255, 255, 255);
        }

        .acc:hover {
            color: #b0b435;
        }
    </style>