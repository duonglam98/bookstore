@extends('adminlte::page')

@section('title', 'Cập nhật đơn hàng')

@section('content_header')
    <h1>Cập nhật đơn hàng</h1>
@stop

@section('content')
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

            <div class="form-group">
                <label for="title" class="control-block">Thể loại:</label>
                <select class="form-control" name="category_id">
                    @foreach($category as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mã sách:</strong>
                <input type="text" name="code" class="form-control" placeholder="Mã sách">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Giá sách:</strong>
                <input type="number" name="price" class="form-control" placeholder="Nhập giá sách">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Số lượng:</strong>
                <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng sách">
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

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Trọng lượng:</strong>
                <textarea class="form-control" name="weight" placeholder="Nhập trọng lượng sách"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nhà xuất bản:</strong>
                <textarea class="form-control" name="NXB" placeholder="Nhập tên nhà xuất bản"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="height: 50px">
                <button type="submit" class="btn btn-primary" style="background-color: #b0b435">Tạo sách</button>
        </div>

     
</form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@stop

@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
    $(document).ready(function(){

    // Define function to open filemanager window
    var lfm = function(options, cb) {
    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

        lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
            context.invoke('insertImage', lfmItem.url);
            });
        });

        }
    });
    return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#content').summernote({
    toolbar: [
         // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        // ['popovers', ['lfm']],
    ],
    buttons: {
        lfm: LFMButton
    }
    })
    });
</script>


