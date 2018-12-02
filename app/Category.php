<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model

{
	public static $messages = [
    'name.required' => 'Es necesario colocar un nombre para el producto.',
'name.min' => 'Es necesario colocar como minimo 3 caracteres para nombre para el producto.',
    'description.required' => 'Es necesario colocar una breve descripcion para el producto.',
    'description.max' => 'Es necesario colocar como maximo 200 caracteres para la descripcion de producto.',    
];

     public static $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200'
        ];

	protected $fillable=['name', 'description'];
    public function products()
    {
    //esto tiene muchos productos -> es lo que quiere decir lo siguiente

    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image) 
            return '/images/categories/'.$this->image;
        //else

            $firstProduct=$this->products()->first();
            if ($firstProduct)                 
            return $firstProduct->featured_image_url;
        
    	return '/images/default.jpg';
    }
}
