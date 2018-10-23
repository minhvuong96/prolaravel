<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','alias','price','intro','content','keywords','image','description','cate_id','user_id'];
    public $timestamps = true;
    public function cate(){
    	return $this->belongsTo('App\cate');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function pimages(){
    	return $this->hasMany('App\product_image');
    }
}
