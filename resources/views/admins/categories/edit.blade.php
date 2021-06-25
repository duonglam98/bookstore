@extends('adminlte::page')

@section('title', 'Chỉnh sửa thể loại')

@section('content_header')
    <h1>Chỉnh sửa thể loại</h1>
@stop

@section('content')
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-primary" style="background-color: #b0b435" href="{{ route('admin.categories.index') }}"> Trở lại</a>
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
    
    <form action="{{ route('admin.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
    
     <div class="row">
        
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tên thể loại:</strong>
                <input type="text" name="name" class="form-control" placeholder="Tên thể loại" value="{{ $category->name }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="height: 50px">
                <button type="submit" class="btn btn-primary" style="background-color: #b0b435">Cập nhật thể loại</button>
        </div>
    </div>
     
</form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@section('js')
    <script> console.log('Hi!'); </script>