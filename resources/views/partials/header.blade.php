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
                    <p>Phone : <a href="#"> +84 033 969 8977</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        @auth
                        <a href="{{ route('users.accounts.index') }}" class="acc"><i class="fa fa-user"></i>
                            {{ $user->name }}
                        </a>
                        @endauth

                        {{-- @auth
                        @if ($user->name != 'Admin')
                        <a href="{{ route('users.accounts.index') }}" class="acc"><i class="fa fa-user"></i>
                            {{ $user->name }}
                        </a>
                           
                        @else 
                        <a href="{{ route('admin.index') }}" class="acc"><i class="fa fa-user"></i>
                            {{ $user->name }}
                        </a>

                        @endif
                        @endauth --}}

                        @guest
                        <li><a href="{{ route('register') }}"><i class="fa fa-user s_color"></i> Tài khoản</a></li>
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
                         
                          @if (Route::has('register'))
                          <a class="dropdown-item" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                          @endif

                          <a class="dropdown-item" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
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
                            <a href="#" class="nav-link arrow  dropdown-toggle " data-toggle="dropdown"> Danh mục <i class="fas fa-caret-down"></i></a> 
                            <ul class="dropdown-menu " >
                                @foreach ($category as $cate)
                                    <li value="{{ $cate->id }}"><a href="{{ route('books.index') . '?category=' . $cate->sub_name  }}" >{{ $cate->name }}</a></li>                                
								@endforeach
                            </ul>
                        </li>
                        
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.contact') }}"> Liên Hệ</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li>
                        <form class="card-body" action="/search" method="GET" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <li class="search">
                                    
                                    <div class="dropdown">
                                       <i class="fa fa-search" onclick="myFunction()" class="dropbtn" 
                                       style="position: absolute; top: -6px; right: 6px; "></i>
                                        <div id="myDropdown" class="dropdown-content" style=" margin-left: -257px; margin-top:24px">
                                          <input style="border: 4px solid #b0b435;" type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()" name="search">
                                          
                                        </div>
                                      </div>
                                    
                                </li>
                                <script> 
                                    /* When the user clicks on the button,
                                    toggle between hiding and showing the dropdown content */
                                    function myFunction() {
                                      document.getElementById("myDropdown").classList.toggle("show");
                                    }
                                    
                                   
                                </script>
                         
                            </div>
                        </form>
                    </li>

                        <li class="side-menu">
							<a href="{{ route('orders.cart') }}">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge" id="cart-number">{{ showCartNumber() }}</span>
								<p>Giỏ hàng</p>
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

        .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}

    </style>