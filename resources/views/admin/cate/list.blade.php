@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Category
        <small>List</small>
    </h1>
        @if(Session::has('flash_message'))
         <div class="alert alert-success">
            {!! Session::get('flash_message') !!}
        </div>
        @endif
    
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr class="odd gradeX" align="center">
                <td>{!! $item['id'] !!}</td>
                <td>{!! $item['name'] !!}</td>
                @if ($item['parent_id']==0)
                <td>{!! 'None' !!}</td>    
                @else
                <td>
                        @php
                            $parent = DB::table('cates')->where('id',$item['parent_id'])->first();
                            echo $parent->name;
                        @endphp
                </td>
                @endif
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc muốn xóa');" href="{!! URL::route('admin.cate.getDelete',$item['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$item['id']) !!}">Edit</a></td>
            </tr>
        @endforeach
      
       
    </tbody>
</table>
@endsection