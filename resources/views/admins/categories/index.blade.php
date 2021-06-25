@extends('adminlte::page')

@section('title', 'Quản lý thể loại')

@section('content_header')
    <h1>Quản lý thể loại</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> Thêm thể loại mới</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            
            <td>{{  ++$i }}</td>
            <td>{{ $category->name }}</td>
            
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('admin.categories.edit',$category->id) }}">Sửa</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $categories->links() !!}
        
@endsection