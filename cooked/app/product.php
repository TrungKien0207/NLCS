<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "product";
    
    //Product of category
    public function category() {
    	return $this->belongsTo('App\category', 'idCategory', 'id');
    }

    
}
