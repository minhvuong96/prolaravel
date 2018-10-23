<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\cate;
use App\product;
use App\product_image;
use App\Http\Requests\ProductRequest;
use File;
use Request;
use Auth;
class ProductController extends Controller
{
    public function getList(){
        $data = product::select('id','name','price','created_at','cate_id')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list',compact('data'));
    }
    public function getAdd(){
    	$cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $request){
    	$filename= $request->file('fImages')->getClientOriginalName();
    	$product = new product();
    	$product->name= $request->txtName;
    	$product->alias = changeTitle($request->txtName);
    	$product->price= $request->txtPrice;
    	$product->intro= $request->txtIntro;
    	$product->content= $request->txtContent;
    	$product->keywords= $request->txtKeywords;
    	$product->image= $filename;
    	$product->description= $request->txtDes;
    	$product->cate_id= $request->sltParent;
    	$product->user_id= Auth::user()->id;
    	$request->file('fImages')->move('resources/upload/',$filename);
        $product->save();
        if($request->hasFile('fProductDetail')){
            foreach($request->file('fProductDetail') as $file){
                $product_images = new product_image();
                if(isset($file)){
                    $product_images->image = $file->getClientOriginalName();
                    $product_images->product_id = $product->id;
                    $file->move('resources/upload/files/',$file->getClientOriginalName());
                    $product_images->save();
                }
            }
        }
    	
        return redirect()->route('admin.product.getList')->with(['flash_message'=>'Completed Add Product!']);

    }
    public function getDelete($id){
        $product_detail = product::find($id)->pimages->toArray();
        foreach ($product_detail as  $value) {
            File::delete('resources/upload/files/'.$value['image']);
        }
        $product = product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);
         return redirect()->route('admin.product.getList')->with(['flash_message'=>'Completed Delete Product!']);
    }
    public function getEdit($id){
        $cate = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        $product = product::find($id);
        $product_image = product::find($id)->pimages->toArray();
        return view('admin.product.edit',compact('cate','product','product_image'));
    }
    public function postEdit($id,Request $request){
        $product = product::find($id);
        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->intro = Request::input('txtIntro');
        $product->content = Request::input('txtContent');
        $product->keywords = Request::input('txtKeywords');
        $product->description = Request::input('txtDes');
        $product->cate_id = Request::input('sltParent');
        $product->user_id = Auth::user()->id;
        $img_current = 'resources/upload/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('resources/upload/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }
        $product->save();
        if(!empty(Request::file('fEditDetail'))){
            foreach (Request::file('fEditDetail') as  $file) {
                $product_image = new product_image();
                if(isset($file)){
                    $product_image->image = $file->getClientOriginalName();
                    $product_image->product_id = $id;
                    $file->move('resources/upload/files/',$file->getClientOriginalName());
                    $product_image->save();
                }
                
            }
        }
        
        return redirect()->route('admin.product.getList')->with(['flash_message'=>'Completed Update Product!']);
    }
    public function getDelImg($id){
        if($request->ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = product_image::find($idHinh);
            if(!empty($image_detail)){
                $img = 'resources/upload/files/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Oke";
        }
    }
}
