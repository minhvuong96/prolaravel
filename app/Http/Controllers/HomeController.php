<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\product;
use App\product_image;
use Mail,Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::orderBy('id','DESC')->skip(0)->take(8)->get();

        return view('user.pages.home',compact('product'));
    }
    public function loaisanpham($id){
        $product = product::where('cate_id',$id)->orderBy('id','DESC')->paginate(1);
        return view('user.pages.product',compact('product'));
    }
    public function chitietsanpham($id){
        $product_detail = product::where('id',$id)->first();
        $product_image  = product_image::where('product_id',$id)->get();
        return view('user.pages.single',compact('product_detail','product_image'));

    }
    public function get_lienhe(){
        return view('user.pages.contact');
    }
    public function post_lienhe(Request $request){
        $data = ['hoten'=>$request->name,'tinnhan'=>$request->message];
        Mail::send('emails.blanks', $data, function ($message) {
            $message->from('vuong57520@st.vimaru.edu.vn','Phạm Minh Vương');
            $message->to('vuong57520@st.vimaru.edu.vn', 'Admin')->subject('Tin nhắn của khách hàng.');
        });
        echo "<script>
            alert('Cảm ơn bạn đã liên hệ. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.'); 
            window.location = '".url('/')."';
        </script>";
    }
    public function muahang($id){
        $product_buy = product::where('id',$id)->first();
        Cart::add(array('id' =>$id ,'alias'=>$product_buy->alias,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>array('img'=>$product_buy->image) ));
        return redirect()->route('giohang');
    }
    public function giohang(){
        $content = Cart::content();
        $total = Cart::subtotal(0,0,'.');
        return view('user.pages.checkout',compact('content','total'));
    }
    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->back();
    }
    public function capnhap(Request $request){
        if($request->ajax()){
            $rowId  = $request->input('id');
            $qty = $request->input('qty');
            Cart::update($rowId,$qty);
            return redirect()->route('giohang');
        }
    }
}
