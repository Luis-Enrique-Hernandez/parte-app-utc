<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class SearchControllerhernandez extends Controller
{
    public function show(Request $request)
    {
    	$query= $request->input('query');
    	$productsSearch= Product::where('name','like', "%$query%")->paginate(5);
    	if ($productsSearch->count()==1) {
    		$id=$productsSearch->first()->id;
    		return redirect("products/$id");
    	}
    	return view('search.show')->with(compact('productsSearch', 'query'));

    }
    public function data()
    {
    	$productsSearch=Product::pluck('name');
    	return $productsSearch;
    }
}
