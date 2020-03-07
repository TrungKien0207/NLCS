<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spice extends Model
{
     protected $table = "spice";

      // spice of product
	
	public function product() {
    	return $this->belongsTo('App\product', 'idProduct', 'id');
    }
}
