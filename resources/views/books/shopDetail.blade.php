@extends('layouts.myapp')

@section('title', 'Xem Sản Phẩm')

@section('content')

    <!-- Start Top Search -->
    {{-- <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div> --}}
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Xem chi tiết</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">NSND</a></li>
                        <li class="breadcrumb-item active">Chi tiết sách </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <img class="product__details__pic__item--large" src="/image/{{ $book->image }}">
                    {{-- <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="/bookstore/images/277fa65c176e3551a6bd0ffd05083265.jpg" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="/bookstore/images/55f46f20ec12c97447e6da109faf68f7.jpg" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="/bookstore/images/c3fa989449f2afaf2dccea7daa0e8311.jpg" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					    </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					    </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="/bookstore/images/277fa65c176e3551a6bd0ffd05083265.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="/bookstore/images/55f46f20ec12c97447e6da109faf68f7.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="/bookstore/images/c3fa989449f2afaf2dccea7daa0e8311.jpg" alt="" />
                            </li>
                        </ol>
                    </div> --}}
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $book->name }}</h2>
                        <h5> <del hidden>{{ $book->price }}</del> {{ $book->price }}</h5>
                        {{-- <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span><p> --}}
						<h4>Tác giả:</h4>
						<p>{{ $book->author }}</p>

                       
						<ul>
							<li>
								<div class="form-group quantity-box">
									<label class="control-label">Số lượng</label>
									<input class="form-control book-quantity" value="1"  min="1" max="{{ $book->quantity }}" type="number">
								</div>
							</li>
						</ul>

						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
								{{-- <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a> --}}
								<a class="btn hvr-hover add-to-card" data-fancybox-close=""  data-book_id="{{ $book->id }}"> Thêm vào giỏ hàng </a>
                               
                                
                         
                        {{-- @if(auth()->id() == $book->user_id)
                        <p>
                            <button><a href="{{ route('books.edit', ['book' => $book->id]) }}" class="primary-btn">Edit</a></button>
                        </p>
                        <p>
                            <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="primary-btn">Xoá</button>
                            </form>

                        </p>
                        @endif --}}
							</div>
						</div>

						<div class="add-to-btn">
							<div class="add-comp">
								<a class="btn hvr-hover add-to-wishlist" href="#" data-book_id="{{ $book->id }}"><i class="fas fa-heart "></i> Thêm vào danh sách yêu thích</a>
								{{-- <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a> --}}
							</div>
							<div class="share-bar">
								<a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
			
            <div class="row my-5">
                <div class="col-1"></div>
                <div class="col-10">
                    <h3><b>Nhà xuất bản/Công ty phát hành: </b></h3>
                    <p>{{ $book->NXB }}</p><br>
                    <h3><b>Mô tả ngắn: </b></h3>
                    <p>{{ $book->description }}</p>
                </div>
            </div>
			<div class="row my-5" >
               
				<div class="card card-outline-secondary my-4" style="width:100%" >
					<div class="card-header">
						<h2 style="font-size: 30px;
                        text-align: center;">Đánh giá cuốn sách {{ $book->name }}</h2>
					</div>
					<div class="card-body">
						{{-- <div class="media mb-3">
							<div class="mr-2"> 
								<img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
							</div>
                           
							<div class="media-body">
								<p>Đây là khu vực để lại bình luận, vui lòng nhấn vào nút bên dưới để đăng tải bình luận của bạn</p>
								<small class="text-muted">Ngày bình luận: </small>
							</div>
						</div>
						<hr>
						<div class="media mb-3">
							<div class="mr-2"> 
								<img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
							</div>
                            
							<div class="media-body">
                                <p>Đây là khu vực để lại bình luận, vui lòng nhấn vào nút bên dưới để đăng tải bình luận của bạn</p>

								<small class="text-muted">Ngày bình luận: </small>
							</div>
						</div>
						<hr>
						<div class="media mb-3">
							<div class="mr-2"> 
								<img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
							</div>
                           
							<div class="media-body">
                                <p>Đây là khu vực để lại bình luận, vui lòng nhấn vào nút bên dưới để đăng tải bình luận của bạn</p>

								<small class="text-muted">Ngày bình luận: </small>
							</div>
						</div> --}}
						<hr>
                        {{-- @livewireStyles --}}
                        <div class="form-group">
                            {{-- <div class="relative flex justify-center min-h-screen bg-gray-100 items-top dark:bg-gray-700 sm:items-center sm:pt-0">

                                <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-200 sm:rounded-lg">
                                    <div class="fixed inset-0 z-10 overflow-y-auto bg-white">
                                        <div class="flex items-center justify-center min-h-screen text-center">
                                            <div class="inline-block px-2 py-6 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg w-full"
                                                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                <div class="pb-2 bg-white">
                                                    <div class="flex-col items-center sm:flex">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 p-4 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-16 sm:w-16">
                                                            <svg class="w-full h-full text-red-600" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <line x1="19" y1="5" x2="5" y2="19"></line>
                                                                <circle cx="6.5" cy="6.5" r="2.5"></circle>
                                                                <circle cx="17.5" cy="17.5" r="2.5"></circle>
                                                            </svg>
                                                        </div>
                                                      <div class="mt-3 mb-1 text-center sm:ml-4 sm:text-left">
                                                            <h3 class="pt-1 text-3xl font-black leading-6 text-gray-900" id="modal-headline">
                                                                {{ $book->name }} 
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="w-full text-base text-center text-gray-600">
                                                    {{ $book->description }}
                                                </div> 

                                                <div
                                                    class="justify-center w-full px-4 mt-2 font-sans text-xs leading-6 text-center text-gray-500">
                                                    <a href="#_">Điều khoản và điều kiện áp dụng</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div> --}}
                            </div>
                            @livewire('book-reviews', ['book' => $book], key($book->id))
                            @livewireScripts
                            
					</div>
				  </div>
			</div>

            {{-- <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-04.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/bookstore/images/img-pro-04.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

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


        $('.add-to-wishlist').click(function(event) {
            event.preventDefault();
            var book_id = $(this).data('book_id'); // data-book_id="value"
            var image = $(this).parent().parent().parent().parent().parent().find('img').attr('src');             
            console.log(book_id);
            console.log(book_id);
            // return ;

            var url = '/users';

            $.ajax(url, {
                type: 'POST',
                data: {
                    book_id: book_id,
                    image: image,
                },
                
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    alert(resultObj.msg);
                    
                },
                error: function () {
                    alert('Vui lòng đăng nhập để thêm danh sách yêu thích!');
                }
            });
        });


        $('.add-to-card').click(function(event) {
            event.preventDefault();
            var book_id = $(this).data('book_id'); // data-book_id="value"
            var quantity = $('.book-quantity').val();
            var image = "/image/{{ $book->image }}";
            var url = '/orders';

            $.ajax(url, {
                type: 'POST',
                data: {
                    book_id: book_id,
                    quantity: quantity,
                    image: image,
                },
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    alert(resultObj.msg);
                    $('#cart-number').text(resultObj.quantity);
                },
                error: function () {
                    alert('Vui lòng đăng nhập để thêm giỏ hàng!');
                }
            });
        });

    });
</script>
@endsection

