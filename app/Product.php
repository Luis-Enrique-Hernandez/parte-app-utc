<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function category()
    {
    //esto pertenece a una categorias -> es lo que quiere decir lo siguiente

    return $this->belongsTo(Category::class);

    }

    public function image()
    {
    //esto tiene muchos Imageenes -> es lo que quiere decir lo siguiente

    return $this->hasMany(ProductImage::class);
    
    }



    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage=$this->image()->where('featured', true)->first();
        if(!$featuredImage)
            $featuredImage=$this->image()->first();
        if ($featuredImage) {
            return $featuredImage->url;
        }
        return '/images/products/default.jpg';
    }
}

