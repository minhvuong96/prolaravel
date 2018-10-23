@extends('admin.master')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Product
        <small>Add</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
 <form action="" method="POST" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
     @if(count($errors)>0)
        <div class="alert alert-danger">        
            <ul>
                 @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                 @endforeach
            </ul>     
        </div>
    @endif
   
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Category</option>
                @php
                    cate_parent($cate,0,"--",old('sltParent'));
                @endphp
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" value="{!! old('txtName') !!}"/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice"value="{!! old('txtPrice') !!}"/>
        </div>
        <div class="form-group" >
            <label>Intro</label>
            <textarea class="form-control" rows="3" id="editor1" name="txtIntro">{!! old('txtIntro') !!}</textarea>
            <script>ckeditor('txtIntro')</script>
        </div>
        <div class="form-group" >
            <label>Content</label>
            <textarea class="form-control" id="editor2" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
            <script>ckeditor('txtContent')</script>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords') !!}" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDes">{!! old('txtDes') !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>

   
</div>
 <div class="col-md-1">
    <div class="col-md-4">
        <div class="form-group">
            <label>Images Detail</label>
            @for($i=0;$i<10;$i++)
                <input type="file" name="fProductDetail[]">
            @endfor 
        </div>
    </div>
 </div>
  <form>
@endsection