<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductControllerhernandez extends Controller
{
    public function show($id)
    {
    	$productHm=Product::find($id);
/*    	método image, esta definido dentro del modulo Product
*/    	$images=$productHm->image;
    	

    	$imagesLeft=collect();
    	$imagesRigth=collect();

    	foreach($images as $key => $image) {

    		if ($key%2==0) 

    			$imagesLeft->push($image);
    		else
    			$imagesRigth->push($image);
    	}
    	return view('products.show')->with(compact('productHm', 'imagesLeft', 'imagesRigth'));
    	
    }
}
