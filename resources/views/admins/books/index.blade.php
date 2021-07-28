@extends('adminlte::page')

@section('title', 'Quản lý sách')

{{-- @section('content_header')
    <h1>Quản lý sách</h1>
@stop --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" style="background-color: #b0b435" href="{{ route('admin.books.create') }}"><i class="fas fa-plus-square"></i> Thêm sách mới</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('Thành công'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Hình Ảnh</th>
                <th>Tên sách</th>
                <th>Thể loại</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
                <th width="280px">Tuỳ chỉnh</th>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/image/{{ $book->image }}" width="70px" height="70px"></td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->quantity }}</td>
                <td>{{ $book->price }}</td>
                
                <td>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
        
                        <a class="btn btn-info" href="{{ route('admin.books.show',$book->id) }}"><i class="fas fa-eye"></i></a>
        
                        <a class="btn btn-primary" href="{{ route('admin.books.edit',$book->id) }}"><i class="fas fa-edit"></i></a>
        
                        @csrf
                        @method('DELETE')
            
                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="row">
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
