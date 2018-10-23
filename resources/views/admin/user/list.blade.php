@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">User
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
            <th>Username</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $value)
        <tr class="odd gradeX" align="center">
            <td>{!!$value['id']!!}</td>
            <td>{!!$value['username']!!}</td>
            <td>
                @if($value['id']==2)
                SuperAdmin
                @elseif($value['level']==1)
                Admin
                @else
                Member
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!!URL::route('admin.user.getDelete',$value['id'])!!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.user.getEdit',$value['id'])!!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection