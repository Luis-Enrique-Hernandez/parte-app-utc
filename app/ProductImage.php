<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product()
    {
    //esto pertenece a un producto -> es lo que quiere decir lo siguiente
    	return $this->belongsTo(App\Product::class);
    }

    public function getUrlAttribute()
    {
    	if (substr($this->image, 0, 4)==="http") {
    		return $this->image;
    	}
    	return'/images/products/' . $this->image;
    }
}
