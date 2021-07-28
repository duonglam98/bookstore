@extends('adminlte::page')

@section('title', 'Quản lý thể loại')

{{-- @section('content_header')
    <h1>Quản lý thể loại</h1>
@stop --}}

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}" style="background-color: #b0b435"><i class="fas fa-plus-square"></i> Thêm thể loại mới</a>
                
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

        {{-- <x-adminlte-alert theme="success" title="Success">
            <p>{{ $message }}</p>
        </x-adminlte-alert> --}}
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            
            <td>{{  ++$i }}</td>
            <td>{{ $category->name }}</td>
            
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('admin.categories.edit',$category->id) }}"><i class="fas fa-edit"></i></a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $categories->links() !!}
        
@endsection