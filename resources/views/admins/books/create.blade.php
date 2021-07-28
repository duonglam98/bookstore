@extends('adminlte::page')

@section('title', 'Tạo sách mới')

{{-- @section('content_header')
    <h1>Tạo sách mới</h1>
@stop --}}

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div class="pull-right" >
            <a class="btn btn-primary" style="background-color: #b0b435" href="{{ route('admin.books.index') }}"> Back</a>
        </div>
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Lỗi!</strong> Xảy ra vấn đề với dữ liệu nhập vào.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('Lỗi'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tên sách:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Tên sách">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tác giả:</strong>
                    <input type="text" name="author" class="form-control" placeholder="Nhập tên tác giả">
                </div>
            </div>
        </div>
            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="title" class="control-block">Thể loại:</label>
                        <select class="form-control" name="category_id">
                            @foreach($category as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="form-group" style="margin-top: 8px;">
                        <strong>Mã sách:</strong>
                        <input type="text" name="code" class="form-control" placeholder="Mã sách">
                    </div>
                </div>
            
                <div class="col-3">
                    <div class="form-group" style="margin-top: 8px;">
                        <strong>Giá sách:</strong>
                        <input type="number" name="price" class="form-control" placeholder="Nhập giá sách">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group" style="margin-top: 8px;">
                        <strong>Số lượng:</strong>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng sách">
                    </div>
                </div>
            
            </div>
            
        </div>
            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mô tả:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Mô tả sách"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hình ảnh:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <strong>Trọng lượng:</strong>
                    <input class="form-control" name="weight" placeholder="Nhập trọng lượng sách">
                </div>
            </div>
    
            <div class="col-3">
                <div class="form-group">
                    <strong>Nhà xuất bản:</strong>
                    <input class="form-control" name="NXB" placeholder="Nhập tên nhà xuất bản">
                </div>
            </div>
            <div class="col-3 text-center" style="height: 50px; margin-top: 26px;">
                <button type="submit" class="btn btn-primary" style="background-color: #b0b435">Tạo sách</button>
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@stop

@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
@endsection


