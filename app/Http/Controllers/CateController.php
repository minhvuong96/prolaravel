<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\cate;

class CateController extends Controller
{
	public function getList(){
		$data = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list',compact('data'));
	}
    public function getAdd(){
    	$parent = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.add',compact('parent'));
    }
    public function postAdd(CateRequest $request){
    	$cate = new cate;
    	$cate->name = $request->txtCateName;
    	$cate->alias = changeTitle($request->txtCateName);
    	$cate->order = $request->txtOrder;
    	$cate->parent_id = $request->sltParent;
    	$cate->keywords = $request->txtKeywords;
    	$cate->description = $request->txtDes;
    	$cate->save();
    	return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Completed Add Cate!']);
    }
    public function getDelete($id){
    	$parent = Cate::where('parent_id',$id)->count();
    	if($parent==0){
    	$item = Cate::find($id);
  		$item->delete($id);
  		return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Completed Delete Cate!']);
  		}else{
  			echo "<script type='text/javascript'
  			>alert('Bạn không thể xóa cate này!')
			window.location='";
			echo route('admin.cate.getList');
			echo"'
  			</script>";
  		}	

    }
    public function getEdit($id){
    	$data = Cate::find($id)->toArray();
    	$parent = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.edit',compact('data','parent'));
    }
    public function postEdit(Request $request,$id){
    	$cate = Cate::find($id);
    	$cate->name = $request->txtCateName;
    	$cate->alias = changeTitle($request->txtCateName);
    	$cate->order = $request->txtOrder;
    	$cate->parent_id = $request->sltParent;
    	$cate->keywords = $request->txtKeywords;
    	$cate->description = $request->txtDes;
    	$cate->save();
    	return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Completed Edit Cate!']);
    }
}
