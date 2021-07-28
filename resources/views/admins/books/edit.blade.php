@extends('adminlte::page')

@section('title', 'Chỉnh sửa sách')

{{-- @section('content_header')
    <h1>Chỉnh sửa sách</h1>
@stop --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-primary" style="background-color: #b0b435" href="{{ route('admin.books.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Lỗi!</strong> Có vấn đề xảy ra với dữ liệu nhập vào.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.books.update',$book->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
    
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tên sách:</strong>
                <input type="text" name="name" class="form-control" placeholder="Tên sách" value="{{ $book->name }}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tác giả:</strong>
                <input type="text" name="author" class="form-control" placeholder="Nhập tên tác giả" value="{{ $book->author }}">
            </div>
        </div>
     </div>
        
     <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="title" class="control-block">Thể loại:</label>
                <select class="form-control" name="category">
                    @foreach($category as $cate)
                    <option value="{{ $cate->name }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3" style="margin-top: 8px">
            <div class="form-group">
                <strong>Mã sách:</strong>
                <input type="text" name="code" class="form-control" placeholder="Mã sách: BOOK_" value="{{ $book->code }}">
            </div>
        </div>
        <div class="col-3" style="margin-top: 8px">
            <div class="form-group">
                <strong>Giá sách:</strong>
                <input type="number" name="price" class="form-control" placeholder="Nhập giá sách" value="{{ $book->price }}">
            </div>
        </div>

        <div class="col-3" style="margin-top: 8px">
            <div class="form-group">
                <strong>Số lượng:</strong>
                <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng sách" value="{{ $book->quantity }}">
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mô tả:</strong>
            <textarea class="form-control" style="height:150px" name="description" placeholder="Mô tả sách" value="{{ $book->description }}"></textarea>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Hình ảnh:</strong>
            <input type="file" name="image" class="form-control" placeholder="image" value="{{ $book->image }}">
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <strong>Trọng lượng:</strong>
                <input class="form-control" name="weight" placeholder="Nhập trọng lượng sách" value="{{ $book->weight }}">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <strong>Nhà xuất bản:</strong>
                <input class="form-control" name="NXB" placeholder="Nhập tên nhà xuất bản" value="{{ $book->NXB }}">
            </div>
        </div>

        <div class="col-3" style="height: 50px; margin-top: 24px">
            <button type="submit" class="btn btn-primary" style="background-color: #b0b435">Cập nhật sách</button>
        </div>
    </div>
    </form>
    <div class="footer-copyright text-center" >
        <p class="footer-company" style="margin-top: 40px;">Đã đăng kí bản quyền &copy; 2021 <a href="#">NHANDANBOOK</a> Thiết kế bởi :
            <a href="https://html.design/">Nhà sách Nhân Dân</a></p>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@endsection