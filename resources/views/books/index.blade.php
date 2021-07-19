@extends('layouts.myapp')

@section('title', 'Trang chủ')

@section('content')


    <!-- Start Slider -->
    
    <div id="slides-shop" class="cover-slides">
       
        @foreach ($bookSlides as $bookSlide)
        <ul class="slides-container">
            
            <li class="text-center">
               <img src="/bookstore/images/mat-biec-Nguyen-Nhat-Anh.jpg" alt="">
               
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1> --}}
                            {{-- <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p> --}}
                            <p><a class="btn hvr-hover" href="{{ route('books.detail', ['id' => $bookSlide->id = 3])  }}">Xem ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                
                <img src="/bookstore/images/AWilliams_Book_WebBanner.jpg" alt="">
               
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1> --}}
                            {{-- <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p> --}}
                            <p><a class="btn hvr-hover" href="{{ route('books.detail', ['id' => $bookSlide->id = 6])}}" >Xem ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                
                <img src="/bookstore/images/jj-01_rztw.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1> --}}
                            {{-- <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p> --}}
                            <p><a class="btn hvr-hover" href="{{ route('books.detail', ['id' => $bookSlide->id = 7])  }}">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            
        </ul>
        @endforeach
        
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
   
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Danh mục nổi bật</h1>
                    </div>
                </div>
            </div>

            <div class="row">
               @foreach ($nameCategories as $nameCategory)
               
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/bookstore/images/nhung-tac-pham-van-hoc-viet-nam-hay-1.jpg" alt="nhung-tac-pham-van-hoc-viet-nam-hay-1.jpg" />
                        <a class="btn hvr-hover" href="{{ route('books.index') . '?category=' . $nameCategory->sub_name = 'vanhoctrongnuoc'  }}">Văn học trong nước</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/bookstore/images/944d306e21cb271e83f18648a8a21aa9.jpg" alt="944d306e21cb271e83f18648a8a21aa9.jpg" />
                        <a class="btn hvr-hover" href="{{ route('books.index') . '?category=' . $nameCategory->sub_name = 'vanhocnuocngoai'  }}">Văn học nước ngoài</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/image/20210627031952.jpg" alt="548f6d82cfef32b288e1dfb8fb7dd562.jpg" />
                        <a class="btn hvr-hover" href="{{ route('books.index') . '?category=' . $nameCategory->sub_name = 'tudien'  }}">Từ điển</a>
                    </div>
                </div>
                   
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Categories -->
	

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Gợi ý cho bạn</h1>
                    </div>
                </div>
            </div>
           

            <div class="row special-list">
                @foreach ($books as $book)
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            {{-- <a href="#">{{ $book->images }}</a> --}}
                         
                            <img src="/image/{{ $book->image }}" class="img-fluid" style="height: 350px !important">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" class="add-to-wishlist" data-original-title="Thêm vào yêu thích" data-book_id="{{ $book->id }}">
                                        <i class="far fa-heart "></i>
                                    </a>
                                </li>
                                </ul>
                                <a class="btn hvr-hover add-to-card cart" data-fancybox-close="" href="" data-book_id="{{ $book->id }}">

                                Thêm giỏ hàng
                            </a>
                            </div>
                        
                        </div>
                        <div class="why-text">
                            <h4><a href="{{ route('books.detail', ['id' => $book->id])  }}">{{ $book->name }}</a></h4>
                            <h5> {{ $book->price }} vnđ</h5>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            
        </div>
        {{-- {{ $books->links() }} --}}
    </div>
    <!-- End Products  -->

    <!-- Start Blog  -->
    {{-- <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Blog mới nhất</h1>
                        <p>Review những cuốn sách hấp dẫn đã và sắp ra mắt cho bạn.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box" style="height: 703px !important">
                        <div class="blog-img">
                            <img class="img-fluid" src="/bookstore/images/moi-lan-vap-nga-la-mot-lan-truong-thanh.jpg" alt="moi-lan-vap-nga-la-mot-lan-truong-thanh.jpg" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Review "Mỗi lần vấp ngã là một lần trưởng thành"</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box" style="height: 703px !important">
                        <div class="blog-img">
                            <img class="img-fluid" src="/bookstore/images/cb0ebb11383b6b375992ab1f03582fed.jpg" alt="cb0ebb11383b6b375992ab1f03582fed.jpg" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Review cuốn sách"Khởi nghiệp tinh gọn"</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box" style="height: 703px !important">
                        <div class="blog-img">
                            <img class="img-fluid" src="/bookstore/images/f2760035b59ed6a21cfbad589376e12a.jpg" alt="f2760035b59ed6a21cfbad589376e12a.jpg" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Review "Hoàng tử bé" - triết lý về tình yêu & cuộc sống</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Blog  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>


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
            var quantity = 1;
            var image = $(this).parent().parent().find('img').attr('src');             
            console.log(image);
            // return ;

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

