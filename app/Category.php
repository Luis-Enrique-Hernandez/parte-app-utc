<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
    //esto tiene muchos productos -> es lo que quiere decir lo siguiente

    	return $this->hasMany(Product::class);
    }
}
