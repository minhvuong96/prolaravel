<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function getList(){
    	$user = User::orderBy('id','desc')->select('id','username','level')->get()->toArray();
    	return view('admin.user.list',compact('user'));
    }
    public function getAdd(){
    	return view('admin.user.add');
    }
    public function postAdd(UserRequest $request){
    	$user = new User();
    	$user->username = $request->txtUser;
    	$user->password =Hash::make($request->txtPass);
    	$user->email = $request->txtEmail;
    	$user->level = $request->rdoLevel;
    	$user->remember_token = $request->_token;
    	$user->save();
    	return redirect()->route('admin.user.getList')->with(['flash_message'=>'Complete Add User']);
    }
    public function getDelete($id){
    	$user_current_login = Auth::user()->id;
        $user = User::find($id);
        if (($id==2)||($user_current_login!=2 && $user->level == 1)) {
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Cannot Delete User']);
        }
        else{
            $user->delete();
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Completed Delete User']);
        }
    }
    public function getEdit($id){
        $data = User::find($id);
         if((Auth::user()->id != 2)&&(($id ==2 )||($data['level']==1 && (Auth::user()->id != $id)))){
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Cannot Edit User']);
         }else
    	return view('admin.user.edit',compact('data','id'));
    }
    public function postEdit($id,Request $request){
    	$user = User::find($id);
        
            if($request->txtRePass){
                $this->validate($request,
                    [
                        'txtRePass'=>'same:txtPass',
                    ],
                    [
                        'txtRePass.same'=>'Mật khẩu nhập lại không đúng!'
                    ]
                );
                $user->password = Hash::make($request->txtPass);
            }
            $user->email = $request->txtEmail;
            $user->level = $request->rdoLevel;
            $user->save();
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Completed Edit User']);
        
    }
}
