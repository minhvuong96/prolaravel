
@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Product
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
            <th>Price</th>
            <th>Date</th>
            <th>Cate</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr class="odd gradeX" align="center">
            <td>{!! $item['id'] !!}</td>
            <td>{!! $item['name'] !!}</td>
            <td>{!! number_format($item['price'],0,',','.') !!} VNĐ</td>
            <td>
                <?php
                    echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans();
                ?>
            </td>
            <td>
                <?php $cate = DB::table('cates')->where('id',$item['cate_id'])->first();?>
                @if(!empty($cate->name))
                {!! $cate->name !!}
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.product.getDelete',$item['id'])!!}" onclick="return confirm('Bạn có chắc muốn xóa không!');"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit',$item['id'])!!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection