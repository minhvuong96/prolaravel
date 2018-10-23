@extends('admin.master')
@section('content')
<style>
    .img_current{
        width: 200px;
        height: auto;
    }
    .image_detail{
        width: 200px;
        height: auto;
        margin-bottom: 20px;
    }
    .image_del{
        position: relative;
        top: -68px;
    }
</style>
<div class="col-lg-12">
    <h1 class="page-header">Product
        <small>Edit</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
 <form action="" method="POST" name="formEditProduct" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
   
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Category</option>
                @php
                    cate_parent($cate,0,"--",$product['cate_id']);
                @endphp
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName',isset($product) ? $product['name'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice',isset($product) ? $product['price'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] : null) !!}</textarea>
            <script>ckeditor('txtIntro');</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtIntro',isset($product) ? $product['content'] : null) !!}</textarea>
            <script>ckeditor('txtContent');</script>
        </div>
        <div class="form-group">
            <label>Image Current</label>
            <img class="img_current" src="{!! asset('resources/upload/'.$product['image']) !!}" alt="">
            <input type="hidden" name="img_current" value="{!!$product['image']!!}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords',isset($product) ? $product['keywords'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDes">{!! old('txtDes',isset($product) ? $product['description'] : null) !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>

</div>
<div class="col-md-1"></div>
<div class="col-md-4">
    <label>Images Detail</label><br/>
    @foreach($product_image as $key => $value)
        <div class="form-group">
            <img class="image_detail" src="{!! asset('resources/upload/files/'.$value['image']) !!}" idHinh="{!! $value['id']!!}" id="{!!$key!!}" alt="">
            <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle image_del">x</a>
            <input type="file" name="fProductDetail[]">
        </div>
    @endforeach
    <button type="button" class="btn btn-primary" id="add_images">Add Images</button>
    <div id="insert"></div>
</div>
<form>
@endsection