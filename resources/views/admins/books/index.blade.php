@extends('adminlte::page')

@section('title', 'Quản lý sách')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-success" style="background-color: #b0b435" href="{{ route('admin.books.create') }}"><i class="fas fa-plus-square"></i> Thêm sách mới</a>
                </div>
            </div>
        </div>
    <br>
    @if ($message = Session::get('Thành công'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <div class="row">
        <div class="form-group">
            <input type="text" name="search" placeholder="Tìm kiếm sách" id="search" class="float-right">           </div>
    </div>
    <div class="row">
        <h4 align="center">Dữ liệu tìm được: <span id="total_records"></span></h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình Ảnh</th>
                    <th>Tên sách</th>
                    <th>Thể loại</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th width="280px">Tuỳ chỉnh</th>
                </tr>
            </thead>
            <tbody id="book-table">
           
            @foreach ($books as $book)

            <tr>
                <td>{{ ($books->perPage() * ($books->currentPage() - 1)) + ($loop->index + 1) }}</td>
                <td><img src="/image/{{ $book->image }}" width="70px" height="70px"></td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->quantity }}</td>
                <td>{{ $book->price }}</td>
                
                <td>
                    <a class="btn btn-info" href="{{ route('admin.books.show',$book->id) }}"><i class="fas fa-eye"></i></a>

                    <a class="btn btn-primary" href="{{ route('admin.books.edit',$book->id) }}"><i class="fas fa-edit"></i></a>
                    
                    <a class="btn btn-danger delete-book" data-book_id="{{ $book->id }}"><i class="far fa-trash-alt"></i></a>
                
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <div class="row paginate-box">
        {!! $books->links() !!}
    </div>
    <div class="row text-center">
        <div class="footer-copyright" style="margin-left: 25%">
            <p class="footer-company" style="margin-top: 40px;">Đã đăng kí bản quyền &copy; 2021 <a href="#">NHANDANBOOK</a> Thiết kế bởi :
                <a href="https://html.design/">Nhà sách Nhân Dân</a>
            </p> 
        </div>
    </div>
    
    </div>       
@endsection

@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('.delete-book').click(function(event) {
                console.log('ok')
                event.preventDefault();
                var bookElement = $(this).closest('tr');
                var bookId = $(this).data('book_id');
                var url = '/admin/books/' + bookId;
                console.log(url);
                $.ajax(url, {
                    type: 'DELETE',
                    success: function (result) {
                        var resultObj = JSON.parse(result);
                        if (resultObj.status) {
                            alert(resultObj.msg);
                            bookElement.remove();
                           
                        } else {
                            alert(resultObj.msg);
                            
                        }
                        location.reload();
                    },
                    error: function () {
                        alert('Có lỗi ở nút xoá!');
                    }
                });
            });

            $('#search').keyup(function() {
                var keyWord = $(this).val();
                var url = '/admin/books/search?keyword=' + keyWord;
                console.log(keyWord);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        displayBook(result);
                    },
                    error: function() {
                        location.reload();
                    }
                });
            });
            function displayBook(books) {
                    $('#book-table').html('');
                    $('.paginate-box').html('');
                    $.each(books, function(index, book) {
                        var stt = index + 1;
                        var row = '<tr>'
                                + '<td>' + stt + '</td>'
                                + '<td><img src="/image/' + book.image + '" width="70px" height="70px"></td>'
                                + '<td>' + book.name + '</td>'
                                + '<td>' + book.category + '</td>'
                                + '<td>' + book.quantity + '</td>'
                                + '<td>' + book.price + '</td>'
                                + '<td>'
                                    + '<a class="btn btn-info" href="/admin/books/' + book.id + '"><i class="fas fa-eye"></i></a> '
                                    + '<a class="btn btn-primary" href="/admin/books/' + book.id + '/edit"><i class="fas fa-edit"></i></a> '
                                    + '<a class="btn btn-danger delete-book" data-book_id="' + book.id + '"><i class="far fa-trash-alt"></i></a>'
                                + '</td>';
                            + '</tr>';
                        $('#book-table').append(row);
                    });
                }
        });
</script>
@endsection
