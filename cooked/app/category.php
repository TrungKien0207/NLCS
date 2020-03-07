<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    //quan hệ giữa table category và product
    //idCategory là khóa ngoại và id là khóa chính
    public function category() {
    	return $this->hasMany('App\category','idCategory','id');
    }

}
