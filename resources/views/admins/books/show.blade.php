@extends('adminlte::page')

@section('title', 'Xem sách')

@section('content_header')
    <h1>Quản lý sách</h1>
@stop

@section('content')
    
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Chi tiết về sách</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.books.index') }}"> Back</a>
        </div>
    </div>
</div>
 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên sách:</strong>
            {{ $book->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tác giả:</strong>
            {{ $book->author }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Hình ảnh:</strong>
            <img src="bookstore/images/{{ $book->images }}" width="500px">
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Số lượng:</strong>
            {{ $book->quantity }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Giá:</strong>
            {{ $book->price }}
        </div>
    </div>

    
</div>
        
@endsection
@endsection