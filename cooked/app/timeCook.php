<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timeCook extends Model
{
	protected $table = "timeCook";

    public function product() {
    	return $this->belongsTo('App\product', 'idProduct', 'id');
    }
}
