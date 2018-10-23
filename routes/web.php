<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.pages.home');
});
Route::group(['prefix'=>'admin','middleware' => 'auth'],function (){
	Route::group(['prefix' => 'cate'], function() {
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
	    Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
	    Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
	    Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
	    Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
	    Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
	});
	Route::group(['prefix' => 'product'], function() {
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
	    Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
	    Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
	    Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
	    Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
	    Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
	    Route::get('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
	});
	Route::group(['prefix' => 'user'], function() {
		Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
	    Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
	    Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
	    Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
	    Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
	    Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
	});

});


Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');


//Shopin

Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'HomeController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{tensp}',['as'=>'chitietsanpham','uses'=>'HomeController@chitietsanpham']);
Route::get('lien-he',['as'=>'get_lienhe','uses'=>'HomeController@get_lienhe']);
Route::post('lien-he',['as'=>'post_lienhe','uses'=>'HomeController@post_lienhe']);
Route::get('mua-hang/{id}/{tensp}',['as'=>'muahang','uses'=>'HomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'HomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'HomeController@xoasanpham']);
Route::post('cap-nhap/{id}/{qty}',['as'=>'capnhap','uses'=>'HomeController@capnhap']);