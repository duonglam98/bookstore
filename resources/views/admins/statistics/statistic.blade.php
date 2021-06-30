@extends('adminlte::page')

@section('title', 'Quản lý sách')

@section('content_header')
    <h1>Quản lý đơn hàng</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <p>Chào mừng đến trang quản lý đơn hàng dành cho Admin</p>           
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
            <th>Tên thống kê</th>
            <th>Giá trị</th>
        
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $book->quantity }}</td>
            <td>{{ $book->price }}</td>
            
            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
     
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