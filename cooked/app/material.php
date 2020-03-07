<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
	protected $table = "material";

	 // material of product
	
	public function product() {
    	return $this->belongsTo('App\product', 'idProduct', 'id');
    }
}
