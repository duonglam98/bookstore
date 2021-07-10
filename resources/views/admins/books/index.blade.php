@extends('adminlte::page')

@section('title', 'Quản lý sách')

@section('content_header')
    <h1>Quản lý sách</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <p>Chào mừng đến trang quản lý sách dành cho Admin</p>           
            </div>
            <div class="pull-right">
                <a class="btn btn-success" style="background-color: #b0b435" href="{{ route('admin.books.create') }}"> Thêm sách mới</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('Thành công'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
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
     
                    <a class="btn btn-info" href="{{ route('admin.books.show',$book->id) }}">Xem</a>
      
                    <a class="btn btn-primary" href="{{ route('admin.books.edit',$book->id) }}">Sửa</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $books->links() !!}
        
@endsection
{{-- @endsection --}}